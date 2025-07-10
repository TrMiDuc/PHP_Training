<?php
$config = include 'config.php';

$host = $config['host'];
$user = $config['user'];
$password = $config['password'];
$database = $config['database'];

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully to MariaDB!";

class User {
    private $id;
    private $name;
    private $balance;
    private $conn;

    public function __construct($id, $conn) {
        $this->id = $id;
        $this->conn = $conn;

        #open transaction
        $stmt = $conn->prepare("SELECT balance FROM people WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($balance);
        if ($stmt->fetch()) {
            $this->balance = $balance;
        } else {
            throw new Exception("User not found");
        } 
        $stmt->close();
    }

    public function getBalance() {
        return $this->balance;
    }

    public function transferMoney($to, $amount) {

        $this->conn->begin_transaction();
        try {
            if ($this->balance < $amount) {
                throw new Exception("Not enough balance.\n");
            }

            $stmt1 = $this->conn->prepare("UPDATE people SET balance = balance - ? WHERE id = ?");
            $stmt1->bind_param("di", $amount, $this->id);
            $stmt1->execute();

            $stmt2 = $this->conn->prepare("UPDATE people SET balance = balance + ? WHERE id = ?");
            $stmt2->bind_param("di", $amount, $to);
            $stmt2->execute();

            $stmt3 = $this->conn->prepare("INSERT INTO transfers (sender_id, receiver_id, amount) VALUES (?, ?, ?)");
            $stmt3->bind_param("iid", $this->id, $to, $amount);
            $stmt3->execute();

            $this->conn->commit();
            echo "Transfer of $amount successful from user {$this->id} to user $to\n";

            $this->balance -= $amount;
        } catch (Exception $e) {
            #if any error occurs.
            $this->conn->rollback();
            echo "Transfer failed: " . $e->getMessage(), "\n";
        }
    }
}

$Alice = new User(1, $conn); #có 1000.00
$to = 2;
$amount1 = 200.00;
$amount2 = 900.00;
$Alice->transferMoney($to, $amount1);
$Alice->transferMoney($to, $amount2);

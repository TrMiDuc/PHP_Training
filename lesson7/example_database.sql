CREATE DATABASE IF NOT EXISTS money_transfer;
USE money_transfer;

CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00
);

INSERT INTO people (name, balance) VALUES
('Alice', 1000.00),
('Bob', 500.00),
('Charlie', 800.00);


CREATE TABLE transfers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    transfer_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES people(id),
    FOREIGN KEY (receiver_id) REFERENCES people(id)
);

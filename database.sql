-- Create the database
CREATE DATABASE bank;

-- Switch to the bank database
USE bank;

-- Create the accounts table
CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    balance DECIMAL(10,2) NOT NULL
);

-- Insert a default balance into the accounts table
INSERT INTO accounts (balance) VALUES (1000.00);

-- Create the logs table to record transactions
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    transaction_type VARCHAR(50),
    amount DECIMAL(10,2),
    remaining_balance DECIMAL(10,2)
);

# Bank System

## Objective
This project simulates a banking system designed to handle typical transactions such as deposits and withdrawals. The main focus is on addressing race conditions to ensure data integrity.

## Branches
- **main**: Contains the original code with the supposed race condition issue.
- **solution**: Contains the modified code that implements semaphores in PHP to handle concurrency and prevent race conditions.

## Setup
1. Clone the repository.
2. Import `database.sql` to set up the database.
3. Update `db.php` with your database connection details.
4. Use `test_client.sh` script to interact with the system.

## Usage
Navigate to the appropriate PHP files in your web browser to perform transactions and view logs.

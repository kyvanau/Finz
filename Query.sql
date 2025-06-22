-- ===== FIXED DATABASE SCHEMA =====

DROP DATABASE IF EXISTS FinZ;
CREATE DATABASE FinZ;
USE FinZ;

-- Main transactions table (income and outcome)
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(15,2) NOT NULL,
    type ENUM('income', 'outcome') NOT NULL,
    description VARCHAR(255) DEFAULT '',
    category VARCHAR(100) DEFAULT '',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Savings table
CREATE TABLE savings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    tabungan DECIMAL(15,2) NOT NULL,
    bulan VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Budget targets table (optional for future use)
CREATE TABLE budget_targets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    monthly_limit DECIMAL(15,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cek data transaksi hari ini
SELECT * FROM transactions
WHERE DATE(created_at) = CURDATE();

-- Cek outcome bulan ini
SELECT * FROM transactions
WHERE type = 'outcome'
  AND MONTH(created_at) = MONTH(CURDATE());

-- Cek transaksi dengan deskripsi tertentu
SELECT * FROM transactions
WHERE description = 'Beli cemilan'
ORDER BY created_at DESC;

-- Hapus semua data di tabel
TRUNCATE TABLE transactions;
TRUNCATE TABLE savings;
TRUNCATE TABLE budget_targets;

-- Hapus 10 data outcome bulan ini
DELETE FROM transactions
WHERE type = 'outcome'
  AND MONTH(created_at) = MONTH(CURDATE())
  AND YEAR(created_at) = YEAR(CURDATE())
LIMIT 10;

-- Hapus 10 data income bulan ini
DELETE FROM transactions
WHERE type = 'income'
  AND MONTH(created_at) = MONTH(CURDATE())
  AND YEAR(created_at) = YEAR(CURDATE())
LIMIT 10;
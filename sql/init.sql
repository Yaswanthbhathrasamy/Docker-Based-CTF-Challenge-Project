-- init.sql
CREATE DATABASE IF NOT EXISTS nevermore;
USE nevermore;

-- Profiles/users table (for IDOR & diary/Flag1)
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    role VARCHAR(50),
    profile TEXT
);

INSERT INTO users (username, role, profile) VALUES
('student1','student','Just a normal student.'),
('student2','student','Diary: bored.'),
('manager','admin','Diary: I keep secrets here. FLAG1: CTF{NEVERMORE_DIARY_7F3A}');

-- Products table (two text columns: name, description) -- used for SQLi UNION enumeration
DROP TABLE IF EXISTS products;
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200),
    description TEXT,
    category VARCHAR(100)
);

INSERT INTO products (name, description, category) VALUES
('Raven Statue','A dark figurine for true Nevermore fans.','decor'),
('Poisoned Pen','Perfect for writing mysterious diaries.','stationery'),
('Spider Brooch','Elegant accessory for gothic attire.','jewelry');

-- Authentication table that attacker will discover via SQLi (name chosen to match challenge)
DROP TABLE IF EXISTS users_wed123;
CREATE TABLE users_wed123 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username_wed123 VARCHAR(100),
    password_wed123 VARCHAR(255)   -- intentionally plaintext for CTF
);

-- Insert admin credentials (attacker will dump these via SQLi then use login)
INSERT INTO users_wed123 (username_wed123, password_wed123) VALUES
('admin','AdminPass123'),
('testuser','testpass');

-- (Optional) Create a database user for the app (or use root in local lab)
-- You can also use root for quick lab, but better to create a limited user.

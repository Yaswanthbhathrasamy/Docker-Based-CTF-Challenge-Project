-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100)
);

-- Insert sample products
INSERT INTO products (name, description, category) VALUES
('Potion', 'A mysterious potion from Nevermore', 'magic'),
('Book', 'Ancient book of spells', 'magic'),
('Crystal Ball', 'For seeing into the future', 'magic'),
('Herbs', 'Mystical herbs for potions', 'ingredients');

-- Create users_xxxxx table
CREATE TABLE IF NOT EXISTS users_xxxxx (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(50)
);

-- Insert sample users
INSERT INTO users_xxxxx (username, password) VALUES
('wednesday', 'shadow123'),
('enid', 'colorful456'),
('xavier', 'artist789'),
('taylor', 'werewolf123');

-- Create diary_entries table (kept for compatibility, but not used in the current implementation)
CREATE TABLE IF NOT EXISTS diary_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    content TEXT
);

-- Insert sample diary entries (kept for compatibility)
INSERT INTO diary_entries (id, user_id, title, content) VALUES
(1, 1, 'My Secret', 'I found something strange in the woods.'),
(2, 2, 'My Thoughts', 'I love my friends at Nevermore.');

-- Add final flag file creation script (to be run inside container)
-- This will be done in Dockerfile or entrypoint

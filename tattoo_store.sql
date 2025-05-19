
-- สร้างฐานข้อมูล
CREATE DATABASE IF NOT EXISTS auth;
USE auth;

-- ตารางผู้ใช้งาน (Login)
CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- เพิ่มผู้ใช้งานตัวอย่าง
INSERT INTO login (username, password) VALUES ('1234', '1234');

-- ตารางสินค้า Tattoo
CREATE TABLE IF NOT EXISTS tattoo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url TEXT
);

-- เพิ่ม Tattoo ตัวอย่าง
INSERT INTO tattoo (name, description, image_url) VALUES
('Dragon Tattoo', 'A fierce dragon tattoo for power and strength.', 'https://images.unsplash.com/photo-1600488993343-7e74e60e30a8'),
('Floral Tattoo', 'Elegant floral design for a timeless look.', 'https://images.unsplash.com/photo-1588776814546-ec7be85bd6b3');

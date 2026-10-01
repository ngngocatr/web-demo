#Thêm bảng user
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

#Thêm bảng sản phẩm
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2)
);

#Thêm dữ liệu cho bảng sản phẩm
INSERT INTO products (name, description, price) VALUES
('Laptop Dell Inspiron 15', 'Laptop học tập và văn phòng, RAM 16GB, SSD 512GB', 15990000.00),
('Chuột Logitech G102', 'Chuột gaming có dây, cảm biến quang học', 399000.00),
('Bàn phím cơ Keychron K2', 'Bàn phím cơ không dây Bluetooth, layout 75%', 1890000.00),
('Tai nghe HyperX Cloud II', 'Tai nghe gaming có microphone và âm thanh 7.1', 1990000.00),
('Màn hình LG 24 inch', 'Màn hình Full HD IPS 24 inch, tần số quét 75Hz', 2890000.00),
('SSD Samsung 980 1TB', 'Ổ cứng SSD NVMe M.2 dung lượng 1TB', 2190000.00),
('RAM Kingston 16GB DDR4', 'RAM DDR4 dung lượng 16GB, bus 3200MHz', 899000.00),
('Webcam Logitech C920', 'Webcam Full HD 1080p dùng cho học và họp trực tuyến', 1690000.00),
('USB SanDisk 64GB', 'USB 3.0 dung lượng 64GB', 199000.00),
('Router TP-Link Archer C6', 'Router Wi-Fi băng tần kép hỗ trợ chuẩn AC1200', 699000.00);

#Test bảng không có sản phẩm
CREATE TABLE products2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2)
);

# Thêm cột publish cho sản phẩm
ALTER TABLE products
ADD is_published BOOLEAN NOT NULL DEFAULT FALSE;

UPDATE products SET is_published = 1 WHERE id = 1;
UPDATE products SET is_published = 0 WHERE id = 2;
UPDATE products SET is_published = 1 WHERE id = 3;
UPDATE products SET is_published = 0 WHERE id = 4;
UPDATE products SET is_published = 1 WHERE id = 5;
UPDATE products SET is_published = 1 WHERE id = 6;
UPDATE products SET is_published = 0 WHERE id = 7;
UPDATE products SET is_published = 1 WHERE id = 8;
UPDATE products SET is_published = 0 WHERE id = 9;
UPDATE products SET is_published = 1 WHERE id = 10;
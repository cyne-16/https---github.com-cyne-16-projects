DROP DATABASE IF EXISTS store;
CREATE DATABASE store;
use store;

CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email, is_admin) 
VALUES ('admin', 'ewankobasta', 'admin@example.com', TRUE);

INSERT INTO artists (name) VALUES
('Jennie'), ('ENHYPEN'), ('BLACKPINK'), ('TXT'), ('TWICE'), ('Red Velvet'), ('MONSTA X');

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    image VARCHAR(255),
    artist_id INT,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO products (name, price, category, image, artist_id) VALUES
('JENNIE SOLO', 15.99, 'Album', 'album1.png', 1), -- Jennie
('MANIFESTO', 16.99, 'Album', 'enha-album1.png', 2), -- ENHYPEN
('KILL THIS LOVE', 17.99, 'Album', 'album3.png', 3), -- BLACKPINK
('TEMPTATION', 18.99, 'Album', 'TXT-ALBUM1.png', 4), -- TXT
('EYES WIDE OPEN', 19.99, 'Album', 'twice-album1.png', 5), -- TWICE
('Born Pink', 16.99, 'Album', 'album6.jpg', 3), -- BLACKPINK
('THE ALBUM', 16.99, 'Album', 'album4.png', 3), -- BLACKPINK
('SHUT DOWN', 16.99, 'Album', 'album5.png', 3), -- BLACKPINK
('COSMIC', 19.99, 'Album', 'redvelvel-album1.png', 6), -- Red Velvet
('THE CLAN', 19.99, 'Album', 'monstax-album1.png', 7); -- MONSTA X
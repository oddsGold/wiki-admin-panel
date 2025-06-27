CREATE DATABASE IF NOT EXISTS wiki CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'wiki_user'@'%' IDENTIFIED BY 'wiki_pass123';
GRANT ALL PRIVILEGES ON wiki.* TO 'wiki_user'@'%';
FLUSH PRIVILEGES;

SET GLOBAL max_connections = 100;
SET GLOBAL innodb_buffer_pool_size = 256M;

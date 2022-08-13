CREATE USER 'test_admin'@'localhost' IDENTIFIED BY '1234!letsgo';
GRANT ALL PRIVILEGES ON test.* TO 'test_admin'@'localhost';
FLUSH PRIVILEGES;
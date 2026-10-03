CREATE DATABASE IF NOT EXISTS complaint_management;

CREATE USER IF NOT EXISTS 'complaint_app'@'localhost'
IDENTIFIED BY 'ComplaintApp123!';

GRANT SELECT, INSERT, UPDATE, DELETE
ON complaint_management.*
TO 'complaint_app'@'localhost';

FLUSH PRIVILEGES;

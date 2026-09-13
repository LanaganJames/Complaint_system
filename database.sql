CREATE DATABASE IF NOT EXISTS complaint_management;

USE complaint_management;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    street_address VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state CHAR(2) NOT NULL,
    zip_code VARCHAR(10) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(30) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_extension VARCHAR(10),
    password VARCHAR(255) NOT NULL,
    level ENUM('Technician', 'Administrator') NOT NULL
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE complaint_types (
    complaint_type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE complaints (
    complaint_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,
    product_id INT NOT NULL,
    complaint_type_id INT NOT NULL,

    technician_id INT NULL,

    description TEXT NOT NULL,
    image_path VARCHAR(255),

    status ENUM('Open', 'Closed') NOT NULL DEFAULT 'Open',

    complaint_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    resolution_date DATETIME NULL,

    resolution_notes TEXT,

    FOREIGN KEY (user_id)
        REFERENCES users(user_id),

    FOREIGN KEY (product_id)
        REFERENCES products(product_id),

    FOREIGN KEY (complaint_type_id)
        REFERENCES complaint_types(complaint_type_id),

    FOREIGN KEY (technician_id)
        REFERENCES employees(employee_id)
);

CREATE TABLE technician_notes (
    note_id INT AUTO_INCREMENT PRIMARY KEY,

    complaint_id INT NOT NULL,
    employee_id INT NOT NULL,

    note_text TEXT NOT NULL,

    note_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (complaint_id)
        REFERENCES complaints(complaint_id),

    FOREIGN KEY (employee_id)
        REFERENCES employees(employee_id)
);

INSERT INTO products
(product_name, description)
VALUES
('Commercial Oven', 'Commercial restaurant oven'),
('Commercial Refrigerator', 'Commercial refrigeration equipment'),
('Deep Fryer', 'Commercial deep fryer'),
('Commercial Grill', 'Commercial restaurant grill'),
('Preventative Maintenance', 'Equipment maintenance service');

INSERT INTO complaint_types
(type_name, description)
VALUES
('Product Defect', 'The product is defective or not working correctly'),
('Warranty Issue', 'Issue involving a product warranty'),
('Service Issue', 'Issue involving service or maintenance'),
('Billing Issue', 'Issue involving billing or payment');

INSERT INTO employees
(user_id, first_name, last_name, email, phone_extension, password, level)
VALUES
('TECH001', 'John', 'Smith', 'john@kitchenpro.com', '101', 'Password123!', 'Technician'),
('ADMIN001', 'Jane', 'Doe', 'jane@kitchenpro.com', '102', 'Password123!', 'Administrator');

INSERT INTO users
(email, first_name, last_name, street_address, city, state, zip_code, phone, password)
VALUES
(
    'customer@example.com',
    'James',
    'Customer',
    '123 Main Street',
    'Chicago',
    'IL',
    '60000',
    '5551234567',
    'Password123!'
);
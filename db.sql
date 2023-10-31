CREATE TABLE registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    college VARCHAR(50) NOT NULL,
    photo_title VARCHAR(255) NOT NULL,
    transaction_id VARCHAR(255) NOT NULL,
    photo_upload VARCHAR(255) NOT NULL,
    transaction_ssn VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO admin (username, password, email, full_name)
VALUES ('Glug Pace', 'glug2023', 'glug@pace.edu.in', 'Glug Pace');


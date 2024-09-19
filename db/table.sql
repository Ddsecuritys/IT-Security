-- Create user table
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Optional: Insert some example data (uncomment to use)
-- INSERT INTO user (fname, lname, email, username, password) VALUES
-- ('John', 'Doe', 'john.doe@example.com', 'johndoe', 'password123'),
-- ('Jane', 'Smith', 'jane.smith@example.com', 'janesmith', 'securepassword');

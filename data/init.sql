use note_app;

CREATE TABLE note_app (
	id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR (32) NOT NULL,
	note TEXT,
    date TIMESTAMP
	);
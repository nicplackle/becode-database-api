use becode_database_api;

CREATE TABLE note_app_v2 (
	id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR (32) NOT NULL,
	note TEXT,
    date TIMESTAMP
	);
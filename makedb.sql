CREATE TABLE users (
	fname VARCHAR(25),
	lname VARCHAR(25),
	age INT,
	email VARCHAR(25),
	uname VARCHAR(25),
	pwdHash VARCHAR(300),
	pet VARCHAR(10), 
	mtype VARCHAR(25), 
	PRIMARY KEY(uname) /* unique identiier for each user */
);
CREATE TABLE event (
	name VARCHAR(25),
	sponsor VARCHAR(25),
	text VARCHAR(200),
	day DATE,
	time TIME,
	PRIMARY KEY(name, day)
);

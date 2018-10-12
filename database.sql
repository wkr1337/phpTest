use test2;
create table Users (
	ID int NOT NULL AUTO_INCREMENT,
    user_name varchar (100) NOT NULL,
	email varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	PRIMARY KEY (ID)
	);
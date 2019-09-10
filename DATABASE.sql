/*Create Database*/
CREATE DATABASE mddb2;
use mddb2;

/*Create Tables*/
CREATE TABLE mddb2.countries(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE mddb2.categories(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE mddb2.users(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255),
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	country_id INT(10) UNSIGNED NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (country_id)REFERENCES countries(id)
);

CREATE TABLE mddb2.roles(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	
	PRIMARY KEY (id)
);

CREATE TABLE mddb2.role_user(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	user_id INT(10) UNSIGNED NOT NULL,
	role_id INT(10) UNSIGNED NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE mddb2.restaurants(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	phone INT,
	address1 VARCHAR(255) NOT NULL,
	address2 VARCHAR(255),
	suburb VARCHAR(255) NOT NULL,
	state CHAR(3) NOT NULL,
	numberofseats INT NOT NULL,
	country_id INT(10) UNSIGNED NOT NULL,
	category_id INT(10) UNSIGNED NOT NULL,
	
	PRIMARY KEY (id),
	FOREIGN KEY (country_id) REFERENCES countries(id),
	FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE mddb2.posts(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	content VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	restaurant_id INT(10) UNSIGNED NOT NULL,
	user_id INT(10) UNSIGNED NOT NULL,
	
	PRIMARY KEY (id),
	FOREIGN KEY (restaurant_id) REFERENCES restaurants(id),
	FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE mddb2.comments(
	id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	content VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	post_id INT(10) UNSIGNED NOT NULL,
	user_id INT(10) UNSIGNED NOT NULL,
	
	PRIMARY KEY (id),
	FOREIGN KEY (post_id) REFERENCES posts(id),
	FOREIGN KEY (user_id) REFERENCES users(id)
);


/*Insert Country Data*/
INSERT INTO countries (name, created_at, updated_at)
VALUES ('France', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );
INSERT INTO countries (name, created_at, updated_at)
VALUES ('Japan', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO countries (name, created_at, updated_at)
VALUES ('China', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO countries (name, created_at, updated_at)
VALUES ('Italy', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

/*Insert Catagory Data*/
INSERT INTO categories (name, created_at, updated_at)
VALUES ('Cheap', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP);
INSERT INTO categories (name, created_at, updated_at)
VALUES ('Good', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP);
INSERT INTO categories (name, created_at, updated_at)
VALUES ('Take-Away', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


/*Insert User Data*/
INSERT INTO users (name, email, password, created_at, updated_at, country_id)
VALUES ('John Smith', 'JohnSmith@fakemail.lie','johnsPassword',	CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1);
INSERT INTO users (name, email, password, created_at, updated_at, country_id)
VALUES ('Ken Watanabe', 'ken@fakemail.lie', 'kensPassword',	CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 2);
INSERT INTO users (name, email, password, created_at, updated_at, country_id)
VALUES ('Jackie Chan', 'chan@fakemail.lie', 'JackiesPassword',	CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 3);


/*Insert Role Data*/
INSERT INTO roles (name, created_at, updated_at)
VALUES ('Admin', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );
INSERT INTO roles (name, created_at, updated_at)
VALUES ('Premium', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );
INSERT INTO roles (name, created_at, updated_at)
VALUES ('User', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );


/*Insert User_Role Data*/
INSERT INTO role_user (user_id, role_id, created_at, updated_at)
VALUES (1, 1, CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );
INSERT INTO role_user (user_id, role_id, created_at, updated_at)
VALUES (2, 2, CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );
INSERT INTO role_user (user_id, role_id, created_at, updated_at)
VALUES (3, 3, CURRENT_TIMESTAMP , CURRENT_TIMESTAMP );


/*Insert Restaurant Data*/
INSERT INTO restaurants (name, phone,address1, address2, suburb, state,  numberofseats, country_id, category_id)
VALUES ("Mr Miyagis", 04123456, "5", "Miyagi St", "Miyagiville 1234", "VIC", 10, 1, 1);
INSERT INTO restaurants (name, phone,address1, address2, suburb, state,  numberofseats, country_id, category_id)
VALUES ("Burger Haus", 111111, "5", "Haus St", "Hausville 1234", "TAS", 50, 2, 2);
INSERT INTO restaurants (name, phone,address1, address2, suburb, state,  numberofseats, country_id, category_id)
VALUES ("China Diner", 222222, "5", "Diner St", "Dinerville 1234", "NT", 25, 3, 3);


/*Insert Post Data*/
INSERT INTO posts (content, created_at,  updated_at, restaurant_id, user_id)
VALUES ("Great Place!", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);
INSERT INTO posts (content, created_at,  updated_at, restaurant_id, user_id)
VALUES ("It's Ok", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 2, 2);
INSERT INTO posts (content, created_at,  updated_at, restaurant_id, user_id)
VALUES ("FIRST!", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 3, 3);


/*Insert Post Data*/
INSERT INTO comments (content,created_at,  updated_at, post_id, user_id)
VALUES ("Great Place!", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 2);
INSERT INTO comments (content,created_at,  updated_at, post_id, user_id)
VALUES ("It's Ok", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 2, 3);
INSERT INTO comments (content,created_at,  updated_at, post_id, user_id)
VALUES ("SECOND!", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 3, 1);
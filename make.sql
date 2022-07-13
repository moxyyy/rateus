CREATE TABLE courses (
	id int primary key,
	name text not null
);

CREATE TABLE reviews (
	course_id int,
	`name` text not null,
	email text not null,
	rating int not null,
	review_text text not null,
	sendtime text not null,

	foreign key (course_id) references courses(id)
);

CREATE TABLE users (
	username text primary key,
	password text not null
);
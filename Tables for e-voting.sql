create database if not exists evoting;

use evoting;

create table if not exists admin(
username varchar(20),
password varchar(100),
constraint un primary key(username)
);

create table if not exists mng_dept(
id int auto_increment,
dept varchar(200),
fac varchar(200),
sch varchar(200),
constraint cd primary key(id)
);

create table if not exists mng_fac(
id int auto_increment,
fac varchar(200),
sch varchar(200),
constraint cd primary key(id)
);

create table if not exists mng_sch(
id int auto_increment,
sch varchar(200),
constraint cd primary key(id)
);

create table if not exists mng_candi(
	id int auto_increment,
	candidate_id varchar(12),
	candidate_name varchar(30),
	candidate_image varchar(200),
	candidate_position char(200),
	election_category char(100),
	dept varchar(200),
	fac varchar(200),
	sch varchar(200),
	votes char(10),
	constraint primary key(id,candidate_id)
);

# election setup 
create table if not exists mng_elec(
	id int auto_increment,
	election_category char(100),
	election_category_value varchar(200),
	election_type char(200),
	start_time       datetime,
	end_time         datetime,
	constraint primary key(id)
);

# accreditation setup
create table if not exists mng_accre(
	id int auto_increment,
	election_category char(100),
	election_category_value varchar(200),
	election_type char(200),
	start_time       datetime,
	end_time         datetime,
	constraint primary key(id)
);

# registration setup
create table if not exists mng_reg(
	id int auto_increment,
	election_category char(100),
	election_category_value varchar(200),
	election_type char(200),
	start_time       datetime,
	end_time         datetime,
	constraint primary key(id)
);

# Registration
create table if not exists regUser(
	id int auto_increment,
	surname varchar(30),
	firstname varchar(30),
	othername varchar(30),
	pic varchar(200),
	sex   char(6),
	dept varchar(200),
	fac varchar(200),
	sch varchar(200),
	phone   char(11),
	email varchar(50),
	status char(10),
	dob   date,
	username  varchar(30),
	password    varchar(100),
	code char(10),
	verified char(1),
	verification_code varchar(20),
	date DATETIME,
	constraint primary key(id,username)	 
);
 
create table if not exists pins(
	id int auto_increment,
	pin char(10),
	user char(10),
	status char(15),
	used_by varchar(200),
	constraint pk primary key(id,pin)	 
);

create table if not exists vote(
	id int auto_increment,
	username varchar(30),
	election_category char(100),
	election_category_value varchar(200),
	election_type char(200),
	candidate varchar(30),
	vote_time       datetime,
	constraint pk primary key(id)
);

CREATE TABLE IF NOT EXISTS election_types(
	id int NOT NULL AUTO_INCREMENT,
	election_type varchar(200),
	PRIMARY KEY (id)
);

INSERT INTO election_types (election_type)
VALUES
('Financial Secretary'),
('President'),
('Social Director'),
('Speaker'),
('Treasurer'),
('Welfare Director');

CREATE TABLE IF NOT EXISTS departments (
  id int NOT NULL AUTO_INCREMENT,
  school varchar(200) DEFAULT NULL,
  faculty varchar(200) DEFAULT NULL,
  department varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ;

--
-- Dumping data for table departments
--

INSERT INTO departments (school, faculty, department) VALUES
('LASU', 'Arts', 'Literature'),
('LASU', 'Arts', 'English Language'),
('LASU', 'Arts', 'Philosophy'),
('LASU', 'Arts', 'Theatre Arts'),
('LASU', 'Arts', 'Music'),
('LASU', 'Arts', 'Languages'),
('LASU', 'Engineering', 'Chemical Engineering'),
('LASU', 'Engineering', 'Computer Engineering'),
('LASU', 'Engineering', 'Electrical Engineering'),
('LASU', 'Engineering', 'Mechanical Engineering'),
('LASU', 'Management Science', 'Accounting'),
('LASU', 'Management Science', 'Marketing'),
('LASU', 'Management Science', 'Banking and Finance'),
('LASU', 'Science', 'Biochemistry'),
('LASU', 'Science', 'Botany'),
('LASU', 'Science', 'Chemistry'),
('LASU', 'Science', 'Computer Science'),
('LASU', 'Science', 'Mathematics'),
('LASU', 'Science', 'Microbiology'),
('LASU', 'Science', 'Physics'),
('LASU', 'Science', 'Zoology'),
('LASU', 'Social Science', 'Economics'),
('LASU', 'Social Science', 'Psychology'),
('LASU', 'Social Science', 'Sociology'),
('LASU', 'Social Science', 'Political Science'),
('LASUCOM', 'Surgery', 'Neurological Surgery'),
('LASUCOM', 'Surgery', 'Orthopaedic Surgery'),
('LASUSOC', 'Communication', 'Mass Communication')
;


# Populating admin
INSERT INTO admin(username,password) VALUES('dan',md5('dan'));


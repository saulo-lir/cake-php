create table articles(
id int not null AUTO_INCREMENT PRIMARY key,
title varchar(100) not null,
url varchar(100),
content text,
user_id int not null,
created datetime default null,
updated datetime default null    
)




create table users(
id int not null AUTO_INCREMENT PRIMARY key,
name varchar(100) not null,
username varchar(100) not null,
email varchar(100) not null,
password varchar(100) not null,
created datetime default null,
updated datetime default null    
)

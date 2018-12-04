DATABASE hireMe;
CREATE DATABASE hireMe;
USE hireMe;

CREATE TABLE `Users`(
    `id` int(3) NOT NULL auto_increment,
    `firstname` char(35) default '',
    `lastname` char(35) default '',
    `password` varchar(255) NOT NULL default '',
    `telephone` char(10) default '',
    `email` char(55) NOT NULL default '' ,
    `date_joined` date,
    PRIMARY KEY (`id`),
    UNIQUE(`id`), UNIQUE(`email`)
);

CREATE TABLE `Jobs`(
    `id` int(3) NOT NULL auto_increment,
    `job_title` char(35) NOT NULL default '',
    `job_description` char(255) NOT NULL default '',
    `category` char(50) NOT NULL default '',
    `company_name` char(50) NOT NULL default '',
    `company_location` char(100) NOT NULL default '',
    `date_posted` date NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `Job Applied For`(
    `id` int(3) NOT NULL auto_increment,
    `job_id` int NOT NULL,
    `user_id` int NOT NULL,
    `date_applied` date NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`job_id`) REFERENCES Jobs(id),
    FOREIGN KEY (`user_id`) REFERENCES Users(id)
);
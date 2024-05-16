<?php

return [
	<<<EOD
CREATE DATABASE IF NOT EXISTS exam  
CHARACTER SET utf8mb4  
COLLATE utf8mb4_unicode_ci;  
EOD,
	'USE `exam`;',
	<<<EOD
CREATE TABLE IF NOT EXISTS `exam`.`users` (
	`id` MEDIUMINT NOT NULL AUTO_INCREMENT,
	`username` varchar(100) NOT NULL,
	`password` varchar(100) NOT NULL,
	`email` varchar(100) NOT NULL,
	`phone_number` varchar(10) NOT NULL,
	`url` varchar(200) NOT NULL,
	`birthdate` DATE NOT NULL,
	PRIMARY KEY (id)
); 
EOD,
];

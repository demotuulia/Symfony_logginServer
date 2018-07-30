DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `roles_id`  VARCHAR (100) NOT NULL ,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Add some test items

TRUNCATE `roles`;
INSERT INTO `roles` (`roles_id`, `name`)
 VALUES 
('ROLE_ADMIN', 'Admin'),
('ROLE_USER', 'User') ;

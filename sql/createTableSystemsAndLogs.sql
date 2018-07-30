
use loggingServer;

DROP TABLE IF EXISTS client_systems;

CREATE TABLE `client_systems` (
  `client_systems_id`  int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `apikey` text COLLATE utf8_unicode_ci NOT NULL,
  `pubkey` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`client_systems_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Add some test items

TRUNCATE `client_systems`;
INSERT INTO `client_systems` (`client_systems_id`, `name`, `apikey`, `pubkey`)
 VALUES 
(NULL, 'Test 1', 'dsf23sf', 'dsf32345356734ewr'),
(NULL, 'Test 2', '234324dsf23sf', 'ds35345f3234ewr'),
(NULL, 'Test 3', 'sdfgfdsf23sf', 'dsfxxxx32345356734ewr'),
(NULL, 'Test 4', '23234ffff23sf', 'ds35234jkfsjk234ewr') ;



DROP TABLE IF EXISTS logs;

CREATE TABLE `logs` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `level` ENUM('1', '2' ,'3')  ,
  `type` ENUM('1', '2' ,'3')  ,
  `client_systems_id`  int(11),
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp`  TIMESTAMP,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


TRUNCATE `logs`;
INSERT INTO `logs` ( `level`, `type`, `client_systems_id` , `message` )
 VALUES
 #system 2
( '1', 1, 2, 'Blaah asda asdasd' ),
( '1', 2, 2, 'Blaah aaaa asda asdasd' ),
( '2', 3, 2, 'as asdasdasd asdBlaah asda asdasd' ),
( '2', 1, 2, 'Blaah asda das asdad asdasd' ),
( '1', 2, 2, 'Blaah  asd 34 ds sdfasd' ),
( '2', 3, 2, 'as asd as23 sdf ;kl jklhjkh dasd' ),
 #system 3
( '1', 1, 3, 'Blaah asda asdasd' ),
( '1', 1, 3, 'Blaah asda asdasd' ),
( '1', 1, 3, 'Blaah asda asdasd' ),
( '1', 2, 3, 'A asd asdas asda asdasd' ),
( '2', 3, 3, 'D sf dsfdsfsdasd' ),
( '2', 1, 3, 'Jh jhg 23723 sfsdf sdf mnmd' ),
( '1', 2, 3, 'Bas sd asdads4 ds sdfasd' ),
( '2', 3, 3, 'aS sd dsfdskh dasd' )
;





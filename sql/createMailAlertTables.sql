

use loggingServer;

#LOCK TABLES `mail_alert` WRITE;
DROP TABLE IF EXISTS `mail_alert` ;


CREATE TABLE `mail_alert`
(
  `mail_alert_id` INT NOT NULL AUTO_INCREMENT ,
  `active` TINYINT NOT NULL ,
  `app_user_id` INT  NOT NULL,
  PRIMARY KEY (`mail_alert_id`)
) ENGINE = InnoDB;



#LOCK TABLES `mail_alert_filter` WRITE;

DROP TABLE IF EXISTS  `mail_alert_filter` ;


CREATE TABLE `mail_alert_filter`
(
  `mail_alert_filter_id` INT NOT NULL AUTO_INCREMENT ,
  `mail_alert_id` INT ,
  `filter_field`  VARCHAR (100) NOT NULL ,
  `operator` VARCHAR (10),
  `value`  VARCHAR (100)NOT NULL ,
  PRIMARY KEY (`mail_alert_filter_id`)
) ENGINE = InnoDB;


#LOCK TABLES `mail_alert_app_user` WRITE;
DROP TABLE IF EXISTS  `mail_alert_app_user` ;

CREATE TABLE `mail_alert_app_user`
(
  `mail_alert_id` INT ,
  `app_user_id` INT,
    PRIMARY KEY (`mail_alert_id`, `app_user_id`)
) ENGINE = InnoDB;


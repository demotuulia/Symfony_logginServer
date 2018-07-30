
use loggingServer;

DROP TABLE IF EXISTS `loggingServer`.`logs_types` ;


CREATE TABLE `loggingServer`.`logs_types`
(
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `logs_types` (`id`, `name`)
VALUES
('1', 'Application'),
('2', 'Security'),
('3', 'System');

DROP TABLE IF EXISTS `loggingServer`.`logs_levels` ;


CREATE TABLE `loggingServer`.`logs_levels`
(
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `logs_levels` (`id`, `name`)
VALUES
('1', 'Error'),
('2', 'Warn'),
('3', 'Notice');
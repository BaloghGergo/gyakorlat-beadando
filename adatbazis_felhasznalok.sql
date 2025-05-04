CREATE DATABASE `gyakorlat7`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `gyakorlat7`;

CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `felhasznalok` (`id`,`csaladi_nev`,`uto_nev`,`bejelentkezes`,`jelszo`) VALUES 
 (1,'Balogh','Gergő','baloghg',sha1('jelszo')),
 (2,'Nagy','Zoltán','nagyzoli1',sha1('jelszo'));


CREATE TABLE uzenetek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    szoveg TEXT NOT NULL,
    bekuldes DATETIME DEFAULT CURRENT_TIMESTAMP
);
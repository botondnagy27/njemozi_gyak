CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT IGNORE INTO `felhasznalok` (`id`,`csaladi_nev`,`uto_nev`,`bejelentkezes`,`jelszo`) VALUES 
 (1,'Családi_1','Utónév_1','Login1',sha1('login1')),
 (2,'Családi_2','Utónév_2','Login2',sha1('login2')),
 (3,'Családi_3','Utónév_3','Login3',sha1('login3')),
 (4,'Családi_4','Utónév_4','Login4',sha1('login4')),
 (5,'Családi_5','Utónév_5','Login5',sha1('login5')),
 (6,'Családi_6','Utónév_6','Login6',sha1('login6'));

CREATE TABLE IF NOT EXISTS `uzenetek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `uzenet` text COLLATE utf8_hungarian_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendeg_e` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE IF NOT EXISTS `mozi` (
  `moziazon` INT NOT NULL,
  `mozinev` VARCHAR(150) NOT NULL,
  `irszam` INT(4),
  `cim` VARCHAR(255),
  `telefon` VARCHAR(50),
  PRIMARY KEY (`moziazon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

INSERT IGNORE INTO `mozi` (`moziazon`, `mozinev`, `irszam`, `cim`, `telefon`) VALUES
(1, 'A38 Hajó', 1113, 'Petőfi híd budai hídfő', '4643940'),
(3, 'Bem', 1024, 'Margit krt. 5/b.', '3168708'),
(6, 'Cinema City Csepel Plaza', 1212, 'Rákóczi F. út 154-170.', '4258111'),
(7, 'Cinema City Új Udvar', 1036, 'Bécsi út 38-44.', '4378383'),
(8, 'Cirko-Gejzír', 1055, 'Balassi Bálint u. 15-17.', '2690904'),
(9, 'Corvin Budapest Filmpalota', 1082, 'Corvin köz 1.', '4595050'),
(12, 'Hollywood Multiplex Duna Plaza', 1138, 'Váci út 178.', '4674267'),
(21, 'Kultiplex', 1095, 'Kinizsi u. 28.', '2190706'),
(24, 'Művész', 1066, 'Teréz krt. 30.', '3326726'),
(31, 'Palace Westend', 1062, 'Váci út 1-3.', '3365555'),
(32, 'Puskin', 1053, 'Kossuth L. u. 18.', '4296080'),
(41, 'Uránia Nemzeti Filmszínház', 1088, 'Rákóczi út 21.', '4863413');

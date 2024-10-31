-- 
-- Tabellenstruktur für Tabelle `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `passwd` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Daten für Tabelle `users`
-- 

INSERT INTO `users` VALUES (1, 'test', 'd1980457fd09abaa3d245512f8f15881');

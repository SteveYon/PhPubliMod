-- 
-- Database: `phpubli`
-- 

USE `phpubli`;

-- --------------------------------------------------------

-- 
-- Table structure for table `audience`
-- 

DROP TABLE IF EXISTS `audience`;
CREATE TABLE `audience` (
  `id` int(4) NOT NULL default '0',
  `libelle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `audience`
-- 

INSERT INTO `audience` (`id`, `libelle`) VALUES (1, 'non sp�cifi�e');
INSERT INTO `audience` (`id`, `libelle`) VALUES (2, 'internationale');
INSERT INTO `audience` (`id`, `libelle`) VALUES (3, 'nationale');

-- --------------------------------------------------------

-- 
-- Table structure for table `conference`
-- 

DROP TABLE IF EXISTS `conference`;
CREATE TABLE `conference` (
  `conference_id` int(10) unsigned NOT NULL auto_increment,
  `conference_title` varchar(255) NOT NULL default '',
  `conference_date_start` date NOT NULL default '0000-00-00',
  `conference_date_end` date NOT NULL default '0000-00-00',
  `conference_city` varchar(255) NOT NULL default '',
  `conference_country_code` char(2) NOT NULL default '0',
  `conference_audience` int(4) NOT NULL default '2',
  `log` int(10) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`conference_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 ;

-- 
-- Dumping data for table `conference`
-- 

INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (1, 'Seventh European Turbulence Conference', '1998-06-30', '1998-07-03', 'Saint-Jean-Cap-Ferrat', 'FR', 2, 0, '2008-02-08 15:27:24');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (2, 'Eigth European Turbulence Conference', '2000-06-27', '2000-06-30', 'Barcelona', 'ES', 2, 0, '2008-02-08 15:29:31');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (3, 'Ninth European Turbulence Conference', '2002-07-02', '2002-07-05', 'Southampton', 'GB', 2, 0, '2008-02-08 15:31:04');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (4, 'Tenth  European Turbulence Conference', '2004-06-29', '2004-07-02', 'Trondheim', 'NO', 2, 0, '2008-02-08 15:32:16');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (5, '6th International Conference on Multiphase Flow', '2007-07-09', '2007-07-13', 'Leipzig', 'DE', 2, 0, '2008-02-08 17:45:02');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (7, 'International Symposium on Snow, Avalanches and Impact of the Forest Cover', '2000-05-22', '2000-05-26', 'Innsbruck', 'AT', 2, 0, '2008-02-12 14:50:23');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (8, 'Euromech Fluid Mechanics Conference 6', '2006-06-26', '2006-06-30', 'Stockholm', 'SE', 2, 0, '2008-02-19 16:49:33');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (9, 'Second international conference on \\"Energy transfer in magnetohydrodynamic flows\\"', '1994-09-00', '1994-09-00', 'Aussois', 'FR', 2, 0, '2008-02-20 17:53:10');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (10, 'Third international conference on \\"Transfer phenomena in magneto-hydrodynamic and electro-conducting flows\\"', '1997-09-00', '1997-09-00', 'Aussois', 'FR', 2, 0, '2008-02-20 17:55:13');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (11, 'IUTAM Symposium on Computational Physics and New Perspectives in Turbulence', '2006-09-11', '2006-09-14', 'Nagoya', 'JP', 2, 2, '2008-02-22 15:27:14');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (12, '10es Journ�es de la mati�re condens�e', '2006-08-28', '2006-09-01', 'Toulouse', 'FR', 2, 0, '2008-03-07 10:17:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (13, 'MicroTAS 2007', '2007-10-07', '2007-10-11', 'Paris', 'FR', 2, 0, '2008-03-07 10:41:37');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (14, 'GDR Turbulence', '2008-03-31', '2008-04-02', 'Lyon', 'FR', 3, 0, '2008-04-09 19:42:10');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (15, 'Eleventh European Turbulence Conference', '2007-06-25', '2007-06-28', 'Porto', 'PT', 2, 1, '2008-05-05 11:31:09');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (16, 'Summer School Eurotherm 79 \\"Mixing and Heat Transfer in Chemical Reaction processes\\"', '2006-07-31', '2006-08-05', 'Carg�se', 'FR', 2, 1, '2008-05-05 15:39:00');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (17, 'Microfluidique 2006', '2006-12-12', '2000-12-14', 'Toulouse', 'FR', 3, 0, '2008-05-05 15:42:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (18, 'International Congress on Crystal Growth-15', '2007-08-12', '2007-08-17', 'Salt Lake City', 'US', 2, 0, '2008-05-07 16:27:21');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (19, '18�me Congr�s fran�ais de m�canique', '2007-08-27', '2007-08-31', 'Grenoble', 'FR', 3, 0, '2008-05-07 16:34:53');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (20, 'Euromech Fluid Mechanics Conference 5', '2003-08-24', '2003-08-28', 'Toulouse', 'FR', 2, 0, '2008-05-07 16:47:53');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (21, 'International Congress on Crystal Growth-14', '2004-08-09', '2004-08-13', 'Grenoble', 'FR', 2, 1, '2008-05-07 16:53:53');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (22, '35th Congress on Space Research', '2004-07-18', '2004-07-25', 'Paris', 'FR', 2, 0, '2008-05-07 16:53:27');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (23, '17�me Congr�s fran�ais de m�canique', '2005-08-29', '2005-09-02', 'Troyes', 'FR', 3, 0, '2008-05-07 17:01:35');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (24, 'Colloque sur les Arcs Electriques', '2005-03-14', '2005-03-15', 'Orl�ans', 'FR', 3, 0, '2008-05-07 17:02:47');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (25, 'Small-scale turbulence: Theory, Phenomenology and Applications', '2007-08-13', '2007-08-25', 'Carg�se', 'FR', 1, 0, '2008-05-13 09:45:23');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (26, '5th Int. Symposium on Turbulence and Shear Flow Phenomena', '2007-08-27', '2007-08-29', 'Munich', 'DE', 2, 0, '2008-05-13 10:09:37');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (27, 'GDR Ph�nix', '2008-06-16', '2008-06-17', 'Lyon', 'FR', 3, 0, '2008-09-09 12:03:13');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (28, 'Journ�es AUM / AFM 2008', '2008-08-27', '2008-08-29', 'Mulhouse', 'FR', 3, 0, '2008-09-12 15:54:22');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (29, 'Euromech Fluid Mechanics Conference 7', '2008-09-14', '2008-09-18', 'Manchester', 'GB', 2, 1, '2008-10-01 15:41:02');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (30, 'Journ�es de la S.H.F. M�canique des Fluides Num�rique', '1989-00-00', '1989-00-00', 'Paris', 'FR', 3, 1, '2008-09-30 11:53:22');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (31, 'Lecture series on Introduction to the numerical solution of industrial flows, Von Karman Institute', '1986-00-00', '1986-00-00', 'Bruxelles', 'BE', 2, 0, '2008-09-30 11:54:31');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (32, 'Microfluidique 2004', '2004-12-14', '2004-12-16', 'Toulouse', 'FR', 3, 0, '2008-10-01 10:15:35');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (33, 'XXI International Congress of Theoretical and Applied Mechanics', '2004-08-15', '2004-08-21', 'Varsovie', 'PL', 2, 0, '2008-10-01 11:49:58');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (34, 'European Geophysical Society XXVII General Assembly', '2002-04-21', '2002-04-26', 'Nice', 'FR', 2, 0, '2008-10-01 15:49:54');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (35, 'DFD APS Meeting', '1997-11-23', '1997-11-25', 'San Francisco', 'US', 2, 0, '2008-10-01 15:57:03');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (36, 'Euromech European Fluid Mechanics Conference 3', '1997-09-15', '1997-09-18', 'G�ttingen', 'DE', 2, 0, '2008-10-01 16:02:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (37, 'International Conference on Non Linearity, Bifurcations, Chaos: the door to the future', '1996-09-16', '1996-09-18', 'Lodz-Dobieszkow', 'PL', 2, 0, '2008-10-01 16:09:40');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (38, 'NATO Advanced Study institute: Mixing: Chaos and Turbulence', '1996-07-07', '1996-07-20', 'Carg�se', 'FR', 2, 0, '2008-10-01 16:28:02');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (39, 'Eurotherm 39, Heat Transfer Enhancement by Lagrangian Chaos and Turbulence', '1994-00-00', '1994-00-00', 'Nantes', 'FR', 2, 0, '2008-10-01 16:44:23');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (40, 'Computational Fluid Dynamic Applied to process engineering - Les rencontres scientifiques de  	l\\''IFP', '1994-00-00', '1994-00-00', 'Solaize', 'FR', 3, 0, '2008-10-01 16:50:06');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (41, '10�me Congr�s Fran�ais de M�canique', '1991-09-02', '1991-09-06', 'Paris', 'FR', 3, 0, '2008-10-01 16:55:47');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (42, '7th International Conference on Numerical Methods in laminar and turbulent flows', '1991-07-15', '1991-07-19', 'Stanford, California', 'US', 2, 1, '2008-10-02 16:52:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (43, 'European Symposium on Computer Application in the Chemical Industry', '1989-04-23', '1989-04-26', 'Erlangen', 'DE', 2, 0, '2008-10-02 11:10:22');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (44, '1er Congr�s National de G�nie des Proc�d�s', '1987-09-21', '1987-09-23', 'Nancy', 'FR', 3, 0, '2008-10-02 15:28:36');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (45, 'GAMM Workshop on Analysis of laminar flow over a backward facing step', '1983-00-00', '1983-00-00', 'Bi�vres', 'FR', 2, 0, '2008-10-02 16:03:14');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (46, 'Numerical methods in thermal problems', '1981-00-00', '1981-00-00', 'Venice', 'IT', 2, 0, '2008-10-02 16:09:48');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (47, 'ERCOFTAC International Workshop on Chemical reactions in turbulent liquids', '1991-07-00', '1991-07-00', 'Lausanne', 'CH', 2, 0, '2008-10-02 16:54:33');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (48, 'IIIe Encontro nacional de ciencias termicas', '1990-00-00', '1990-00-00', 'Itapema', 'BR', 3, 0, '2008-10-02 17:00:10');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (49, 'Journ�es Internationales de THermiques', '1989-00-00', '1989-00-00', 'Alger', 'DZ', 2, 0, '2008-10-02 17:02:53');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (50, 'Colloque CNRS M�thodes num�riques performantes et ph�nom�nes complexes en M�canique des Fluides', '1987-00-00', '1987-00-00', 'Nice', 'FR', 3, 1, '2008-10-02 17:07:40');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (51, '6th International Symposium on finite element methods in flow problems', '1986-00-00', '1986-00-00', 'Antibes', 'FR', 2, 0, '2008-10-02 17:08:41');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (52, '6�me congr�s fran�ais de m�canique', '1983-00-00', '1983-00-00', 'Lyon', 'FR', 3, 0, '2008-10-02 17:11:56');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (53, 'R�seau  �Microfluidique et Microsyst�mes Fluidiques\\''', '2007-05-29', '2007-05-29', 'Paris', 'FR', 3, 0, '2008-10-07 11:16:41');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (54, '6th International Conference on Inverse Problems in Engineering: Theory and Practice', '2008-06-15', '2008-06-19', 'Dourdan (Paris)', 'FR', 2, 0, '2008-10-07 15:01:40');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (55, '8th World Congress on Computational Mechanics (WCCM8)', '2008-06-30', '2008-07-05', 'Venice', 'IT', 2, 0, '2008-10-07 15:15:14');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (56, 'Workshop Micro and Nanofluidics', '2008-06-24', '2008-06-25', 'Lyon', 'FR', 2, 0, '2008-10-09 11:24:54');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (57, '14th AIAA/CEAS Aeroacoustics Conference', '2008-05-05', '2008-05-07', 'Vancouver', 'CA', 2, 0, '2008-12-10 12:32:32');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (58, '7th International ERCOFTAC Symposium on Engineering Turbulence Modelling and Measurements', '2008-06-04', '2008-06-06', 'Limassol', 'CY', 1, 0, '2008-12-11 16:38:13');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (59, '19th International Symposium on Transport Phenomena', '2008-08-17', '2008-08-20', 'Reykjavik', 'IS', 2, 0, '2008-12-11 17:22:29');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (60, 'Acoustics\\''08', '2008-06-30', '2008-07-04', 'Paris', 'FR', 2, 0, '2008-12-12 13:12:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (61, 'Ercoftac Symposium on sound source mechanisms in turbulent shear-flow', '2008-07-07', '2008-07-09', 'Poitiers', 'FR', 2, 1, '2008-12-12 13:17:05');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (62, '18th International Symposium on Nonlinear Acoustics (ISNA)', '2008-07-07', '2008-07-10', 'Stockholm', 'SE', 2, 0, '2008-12-19 12:36:47');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (63, '12th ISROMAC', '2008-02-17', '2008-02-22', 'Honolulu', 'US', 2, 0, '2008-12-19 12:45:30');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (64, '37th International Congress and Exposition on Noise Control Engineering (Inter-Noise)', '2008-10-26', '2008-10-29', 'Shangai', 'CN', 2, 0, '2008-12-19 13:03:11');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (65, '61st Annual Meeting of the APS Division of Fluid Dynamics', '2008-11-23', '2008-11-25', 'San Antonio', 'US', 2, 0, '2008-12-19 13:07:45');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (66, 'GDR Micropesanteur Fondamentale et Appliqu�e', '2008-12-01', '2008-12-03', 'Aussois', 'FR', 3, 0, '2009-01-07 16:09:15');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (67, 'JTET\\''08 - Journ�es Tunisiennes sur les Ecoulements et les Transferts', '2008-11-07', '2008-11-09', 'Bizerte', 'TN', 3, 0, '2009-01-08 17:52:26');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (68, 'ICAMEM 2008 - Fourth International Conference on Advances in Mechanical Engineering and Mechanics', '2008-12-16', '2008-12-18', 'Sousse', 'TN', 2, 0, '2009-01-08 17:58:33');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (69, 'Ampere meeting: creation of a european structure on magneto-sciences', '2007-07-10', '2007-07-11', 'Paris', 'FR', 2, 0, '2009-01-08 18:12:26');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (70, 'GDR Micropesanteur Fondamentale et Appliqu�e', '2007-11-26', '2007-11-28', 'Fr�jus', 'FR', 3, 0, '2009-01-08 18:16:02');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (71, 'GDR Micropesanteur Fondamentale et Appliqu�e', '2005-10-17', '2005-10-19', 'Carry le Rouet', 'FR', 3, 0, '2009-01-08 18:19:43');
INSERT INTO `conference` (`conference_id`, `conference_title`, `conference_date_start`, `conference_date_end`, `conference_city`, `conference_country_code`, `conference_audience`, `log`, `date`) VALUES (72, '7th European Coating Symposium', '2007-09-12', '2007-09-14', 'Paris', 'FR', 2, 0, '2009-02-24 17:10:55');

-- --------------------------------------------------------

-- 
-- Table structure for table `country`
-- 

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `iso` char(2) NOT NULL default '',
  `name` varchar(80) NOT NULL default '',
  `printable_name` varchar(80) NOT NULL default '',
  `iso3` char(3) default NULL,
  `numcode` smallint(6) default NULL,
  PRIMARY KEY  (`iso`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `country`
-- 

INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AL', 'ALBANIA', 'Albania', 'ALB', 8);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DZ', 'ALGERIA', 'Algeria', 'DZA', 12);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AD', 'ANDORRA', 'Andorra', 'AND', 20);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AO', 'ANGOLA', 'Angola', 'AGO', 24);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AR', 'ARGENTINA', 'Argentina', 'ARG', 32);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AM', 'ARMENIA', 'Armenia', 'ARM', 51);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AW', 'ARUBA', 'Aruba', 'ABW', 533);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AU', 'AUSTRALIA', 'Australia', 'AUS', 36);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AT', 'AUSTRIA', 'Austria', 'AUT', 40);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BB', 'BARBADOS', 'Barbados', 'BRB', 52);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BY', 'BELARUS', 'Belarus', 'BLR', 112);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BE', 'BELGIUM', 'Belgium', 'BEL', 56);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BZ', 'BELIZE', 'Belize', 'BLZ', 84);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BJ', 'BENIN', 'Benin', 'BEN', 204);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BM', 'BERMUDA', 'Bermuda', 'BMU', 60);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BT', 'BHUTAN', 'Bhutan', 'BTN', 64);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BW', 'BOTSWANA', 'Botswana', 'BWA', 72);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BR', 'BRAZIL', 'Brazil', 'BRA', 76);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('BI', 'BURUNDI', 'Burundi', 'BDI', 108);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CM', 'CAMEROON', 'Cameroon', 'CMR', 120);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CA', 'CANADA', 'Canada', 'CAN', 124);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TD', 'CHAD', 'Chad', 'TCD', 148);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CL', 'CHILE', 'Chile', 'CHL', 152);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CN', 'CHINA', 'China', 'CHN', 156);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CO', 'COLOMBIA', 'Colombia', 'COL', 170);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KM', 'COMOROS', 'Comoros', 'COM', 174);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CG', 'CONGO', 'Congo', 'COG', 178);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HR', 'CROATIA', 'Croatia', 'HRV', 191);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CU', 'CUBA', 'Cuba', 'CUB', 192);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CY', 'CYPRUS', 'Cyprus', 'CYP', 196);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DK', 'DENMARK', 'Denmark', 'DNK', 208);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DM', 'DOMINICA', 'Dominica', 'DMA', 212);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('EC', 'ECUADOR', 'Ecuador', 'ECU', 218);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('EG', 'EGYPT', 'Egypt', 'EGY', 818);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ER', 'ERITREA', 'Eritrea', 'ERI', 232);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('EE', 'ESTONIA', 'Estonia', 'EST', 233);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FJ', 'FIJI', 'Fiji', 'FJI', 242);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FI', 'FINLAND', 'Finland', 'FIN', 246);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FR', 'FRANCE', 'France', 'FRA', 250);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GA', 'GABON', 'Gabon', 'GAB', 266);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GM', 'GAMBIA', 'Gambia', 'GMB', 270);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GE', 'GEORGIA', 'Georgia', 'GEO', 268);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('DE', 'GERMANY', 'Germany', 'DEU', 276);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GH', 'GHANA', 'Ghana', 'GHA', 288);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GR', 'GREECE', 'Greece', 'GRC', 300);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GL', 'GREENLAND', 'Greenland', 'GRL', 304);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GD', 'GRENADA', 'Grenada', 'GRD', 308);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GU', 'GUAM', 'Guam', 'GUM', 316);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GN', 'GUINEA', 'Guinea', 'GIN', 324);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GY', 'GUYANA', 'Guyana', 'GUY', 328);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HT', 'HAITI', 'Haiti', 'HTI', 332);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HN', 'HONDURAS', 'Honduras', 'HND', 340);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('HU', 'HUNGARY', 'Hungary', 'HUN', 348);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IS', 'ICELAND', 'Iceland', 'ISL', 352);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IN', 'INDIA', 'India', 'IND', 356);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ID', 'INDONESIA', 'Indonesia', 'IDN', 360);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IQ', 'IRAQ', 'Iraq', 'IRQ', 368);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IE', 'IRELAND', 'Ireland', 'IRL', 372);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IL', 'ISRAEL', 'Israel', 'ISR', 376);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('IT', 'ITALY', 'Italy', 'ITA', 380);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('JM', 'JAMAICA', 'Jamaica', 'JAM', 388);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('JP', 'JAPAN', 'Japan', 'JPN', 392);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('JO', 'JORDAN', 'Jordan', 'JOR', 400);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KE', 'KENYA', 'Kenya', 'KEN', 404);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KW', 'KUWAIT', 'Kuwait', 'KWT', 414);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LV', 'LATVIA', 'Latvia', 'LVA', 428);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LB', 'LEBANON', 'Lebanon', 'LBN', 422);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LS', 'LESOTHO', 'Lesotho', 'LSO', 426);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LR', 'LIBERIA', 'Liberia', 'LBR', 430);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MO', 'MACAO', 'Macao', 'MAC', 446);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MW', 'MALAWI', 'Malawi', 'MWI', 454);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MV', 'MALDIVES', 'Maldives', 'MDV', 462);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ML', 'MALI', 'Mali', 'MLI', 466);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MT', 'MALTA', 'Malta', 'MLT', 470);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('YT', 'MAYOTTE', 'Mayotte', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MX', 'MEXICO', 'Mexico', 'MEX', 484);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MC', 'MONACO', 'Monaco', 'MCO', 492);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MA', 'MOROCCO', 'Morocco', 'MAR', 504);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MM', 'MYANMAR', 'Myanmar', 'MMR', 104);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NA', 'NAMIBIA', 'Namibia', 'NAM', 516);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NR', 'NAURU', 'Nauru', 'NRU', 520);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NP', 'NEPAL', 'Nepal', 'NPL', 524);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NE', 'NIGER', 'Niger', 'NER', 562);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NG', 'NIGERIA', 'Nigeria', 'NGA', 566);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NU', 'NIUE', 'Niue', 'NIU', 570);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('NO', 'NORWAY', 'Norway', 'NOR', 578);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('OM', 'OMAN', 'Oman', 'OMN', 512);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PW', 'PALAU', 'Palau', 'PLW', 585);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PA', 'PANAMA', 'Panama', 'PAN', 591);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PE', 'PERU', 'Peru', 'PER', 604);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PL', 'POLAND', 'Poland', 'POL', 616);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PT', 'PORTUGAL', 'Portugal', 'PRT', 620);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('QA', 'QATAR', 'Qatar', 'QAT', 634);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('RE', 'REUNION', 'Reunion', 'REU', 638);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('RO', 'ROMANIA', 'Romania', 'ROM', 642);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('RW', 'RWANDA', 'Rwanda', 'RWA', 646);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('WS', 'SAMOA', 'Samoa', 'WSM', 882);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SM', 'SAN MARINO', 'San Marino', 'SMR', 674);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SN', 'SENEGAL', 'Senegal', 'SEN', 686);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SG', 'SINGAPORE', 'Singapore', 'SGP', 702);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SO', 'SOMALIA', 'Somalia', 'SOM', 706);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ES', 'SPAIN', 'Spain', 'ESP', 724);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SD', 'SUDAN', 'Sudan', 'SDN', 736);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SR', 'SURINAME', 'Suriname', 'SUR', 740);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SE', 'SWEDEN', 'Sweden', 'SWE', 752);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TH', 'THAILAND', 'Thailand', 'THA', 764);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TG', 'TOGO', 'Togo', 'TGO', 768);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TK', 'TOKELAU', 'Tokelau', 'TKL', 772);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TO', 'TONGA', 'Tonga', 'TON', 776);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TN', 'TUNISIA', 'Tunisia', 'TUN', 788);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TR', 'TURKEY', 'Turkey', 'TUR', 792);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('TV', 'TUVALU', 'Tuvalu', 'TUV', 798);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('UG', 'UGANDA', 'Uganda', 'UGA', 800);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('UA', 'UKRAINE', 'Ukraine', 'UKR', 804);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('US', 'UNITED STATES', 'United States', 'USA', 840);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('UY', 'URUGUAY', 'Uruguay', 'URY', 858);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VU', 'VANUATU', 'Vanuatu', 'VUT', 548);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('YE', 'YEMEN', 'Yemen', 'YEM', 887);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894);
INSERT INTO `country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

-- 
-- Table structure for table `document`
-- 

DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `doc_id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `year` int(10) default NULL,
  `volume` varchar(255) default NULL,
  `doi` varchar(255) default NULL,
  `hal` varchar(255) default NULL,
  `journal_id` int(10) unsigned default NULL,
  `institution_id` int(10) default NULL,
  `note` varchar(255) default NULL,
  `typedoc_id` int(10) default NULL,
  `soustypedoc_id` int(10) default NULL,
  `pages_start` varchar(32) default NULL,
  `pages_end` varchar(32) default NULL,
  `pages_eid` varchar(32) default NULL,
  `pages_num` varchar(32) default NULL,
  `groupe` varchar(32) default NULL,
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `conference_id` int(10) default NULL,
  `publisher_id` int(10) default NULL,
  `proceedings_id` int(10) default NULL,
  `lang` char(2) NOT NULL default 'EN',
  PRIMARY KEY  (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `document`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `flags`
-- 

DROP TABLE IF EXISTS `flags`;
CREATE TABLE `flags` (
  `name` varchar(255) default NULL,
  `value` int(10) unsigned default NULL
) ENGINE=MyISAM;

-- 
-- Dumping data for table `flags`
-- 

INSERT INTO `flags` (`name`, `value`) VALUES ('readonly', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fonction`
-- 

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE `fonction` (
  `fonction_id` int(10) unsigned NOT NULL auto_increment,
  `fonction_libelle` varchar(255) default NULL,
  PRIMARY KEY  (`fonction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `fonction`
-- 

INSERT INTO `fonction` (`fonction_id`, `fonction_libelle`) VALUES (1, 'auteur');
INSERT INTO `fonction` (`fonction_id`, `fonction_libelle`) VALUES (2, '�diteur');
INSERT INTO `fonction` (`fonction_id`, `fonction_libelle`) VALUES (3, 'directeur');

-- --------------------------------------------------------

-- 
-- Table structure for table `groupes`
-- 

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE `groupes` (
  `g_id` int(10) unsigned NOT NULL auto_increment,
  `g_name` varchar(16) NOT NULL default '',
  `g_fullname` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`g_id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `groupes`
-- 

-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (1, 'grp1', '�quipe de recherche 1');
-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (2, 'grp2', '�quipe de recherche 2');
-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (3, 'grp3', '�quipe de recherche 3');
-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (4, 'grp4', '�quipe de recherche 4');
-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (5, 'exter', 'Publication hors labo');

-- --------------------------------------------------------

-- 
-- Table structure for table `history`
-- 

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `u_id` int(10) unsigned NOT NULL default '0',
  `g_id` varchar(32) default NULL,
  `table_id` int(10) unsigned default NULL,
  `item_id` int(10) unsigned default NULL,
  `action` varchar(32) NOT NULL default '',
  `entry_old` text,
  `entry_new` text,
  `date_entry` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_checked` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `history`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `institution`
-- 

DROP TABLE IF EXISTS `institution`;
CREATE TABLE `institution` (
  `institution_id` int(10) unsigned NOT NULL auto_increment,
  `institution_name` varchar(255) NOT NULL default '',
  `institution_short` varchar(32) NOT NULL default '',
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`institution_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `institution`
-- 

INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (1, '�cole centrale de Lyon', 'ECL', 0, '2007-09-18 14:23:36');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (2, 'Universit� Claude-Bernard Lyon 1', 'UCBL', 0, '2007-09-18 14:24:52');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (3, 'Institut national des sciences appliqu�es de Lyon', 'INSA Lyon', 1, '2007-09-18 14:26:24');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (4, 'Kungliga Tekniska H�gskolan Stockholm', 'KTH Stockholm', 1, '2007-10-11 15:22:17');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (5, 'Technocentre Renault Guyancourt', 'Renault', 0, '2007-10-11 15:22:55');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (6, 'Politecnico di Torino', 'Politecnico di Torino', 0, '2007-10-12 08:25:38');
INSERT INTO `institution` (`institution_id`, `institution_name`, `institution_short`, `log`, `date`) VALUES (7, 'Office national d\\''�tudes et de recherches a�rospatiales', 'ONERA', 0, '2007-10-12 17:42:02');

-- --------------------------------------------------------

-- 
-- Table structure for table `journal`
-- 

DROP TABLE IF EXISTS `journal`;
CREATE TABLE `journal` (
  `journal_id` int(10) unsigned NOT NULL auto_increment,
  `journal_fullname` varchar(255) default NULL,
  `journal_name` varchar(255) default NULL,
  `journal_type` int(11) NOT NULL default '0',
  `journal_audience` int(4) NOT NULL default '2',
  `journal_peer_review` int(4) NOT NULL default '1',
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`journal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=202 ;

-- 
-- Dumping data for table `journal`
-- 

INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (4, 'Houille Blanche-Revue internationale de l\\''eau', 'Houille Blanche-Rev. Int.', 1, 2, 1, 2, '2007-09-12 20:24:57');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (5, 'International Journal for Numerical Methods in Fluids', 'Int. J. Numer. Methods Fluids', 1, 2, 1, 2, '2007-09-12 20:16:38');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (6, 'Annual Review of Fluid Mechanics', 'Annu. Rev. Fluid Mech.', 1, 2, 1, 2, '2007-09-12 18:56:31');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (7, 'Journal de Recherches Hydrauliques', 'Journal de Recherches Hydrauliques', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (8, 'Applied Mechanics Reviews', 'Appl. Mech. Rev.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (11, 'Proc. Institution Mechanical Engineers', 'Proc. Institution Mechanical Engineers', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (13, 'Journal of Heat Transfer', 'Journal of Heat Transfer', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (14, 'Progress in Aerospace Sciences', 'Prog. Aerosp. Sci.', 1, 2, 1, 2, '2007-09-12 20:56:30');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (15, 'Proceedings of the IEEE', 'Proceedings of the IEEE', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (16, 'Journal of Computational Acoustics', 'J. Comput. Acoust.', 1, 2, 1, 2, '2007-09-12 19:24:36');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (17, 'AIAA Journal', 'AIAA J.', 1, 2, 1, 2, '2007-09-12 18:53:30');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (19, 'Theoretical and Computational Fluid Dynamics', 'Theor. Comput. Fluid Dyn.', 1, 2, 1, 2, '2007-09-12 19:26:36');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (20, 'Journal of Propulsion and Power', 'J. Propul. Power', 1, 2, 1, 2, '2007-09-12 20:41:58');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (21, 'International Journal Thermal Sciences', 'Int. J. Therm. Sci.', 1, 2, 1, 2, '2007-09-12 20:31:11');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (22, 'Chemical Engineering Science', 'Chem. Eng. Sci.', 1, 2, 1, 2, '2007-09-12 19:14:16');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (151, 'Earth Surface Processes and Landforms', 'Earth Surf. Process. Landf.', 1, 2, 1, 2, '2007-09-12 20:03:44');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (24, 'IMA Journal of Applied Mathematics', 'IMA J. Appl. Math.', 1, 2, 1, 1, '2007-09-12 20:25:50');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (25, 'Advances in Chemical Physics', 'Advances in Chemical Physics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (26, 'Comptes Rendus Acad. Sci., S�rie IIb', 'Comptes Rendus Acad. Sci., S�rie IIb', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (27, 'Journal of Fluid Mechanics', 'J. Fluid Mech.', 1, 2, 1, 2, '2007-09-12 20:15:04');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (28, 'Journal of Turbomachinery', 'Journal of Turbomachinery', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (29, 'Journal of Fluids Engineering', 'J. Fluids Eng.', 1, 2, 1, 1, '2008-05-23 09:19:39');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (30, 'Revue de l''I.F.P.', 'Revue de l''I.F.P.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (31, 'Technica', 'Technica', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (32, 'Revue des Ing�nieurs de l''Automobile', 'Revue des Ing�nieurs de l''Automobile', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (33, 'Journal d''Acoustique', 'Journal d''Acoustique', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (34, 'Journal de Physique (suppl�ment)', 'Journal de Physique (suppl�ment)', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (35, 'Physics of Fluids', 'Phys. Fluids', 1, 2, 1, 2, '2007-09-12 20:18:18');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (36, 'Journal de Physique, Colloque C3', 'Journal de Physique, Colloque C3', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (37, 'ERCOFTAC Bulletin', 'ERCOFTAC Bulletin', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (38, 'Physico-Chemical Hydrodynamics', 'Physico-Chemical Hydrodynamics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (39, 'Journal of the Acoustical Society of America', 'J. Acoust. Soc. Am.', 1, 2, 1, 2, '2007-09-12 20:43:15');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (40, 'Chemical Senses', 'Chem. Senses', 1, 2, 1, 2, '2007-09-12 19:16:13');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (41, 'Atmospheric Environment', 'Atmos. Environ.', 1, 2, 1, 2, '2007-09-12 19:01:25');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (42, 'Journal of Hazardous Materials', 'J. Hazard. Mater.', 1, 2, 1, 2, '2007-09-12 20:38:20');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (43, 'European Journal of Mechanics B-Fluids', 'Eur. J. Mech. B-Fluids', 1, 2, 1, 2, '2007-09-12 20:05:43');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (44, 'International Journal of Heat and Mass Transfer', 'Int. J. Heat Mass Transf.', 1, 2, 1, 2, '2007-09-12 20:20:07');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (45, 'JAMA : suppl�ment � l''�dition fran�aise', 'JAMA : suppl�ment � l''�dition fran�aise', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (46, 'SPECTRA 2000', 'SPECTRA 2000', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (47, 'Journal de Physique III', 'Journal de Physique III', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (48, 'Journal de Physique IV, Colloque C1', 'Journal de Physique IV, Colloque C1', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (49, 'Combustion Science and Technology', 'Combust. Sci. Technol.', 1, 2, 1, 2, '2007-09-12 19:19:29');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (50, 'Revue Scientifique et Technique de la D�fense', 'Revue Scientifique et Technique de la D�fense', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (51, 'Entretiens Science et D�fense', 'Entretiens Science et D�fense', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (52, 'Revue G�n�rale de Thermique', 'Revue G�n�rale de Thermique', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (53, 'Revue Scientifique de la SNECMA', 'Revue Scientifique de la SNECMA', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (54, 'Combustion and Flame', 'Combust. Flame', 1, 2, 1, 2, '2007-09-12 19:18:38');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (55, 'International Journal of Thermophysics', 'Int. J. Thermophys.', 1, 2, 1, 2, '2007-09-12 20:30:11');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (56, 'Applied Scientific Research', 'Applied Scientific Research', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (57, 'Applied Acoustics', 'Appl. Acoust.', 1, 2, 1, 2, '2007-09-12 18:57:50');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (58, 'Waves in Random and Complex Media', 'Waves Random Complex Media', 1, 2, 1, 2, '2007-09-12 21:02:04');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (59, 'Journal of Hydraulic Research', 'J. Hydraul. Res.', 1, 2, 1, 2, '2007-09-12 20:39:43');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (60, 'Experiments in Fluids', 'Exp. Fluids', 1, 2, 1, 2, '2007-09-12 20:10:03');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (61, 'Acustica', 'Acustica', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (62, 'Journal de Physique', 'Journal de Physique', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (63, 'Fluid Dynamics Research', 'Fluid Dyn. Res.', 1, 2, 1, 2, '2007-09-12 20:12:46');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (64, 'Numerical Heat Transfer Part A-Applications', 'Numer. Heat Transf. A-Appl.', 1, 2, 1, 2, '2007-09-12 20:21:40');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (65, 'Smart Materials and Structures', 'Smart Mat. Struct.', 1, 2, 1, 2, '2007-09-12 20:59:05');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (66, 'Acta Acustica', 'Acta Acustica', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (67, 'Journal of Crystal Growth', 'J. Cryst. Growth', 1, 2, 1, 2, '2007-09-12 20:35:06');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (68, 'International Journal of Multiphase Flow', 'Int. J. Multiph. Flow', 1, 2, 1, 2, '2007-09-12 20:28:52');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (69, 'Multiphase Science and Technology', 'Multiphase Science and Technology', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (70, 'Journal of Computational Physics', 'J. Comput. Phys.', 1, 2, 1, 2, '2007-09-12 19:25:05');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (71, 'Journal of Sound and Vibration', 'J. Sound Vib.', 1, 2, 1, 2, '2007-09-12 20:42:34');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (72, 'Applied Optics', 'Appl. Optics', 1, 2, 1, 2, '2007-09-12 18:58:57');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (73, 'Entropie', 'Entropie', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (74, 'Revue Fran�aise de M�canique', 'Revue Fran�aise de M�canique', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (75, 'International Journal of Numerical Methods for Heat and Fluid Flow', 'Int. J. Numer. Methods Heat Fluid Flow', 1, 2, 1, 2, '2007-09-12 20:14:30');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (76, 'Journal of Flow Visualization and Image Processing', 'Journal of Flow Visualization and Image Processing', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (77, 'Microgravity Quarterly', 'Microgravity Quarterly', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (78, 'IMechE Conf. Transactions', 'IMechE Conf. Transactions', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (79, 'Chemical Engineering Communications', 'Chem. Eng. Commun.', 1, 2, 1, 2, '2007-09-12 19:13:26');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (80, 'Isotopes', 'Isotopes', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (82, 'Journal of Thermal Science', 'Journal of Thermal Science', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (83, 'Measurement Science & Technology', 'Meas. Sci. Technol.', 1, 2, 1, 2, '2007-09-12 20:51:13');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (84, 'Lettre d''information du CNUSC', 'Lettre d''information du CNUSC', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (85, 'Experimental Thermal and Fluid Science', 'Exp. Therm. Fluid Sci.', 1, 2, 1, 2, '2007-09-12 20:09:08');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (87, 'Advances Space Research', 'Advances Space Research', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (88, 'Review of Scientific Instruments', 'Rev. Sci. Instrum.', 1, 2, 1, 2, '2007-09-12 20:57:20');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (89, 'International Journal of Heat and Fluid Flow', 'Int. J. Heat Fluid Flow', 1, 2, 1, 2, '2007-09-12 20:13:45');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (90, 'SAE Transactions', 'SAE Transactions', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (91, 'Flow Turbulence and Combustion', 'Flow Turbul. Combust.', 1, 2, 1, 2, '2007-09-12 20:10:47');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (92, 'European Physical Journal-Applied Physics', 'Eur. Phys. J.-Appl. Phys.', 1, 2, 1, 2, '2007-09-12 20:07:28');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (93, 'High Temperatures - High Pressures', 'High Temperatures - High Pressures', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (94, 'Science in China', 'Science in China', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (95, 'International Journal of Bifurcation and Chaos', 'Int. J. Bifurcation Chaos', 1, 2, 1, 2, '2007-09-12 20:27:28');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (96, 'European Physical Journal B', 'Eur. Phys. J. B', 1, 2, 1, 2, '2007-09-12 20:06:50');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (97, 'Journal de Chimie Physique', 'Journal de Chimie Physique', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (98, 'International Journal of Transport Phenomena', 'Int. J. Transport Phen.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (99, 'Journal of Loss Prevention in the Process Industries', 'J. Loss Prev. Process Ind.', 1, 2, 1, 2, '2007-09-12 20:41:01');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (100, 'Acta Mechanica Sinica', 'Acta Mech. Sin.', 1, 2, 1, 2, '2007-09-12 18:50:57');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (101, 'Limnology and Oceanography', 'Limnol. Oceanogr.', 1, 2, 1, 2, '2007-09-12 20:47:50');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (102, 'Journal of Thermal Analysis and Calorimetry', 'J. Therm. Anal. Calorim.', 1, 2, 1, 2, '2007-09-12 20:45:13');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (103, 'Journal of Fish Biology', 'J. Fish Biol.', 1, 2, 1, 2, '2007-09-12 20:37:05');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (104, 'Annals of the New York  Academy of Sciences', 'Ann. NY  Acad. Sci.', 1, 2, 1, 2, '2007-09-12 18:55:20');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (105, 'M�canique et Industries', 'M�canique et Industries', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (106, 'International Journal of Computational Fluid Dynamics', 'Int. J. Comput. Fluid Dyn.', 1, 2, 1, 2, '2007-09-12 19:23:29');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (107, 'Combustion', 'Combustion', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (108, 'Computational Mechanics', 'Comput. Mech.', 1, 2, 1, 2, '2007-09-12 19:21:46');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (109, 'Revue Officielle de la Soci�t� Fran�aise d''O.R.L.', 'Revue Officielle de la Soci�t� Fran�aise d''O.R.L.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (110, 'Journal of Transport and Communication', 'Journal of Transport and Communication', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (111, 'Proc. IMechE Part A, Journal of Power and Energy', 'Proc. IMechE Part A, Journal of Power and Energy', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (112, 'Atomization and Sprays', 'Atom. Sprays', 1, 2, 1, 2, '2007-09-12 19:02:20');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (113, 'Pour la Science - Dossier Hors-S�rie', 'Pour la Science - Dossier Hors-S�rie', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (114, 'Revue Scientifique et Technique (vietnamienne)', 'Revue Scientifique et Technique (vietnamienne)', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (115, 'Vietnam Journal of Mechanics, NCST of Vietnam', 'Vietnam Journal of Mechanics, NCST of Vietnam', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (152, 'Experiments and Measurements in Fluid Mechanics', 'Exp. Measur. Fluid Mech.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (117, 'Trans. Japan Soc. Mech. Engrs', 'Trans. Japan Soc. Mech. Engrs', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (118, 'ARI (Int. J. Phys. and Eng. Sci.)', 'ARI (Int. J. Phys. and Eng. Sci.)', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (119, 'International Journal of Environment and Pollution', 'Int. J. Environ. Pollut.', 1, 2, 1, 2, '2007-09-12 20:28:10');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (120, 'Comptes Rendus M�canique', 'C. R. M�c.', 1, 2, 1, 2, '2007-09-12 19:20:41');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (121, 'Journal of Fluids and Structures', 'J. Fluids Struct.', 1, 2, 1, 2, '2007-09-12 20:17:32');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (122, 'Powder Technology', 'Powder Technol.', 1, 2, 1, 2, '2007-09-12 20:54:52');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (123, 'Journal of Turbulence', 'J. Turbul.', 1, 2, 1, 2, '2007-09-12 20:46:32');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (125, 'Quarterly Journal of Mechanics and Applied Mathematics', 'Q. J. Mech. Appl. Math.', 1, 2, 1, 2, '2007-09-12 21:00:21');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (129, 'Proceedings of the Royal Society A-Mathematical Physical and Engineering Sciences', 'Proc. R. Soc. A-Math. Phys. Eng. Sci.', 1, 2, 1, 2, '2007-09-12 20:55:40');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (130, 'International Journal of Aeroacoustics', 'Int. J. Aeroacoustics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (150, 'Boundary Layer Meteorology', 'Boundary Layer 	Meteorol.', 0, 2, 1, 1, '2008-06-11 16:33:24');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (132, 'International Journal of Rotating Machinery', 'Int. J. Rot. Machin.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (133, 'New Journal of Physics', 'New J. Phys.', 1, 2, 1, 2, '2007-09-12 20:52:51');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (134, 'Chinese Journal of Computational Physics', 'Chinese Journal of Computational Physics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (135, 'Cryogenics', 'Cryogenics', 1, 2, 1, 2, '2007-09-12 20:02:41');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (136, 'AIChE journal', 'AIChE journal', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (137, 'International Journal of Dynamics of Fluids', 'Int. J. Dyn. Fluids', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (138, 'High Temperature Material Processes', 'High Temp. Mat. Process', 1, 2, 1, 1, '2007-09-12 20:23:52');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (139, 'Bulletin de l\\''Union des Physiciens', 'Bulletin de l\\''Union des Physiciens', 3, 2, 1, 1, '2008-02-19 10:37:24');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (140, 'Computer Methods in Biomechanics and Biomedical Engineering', 'Computer Methods in Biomechanics and Biomedical Engineering', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (144, 'Journal of Engineering Mathematics', 'J. Eng. Math.', 1, 2, 1, 2, '2007-09-12 20:36:06');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (145, 'Physical Review E', 'Phys. Rev. E', 1, 2, 1, 1, '2007-09-12 20:53:46');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (146, 'Progress in Computational Fluid Dynamics', 'Prog. Comput. Fluid Dyn.', 1, 2, 1, 2, '2007-09-12 19:26:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (147, 'Journal of Applied Mechanics-Transactions of the ASME', 'J. Appl. Mech.-Trans. ASME', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (148, 'Physica D-Nonlinear Phenomena', 'Physica D', 1, 2, 1, 2, '2007-09-12 20:53:32');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (149, 'Fluid Dynamics and Material Processing', 'Fluid Dyn. Material Proc.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (163, 'Journal of the Electrochemical Society', 'J. Electrochem. Soc.', 1, 2, 1, 2, '2007-09-12 20:44:17');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (162, 'Heat and Mass Transfer', 'Heat Mass Transf.', 1, 2, 1, 2, '2007-09-12 20:19:25');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (166, 'Progress in Astronautics and Aeronautics', 'Progress Astronautics Aeronautics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (165, 'Lecture Notes in Physics', 'Lect. Notes Phys.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (167, 'Notes on Numerical Fluid Mechanics', 'Notes Num. Fluid Mech.', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (168, 'European Space Agency Publications', 'ESA Publications', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (169, 'Numerical Methods in Thermal Problems', 'Num. Methods Thermal Problems', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (170, 'Advances in Fluid Mechanics', 'Advances in Fluid Mechanics', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (171, 'R�cents Progr�s en G�nie des Proc�d�s', 'R�cents Progr�s en G�nie des Proc�d�s', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (172, 'ASME / Heat Transfer Division', 'ASME / Heat Transfer Division', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (173, 'Cold Regions Science and Technology', 'Cold Reg. Sci. Tech.', 1, 2, 1, 2, '2007-09-12 19:17:44');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (174, 'Acta Acustica united with Acustica', 'Acta Acust. United Acust.', 1, 2, 1, 2, '2007-09-12 18:49:17');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (175, 'Journal of Hydraulic Engineering', 'Journal of Hydraulic Engineering', 0, 2, 1, 0, '0000-00-00 00:00:00');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (176, 'Water Science and Technology', 'Water Sci. Technol.', 0, 2, 1, 1, '2008-06-11 16:27:02');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (177, 'Computers & Fluids', 'Comput. Fluids', 1, 2, 1, 2, '2007-09-12 20:02:02');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (178, 'Acoustical Physics', 'Acoust. Phys.', 0, 2, 1, 1, '2008-06-11 16:29:18');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (179, 'Le journal de Mickey', 'J. Mickey', 10, 2, 1, 0, '2007-09-12 18:35:33');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (180, 'Aeronautical Journal', 'Aeronaut. J.', 1, 2, 1, 0, '2007-11-12 14:02:35');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (181, 'T�l�rama', 'T�l�rama', 10, 2, 1, 0, '2008-01-14 09:16:05');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (182, 'Natural Hazards and Earth System Sciences', 'Nat. Hazards Earth Syst. Sci.', 1, 2, 1, 0, '2008-02-12 14:35:21');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (183, 'Mechanical Systems and Signal Processing', 'Mechanical Systems and Signal Processing', 1, 2, 1, 0, '2008-04-30 18:51:27');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (184, 'Journal of the Optical Society of America A', 'J. Opt. Soc. Am. A', 1, 2, 1, 1, '2008-04-30 19:17:07');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (185, 'Journal of the Energy Institute', 'Journal of the Energy Institute', 1, 2, 1, 0, '2008-04-30 19:40:39');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (186, 'Nuclear Engineering and Design', 'Nucl. Eng. Des.', 1, 2, 1, 1, '2008-04-30 19:58:14');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (187, 'Physical Review Letters', 'Phys. Rev. Lett.', 1, 2, 1, 2, '2008-05-13 11:24:18');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (188, 'Journal of Physics. D, Applied Physics', 'J. Phys., D. Appl. Phys.', 1, 2, 1, 1, '2008-05-26 17:07:17');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (189, 'New Phytologist', 'New Phytol.', 1, 2, 1, 0, '2008-05-27 14:41:31');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (190, 'Noise Control Engineering Journal', 'Noise Control Eng. J.', 1, 2, 1, 0, '2008-06-12 14:19:39');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (191, 'Aerospace Science and Technology', 'Aerosp. Sci. Technol.', 1, 2, 1, 0, '2008-06-12 16:13:03');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (192, 'Optics Letters', 'Opt. Lett.', 1, 2, 1, 0, '2008-09-10 15:39:22');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (193, 'Physics of Plasmas', 'Phys. Plasmas', 1, 2, 1, 0, '2008-10-31 11:08:16');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (194, 'Acoustique et Techniques', 'Acoust. Tech.', 0, 1, 0, 0, '2008-12-12 17:33:47');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (195, 'Water Ressources Research', 'Water Resour. Res.', 1, 2, 1, 1, '2008-12-18 13:32:50');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (196, 'International Review of Mechanical Engineering', 'IREME', 0, 2, 1, 1, '2009-02-23 17:14:38');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (197, 'Physica Scripta', 'Phys. Scr.', 1, 2, 1, 0, '2009-02-17 11:31:37');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (198, 'Combustion Theory and Modelling', 'Combust. Theory Model.', 1, 2, 1, 1, '2009-02-23 11:58:49');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (199, 'International Review of Aerospace Engineering', 'IREASE', 0, 2, 1, 0, '2009-02-23 17:18:35');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (200, 'International Review  on Modelling and Simulations', 'IREMOS', 0, 2, 1, 0, '2009-02-23 17:19:12');
INSERT INTO `journal` (`journal_id`, `journal_fullname`, `journal_name`, `journal_type`, `journal_audience`, `journal_peer_review`, `log`, `date`) VALUES (201, 'European Physical Journal � Special Topics', 'Eur. Phys. J. - Spec. Top.', 1, 2, 1, 0, '2009-02-24 16:48:07');

-- --------------------------------------------------------

-- 
-- Table structure for table `language`
-- 

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `iso` char(2) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`iso`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `language`
-- 

INSERT INTO `language` (`iso`, `name`) VALUES ('EN', 'Anglais');
INSERT INTO `language` (`iso`, `name`) VALUES ('FR', 'Fran�ais');
INSERT INTO `language` (`iso`, `name`) VALUES ('AF', 'Afrikaans');
INSERT INTO `language` (`iso`, `name`) VALUES ('AA', 'Afar');
INSERT INTO `language` (`iso`, `name`) VALUES ('AB', 'Abkhaze');
INSERT INTO `language` (`iso`, `name`) VALUES ('AK', 'Akan');
INSERT INTO `language` (`iso`, `name`) VALUES ('SQ', 'Albanais');
INSERT INTO `language` (`iso`, `name`) VALUES ('DE', 'Allemand');
INSERT INTO `language` (`iso`, `name`) VALUES ('AM', 'Amharique');
INSERT INTO `language` (`iso`, `name`) VALUES ('AR', 'Arabe');
INSERT INTO `language` (`iso`, `name`) VALUES ('AN', 'Aragonais');
INSERT INTO `language` (`iso`, `name`) VALUES ('HY', 'Arm�nien');
INSERT INTO `language` (`iso`, `name`) VALUES ('AS', 'Assamais');
INSERT INTO `language` (`iso`, `name`) VALUES ('AV', 'Avar');
INSERT INTO `language` (`iso`, `name`) VALUES ('AE', 'Avestique');
INSERT INTO `language` (`iso`, `name`) VALUES ('AY', 'Aymara');
INSERT INTO `language` (`iso`, `name`) VALUES ('AZ', 'Az�ri');
INSERT INTO `language` (`iso`, `name`) VALUES ('BA', 'Bachkir');
INSERT INTO `language` (`iso`, `name`) VALUES ('BM', 'Bambara');
INSERT INTO `language` (`iso`, `name`) VALUES ('EU', 'Basque');
INSERT INTO `language` (`iso`, `name`) VALUES ('BN', 'Bengali');
INSERT INTO `language` (`iso`, `name`) VALUES ('BI', 'Bichlamar');
INSERT INTO `language` (`iso`, `name`) VALUES ('BE', 'Bi�lorusse');
INSERT INTO `language` (`iso`, `name`) VALUES ('BH', 'Bihari');
INSERT INTO `language` (`iso`, `name`) VALUES ('MY', 'Birman');
INSERT INTO `language` (`iso`, `name`) VALUES ('BS', 'Bosniaque');
INSERT INTO `language` (`iso`, `name`) VALUES ('BR', 'Breton');
INSERT INTO `language` (`iso`, `name`) VALUES ('BG', 'Bulgare');
INSERT INTO `language` (`iso`, `name`) VALUES ('CA', 'Catalan');
INSERT INTO `language` (`iso`, `name`) VALUES ('CH', 'Chamorro');
INSERT INTO `language` (`iso`, `name`) VALUES ('NY', 'Chichewa');
INSERT INTO `language` (`iso`, `name`) VALUES ('ZH', 'Chinois');
INSERT INTO `language` (`iso`, `name`) VALUES ('KO', 'Cor�en');
INSERT INTO `language` (`iso`, `name`) VALUES ('KW', 'Cornique');
INSERT INTO `language` (`iso`, `name`) VALUES ('CO', 'Corse');
INSERT INTO `language` (`iso`, `name`) VALUES ('CR', 'Cree');
INSERT INTO `language` (`iso`, `name`) VALUES ('HR', 'Croate');
INSERT INTO `language` (`iso`, `name`) VALUES ('DA', 'Danois');
INSERT INTO `language` (`iso`, `name`) VALUES ('DZ', 'Dzongkha');
INSERT INTO `language` (`iso`, `name`) VALUES ('ES', 'Espagnol');
INSERT INTO `language` (`iso`, `name`) VALUES ('EO', 'Esp�ranto');
INSERT INTO `language` (`iso`, `name`) VALUES ('ET', 'Estonien');
INSERT INTO `language` (`iso`, `name`) VALUES ('EE', '�w�');
INSERT INTO `language` (`iso`, `name`) VALUES ('FO', 'F�ro�en');
INSERT INTO `language` (`iso`, `name`) VALUES ('FJ', 'Fidjien');
INSERT INTO `language` (`iso`, `name`) VALUES ('FI', 'Finnois');
INSERT INTO `language` (`iso`, `name`) VALUES ('FL', 'Flamand');
INSERT INTO `language` (`iso`, `name`) VALUES ('FY', 'Frison');
INSERT INTO `language` (`iso`, `name`) VALUES ('GD', 'Ga�lique');
INSERT INTO `language` (`iso`, `name`) VALUES ('GL', 'Galicien');
INSERT INTO `language` (`iso`, `name`) VALUES ('OM', 'Galla');
INSERT INTO `language` (`iso`, `name`) VALUES ('CY', 'Gallois');
INSERT INTO `language` (`iso`, `name`) VALUES ('LG', 'Ganda');
INSERT INTO `language` (`iso`, `name`) VALUES ('KA', 'G�orgien');
INSERT INTO `language` (`iso`, `name`) VALUES ('GU', 'Goudjrati');
INSERT INTO `language` (`iso`, `name`) VALUES ('EL', 'Grec');
INSERT INTO `language` (`iso`, `name`) VALUES ('KL', 'Groenlandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('GN', 'Guarani');
INSERT INTO `language` (`iso`, `name`) VALUES ('HT', 'Ha�tien');
INSERT INTO `language` (`iso`, `name`) VALUES ('HA', 'Haoussa');
INSERT INTO `language` (`iso`, `name`) VALUES ('HE', 'H�breu');
INSERT INTO `language` (`iso`, `name`) VALUES ('HZ', 'Herero');
INSERT INTO `language` (`iso`, `name`) VALUES ('HI', 'Hindi');
INSERT INTO `language` (`iso`, `name`) VALUES ('HO', 'Hiri Motu');
INSERT INTO `language` (`iso`, `name`) VALUES ('HU', 'Hongrois');
INSERT INTO `language` (`iso`, `name`) VALUES ('IO', 'Ido');
INSERT INTO `language` (`iso`, `name`) VALUES ('IG', 'Igbo');
INSERT INTO `language` (`iso`, `name`) VALUES ('ID', 'Indon�sien');
INSERT INTO `language` (`iso`, `name`) VALUES ('IE', 'Interlingue');
INSERT INTO `language` (`iso`, `name`) VALUES ('IU', 'Inuktitut');
INSERT INTO `language` (`iso`, `name`) VALUES ('IK', 'Inupiaq');
INSERT INTO `language` (`iso`, `name`) VALUES ('GA', 'Irlandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('IS', 'Islandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('IT', 'Italien');
INSERT INTO `language` (`iso`, `name`) VALUES ('JA', 'Japonais');
INSERT INTO `language` (`iso`, `name`) VALUES ('JV', 'Javanais');
INSERT INTO `language` (`iso`, `name`) VALUES ('KN', 'Kannada');
INSERT INTO `language` (`iso`, `name`) VALUES ('KR', 'Kanouri');
INSERT INTO `language` (`iso`, `name`) VALUES ('KS', 'Kashmiri');
INSERT INTO `language` (`iso`, `name`) VALUES ('KK', 'Kazakh');
INSERT INTO `language` (`iso`, `name`) VALUES ('KM', 'Khmer');
INSERT INTO `language` (`iso`, `name`) VALUES ('KI', 'Kikuyu');
INSERT INTO `language` (`iso`, `name`) VALUES ('KY', 'Kirghize');
INSERT INTO `language` (`iso`, `name`) VALUES ('KV', 'Kom');
INSERT INTO `language` (`iso`, `name`) VALUES ('KG', 'Kongo');
INSERT INTO `language` (`iso`, `name`) VALUES ('KJ', 'Kuanyama');
INSERT INTO `language` (`iso`, `name`) VALUES ('KU', 'Kurde');
INSERT INTO `language` (`iso`, `name`) VALUES ('LO', 'Lao');
INSERT INTO `language` (`iso`, `name`) VALUES ('LA', 'Latin');
INSERT INTO `language` (`iso`, `name`) VALUES ('LV', 'Letton');
INSERT INTO `language` (`iso`, `name`) VALUES ('LI', 'Limbourgeois');
INSERT INTO `language` (`iso`, `name`) VALUES ('LN', 'Lingala');
INSERT INTO `language` (`iso`, `name`) VALUES ('LT', 'Lituanien');
INSERT INTO `language` (`iso`, `name`) VALUES ('LU', 'Luba-Katanga');
INSERT INTO `language` (`iso`, `name`) VALUES ('LB', 'Luxembourgeois');
INSERT INTO `language` (`iso`, `name`) VALUES ('MK', 'Mac�donien');
INSERT INTO `language` (`iso`, `name`) VALUES ('MS', 'Malais');
INSERT INTO `language` (`iso`, `name`) VALUES ('ML', 'Malayalam');
INSERT INTO `language` (`iso`, `name`) VALUES ('DV', 'Maldivien');
INSERT INTO `language` (`iso`, `name`) VALUES ('MG', 'Malgache');
INSERT INTO `language` (`iso`, `name`) VALUES ('MT', 'Maltais');
INSERT INTO `language` (`iso`, `name`) VALUES ('GV', 'Mannois');
INSERT INTO `language` (`iso`, `name`) VALUES ('MI', 'Maori');
INSERT INTO `language` (`iso`, `name`) VALUES ('MR', 'Marathe');
INSERT INTO `language` (`iso`, `name`) VALUES ('MH', 'Marshall');
INSERT INTO `language` (`iso`, `name`) VALUES ('MO', 'Moldave');
INSERT INTO `language` (`iso`, `name`) VALUES ('MN', 'Mongol');
INSERT INTO `language` (`iso`, `name`) VALUES ('NA', 'Nauruan');
INSERT INTO `language` (`iso`, `name`) VALUES ('NV', 'Navaho');
INSERT INTO `language` (`iso`, `name`) VALUES ('ND', 'Nd�b�l� du Sud');
INSERT INTO `language` (`iso`, `name`) VALUES ('NG', 'Ndonga');
INSERT INTO `language` (`iso`, `name`) VALUES ('NL', 'N�erlandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('NE', 'N�palais');
INSERT INTO `language` (`iso`, `name`) VALUES ('NO', 'Norv�gien');
INSERT INTO `language` (`iso`, `name`) VALUES ('NB', 'Norv�gien Bokm�l');
INSERT INTO `language` (`iso`, `name`) VALUES ('NN', 'Norv�gien Nynorsk');
INSERT INTO `language` (`iso`, `name`) VALUES ('OJ', 'Ojibwa');
INSERT INTO `language` (`iso`, `name`) VALUES ('OR', 'Oriya');
INSERT INTO `language` (`iso`, `name`) VALUES ('OS', 'Oss�te');
INSERT INTO `language` (`iso`, `name`) VALUES ('UG', 'Ou�gour');
INSERT INTO `language` (`iso`, `name`) VALUES ('UR', 'Ourdou');
INSERT INTO `language` (`iso`, `name`) VALUES ('UZ', 'Ouszbek');
INSERT INTO `language` (`iso`, `name`) VALUES ('PS', 'Pachto');
INSERT INTO `language` (`iso`, `name`) VALUES ('PI', 'Pali');
INSERT INTO `language` (`iso`, `name`) VALUES ('PA', 'Pendjabi');
INSERT INTO `language` (`iso`, `name`) VALUES ('FA', 'Persan');
INSERT INTO `language` (`iso`, `name`) VALUES ('FF', 'Peul');
INSERT INTO `language` (`iso`, `name`) VALUES ('PL', 'Polonais');
INSERT INTO `language` (`iso`, `name`) VALUES ('PT', 'Portugais');
INSERT INTO `language` (`iso`, `name`) VALUES ('QU', 'Quechua');
INSERT INTO `language` (`iso`, `name`) VALUES ('RM', 'Rh�to-Roman');
INSERT INTO `language` (`iso`, `name`) VALUES ('RO', 'Roumain');
INSERT INTO `language` (`iso`, `name`) VALUES ('RN', 'Rundi');
INSERT INTO `language` (`iso`, `name`) VALUES ('RU', 'Russe');
INSERT INTO `language` (`iso`, `name`) VALUES ('RW', 'Rwanda');
INSERT INTO `language` (`iso`, `name`) VALUES ('SE', 'Sami du Nord');
INSERT INTO `language` (`iso`, `name`) VALUES ('SM', 'Samoan');
INSERT INTO `language` (`iso`, `name`) VALUES ('SG', 'Sango');
INSERT INTO `language` (`iso`, `name`) VALUES ('SA', 'Sanskrit');
INSERT INTO `language` (`iso`, `name`) VALUES ('SC', 'Sarde');
INSERT INTO `language` (`iso`, `name`) VALUES ('SR', 'Serbe');
INSERT INTO `language` (`iso`, `name`) VALUES ('SN', 'Shona');
INSERT INTO `language` (`iso`, `name`) VALUES ('SD', 'Sindhi');
INSERT INTO `language` (`iso`, `name`) VALUES ('SI', 'Singhalais');
INSERT INTO `language` (`iso`, `name`) VALUES ('SK', 'Slovaque');
INSERT INTO `language` (`iso`, `name`) VALUES ('SL', 'Slov�ne');
INSERT INTO `language` (`iso`, `name`) VALUES ('SO', 'Somali');
INSERT INTO `language` (`iso`, `name`) VALUES ('ST', 'Sotho du Sud');
INSERT INTO `language` (`iso`, `name`) VALUES ('SU', 'Soundanais');
INSERT INTO `language` (`iso`, `name`) VALUES ('SV', 'Su�dois');
INSERT INTO `language` (`iso`, `name`) VALUES ('SW', 'Swahili');
INSERT INTO `language` (`iso`, `name`) VALUES ('SS', 'Swati');
INSERT INTO `language` (`iso`, `name`) VALUES ('TG', 'Tadjik');
INSERT INTO `language` (`iso`, `name`) VALUES ('TL', 'Tagalog');
INSERT INTO `language` (`iso`, `name`) VALUES ('TY', 'Tahitien');
INSERT INTO `language` (`iso`, `name`) VALUES ('TA', 'Tamoul');
INSERT INTO `language` (`iso`, `name`) VALUES ('TT', 'Tatar');
INSERT INTO `language` (`iso`, `name`) VALUES ('CS', 'Tch�que');
INSERT INTO `language` (`iso`, `name`) VALUES ('CE', 'Tch�tch�ne');
INSERT INTO `language` (`iso`, `name`) VALUES ('CV', 'Tchouvache');
INSERT INTO `language` (`iso`, `name`) VALUES ('TE', 'T�lougou');
INSERT INTO `language` (`iso`, `name`) VALUES ('TH', 'Tha�');
INSERT INTO `language` (`iso`, `name`) VALUES ('BO', 'Tib�tain');
INSERT INTO `language` (`iso`, `name`) VALUES ('TI', 'Tigrigna');
INSERT INTO `language` (`iso`, `name`) VALUES ('TO', 'Tongan');
INSERT INTO `language` (`iso`, `name`) VALUES ('TS', 'Tsonga');
INSERT INTO `language` (`iso`, `name`) VALUES ('TN', 'Tswana');
INSERT INTO `language` (`iso`, `name`) VALUES ('TR', 'Turc');
INSERT INTO `language` (`iso`, `name`) VALUES ('TK', 'Turkm�ne');
INSERT INTO `language` (`iso`, `name`) VALUES ('TW', 'Twi');
INSERT INTO `language` (`iso`, `name`) VALUES ('UK', 'Ukrainien');
INSERT INTO `language` (`iso`, `name`) VALUES ('VE', 'Venda');
INSERT INTO `language` (`iso`, `name`) VALUES ('VI', 'Vietnamien');
INSERT INTO `language` (`iso`, `name`) VALUES ('VO', 'Volap�k');
INSERT INTO `language` (`iso`, `name`) VALUES ('WA', 'Wallon');
INSERT INTO `language` (`iso`, `name`) VALUES ('WO', 'Wolof');
INSERT INTO `language` (`iso`, `name`) VALUES ('XH', 'Xhosa');
INSERT INTO `language` (`iso`, `name`) VALUES ('II', 'Yi de Sichuan');
INSERT INTO `language` (`iso`, `name`) VALUES ('YI', 'Yiddish');
INSERT INTO `language` (`iso`, `name`) VALUES ('YO', 'Yoruba');
INSERT INTO `language` (`iso`, `name`) VALUES ('ZA', 'Zhuang / Chuang');
INSERT INTO `language` (`iso`, `name`) VALUES ('ZU', 'Zoulou');

-- --------------------------------------------------------

-- 
-- Table structure for table `participer`
-- 

DROP TABLE IF EXISTS `participer`;
CREATE TABLE `participer` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `doc_id` int(10) unsigned NOT NULL default '0',
  `pers_id` int(10) unsigned NOT NULL default '0',
  `fonction_id` int(10) unsigned NOT NULL default '0',
  `rang` int(10) unsigned NOT NULL default '1',
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `participer`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `personne`
-- 

DROP TABLE IF EXISTS `personne`;
CREATE TABLE `personne` (
  `pers_id` int(10) unsigned NOT NULL auto_increment,
  `pers_last` varchar(255) default NULL,
  `pers_first` varchar(255) default NULL,
  `lab` int(4) NOT NULL default '0',
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`pers_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `personne`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `priv`
-- 

DROP TABLE IF EXISTS `priv`;
CREATE TABLE `priv` (
  `priv_id` int(2) NOT NULL default '0',
  `priv_libelle` varchar(64) NOT NULL default ''
) ENGINE=MyISAM;

-- 
-- Dumping data for table `priv`
-- 

INSERT INTO `priv` (`priv_id`, `priv_libelle`) VALUES (0, 'user');
INSERT INTO `priv` (`priv_id`, `priv_libelle`) VALUES (1, 'admin');
INSERT INTO `priv` (`priv_id`, `priv_libelle`) VALUES (2, 'root');

-- --------------------------------------------------------

-- 
-- Table structure for table `publisher`
-- 

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `publisher_id` int(10) unsigned NOT NULL auto_increment,
  `publisher_name` varchar(255) NOT NULL default '',
  `publisher_address` varchar(255) NOT NULL default '',
  `log` int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`publisher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `publisher`
-- 

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (1, 'International Center for Numerical Methods in Engineering (CIMNE)', 'Barcelona, Spain', 0, '2008-02-08 15:22:08');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (2, 'Kluwer Academic Publishers', 'Dordrecht, Boston, London', 0, '2008-02-08 15:25:50');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (3, 'International Glaciological Society', '', 0, '2008-02-12 14:44:40');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (4, 'MHD Pamir publications', 'Grenoble', 0, '2008-02-20 17:58:00');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (5, 'Springer', 'Dordrecht, The Netherlands', 2, '2008-02-22 15:25:03');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (6, 'Chemical and Biological Microsystems Society', '307 Laurel Street, San Diego, California 92101-1630 USA', 0, '2008-03-07 17:35:05');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (7, 'Soci�t� Hydrotechnique de France', '25 rue des Favorites 75015 Paris', 1, '2008-05-05 16:12:37');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (8, 'Association Fran�aise de M�canique', 'Maison de la M�canique, 39/41 rue Louis Blanc - 92400 Courbevoie', 0, '2008-05-13 10:27:25');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (9, 'Cambridge University Press', 'Cambridge, United Kingdom', 0, '2008-06-18 18:48:01');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (10, 'Ellipses Edition Marketing S.A.', '32, rue Bargue 75740 Paris cedex 15', 0, '2008-09-09 11:49:01');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (11, 'Multi-Science Publishing Co', '5 Wates Way, Brentwood, Essex CM15 9TB, UK', 0, '2008-09-26 11:51:48');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (13, 'Pineridge Press', '54, Newton Road, Mumbles, Swansea, U.K.', 0, '2008-10-01 16:59:42');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (14, 'VCH Verlagsgesellschaft', 'Postfach 101161, D-6940 Wainheim (Germany)', 0, '2008-10-02 11:08:47');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (15, '�ditions Lavoisier - Technique et Documentation', '11 Rue Lavoisier, Paris, Paris 75008', 0, '2008-10-02 15:25:35');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (16, 'Friedrich Vieweg und Sohn', '', 0, '2008-10-02 16:00:05');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (17, 'AIAA', '', 0, '2008-12-10 13:33:45');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (18, 'European Acoustics Association', '', 0, '2008-12-15 19:21:12');
INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `log`, `date`) VALUES (19, 'International Institute of Noise Control Engineering', 'Purdue University West Lafayette, USA', 0, '2008-12-19 12:55:43');

-- --------------------------------------------------------

-- 
-- Table structure for table `soustypedoc`
-- 

DROP TABLE IF EXISTS `soustypedoc`;
CREATE TABLE `soustypedoc` (
  `soustypedoc_id` int(10) unsigned NOT NULL default '0',
  `soustypedoc_libelle` varchar(255) default NULL,
  PRIMARY KEY  (`soustypedoc_id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `soustypedoc`
-- 

INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (60, 'th�se de doctorat');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (61, 'habilitation � diriger des recherches');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (0, 'aucun');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (80, 'communication non invit�e');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (81, 'communication invit�e');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (30, 'communication non invit�e');
INSERT INTO `soustypedoc` (`soustypedoc_id`, `soustypedoc_libelle`) VALUES (31, 'communication invit�e');

-- --------------------------------------------------------

-- 
-- Table structure for table `tables`
-- 

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `table_id` int(10) unsigned NOT NULL auto_increment,
  `table_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`table_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `tables`
-- 

INSERT INTO `tables` (`table_id`, `table_name`) VALUES (1, 'personne');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (2, 'journal');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (3, 'document');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (4, 'participer');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (5, 'fonction');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (6, 'typedoc');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (7, 'user');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (8, 'history');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (9, 'groupes');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (10, 'publisher');
INSERT INTO `tables` (`table_id`, `table_name`) VALUES (11, 'conference');

-- --------------------------------------------------------

-- 
-- Table structure for table `typedoc`
-- 

DROP TABLE IF EXISTS `typedoc`;
CREATE TABLE `typedoc` (
  `typedoc_id` int(10) unsigned NOT NULL default '0',
  `typedoc_libelle` varchar(255) default NULL,
  `typedoc_name` varchar(255) NOT NULL default '',
  `order` int(4) NOT NULL default '0',
  PRIMARY KEY  (`typedoc_id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `typedoc`
-- 

INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (4, 'article', 'articles', 1);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (6, 'these', 'th�ses/hdr', 2);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (3, 'conference_proceeding', 'communications avec actes', 3);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (7, 'proceedings_book', 'actes d''une conf�rence', 10);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (8, 'conference_abstract', 'communications sans actes', 4);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (1, 'book', 'livres et ouvrages', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `typejournal`
-- 

DROP TABLE IF EXISTS `typejournal`;
CREATE TABLE `typejournal` (
  `typejournal_id` int(8) NOT NULL default '0',
  `typejournal_libelle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`typejournal_id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `typejournal`
-- 

INSERT INTO `typejournal` (`typejournal_id`, `typejournal_libelle`) VALUES (2, 'journal international � comit� de lecture, non r�f�renc� dans le Web of Science');
INSERT INTO `typejournal` (`typejournal_id`, `typejournal_libelle`) VALUES (3, 'journal national ou sans comit� de lecture');
INSERT INTO `typejournal` (`typejournal_id`, `typejournal_libelle`) VALUES (10, 'autre');
INSERT INTO `typejournal` (`typejournal_id`, `typejournal_libelle`) VALUES (1, 'journal r�f�renc� dans le Web of Science');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(10) unsigned NOT NULL auto_increment,
  `u_name` varchar(255) default NULL,
  `u_first` varchar(255) default NULL,
  `u_mail` varchar(255) default NULL,
  `u_login` varchar(32) NOT NULL default '',
  `u_password` varchar(32) default NULL,
  `u_groupid` int(10) unsigned NOT NULL default '0',
  `u_status` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`u_id`)
) ENGINE=MyISAM;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`u_id`, `u_name`, `u_first`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES (0, 'root', '', 'root@phpubli.org', 'root', 'eda87bffb97f791c3d0e78a5a54be278', 0, 2);
INSERT INTO `user` (`u_id`, `u_name`, `u_first`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES (1, 'admin1', '', 'admin1@phpubli.org', 'admin1', '9027350bf05be72120ae27c02b7b9491', 1, 1);
INSERT INTO `user` (`u_id`, `u_name`, `u_first`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES (2, 'user1', '', 'user1@phpubli.org', 'user1', '95542d9f989eacf9d9a26ea221b9fedc', 1, 0);


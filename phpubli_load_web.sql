-- Base de Donnée MySQL
-- La base doit être mise en place au préalable.
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
  `citation` varchar(255) default NULL,
  `journal` varchar(255) default NULL,
  `volume` varchar(255) default NULL,
  `pages_start` varchar(32) default NULL,
  `pages_end` varchar(32) default NULL,
  `pages_num` varchar(32) default NULL,
  `year` int(10) default NULL,
  `month` varchar(10) default NULL,
  `hal` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `doi` varchar(255) default NULL,
  `note` varchar(255) default NULL,
  `abstract` varchar(255) default NULL,
  `keywords` varchar(255) default NULL,
  `authors` varchar(255) default NULL,
  `publisher` varchar(255) default NULL,
  `groupe` varchar(32) default NULL,
  `lang` char(2) NOT NULL default 'FR',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `typedoc_id` int(10) default NULL,
  `soustypedoc_id` int(10) default NULL,
  `pages_eid` varchar(32) default NULL,
  `log` int(10) unsigned NOT NULL default '0',
  `conference_id` int(10) default NULL,
  `proceedings_id` int(10) default NULL,
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
INSERT INTO `fonction` (`fonction_id`, `fonction_libelle`) VALUES (2, 'éditeur');
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

-- INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES (1, 'grp1', 'Équipe de recherche 1');

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
INSERT INTO `language` (`iso`, `name`) VALUES ('FR', 'Français');
INSERT INTO `language` (`iso`, `name`) VALUES ('AF', 'Afrikaans');
INSERT INTO `language` (`iso`, `name`) VALUES ('AA', 'Afar');
INSERT INTO `language` (`iso`, `name`) VALUES ('AB', 'Abkhaze');
INSERT INTO `language` (`iso`, `name`) VALUES ('AK', 'Akan');
INSERT INTO `language` (`iso`, `name`) VALUES ('SQ', 'Albanais');
INSERT INTO `language` (`iso`, `name`) VALUES ('DE', 'Allemand');
INSERT INTO `language` (`iso`, `name`) VALUES ('AM', 'Amharique');
INSERT INTO `language` (`iso`, `name`) VALUES ('AR', 'Arabe');
INSERT INTO `language` (`iso`, `name`) VALUES ('AN', 'Aragonais');
INSERT INTO `language` (`iso`, `name`) VALUES ('HY', 'Arménien');
INSERT INTO `language` (`iso`, `name`) VALUES ('AS', 'Assamais');
INSERT INTO `language` (`iso`, `name`) VALUES ('AV', 'Avar');
INSERT INTO `language` (`iso`, `name`) VALUES ('AE', 'Avestique');
INSERT INTO `language` (`iso`, `name`) VALUES ('AY', 'Aymara');
INSERT INTO `language` (`iso`, `name`) VALUES ('AZ', 'Azéri');
INSERT INTO `language` (`iso`, `name`) VALUES ('BA', 'Bachkir');
INSERT INTO `language` (`iso`, `name`) VALUES ('BM', 'Bambara');
INSERT INTO `language` (`iso`, `name`) VALUES ('EU', 'Basque');
INSERT INTO `language` (`iso`, `name`) VALUES ('BN', 'Bengali');
INSERT INTO `language` (`iso`, `name`) VALUES ('BI', 'Bichlamar');
INSERT INTO `language` (`iso`, `name`) VALUES ('BE', 'Biélorusse');
INSERT INTO `language` (`iso`, `name`) VALUES ('BH', 'Bihari');
INSERT INTO `language` (`iso`, `name`) VALUES ('MY', 'Birman');
INSERT INTO `language` (`iso`, `name`) VALUES ('BS', 'Bosniaque');
INSERT INTO `language` (`iso`, `name`) VALUES ('BR', 'Breton');
INSERT INTO `language` (`iso`, `name`) VALUES ('BG', 'Bulgare');
INSERT INTO `language` (`iso`, `name`) VALUES ('CA', 'Catalan');
INSERT INTO `language` (`iso`, `name`) VALUES ('CH', 'Chamorro');
INSERT INTO `language` (`iso`, `name`) VALUES ('NY', 'Chichewa');
INSERT INTO `language` (`iso`, `name`) VALUES ('ZH', 'Chinois');
INSERT INTO `language` (`iso`, `name`) VALUES ('KO', 'Coréen');
INSERT INTO `language` (`iso`, `name`) VALUES ('KW', 'Cornique');
INSERT INTO `language` (`iso`, `name`) VALUES ('CO', 'Corse');
INSERT INTO `language` (`iso`, `name`) VALUES ('CR', 'Cree');
INSERT INTO `language` (`iso`, `name`) VALUES ('HR', 'Croate');
INSERT INTO `language` (`iso`, `name`) VALUES ('DA', 'Danois');
INSERT INTO `language` (`iso`, `name`) VALUES ('DZ', 'Dzongkha');
INSERT INTO `language` (`iso`, `name`) VALUES ('ES', 'Espagnol');
INSERT INTO `language` (`iso`, `name`) VALUES ('EO', 'Espéranto');
INSERT INTO `language` (`iso`, `name`) VALUES ('ET', 'Estonien');
INSERT INTO `language` (`iso`, `name`) VALUES ('EE', 'Éwé');
INSERT INTO `language` (`iso`, `name`) VALUES ('FO', 'Féroïen');
INSERT INTO `language` (`iso`, `name`) VALUES ('FJ', 'Fidjien');
INSERT INTO `language` (`iso`, `name`) VALUES ('FI', 'Finnois');
INSERT INTO `language` (`iso`, `name`) VALUES ('FL', 'Flamand');
INSERT INTO `language` (`iso`, `name`) VALUES ('FY', 'Frison');
INSERT INTO `language` (`iso`, `name`) VALUES ('GD', 'Gaélique');
INSERT INTO `language` (`iso`, `name`) VALUES ('GL', 'Galicien');
INSERT INTO `language` (`iso`, `name`) VALUES ('OM', 'Galla');
INSERT INTO `language` (`iso`, `name`) VALUES ('CY', 'Gallois');
INSERT INTO `language` (`iso`, `name`) VALUES ('LG', 'Ganda');
INSERT INTO `language` (`iso`, `name`) VALUES ('KA', 'Géorgien');
INSERT INTO `language` (`iso`, `name`) VALUES ('GU', 'Goudjrati');
INSERT INTO `language` (`iso`, `name`) VALUES ('EL', 'Grec');
INSERT INTO `language` (`iso`, `name`) VALUES ('KL', 'Groenlandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('GN', 'Guarani');
INSERT INTO `language` (`iso`, `name`) VALUES ('HT', 'Haïtien');
INSERT INTO `language` (`iso`, `name`) VALUES ('HA', 'Haoussa');
INSERT INTO `language` (`iso`, `name`) VALUES ('HE', 'Hébreu');
INSERT INTO `language` (`iso`, `name`) VALUES ('HZ', 'Herero');
INSERT INTO `language` (`iso`, `name`) VALUES ('HI', 'Hindi');
INSERT INTO `language` (`iso`, `name`) VALUES ('HO', 'Hiri Motu');
INSERT INTO `language` (`iso`, `name`) VALUES ('HU', 'Hongrois');
INSERT INTO `language` (`iso`, `name`) VALUES ('IO', 'Ido');
INSERT INTO `language` (`iso`, `name`) VALUES ('IG', 'Igbo');
INSERT INTO `language` (`iso`, `name`) VALUES ('ID', 'Indonésien');
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
INSERT INTO `language` (`iso`, `name`) VALUES ('MK', 'Macédonien');
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
INSERT INTO `language` (`iso`, `name`) VALUES ('ND', 'Ndébélé du Sud');
INSERT INTO `language` (`iso`, `name`) VALUES ('NG', 'Ndonga');
INSERT INTO `language` (`iso`, `name`) VALUES ('NL', 'Néerlandais');
INSERT INTO `language` (`iso`, `name`) VALUES ('NE', 'Népalais');
INSERT INTO `language` (`iso`, `name`) VALUES ('NO', 'Norvégien');
INSERT INTO `language` (`iso`, `name`) VALUES ('NB', 'Norvégien Bokmål');
INSERT INTO `language` (`iso`, `name`) VALUES ('NN', 'Norvégien Nynorsk');
INSERT INTO `language` (`iso`, `name`) VALUES ('OJ', 'Ojibwa');
INSERT INTO `language` (`iso`, `name`) VALUES ('OR', 'Oriya');
INSERT INTO `language` (`iso`, `name`) VALUES ('OS', 'Ossète');
INSERT INTO `language` (`iso`, `name`) VALUES ('UG', 'Ouïgour');
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
INSERT INTO `language` (`iso`, `name`) VALUES ('RM', 'Rhéto-Roman');
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
INSERT INTO `language` (`iso`, `name`) VALUES ('SL', 'Slovène');
INSERT INTO `language` (`iso`, `name`) VALUES ('SO', 'Somali');
INSERT INTO `language` (`iso`, `name`) VALUES ('ST', 'Sotho du Sud');
INSERT INTO `language` (`iso`, `name`) VALUES ('SU', 'Soundanais');
INSERT INTO `language` (`iso`, `name`) VALUES ('SV', 'Suédois');
INSERT INTO `language` (`iso`, `name`) VALUES ('SW', 'Swahili');
INSERT INTO `language` (`iso`, `name`) VALUES ('SS', 'Swati');
INSERT INTO `language` (`iso`, `name`) VALUES ('TG', 'Tadjik');
INSERT INTO `language` (`iso`, `name`) VALUES ('TL', 'Tagalog');
INSERT INTO `language` (`iso`, `name`) VALUES ('TY', 'Tahitien');
INSERT INTO `language` (`iso`, `name`) VALUES ('TA', 'Tamoul');
INSERT INTO `language` (`iso`, `name`) VALUES ('TT', 'Tatar');
INSERT INTO `language` (`iso`, `name`) VALUES ('CS', 'Tchèque');
INSERT INTO `language` (`iso`, `name`) VALUES ('CE', 'Tchétchène');
INSERT INTO `language` (`iso`, `name`) VALUES ('CV', 'Tchouvache');
INSERT INTO `language` (`iso`, `name`) VALUES ('TE', 'Télougou');
INSERT INTO `language` (`iso`, `name`) VALUES ('TH', 'Thaï');
INSERT INTO `language` (`iso`, `name`) VALUES ('BO', 'Tibétain');
INSERT INTO `language` (`iso`, `name`) VALUES ('TI', 'Tigrigna');
INSERT INTO `language` (`iso`, `name`) VALUES ('TO', 'Tongan');
INSERT INTO `language` (`iso`, `name`) VALUES ('TS', 'Tsonga');
INSERT INTO `language` (`iso`, `name`) VALUES ('TN', 'Tswana');
INSERT INTO `language` (`iso`, `name`) VALUES ('TR', 'Turc');
INSERT INTO `language` (`iso`, `name`) VALUES ('TK', 'Turkmène');
INSERT INTO `language` (`iso`, `name`) VALUES ('TW', 'Twi');
INSERT INTO `language` (`iso`, `name`) VALUES ('UK', 'Ukrainien');
INSERT INTO `language` (`iso`, `name`) VALUES ('VE', 'Venda');
INSERT INTO `language` (`iso`, `name`) VALUES ('VI', 'Vietnamien');
INSERT INTO `language` (`iso`, `name`) VALUES ('VO', 'Volapük');
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
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (6, 'these', 'thèses/hdr', 2);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (3, 'conference_proceeding', 'communications avec actes', 3);
INSERT INTO `typedoc` (`typedoc_id`, `typedoc_libelle`, `typedoc_name`, `order`) VALUES (7, 'proceedings_book', 'actes d''une conférence', 10);
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

INSERT INTO `user` (`u_id`, `u_name`, `u_first`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES (1, 'adminLitis', '', 'admin1@phpubli.org', 'admin1', '9027350bf05be72120ae27c02b7b9491', 1, 1);


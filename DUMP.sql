-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 22 Février 2013 à 13:40
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `phpubli`
--

-- --------------------------------------------------------

--
-- Structure de la table `audience`
--

CREATE TABLE `audience` (
  `id` int(4) NOT NULL DEFAULT '0',
  `libelle` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `audience`
--


-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `conference_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conference_title` varchar(255) NOT NULL DEFAULT '',
  `conference_date_start` date NOT NULL DEFAULT '0000-00-00',
  `conference_date_end` date NOT NULL DEFAULT '0000-00-00',
  `conference_city` varchar(255) NOT NULL DEFAULT '',
  `conference_country_code` char(2) NOT NULL DEFAULT '0',
  `conference_audience` int(4) NOT NULL DEFAULT '2',
  `log` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`conference_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `conference`
--


-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `iso` char(2) NOT NULL DEFAULT '',
  `name` varchar(80) NOT NULL DEFAULT '',
  `printable_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `country`
--

INSERT INTO `country` VALUES('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4);
INSERT INTO `country` VALUES('AL', 'ALBANIA', 'Albania', 'ALB', 8);
INSERT INTO `country` VALUES('DZ', 'ALGERIA', 'Algeria', 'DZA', 12);
INSERT INTO `country` VALUES('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16);
INSERT INTO `country` VALUES('AD', 'ANDORRA', 'Andorra', 'AND', 20);
INSERT INTO `country` VALUES('AO', 'ANGOLA', 'Angola', 'AGO', 24);
INSERT INTO `country` VALUES('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660);
INSERT INTO `country` VALUES('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL);
INSERT INTO `country` VALUES('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28);
INSERT INTO `country` VALUES('AR', 'ARGENTINA', 'Argentina', 'ARG', 32);
INSERT INTO `country` VALUES('AM', 'ARMENIA', 'Armenia', 'ARM', 51);
INSERT INTO `country` VALUES('AW', 'ARUBA', 'Aruba', 'ABW', 533);
INSERT INTO `country` VALUES('AU', 'AUSTRALIA', 'Australia', 'AUS', 36);
INSERT INTO `country` VALUES('AT', 'AUSTRIA', 'Austria', 'AUT', 40);
INSERT INTO `country` VALUES('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31);
INSERT INTO `country` VALUES('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44);
INSERT INTO `country` VALUES('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48);
INSERT INTO `country` VALUES('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50);
INSERT INTO `country` VALUES('BB', 'BARBADOS', 'Barbados', 'BRB', 52);
INSERT INTO `country` VALUES('BY', 'BELARUS', 'Belarus', 'BLR', 112);
INSERT INTO `country` VALUES('BE', 'BELGIUM', 'Belgium', 'BEL', 56);
INSERT INTO `country` VALUES('BZ', 'BELIZE', 'Belize', 'BLZ', 84);
INSERT INTO `country` VALUES('BJ', 'BENIN', 'Benin', 'BEN', 204);
INSERT INTO `country` VALUES('BM', 'BERMUDA', 'Bermuda', 'BMU', 60);
INSERT INTO `country` VALUES('BT', 'BHUTAN', 'Bhutan', 'BTN', 64);
INSERT INTO `country` VALUES('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68);
INSERT INTO `country` VALUES('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70);
INSERT INTO `country` VALUES('BW', 'BOTSWANA', 'Botswana', 'BWA', 72);
INSERT INTO `country` VALUES('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL);
INSERT INTO `country` VALUES('BR', 'BRAZIL', 'Brazil', 'BRA', 76);
INSERT INTO `country` VALUES('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL);
INSERT INTO `country` VALUES('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96);
INSERT INTO `country` VALUES('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100);
INSERT INTO `country` VALUES('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854);
INSERT INTO `country` VALUES('BI', 'BURUNDI', 'Burundi', 'BDI', 108);
INSERT INTO `country` VALUES('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116);
INSERT INTO `country` VALUES('CM', 'CAMEROON', 'Cameroon', 'CMR', 120);
INSERT INTO `country` VALUES('CA', 'CANADA', 'Canada', 'CAN', 124);
INSERT INTO `country` VALUES('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132);
INSERT INTO `country` VALUES('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136);
INSERT INTO `country` VALUES('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140);
INSERT INTO `country` VALUES('TD', 'CHAD', 'Chad', 'TCD', 148);
INSERT INTO `country` VALUES('CL', 'CHILE', 'Chile', 'CHL', 152);
INSERT INTO `country` VALUES('CN', 'CHINA', 'China', 'CHN', 156);
INSERT INTO `country` VALUES('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL);
INSERT INTO `country` VALUES('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL);
INSERT INTO `country` VALUES('CO', 'COLOMBIA', 'Colombia', 'COL', 170);
INSERT INTO `country` VALUES('KM', 'COMOROS', 'Comoros', 'COM', 174);
INSERT INTO `country` VALUES('CG', 'CONGO', 'Congo', 'COG', 178);
INSERT INTO `country` VALUES('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180);
INSERT INTO `country` VALUES('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184);
INSERT INTO `country` VALUES('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188);
INSERT INTO `country` VALUES('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384);
INSERT INTO `country` VALUES('HR', 'CROATIA', 'Croatia', 'HRV', 191);
INSERT INTO `country` VALUES('CU', 'CUBA', 'Cuba', 'CUB', 192);
INSERT INTO `country` VALUES('CY', 'CYPRUS', 'Cyprus', 'CYP', 196);
INSERT INTO `country` VALUES('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203);
INSERT INTO `country` VALUES('DK', 'DENMARK', 'Denmark', 'DNK', 208);
INSERT INTO `country` VALUES('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262);
INSERT INTO `country` VALUES('DM', 'DOMINICA', 'Dominica', 'DMA', 212);
INSERT INTO `country` VALUES('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214);
INSERT INTO `country` VALUES('EC', 'ECUADOR', 'Ecuador', 'ECU', 218);
INSERT INTO `country` VALUES('EG', 'EGYPT', 'Egypt', 'EGY', 818);
INSERT INTO `country` VALUES('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222);
INSERT INTO `country` VALUES('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226);
INSERT INTO `country` VALUES('ER', 'ERITREA', 'Eritrea', 'ERI', 232);
INSERT INTO `country` VALUES('EE', 'ESTONIA', 'Estonia', 'EST', 233);
INSERT INTO `country` VALUES('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231);
INSERT INTO `country` VALUES('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238);
INSERT INTO `country` VALUES('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234);
INSERT INTO `country` VALUES('FJ', 'FIJI', 'Fiji', 'FJI', 242);
INSERT INTO `country` VALUES('FI', 'FINLAND', 'Finland', 'FIN', 246);
INSERT INTO `country` VALUES('FR', 'FRANCE', 'France', 'FRA', 250);
INSERT INTO `country` VALUES('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254);
INSERT INTO `country` VALUES('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258);
INSERT INTO `country` VALUES('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL);
INSERT INTO `country` VALUES('GA', 'GABON', 'Gabon', 'GAB', 266);
INSERT INTO `country` VALUES('GM', 'GAMBIA', 'Gambia', 'GMB', 270);
INSERT INTO `country` VALUES('GE', 'GEORGIA', 'Georgia', 'GEO', 268);
INSERT INTO `country` VALUES('DE', 'GERMANY', 'Germany', 'DEU', 276);
INSERT INTO `country` VALUES('GH', 'GHANA', 'Ghana', 'GHA', 288);
INSERT INTO `country` VALUES('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292);
INSERT INTO `country` VALUES('GR', 'GREECE', 'Greece', 'GRC', 300);
INSERT INTO `country` VALUES('GL', 'GREENLAND', 'Greenland', 'GRL', 304);
INSERT INTO `country` VALUES('GD', 'GRENADA', 'Grenada', 'GRD', 308);
INSERT INTO `country` VALUES('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312);
INSERT INTO `country` VALUES('GU', 'GUAM', 'Guam', 'GUM', 316);
INSERT INTO `country` VALUES('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320);
INSERT INTO `country` VALUES('GN', 'GUINEA', 'Guinea', 'GIN', 324);
INSERT INTO `country` VALUES('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624);
INSERT INTO `country` VALUES('GY', 'GUYANA', 'Guyana', 'GUY', 328);
INSERT INTO `country` VALUES('HT', 'HAITI', 'Haiti', 'HTI', 332);
INSERT INTO `country` VALUES('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL);
INSERT INTO `country` VALUES('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336);
INSERT INTO `country` VALUES('HN', 'HONDURAS', 'Honduras', 'HND', 340);
INSERT INTO `country` VALUES('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344);
INSERT INTO `country` VALUES('HU', 'HUNGARY', 'Hungary', 'HUN', 348);
INSERT INTO `country` VALUES('IS', 'ICELAND', 'Iceland', 'ISL', 352);
INSERT INTO `country` VALUES('IN', 'INDIA', 'India', 'IND', 356);
INSERT INTO `country` VALUES('ID', 'INDONESIA', 'Indonesia', 'IDN', 360);
INSERT INTO `country` VALUES('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364);
INSERT INTO `country` VALUES('IQ', 'IRAQ', 'Iraq', 'IRQ', 368);
INSERT INTO `country` VALUES('IE', 'IRELAND', 'Ireland', 'IRL', 372);
INSERT INTO `country` VALUES('IL', 'ISRAEL', 'Israel', 'ISR', 376);
INSERT INTO `country` VALUES('IT', 'ITALY', 'Italy', 'ITA', 380);
INSERT INTO `country` VALUES('JM', 'JAMAICA', 'Jamaica', 'JAM', 388);
INSERT INTO `country` VALUES('JP', 'JAPAN', 'Japan', 'JPN', 392);
INSERT INTO `country` VALUES('JO', 'JORDAN', 'Jordan', 'JOR', 400);
INSERT INTO `country` VALUES('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398);
INSERT INTO `country` VALUES('KE', 'KENYA', 'Kenya', 'KEN', 404);
INSERT INTO `country` VALUES('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296);
INSERT INTO `country` VALUES('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408);
INSERT INTO `country` VALUES('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410);
INSERT INTO `country` VALUES('KW', 'KUWAIT', 'Kuwait', 'KWT', 414);
INSERT INTO `country` VALUES('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417);
INSERT INTO `country` VALUES('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418);
INSERT INTO `country` VALUES('LV', 'LATVIA', 'Latvia', 'LVA', 428);
INSERT INTO `country` VALUES('LB', 'LEBANON', 'Lebanon', 'LBN', 422);
INSERT INTO `country` VALUES('LS', 'LESOTHO', 'Lesotho', 'LSO', 426);
INSERT INTO `country` VALUES('LR', 'LIBERIA', 'Liberia', 'LBR', 430);
INSERT INTO `country` VALUES('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434);
INSERT INTO `country` VALUES('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438);
INSERT INTO `country` VALUES('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440);
INSERT INTO `country` VALUES('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442);
INSERT INTO `country` VALUES('MO', 'MACAO', 'Macao', 'MAC', 446);
INSERT INTO `country` VALUES('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807);
INSERT INTO `country` VALUES('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450);
INSERT INTO `country` VALUES('MW', 'MALAWI', 'Malawi', 'MWI', 454);
INSERT INTO `country` VALUES('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458);
INSERT INTO `country` VALUES('MV', 'MALDIVES', 'Maldives', 'MDV', 462);
INSERT INTO `country` VALUES('ML', 'MALI', 'Mali', 'MLI', 466);
INSERT INTO `country` VALUES('MT', 'MALTA', 'Malta', 'MLT', 470);
INSERT INTO `country` VALUES('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584);
INSERT INTO `country` VALUES('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474);
INSERT INTO `country` VALUES('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478);
INSERT INTO `country` VALUES('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480);
INSERT INTO `country` VALUES('YT', 'MAYOTTE', 'Mayotte', NULL, NULL);
INSERT INTO `country` VALUES('MX', 'MEXICO', 'Mexico', 'MEX', 484);
INSERT INTO `country` VALUES('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583);
INSERT INTO `country` VALUES('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498);
INSERT INTO `country` VALUES('MC', 'MONACO', 'Monaco', 'MCO', 492);
INSERT INTO `country` VALUES('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496);
INSERT INTO `country` VALUES('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500);
INSERT INTO `country` VALUES('MA', 'MOROCCO', 'Morocco', 'MAR', 504);
INSERT INTO `country` VALUES('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508);
INSERT INTO `country` VALUES('MM', 'MYANMAR', 'Myanmar', 'MMR', 104);
INSERT INTO `country` VALUES('NA', 'NAMIBIA', 'Namibia', 'NAM', 516);
INSERT INTO `country` VALUES('NR', 'NAURU', 'Nauru', 'NRU', 520);
INSERT INTO `country` VALUES('NP', 'NEPAL', 'Nepal', 'NPL', 524);
INSERT INTO `country` VALUES('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528);
INSERT INTO `country` VALUES('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530);
INSERT INTO `country` VALUES('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540);
INSERT INTO `country` VALUES('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554);
INSERT INTO `country` VALUES('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558);
INSERT INTO `country` VALUES('NE', 'NIGER', 'Niger', 'NER', 562);
INSERT INTO `country` VALUES('NG', 'NIGERIA', 'Nigeria', 'NGA', 566);
INSERT INTO `country` VALUES('NU', 'NIUE', 'Niue', 'NIU', 570);
INSERT INTO `country` VALUES('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574);
INSERT INTO `country` VALUES('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580);
INSERT INTO `country` VALUES('NO', 'NORWAY', 'Norway', 'NOR', 578);
INSERT INTO `country` VALUES('OM', 'OMAN', 'Oman', 'OMN', 512);
INSERT INTO `country` VALUES('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586);
INSERT INTO `country` VALUES('PW', 'PALAU', 'Palau', 'PLW', 585);
INSERT INTO `country` VALUES('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL);
INSERT INTO `country` VALUES('PA', 'PANAMA', 'Panama', 'PAN', 591);
INSERT INTO `country` VALUES('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598);
INSERT INTO `country` VALUES('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600);
INSERT INTO `country` VALUES('PE', 'PERU', 'Peru', 'PER', 604);
INSERT INTO `country` VALUES('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608);
INSERT INTO `country` VALUES('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612);
INSERT INTO `country` VALUES('PL', 'POLAND', 'Poland', 'POL', 616);
INSERT INTO `country` VALUES('PT', 'PORTUGAL', 'Portugal', 'PRT', 620);
INSERT INTO `country` VALUES('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630);
INSERT INTO `country` VALUES('QA', 'QATAR', 'Qatar', 'QAT', 634);
INSERT INTO `country` VALUES('RE', 'REUNION', 'Reunion', 'REU', 638);
INSERT INTO `country` VALUES('RO', 'ROMANIA', 'Romania', 'ROM', 642);
INSERT INTO `country` VALUES('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643);
INSERT INTO `country` VALUES('RW', 'RWANDA', 'Rwanda', 'RWA', 646);
INSERT INTO `country` VALUES('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654);
INSERT INTO `country` VALUES('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659);
INSERT INTO `country` VALUES('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662);
INSERT INTO `country` VALUES('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666);
INSERT INTO `country` VALUES('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670);
INSERT INTO `country` VALUES('WS', 'SAMOA', 'Samoa', 'WSM', 882);
INSERT INTO `country` VALUES('SM', 'SAN MARINO', 'San Marino', 'SMR', 674);
INSERT INTO `country` VALUES('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678);
INSERT INTO `country` VALUES('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682);
INSERT INTO `country` VALUES('SN', 'SENEGAL', 'Senegal', 'SEN', 686);
INSERT INTO `country` VALUES('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL);
INSERT INTO `country` VALUES('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690);
INSERT INTO `country` VALUES('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694);
INSERT INTO `country` VALUES('SG', 'SINGAPORE', 'Singapore', 'SGP', 702);
INSERT INTO `country` VALUES('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703);
INSERT INTO `country` VALUES('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705);
INSERT INTO `country` VALUES('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90);
INSERT INTO `country` VALUES('SO', 'SOMALIA', 'Somalia', 'SOM', 706);
INSERT INTO `country` VALUES('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710);
INSERT INTO `country` VALUES('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL);
INSERT INTO `country` VALUES('ES', 'SPAIN', 'Spain', 'ESP', 724);
INSERT INTO `country` VALUES('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144);
INSERT INTO `country` VALUES('SD', 'SUDAN', 'Sudan', 'SDN', 736);
INSERT INTO `country` VALUES('SR', 'SURINAME', 'Suriname', 'SUR', 740);
INSERT INTO `country` VALUES('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744);
INSERT INTO `country` VALUES('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748);
INSERT INTO `country` VALUES('SE', 'SWEDEN', 'Sweden', 'SWE', 752);
INSERT INTO `country` VALUES('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756);
INSERT INTO `country` VALUES('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760);
INSERT INTO `country` VALUES('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158);
INSERT INTO `country` VALUES('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762);
INSERT INTO `country` VALUES('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834);
INSERT INTO `country` VALUES('TH', 'THAILAND', 'Thailand', 'THA', 764);
INSERT INTO `country` VALUES('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL);
INSERT INTO `country` VALUES('TG', 'TOGO', 'Togo', 'TGO', 768);
INSERT INTO `country` VALUES('TK', 'TOKELAU', 'Tokelau', 'TKL', 772);
INSERT INTO `country` VALUES('TO', 'TONGA', 'Tonga', 'TON', 776);
INSERT INTO `country` VALUES('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780);
INSERT INTO `country` VALUES('TN', 'TUNISIA', 'Tunisia', 'TUN', 788);
INSERT INTO `country` VALUES('TR', 'TURKEY', 'Turkey', 'TUR', 792);
INSERT INTO `country` VALUES('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795);
INSERT INTO `country` VALUES('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796);
INSERT INTO `country` VALUES('TV', 'TUVALU', 'Tuvalu', 'TUV', 798);
INSERT INTO `country` VALUES('UG', 'UGANDA', 'Uganda', 'UGA', 800);
INSERT INTO `country` VALUES('UA', 'UKRAINE', 'Ukraine', 'UKR', 804);
INSERT INTO `country` VALUES('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784);
INSERT INTO `country` VALUES('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826);
INSERT INTO `country` VALUES('US', 'UNITED STATES', 'United States', 'USA', 840);
INSERT INTO `country` VALUES('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL);
INSERT INTO `country` VALUES('UY', 'URUGUAY', 'Uruguay', 'URY', 858);
INSERT INTO `country` VALUES('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860);
INSERT INTO `country` VALUES('VU', 'VANUATU', 'Vanuatu', 'VUT', 548);
INSERT INTO `country` VALUES('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862);
INSERT INTO `country` VALUES('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704);
INSERT INTO `country` VALUES('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92);
INSERT INTO `country` VALUES('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850);
INSERT INTO `country` VALUES('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876);
INSERT INTO `country` VALUES('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732);
INSERT INTO `country` VALUES('YE', 'YEMEN', 'Yemen', 'YEM', 887);
INSERT INTO `country` VALUES('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894);
INSERT INTO `country` VALUES('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `doc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `citation` varchar(255) DEFAULT NULL,
  `journal` varchar(255) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `pages_start` varchar(32) DEFAULT NULL,
  `pages_end` varchar(32) DEFAULT NULL,
  `pages_num` varchar(32) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `hal` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `abstract` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `authors` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `groupe` varchar(32) DEFAULT NULL,
  `lang` char(2) NOT NULL DEFAULT 'FR',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typedoc_id` int(10) DEFAULT NULL,
  `soustypedoc_id` int(10) DEFAULT NULL,
  `pages_eid` varchar(32) DEFAULT NULL,
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `conference_id` int(10) DEFAULT NULL,
  `proceedings_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` VALUES(1, 'fzefzefzef', '', '', '', '', '', '', 0, '', '', '', '', ' ezfzef', '', '', '', '', '', 'EN', '2013-02-21 19:41:17', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(2, 'zadza', 'zadaz', '', '', '', '', 'dazdaz', 0, '', '', 'dzadzad', '', ' azdzadaz', '', 'azd', '', '', '', 'EN', '2013-02-21 19:42:44', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(3, 'ezfzefezezf', '', '', '', '', '', '', 0, 'Mai', '', 'zefez', '', ' ezfezfez', '', 'zef', '', '', '', 'EN', '2013-02-21 19:44:48', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(4, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', '', '', '', '', '', 'EN', '2013-02-21 19:50:49', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(5, 'Titre', 'Citation', 'Journal', 'Volume', '1', '2', '2', 2013, 'Janvier', 'IdHal', 'Mon Url', 'Mon Doi', 'mon abstract ', '', 'mes mots clés', '', '', '', 'EN', '2013-02-21 20:32:01', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(7, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:06:05', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(8, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:06:42', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(9, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:07:08', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(10, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:08:26', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(11, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:09:00', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(12, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:09:56', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(13, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:10:32', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(14, 'rrr', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:12:08', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(15, 'ffff', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:14:24', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(16, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:14:38', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(17, 'ffff', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:15:12', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(18, 'toto', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:18:57', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(19, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:19:23', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(20, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:23:50', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(21, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:25:53', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(22, 'zfezfezfzef', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'fezfezfez', 'ezfezfezf', '', '', '', '', 'EN', '2013-02-21 21:27:47', 4, 0, '', 1, 0, 0);
INSERT INTO `document` VALUES(23, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:30:19', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(24, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:31:25', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(25, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' dddd', '', '', '', '', 'EN', '2013-02-21 21:32:07', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(26, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:32:50', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(27, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', ' ', ' ', '', '', '', '', 'EN', '2013-02-21 21:33:21', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(28, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 21:35:14', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(29, '      ', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'ffff', '        ffff', '', '', '', '', 'EN', '2013-02-21 21:36:09', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(30, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 21:38:55', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(31, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 21:39:50', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(32, 'fezf', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'f', 'f', '', '', '', '', 'EN', '2013-02-21 21:50:28', 4, 0, '', 1, 0, 0);
INSERT INTO `document` VALUES(33, 'vefef', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '  fe', 'ffff', '', '', '', '', 'EN', '2013-02-21 21:43:51', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(34, 'monartic', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', 'ezfzef', '', '', '', '', 'EN', '2013-02-21 21:46:14', 4, 0, '', 1, 0, 0);
INSERT INTO `document` VALUES(35, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', 'fff', '', '', '', '', 'EN', '2013-02-21 21:46:25', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(36, 'fezf', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', 'f', '', '', '', '', 'EN', '2013-02-21 21:48:36', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(37, '   fefe', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '   f', '   f', '', '', '', '', 'EN', '2013-02-21 21:50:00', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(38, 'efefe', '', '', '', 'ef', 'ef', 'efzfez', 2013, 'Janvier', '', '', '', 'efefef', 'fefefe', '', '', '', '', 'EN', '2013-02-21 22:06:17', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(39, 'efef', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'efef', 'fefe', '', '', '', '', 'EN', '2013-02-21 22:06:46', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(40, 'fefe', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'ef', 'ef', '', '', '', '', 'EN', '2013-02-21 22:07:07', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(41, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 22:11:54', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(42, 'eze', '', '', '', 'ze', 'ze', 'ze', 2013, 'Janvier', '', '', '', 'zez', 'zeze', '', '', '', '', 'EN', '2013-02-21 22:13:44', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(43, 'g', '', '', '', 'g', 'g', 'g', 2013, 'Janvier', '', '', '', 'g', 'g', 'g', '', '', '', 'EN', '2013-02-21 22:14:08', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(44, 'ZE', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'EZ', '', '', '', '', '', 'EN', '2013-02-21 22:16:56', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(45, '', '', '', '', '1', '1', '1', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 22:18:50', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(46, 'fefe', '', '', '', '1', '11', '1', 2013, 'Janvier', '', '', '', 'f', 'f', '', '', '', '', 'EN', '2013-02-21 22:19:23', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(47, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 22:19:42', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(48, '', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 22:20:05', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(49, 'd', '', '', '', '', '', '', 2013, 'Janvier', '', '', '', 'e', 'e', '', '', '', '', 'EN', '2013-02-21 22:22:59', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(50, '1', '', '', '', 's', 's', 's', 2013, 'Janvier', '', '', '', '', '', '', '', '', '', 'EN', '2013-02-21 22:31:22', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(51, 'zdzadza', '', '', '', '11', '1', '1', 2013, 'Janvier', '', '', '', 'zadaz', 'zadzazad', '', '', '', '', 'EN', '2013-02-21 22:37:26', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(52, 'Intervalle des joints dans une salle de bain', 'to be or not to be eh ouai', 'figaro', '1', '1', '2', '2', 2013, 'Janvier', 'J\\''en ai pas', 'J\\''en ai pas', 'J\\''en ai pas', 'Bah la normalement j\\\\\\''ecrit des notes quoi', 'Bah la normalement j\\\\\\''ecrit mon abstrait quoi, il doit etre un peu plus long', 'Chevre, baleine, foot, basket', '', '', '', 'EN', '2013-02-22 00:43:22', 4, 0, '', 1, 0, 0);
INSERT INTO `document` VALUES(53, '{To my peers. Granular Gas \\\\', '', 'Poudres \\\\', '21', '', '', '', 2013, 'January', 'hal-00770905', 'http://hal.archives-ouvertes.fr/hal-00770905', '', 'poudres \\\\', '{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco', '', 'Evesque, Pierre', '', '', 'An', '0000-00-00 00:00:00', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(54, '{To my peers. Granular Gas \\\\', '', 'Poudres \\\\', '21', '', '', '', 2013, 'January', 'hal-00770905', 'http://hal.archives-ouvertes.fr/hal-00770905', '', 'poudres \\\\', '{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco', '', 'Evesque, Pierre', '', '', 'An', '0000-00-00 00:00:00', 4, 0, '', 0, 0, 0);
INSERT INTO `document` VALUES(55, '{To my peers. Granular Gas \\\\', '', 'Poudres \\\\', '21', '', '', '', 2013, 'January', 'hal-00770905', 'http://hal.archives-ouvertes.fr/hal-00770905', '', 'poudres \\\\', '{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco', '', 'Evesque, Pierre', '', '', 'An', '0000-00-00 00:00:00', 4, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `flags`
--

CREATE TABLE `flags` (
  `name` varchar(255) DEFAULT NULL,
  `value` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `flags`
--

INSERT INTO `flags` VALUES('readonly', 0);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `fonction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fonction_libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fonction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` VALUES(1, 'auteur');
INSERT INTO `fonction` VALUES(2, '?diteur');
INSERT INTO `fonction` VALUES(3, 'directeur');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `g_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_name` varchar(16) NOT NULL DEFAULT '',
  `g_fullname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `groupes`
--


-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL DEFAULT '0',
  `g_id` varchar(32) DEFAULT NULL,
  `table_id` int(10) unsigned DEFAULT NULL,
  `item_id` int(10) unsigned DEFAULT NULL,
  `action` varchar(32) NOT NULL DEFAULT '',
  `entry_old` text,
  `entry_new` text,
  `date_entry` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_checked` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` VALUES(1, 1, '1', 3, 1, 'insert', '', 'doc_id="1" title="fzefzefzef" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="0" month="" hal="" url="" doi="" note=" ezfzef" abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:41:17" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 19:41:17', NULL);
INSERT INTO `history` VALUES(2, 1, '1', 3, 2, 'insert', '', 'doc_id="2" title="zadza" citation="zadaz" journal="" volume="" pages_start="" pages_end="" pages_num="dazdaz" year="0" month="" hal="" url="dzadzad" doi="" note=" azdzadaz" abstract="" keywords="azd" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:42:44" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 19:42:44', NULL);
INSERT INTO `history` VALUES(3, 1, '1', 3, 3, 'insert', '', 'doc_id="3" title="ezfzefezezf" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="0" month="Mai" hal="" url="zefez" doi="" note=" ezfezfez" abstract="" keywords="zef" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:44:48" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 19:44:48', NULL);
INSERT INTO `history` VALUES(4, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 19:50:49', NULL);
INSERT INTO `history` VALUES(5, 1, '1', 3, 5, 'insert', '', 'doc_id="5" title="Titre" citation="Citation" journal="Journal" volume="Volume" pages_start="1" pages_end="2" pages_num="2" year="2013" month="Janvier" hal="IdHal" url="Mon Url" doi="Mon Doi" note="mon abstract " abstract="" keywords="mes mots clés" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 20:32:01" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 20:32:01', NULL);
INSERT INTO `history` VALUES(6, 1, '1', 3, 6, 'insert', '', 'doc_id="6" title="Mon deuxième titre" citation="Mon deuxième titre" journal="Mon deuxième titre" volume="Mon deuxième titre" pages_start="Mon deuxième titre" pages_end="Mon deuxième titre" pages_num="Mon deuxième titre" year="2013" month="Janvier" hal="Mon deuxième titre" url="Mon deuxième titre" doi="Mon deuxième titre" note="Mon deuxième titre note " abstract="Mon deuxième titre abs " keywords="Mon deuxième titre" authors="" publisher="" groupe="" lang="FR" date="2013-02-21 20:41:46" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 20:41:46', NULL);
INSERT INTO `history` VALUES(7, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:06:05', NULL);
INSERT INTO `history` VALUES(8, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:06:42', NULL);
INSERT INTO `history` VALUES(9, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:07:08', NULL);
INSERT INTO `history` VALUES(10, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:08:26', NULL);
INSERT INTO `history` VALUES(11, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:09:00', NULL);
INSERT INTO `history` VALUES(12, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:09:56', NULL);
INSERT INTO `history` VALUES(13, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:10:32', NULL);
INSERT INTO `history` VALUES(14, 1, '1', 3, 14, 'insert', '', 'doc_id="14" title="rrr" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract=" " keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:12:08" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:12:08', NULL);
INSERT INTO `history` VALUES(15, 1, '1', 3, 15, 'insert', '', 'doc_id="15" title="ffff" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract=" " keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:14:24" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:14:24', NULL);
INSERT INTO `history` VALUES(16, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:14:38', NULL);
INSERT INTO `history` VALUES(17, 1, '1', 3, 15, 'insert', '', 'doc_id="15" title="ffff" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract=" " keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:14:24" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:15:12', NULL);
INSERT INTO `history` VALUES(18, 1, '1', 3, 18, 'insert', '', 'doc_id="18" title="toto" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract=" " keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:18:57" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:18:57', NULL);
INSERT INTO `history` VALUES(19, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:19:23', NULL);
INSERT INTO `history` VALUES(20, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:23:50', NULL);
INSERT INTO `history` VALUES(21, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:25:53', NULL);
INSERT INTO `history` VALUES(22, 1, '1', 3, 22, 'insert', '', 'doc_id="22" title="rgrgrgrg" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" rgrgrgrg" abstract="toto" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:27:18" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:27:18', NULL);
INSERT INTO `history` VALUES(23, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:30:19', NULL);
INSERT INTO `history` VALUES(24, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:31:25', NULL);
INSERT INTO `history` VALUES(25, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:32:07', NULL);
INSERT INTO `history` VALUES(26, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:32:50', NULL);
INSERT INTO `history` VALUES(27, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:33:21', NULL);
INSERT INTO `history` VALUES(28, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:35:14', NULL);
INSERT INTO `history` VALUES(29, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:36:09', NULL);
INSERT INTO `history` VALUES(30, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:38:55', NULL);
INSERT INTO `history` VALUES(31, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:39:50', NULL);
INSERT INTO `history` VALUES(32, 1, '1', 3, 32, 'insert', '', 'doc_id="32" title="   fefe" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="   feef" abstract="   fe" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:41:23" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:41:23', NULL);
INSERT INTO `history` VALUES(33, 1, '1', 3, 33, 'insert', '', 'doc_id="33" title="vefef" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="  fe" abstract="ffff" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:43:51" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:43:51', NULL);
INSERT INTO `history` VALUES(34, 1, '1', 3, 34, 'insert', '', 'doc_id="34" title="monartic" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="" abstract="ezfzef" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:45:42" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:45:42', NULL);
INSERT INTO `history` VALUES(35, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:46:25', NULL);
INSERT INTO `history` VALUES(36, 1, '1', 3, 36, 'insert', '', 'doc_id="36" title="fezf" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="" abstract="f" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:48:36" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:48:36', NULL);
INSERT INTO `history` VALUES(37, 1, '1', 3, 32, 'insert', '', 'doc_id="32" title="   fefe" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="   feef" abstract="   fe" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 21:41:23" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 21:50:00', NULL);
INSERT INTO `history` VALUES(38, 1, '1', 3, 38, 'insert', '', 'doc_id="38" title="efefe" citation="" journal="" volume="" pages_start="ef" pages_end="ef" pages_num="efzfez" year="2013" month="Janvier" hal="" url="" doi="" note="efefef" abstract="fefefe" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:06:17" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:06:17', NULL);
INSERT INTO `history` VALUES(39, 1, '1', 3, 39, 'insert', '', 'doc_id="39" title="efef" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="efef" abstract="fefe" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:06:46" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:06:46', NULL);
INSERT INTO `history` VALUES(40, 1, '1', 3, 40, 'insert', '', 'doc_id="40" title="fefe" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="ef" abstract="ef" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:07:07" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:07:07', NULL);
INSERT INTO `history` VALUES(41, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:11:54', NULL);
INSERT INTO `history` VALUES(42, 1, '1', 3, 42, 'insert', '', 'doc_id="42" title="eze" citation="" journal="" volume="" pages_start="ze" pages_end="ze" pages_num="ze" year="2013" month="Janvier" hal="" url="" doi="" note="zez" abstract="zeze" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:13:44" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:13:44', NULL);
INSERT INTO `history` VALUES(43, 1, '1', 3, 43, 'insert', '', 'doc_id="43" title="g" citation="" journal="" volume="" pages_start="g" pages_end="g" pages_num="g" year="2013" month="Janvier" hal="" url="" doi="" note="g" abstract="g" keywords="g" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:14:08" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:14:08', NULL);
INSERT INTO `history` VALUES(44, 1, '1', 3, 44, 'insert', '', 'doc_id="44" title="ZE" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="EZ" abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:16:56" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:16:56', NULL);
INSERT INTO `history` VALUES(45, 1, '1', 3, 45, 'insert', '', 'doc_id="45" title="" citation="" journal="" volume="" pages_start="1" pages_end="1" pages_num="1" year="2013" month="Janvier" hal="" url="" doi="" note="" abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:18:50" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:18:50', NULL);
INSERT INTO `history` VALUES(46, 1, '1', 3, 46, 'insert', '', 'doc_id="46" title="fefe" citation="" journal="" volume="" pages_start="1" pages_end="11" pages_num="1" year="2013" month="Janvier" hal="" url="" doi="" note="f" abstract="f" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:19:23" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:19:23', NULL);
INSERT INTO `history` VALUES(47, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:19:42', NULL);
INSERT INTO `history` VALUES(48, 1, '1', 3, 4, 'insert', '', 'doc_id="4" title="" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note=" " abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 19:50:49" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:20:05', NULL);
INSERT INTO `history` VALUES(49, 1, '1', 3, 49, 'insert', '', 'doc_id="49" title="d" citation="" journal="" volume="" pages_start="" pages_end="" pages_num="" year="2013" month="Janvier" hal="" url="" doi="" note="e" abstract="e" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:22:59" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:22:59', NULL);
INSERT INTO `history` VALUES(50, 1, '1', 3, 50, 'insert', '', 'doc_id="50" title="1" citation="" journal="" volume="" pages_start="s" pages_end="s" pages_num="s" year="2013" month="Janvier" hal="" url="" doi="" note="" abstract="" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:31:22" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:31:22', NULL);
INSERT INTO `history` VALUES(51, 1, '1', 3, 51, 'insert', '', 'doc_id="51" title="zdzadza" citation="" journal="" volume="" pages_start="11" pages_end="1" pages_num="1" year="2013" month="Janvier" hal="" url="" doi="" note="zadaz" abstract="zadzazad" keywords="" authors="" publisher="" groupe="" lang="EN" date="2013-02-21 22:37:26" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-21 22:37:26', NULL);
INSERT INTO `history` VALUES(52, 1, NULL, NULL, NULL, 'login', NULL, NULL, '2013-02-21 23:44:09', NULL);
INSERT INTO `history` VALUES(53, 1, '1', 3, 52, 'insert', '', 'doc_id="52" title="Intervalle des joints dans une salle de bain" citation="to be or not to be" journal="figaro" volume="1" pages_start="1" pages_end="2" pages_num="2" year="2013" month="Janvier" hal="J\\''en ai pas" url="J\\''en ai pas" doi="J\\''en ai pas" note="Bah la normalement j\\''ecrit des notes quoi" abstract="Bah la normalement j\\''ecrit mon abstrait quoi, il doit etre un peu plus long" keywords="Chevre, baleine, foot, basket" authors="" publisher="" groupe="" lang="EN" date="2013-02-22 00:23:47" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-22 00:23:47', NULL);
INSERT INTO `history` VALUES(54, 1, '1', 3, 53, 'insert', '', 'doc_id="53" title="{To my peers. Granular Gas \\\\" citation="" journal="Poudres \\\\" volume="21" pages_start="" pages_end="" pages_num="" year="2013" month="January" hal="hal-00770905" url="http://hal.archives-ouvertes.fr/hal-00770905" doi="" note="poudres \\\\" abstract="{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco" keywords="" authors="Evesque, Pierre" publisher="" groupe="" lang="An" date="0000-00-00 00:00:00" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-22 00:40:49', NULL);
INSERT INTO `history` VALUES(55, 1, NULL, NULL, NULL, 'logout', NULL, NULL, '2013-02-22 00:43:43', NULL);
INSERT INTO `history` VALUES(56, 1, NULL, NULL, NULL, 'login', NULL, NULL, '2013-02-22 00:45:44', NULL);
INSERT INTO `history` VALUES(57, 1, '1', 3, 53, 'insert', '', 'doc_id="53" title="{To my peers. Granular Gas \\\\" citation="" journal="Poudres \\\\" volume="21" pages_start="" pages_end="" pages_num="" year="2013" month="January" hal="hal-00770905" url="http://hal.archives-ouvertes.fr/hal-00770905" doi="" note="poudres \\\\" abstract="{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco" keywords="" authors="Evesque, Pierre" publisher="" groupe="" lang="An" date="0000-00-00 00:00:00" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-22 00:48:21', NULL);
INSERT INTO `history` VALUES(58, 1, '1', 3, 53, 'insert', '', 'doc_id="53" title="{To my peers. Granular Gas \\\\" citation="" journal="Poudres \\\\" volume="21" pages_start="" pages_end="" pages_num="" year="2013" month="January" hal="hal-00770905" url="http://hal.archives-ouvertes.fr/hal-00770905" doi="" note="poudres \\\\" abstract="{This paper explains within simple arguments why the physics of granular gas has to be understood in a new way, different to the one proposed by P. Haff, and able to describe the energy delivered to it and dissipated by it. This requires to take into acco" keywords="" authors="Evesque, Pierre" publisher="" groupe="" lang="An" date="0000-00-00 00:00:00" typedoc_id="4" soustypedoc_id="0" pages_eid="" log="0" conference_id="0" proceedings_id="0" ', '2013-02-22 00:51:25', NULL);
INSERT INTO `history` VALUES(59, 1, NULL, NULL, NULL, 'login', NULL, NULL, '2013-02-22 11:43:06', NULL);
INSERT INTO `history` VALUES(60, 1, NULL, NULL, NULL, 'logout', NULL, NULL, '2013-02-22 11:50:00', NULL);
INSERT INTO `history` VALUES(61, 1, NULL, NULL, NULL, 'login', NULL, NULL, '2013-02-22 13:24:46', NULL);
INSERT INTO `history` VALUES(62, 1, '1', 3, 0, 'insert', '', '', '2013-02-22 13:39:21', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `institution`
--

CREATE TABLE `institution` (
  `institution_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(255) NOT NULL DEFAULT '',
  `institution_short` varchar(32) NOT NULL DEFAULT '',
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`institution_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `institution`
--


-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `journal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `journal_fullname` varchar(255) DEFAULT NULL,
  `journal_name` varchar(255) DEFAULT NULL,
  `journal_type` int(11) NOT NULL DEFAULT '0',
  `journal_audience` int(4) NOT NULL DEFAULT '2',
  `journal_peer_review` int(4) NOT NULL DEFAULT '1',
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`journal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

--
-- Contenu de la table `journal`
--


-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE `language` (
  `iso` char(2) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`iso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `language`
--

INSERT INTO `language` VALUES('EN', 'Anglais');
INSERT INTO `language` VALUES('FR', 'Fran?ais');
INSERT INTO `language` VALUES('AF', 'Afrikaans');
INSERT INTO `language` VALUES('AA', 'Afar');
INSERT INTO `language` VALUES('AB', 'Abkhaze');
INSERT INTO `language` VALUES('AK', 'Akan');
INSERT INTO `language` VALUES('SQ', 'Albanais');
INSERT INTO `language` VALUES('DE', 'Allemand');
INSERT INTO `language` VALUES('AM', 'Amharique');
INSERT INTO `language` VALUES('AR', 'Arabe');
INSERT INTO `language` VALUES('AN', 'Aragonais');
INSERT INTO `language` VALUES('HY', 'Arm?nien');
INSERT INTO `language` VALUES('AS', 'Assamais');
INSERT INTO `language` VALUES('AV', 'Avar');
INSERT INTO `language` VALUES('AE', 'Avestique');
INSERT INTO `language` VALUES('AY', 'Aymara');
INSERT INTO `language` VALUES('AZ', 'Az?ri');
INSERT INTO `language` VALUES('BA', 'Bachkir');
INSERT INTO `language` VALUES('BM', 'Bambara');
INSERT INTO `language` VALUES('EU', 'Basque');
INSERT INTO `language` VALUES('BN', 'Bengali');
INSERT INTO `language` VALUES('BI', 'Bichlamar');
INSERT INTO `language` VALUES('BE', 'Bi?lorusse');
INSERT INTO `language` VALUES('BH', 'Bihari');
INSERT INTO `language` VALUES('MY', 'Birman');
INSERT INTO `language` VALUES('BS', 'Bosniaque');
INSERT INTO `language` VALUES('BR', 'Breton');
INSERT INTO `language` VALUES('BG', 'Bulgare');
INSERT INTO `language` VALUES('CA', 'Catalan');
INSERT INTO `language` VALUES('CH', 'Chamorro');
INSERT INTO `language` VALUES('NY', 'Chichewa');
INSERT INTO `language` VALUES('ZH', 'Chinois');
INSERT INTO `language` VALUES('KO', 'Cor?en');
INSERT INTO `language` VALUES('KW', 'Cornique');
INSERT INTO `language` VALUES('CO', 'Corse');
INSERT INTO `language` VALUES('CR', 'Cree');
INSERT INTO `language` VALUES('HR', 'Croate');
INSERT INTO `language` VALUES('DA', 'Danois');
INSERT INTO `language` VALUES('DZ', 'Dzongkha');
INSERT INTO `language` VALUES('ES', 'Espagnol');
INSERT INTO `language` VALUES('EO', 'Esp?ranto');
INSERT INTO `language` VALUES('ET', 'Estonien');
INSERT INTO `language` VALUES('EE', '?w');
INSERT INTO `language` VALUES('FO', 'F?ro?en');
INSERT INTO `language` VALUES('FJ', 'Fidjien');
INSERT INTO `language` VALUES('FI', 'Finnois');
INSERT INTO `language` VALUES('FL', 'Flamand');
INSERT INTO `language` VALUES('FY', 'Frison');
INSERT INTO `language` VALUES('GD', 'Ga?lique');
INSERT INTO `language` VALUES('GL', 'Galicien');
INSERT INTO `language` VALUES('OM', 'Galla');
INSERT INTO `language` VALUES('CY', 'Gallois');
INSERT INTO `language` VALUES('LG', 'Ganda');
INSERT INTO `language` VALUES('KA', 'G?orgien');
INSERT INTO `language` VALUES('GU', 'Goudjrati');
INSERT INTO `language` VALUES('EL', 'Grec');
INSERT INTO `language` VALUES('KL', 'Groenlandais');
INSERT INTO `language` VALUES('GN', 'Guarani');
INSERT INTO `language` VALUES('HT', 'Ha?tien');
INSERT INTO `language` VALUES('HA', 'Haoussa');
INSERT INTO `language` VALUES('HE', 'H?breu');
INSERT INTO `language` VALUES('HZ', 'Herero');
INSERT INTO `language` VALUES('HI', 'Hindi');
INSERT INTO `language` VALUES('HO', 'Hiri Motu');
INSERT INTO `language` VALUES('HU', 'Hongrois');
INSERT INTO `language` VALUES('IO', 'Ido');
INSERT INTO `language` VALUES('IG', 'Igbo');
INSERT INTO `language` VALUES('ID', 'Indon?sien');
INSERT INTO `language` VALUES('IE', 'Interlingue');
INSERT INTO `language` VALUES('IU', 'Inuktitut');
INSERT INTO `language` VALUES('IK', 'Inupiaq');
INSERT INTO `language` VALUES('GA', 'Irlandais');
INSERT INTO `language` VALUES('IS', 'Islandais');
INSERT INTO `language` VALUES('IT', 'Italien');
INSERT INTO `language` VALUES('JA', 'Japonais');
INSERT INTO `language` VALUES('JV', 'Javanais');
INSERT INTO `language` VALUES('KN', 'Kannada');
INSERT INTO `language` VALUES('KR', 'Kanouri');
INSERT INTO `language` VALUES('KS', 'Kashmiri');
INSERT INTO `language` VALUES('KK', 'Kazakh');
INSERT INTO `language` VALUES('KM', 'Khmer');
INSERT INTO `language` VALUES('KI', 'Kikuyu');
INSERT INTO `language` VALUES('KY', 'Kirghize');
INSERT INTO `language` VALUES('KV', 'Kom');
INSERT INTO `language` VALUES('KG', 'Kongo');
INSERT INTO `language` VALUES('KJ', 'Kuanyama');
INSERT INTO `language` VALUES('KU', 'Kurde');
INSERT INTO `language` VALUES('LO', 'Lao');
INSERT INTO `language` VALUES('LA', 'Latin');
INSERT INTO `language` VALUES('LV', 'Letton');
INSERT INTO `language` VALUES('LI', 'Limbourgeois');
INSERT INTO `language` VALUES('LN', 'Lingala');
INSERT INTO `language` VALUES('LT', 'Lituanien');
INSERT INTO `language` VALUES('LU', 'Luba-Katanga');
INSERT INTO `language` VALUES('LB', 'Luxembourgeois');
INSERT INTO `language` VALUES('MK', 'Mac?donien');
INSERT INTO `language` VALUES('MS', 'Malais');
INSERT INTO `language` VALUES('ML', 'Malayalam');
INSERT INTO `language` VALUES('DV', 'Maldivien');
INSERT INTO `language` VALUES('MG', 'Malgache');
INSERT INTO `language` VALUES('MT', 'Maltais');
INSERT INTO `language` VALUES('GV', 'Mannois');
INSERT INTO `language` VALUES('MI', 'Maori');
INSERT INTO `language` VALUES('MR', 'Marathe');
INSERT INTO `language` VALUES('MH', 'Marshall');
INSERT INTO `language` VALUES('MO', 'Moldave');
INSERT INTO `language` VALUES('MN', 'Mongol');
INSERT INTO `language` VALUES('NA', 'Nauruan');
INSERT INTO `language` VALUES('NV', 'Navaho');
INSERT INTO `language` VALUES('ND', 'Nd?b?l? du Sud');
INSERT INTO `language` VALUES('NG', 'Ndonga');
INSERT INTO `language` VALUES('NL', 'N?erlandais');
INSERT INTO `language` VALUES('NE', 'N?palais');
INSERT INTO `language` VALUES('NO', 'Norv?gien');
INSERT INTO `language` VALUES('NB', 'Norv?gien Bokm');
INSERT INTO `language` VALUES('NN', 'Norv?gien Nynorsk');
INSERT INTO `language` VALUES('OJ', 'Ojibwa');
INSERT INTO `language` VALUES('OR', 'Oriya');
INSERT INTO `language` VALUES('OS', 'Oss?te');
INSERT INTO `language` VALUES('UG', 'Ou?gour');
INSERT INTO `language` VALUES('UR', 'Ourdou');
INSERT INTO `language` VALUES('UZ', 'Ouszbek');
INSERT INTO `language` VALUES('PS', 'Pachto');
INSERT INTO `language` VALUES('PI', 'Pali');
INSERT INTO `language` VALUES('PA', 'Pendjabi');
INSERT INTO `language` VALUES('FA', 'Persan');
INSERT INTO `language` VALUES('FF', 'Peul');
INSERT INTO `language` VALUES('PL', 'Polonais');
INSERT INTO `language` VALUES('PT', 'Portugais');
INSERT INTO `language` VALUES('QU', 'Quechua');
INSERT INTO `language` VALUES('RM', 'Rh?to-Roman');
INSERT INTO `language` VALUES('RO', 'Roumain');
INSERT INTO `language` VALUES('RN', 'Rundi');
INSERT INTO `language` VALUES('RU', 'Russe');
INSERT INTO `language` VALUES('RW', 'Rwanda');
INSERT INTO `language` VALUES('SE', 'Sami du Nord');
INSERT INTO `language` VALUES('SM', 'Samoan');
INSERT INTO `language` VALUES('SG', 'Sango');
INSERT INTO `language` VALUES('SA', 'Sanskrit');
INSERT INTO `language` VALUES('SC', 'Sarde');
INSERT INTO `language` VALUES('SR', 'Serbe');
INSERT INTO `language` VALUES('SN', 'Shona');
INSERT INTO `language` VALUES('SD', 'Sindhi');
INSERT INTO `language` VALUES('SI', 'Singhalais');
INSERT INTO `language` VALUES('SK', 'Slovaque');
INSERT INTO `language` VALUES('SL', 'Slov?ne');
INSERT INTO `language` VALUES('SO', 'Somali');
INSERT INTO `language` VALUES('ST', 'Sotho du Sud');
INSERT INTO `language` VALUES('SU', 'Soundanais');
INSERT INTO `language` VALUES('SV', 'Su?dois');
INSERT INTO `language` VALUES('SW', 'Swahili');
INSERT INTO `language` VALUES('SS', 'Swati');
INSERT INTO `language` VALUES('TG', 'Tadjik');
INSERT INTO `language` VALUES('TL', 'Tagalog');
INSERT INTO `language` VALUES('TY', 'Tahitien');
INSERT INTO `language` VALUES('TA', 'Tamoul');
INSERT INTO `language` VALUES('TT', 'Tatar');
INSERT INTO `language` VALUES('CS', 'Tch?que');
INSERT INTO `language` VALUES('CE', 'Tch?tch?ne');
INSERT INTO `language` VALUES('CV', 'Tchouvache');
INSERT INTO `language` VALUES('TE', 'T?lougou');
INSERT INTO `language` VALUES('TH', 'Tha');
INSERT INTO `language` VALUES('BO', 'Tib?tain');
INSERT INTO `language` VALUES('TI', 'Tigrigna');
INSERT INTO `language` VALUES('TO', 'Tongan');
INSERT INTO `language` VALUES('TS', 'Tsonga');
INSERT INTO `language` VALUES('TN', 'Tswana');
INSERT INTO `language` VALUES('TR', 'Turc');
INSERT INTO `language` VALUES('TK', 'Turkm?ne');
INSERT INTO `language` VALUES('TW', 'Twi');
INSERT INTO `language` VALUES('UK', 'Ukrainien');
INSERT INTO `language` VALUES('VE', 'Venda');
INSERT INTO `language` VALUES('VI', 'Vietnamien');
INSERT INTO `language` VALUES('VO', 'Volap?k');
INSERT INTO `language` VALUES('WA', 'Wallon');
INSERT INTO `language` VALUES('WO', 'Wolof');
INSERT INTO `language` VALUES('XH', 'Xhosa');
INSERT INTO `language` VALUES('II', 'Yi de Sichuan');
INSERT INTO `language` VALUES('YI', 'Yiddish');
INSERT INTO `language` VALUES('YO', 'Yoruba');
INSERT INTO `language` VALUES('ZA', 'Zhuang / Chuang');
INSERT INTO `language` VALUES('ZU', 'Zoulou');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pers_id` int(10) unsigned NOT NULL DEFAULT '0',
  `fonction_id` int(10) unsigned NOT NULL DEFAULT '0',
  `rang` int(10) unsigned NOT NULL DEFAULT '1',
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `participer`
--


-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `pers_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pers_last` varchar(255) DEFAULT NULL,
  `pers_first` varchar(255) DEFAULT NULL,
  `lab` int(4) NOT NULL DEFAULT '0',
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `personne`
--


-- --------------------------------------------------------

--
-- Structure de la table `priv`
--

CREATE TABLE `priv` (
  `priv_id` int(2) NOT NULL DEFAULT '0',
  `priv_libelle` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `priv`
--

INSERT INTO `priv` VALUES(0, 'user');
INSERT INTO `priv` VALUES(1, 'admin');
INSERT INTO `priv` VALUES(2, 'root');

-- --------------------------------------------------------

--
-- Structure de la table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(255) NOT NULL DEFAULT '',
  `publisher_address` varchar(255) NOT NULL DEFAULT '',
  `log` int(10) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`publisher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `publisher`
--


-- --------------------------------------------------------

--
-- Structure de la table `soustypedoc`
--

CREATE TABLE `soustypedoc` (
  `soustypedoc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `soustypedoc_libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`soustypedoc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soustypedoc`
--


-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`table_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `tables`
--

INSERT INTO `tables` VALUES(1, 'personne');
INSERT INTO `tables` VALUES(2, 'journal');
INSERT INTO `tables` VALUES(3, 'document');
INSERT INTO `tables` VALUES(4, 'participer');
INSERT INTO `tables` VALUES(5, 'fonction');
INSERT INTO `tables` VALUES(6, 'typedoc');
INSERT INTO `tables` VALUES(7, 'user');
INSERT INTO `tables` VALUES(8, 'history');
INSERT INTO `tables` VALUES(9, 'groupes');
INSERT INTO `tables` VALUES(10, 'publisher');
INSERT INTO `tables` VALUES(11, 'conference');

-- --------------------------------------------------------

--
-- Structure de la table `typedoc`
--

CREATE TABLE `typedoc` (
  `typedoc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `typedoc_libelle` varchar(255) DEFAULT NULL,
  `typedoc_name` varchar(255) NOT NULL DEFAULT '',
  `order` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`typedoc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typedoc`
--

INSERT INTO `typedoc` VALUES(4, 'article', 'articles', 1);
INSERT INTO `typedoc` VALUES(6, 'these', 'th?ses/hdr', 2);
INSERT INTO `typedoc` VALUES(3, 'conference_proceeding', 'communications avec actes', 3);
INSERT INTO `typedoc` VALUES(7, 'proceedings_book', 'actes d''une conf?rence', 10);
INSERT INTO `typedoc` VALUES(8, 'conference_abstract', 'communications sans actes', 4);
INSERT INTO `typedoc` VALUES(1, 'book', 'livres et ouvrages', 5);

-- --------------------------------------------------------

--
-- Structure de la table `typejournal`
--

CREATE TABLE `typejournal` (
  `typejournal_id` int(8) NOT NULL DEFAULT '0',
  `typejournal_libelle` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`typejournal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typejournal`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) DEFAULT NULL,
  `u_first` varchar(255) DEFAULT NULL,
  `u_mail` varchar(255) DEFAULT NULL,
  `u_login` varchar(32) NOT NULL DEFAULT '',
  `u_password` varchar(32) DEFAULT NULL,
  `u_groupid` int(10) unsigned NOT NULL DEFAULT '0',
  `u_status` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` VALUES(1, 'adminLitis', '', 'admin1@phpubli.org', 'admin1', '9027350bf05be72120ae27c02b7b9491', 1, 1);

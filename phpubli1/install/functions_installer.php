<?php
/*****************************************************************************
 * Copyright (C) 2007-2009 CNRS
 *
 * Author: Benoît PIER  <http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier>
 *
 * This file is part of PHPUBLI-1.0
 *
 * PHPUBLI is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the license, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *****************************************************************************/

function lhsmenu_installer($item)
{
	global $rootdir;
	print("<!-- begin lhs menu -->\n");
	print("<div id=\"lhsmenu\">\n");
	print("<ul>\n");

	print("<li><a href=\"$rootdir/install/index.php\"");
	if ($item == "") print(" class=\"active\"");
	print(">Installation de PhPubli</a></li>\n");
	print("<li>&nbsp;</li>\n");

	print("<li><a href=\"$rootdir/install/1_permissions.php\"");
	if ($item == "1") print(" class=\"active\"");
	print(">1-permissions</a></li>\n");

	print("<li><a href=\"$rootdir/install/2_create.php\"");
	if ($item == "2") print(" class=\"active\"");
	print(">2-création de la base de données</a></li>\n");

	print("<li><a href=\"$rootdir/install/3_configuration.php\"");
	if ($item == "3") print(" class=\"active\"");
	print(">3-configuration de la base de données</a></li>\n");

	print("<li><a href=\"$rootdir/install/4_initial.php\"");
	if ($item == "4") print(" class=\"active\"");
	print(">4-initialisation de la base de données</a></li>\n");

	print("<li><a href=\"$rootdir/install/5_param.php\"");
	if ($item == "5") print(" class=\"active\"");
	print(">5-paramétrage du site</a></li>\n");

	print("<li><a href=\"$rootdir/install/6_end.php\"");
	if ($item == "6") print(" class=\"active\"");
	print(">6-fin</a></li>\n");

	print("</ul>\n");
	print("</div>\n");
	print("<!-- end lhs menu -->\n");
}

?>

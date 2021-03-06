<?php
/*****************************************************************************
 * Copyright (C) 2007-2009 CNRS
 *
 * Author: Beno�t PIER  <http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier>
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

function doctype()
{
	global $PHPUBLI_VERSION;
	print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n");
}
function metadata()
{
	print("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">\n");
	//print(" <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />");

}
function csslink()
{
	global $rootdir;
	global $imagesdir;
	print("<link rel=\"shortcut icon\" href=\"$rootdir/$imagesdir/labo.ico\">\n");
	//print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$rootdir/lmfa_publi.css\">\n");
	print("<link rel=\"stylesheet/less\" href=\"$rootdir/lmfa_public.less\" type=\"text/css\">\n");
	print("<script src=\"$rootdir/less-1.3.3.min.js\"></script>\n");
	print("<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js\"></script>");
	print("<script type=\"text/javascript\" src=\"../js/bibtex_js.js\"></script>");
	print("<script type=\"text/javascript\" src=\"../js/bib.js\"></script>");
	print("<script type=\"text/javascript\" src=\"../js/verificationForm.js\"></script>");

}

function preamble()
{
	doctype();
	phpubli_copy();
	contact();
}

function head()
{
	titlebanner();
	navigationbar();
}

function footer()
{
	global $rootdir;
	print("<!-- begin footer -->\n");
	address();
	legal();
	print("<!-- end footer -->\n");
}

function lhsmenu($item)
{
	global $rootdir;
	print("<!-- begin lhs menu -->\n");
	print("<div id=\"lhsmenu\">\n");
	print("<ul>\n");

	print("<li><a href=\"$rootdir/index.php\"");
	if ($item == "") print(" class=\"active\"");
	print(">Publications</a></li>\n");
	print("<li>&nbsp;</li>\n");

	print("<li><a href=\"$rootdir/search.php\"");
	if ($item == "search") print(" class=\"active\"");
	print(">Chercher</a></li>\n");

	$selecteditems=count($_SESSION["selection_array"]);
	if ($selecteditems>0)
	{
		print("<li>&nbsp;</li>\n");
		print("<li><a href=\"$rootdir/selection.php\"");
		if ($item == "selection") print(" class=\"active\"");
		print(">S�lection: $selecteditems documents</a></li>\n");
	}

	print("<li>&nbsp;</li>\n");
	print("<li><div style=\"padding: 5px 1em 5px 1em\">Listes par ann&eacute;e&nbsp;:</div></li>\n");
	for ($year=date("Y"); $year>1999; $year--)
	{
		print("<li><a href=\"$rootdir/search.php?search=year&id=$year\">$year</a></li>\n");
	}

	print("<li>&nbsp;</li>\n");
	print("<li><a href=\"$rootdir/faq.php\"");
	if ($item == "faq") print(" class=\"active\"");
	print(">FAQ</a></li>\n");

	print("<li>&nbsp;</li>\n");
	print("<li><a href=\"$rootdir/intranet/\"");
	if ($item == "intranet") print(" class=\"restractive\"");
	else print(" class=restr");
	print(">Intranet</a></li>\n");

	print("</ul>\n");
	print("</div>\n");
	print("<!-- end lhs menu -->\n");
	
}

?>

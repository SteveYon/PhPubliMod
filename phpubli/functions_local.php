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

function contact()
{
	global $LABO;
	global $URL_WEBMASTER;
	global $ADRLABO1;
	global $ADRLABO2;
	global $ADRLABO3;
	global $ADRLABO4;
	global $ADRLABO5;
	print("<!-- ----------------------------------------------------------------------------------------- -->\n");
	print("<!-- Publications du $LABO -->\n");
	print("<!-- http://$_SERVER[SERVER_NAME]$_SERVER[PHP_SELF] -->\n");
	print("<!-- ----------------------------------------------------------------------------------------- -->\n");
	print("<!-- $LABO -->\n");
	print("<!-- $ADRLABO1 -->\n");
	print("<!-- $ADRLABO2 -->\n");
	print("<!-- $ADRLABO3  -->\n");
	print("<!-- $ADRLABO4 -->\n");
	print("<!-- $ADRLABO5 -->\n");
	print("<!-- ----------------------------------------------------------------------------------------- -->\n");
	print("<!-- WEBMASTER: $URL_WEBMASTER -->\n");
	print("<!-- ----------------------------------------------------------------------------------------- -->\n");
}

function titlebanner()
{
	global $LABO;
	global $LAB;
	global $rootdir;
	global $imagesdir;
	print("<!-- begin title banner -->\n");
	//print("<div id=\"banner\">\n");
	//print("<a href=\"/\"><img src=\"$imagesdir/LOGO_LABO.png\" alt=\"back to $LAB (logo)\"></a>&nbsp;&nbsp;$LABO\n");
	//print("</div>\n");
	print("<!-- end title banner -->\n");
}

function navigationbar(){
	
	global $imagesdir; //Modif 7/02/2013

	print("<!-- begin main navigation bar -->\n");

	// Debut du menu horizontal, tel qu'il est utilise sur toutes les pages web du labo

	$item="publi";
	print("<div id=\"navbarlmfa\">\n");
	print("<ul>\n");



	//print("<li><a href=\"/connecter\"");//intranet/index.php
	print("<li><a href=\"$rootdir/PhPubliMod/phpubli/intranet/login.php\"");
	
	//print("<li><a href="intranet/index.php");
	if ($item == "connecter") print(" class=\"restractive\"");
	else print(" class=\"restr\"");
	print(">Connecter</a></li>\n");
	
	//print("<li><a href=\"/intranet\"");
	//if ($item == "intranet") print(" class=\"restractive\"");
	//else print(" class=\"restr\"");
	//print(">Intranet</a></li>\n");

	//print("<li><div style=float:right>&nbsp;</div></li>\n");

	//print("<li><a href=\"/perso\"");
	//if ($item == "perso") print(" class=\"active\"");
	//print(">Personnels</a></li>\n");

	//print("<li><div style=float:right>&nbsp;</div></li>\n");

	//print("<li><a href=\"/seminaires\"");
	//if ($item == "seminaires") print(" class=\"active\"");
	//print(">S&eacute;minaires</a></li>\n");

	//print("<li><div style=float:right>&nbsp;</div></li>\n");

	
	
	//Les sous menus de publications
	print("<li>");
	print("<ul>\n");
	    //Le sous menu Ajouter
	    // print("<li><a href=\"/ajout\"");
	      print("<li><a href=\"$rootdir/PhPubliMod/phpubli/intranet/document.php\"");
	    if ($item == "ajout") print(" class=\"active\"");
	    print(">Ajout</a></li>\n");
	    
	    //Le sous menu Modifier 
	   // print("<li><a href=\"/modif\"");
	   print("<li><a href=\"$rootdir/PhPubliMod/phpubli/intranet/last_document.php\"");
	    if ($item == "modif") print(" class=\"active\"");
	    print(">Modifier</a></li>\n");
	    
	     //Le sous menu Rechercher
	    //print("<li><a href=\"/recherche\"");
	    print("<li><a href=\"$rootdir/PhPubliMod/phpubli/search.php\"");
	    if ($item == "recherche") print(" class=\"active\"");
	    print(">Recherche</a></li>\n");
	print("</ul>\n");
	
	//print("<a href=\"/publi\"");
	print("<a href=#");
	if ($item == "publi") print(" class=\"active\"");
	print(">Publications</a>");
	
	print("</li>\n");
	
	
	print("<li><div style=float:right>&nbsp;</div></li>\n");

	//print("<li><a href=\"/enseignement\"");
	//if ($item == "enseignement") print(" class=\"active\"");
	//print(">Enseignement</a></li>\n");

	print("<li><div style=float:right>&nbsp;</div></li>\n");

	//print("<li><a href=\"/recherche\"");
	//if ($item == "recherche") print(" class=\"active\"");
	//print(">Recherche</a></li>\n");

	print("<li><div style=float:right>&nbsp;</div></li>\n");

	//print("<li><a href=\"/\"");
	print("<li><a href=\"$rootdir/PhPubliMod/phpubli/index.php\"");
	if ($item == "") print(" class=\"active\"");
	print(">Accueil</a></li>\n");
	print("<li>\n");
	print("<a href=\"/\"><img src=\"$imagesdir/LOGO_LABO.png\" alt=\"back to $LAB (logo)\"></a>&nbsp;&nbsp;$LABO\n");
	print("</li>\n");
	print("</ul>\n");
	print("</div>\n");

	// Fin du menu horizontal, tel qu'il est utilise sur toutes les pages web du labo

	print("<!-- end navigation bar -->\n");
}

function address()
{
	global $LABO;
	global $ADRLABO1;
	global $ADRLABO2;
	global $ADRLABO3;
	global $ADRLABO4;
	global $ADRLABO5;
	print("<div id=\"footer\">\n");
	print("$LABO"); 
	if (!empty($ADRLABO1)) { print " &ndash; $ADRLABO1";}
	if (!empty($ADRLABO2)) { print " &ndash; $ADRLABO2";}
	if (!empty($ADRLABO3)) { print " &ndash; $ADRLABO3";}
	if (!empty($ADRLABO4)) { print " &ndash; $ADRLABO4";}
	if (!empty($ADRLABO5)) { print " &ndash; $ADRLABO5";}
	print("</div>\n");
}
function legal()
{
	global $LAB;
	global $URL_WEBMASTER;
	$year=date("Y");
	// on met l'année en chiffres romains... un petit clin d'oeil à la BBC
	$romyear=array("2005"=>"MMV", "2006"=>"MMVI", "2007"=>"MMVII", "2008"=>"MMVIII", "2009"=>"MMIX", "2010"=>"MMX", "2011"=>"MMXI","2012"=>"MMXII","2013"=>"MMXIII","2014"=>"MMXIV","2015"=>"MMXV", "2016"=>"MMXVI", );

	$date = date ("d/m/Y - H:i:s");
	print("<div id=\"footercopy\">\n");
	print(" &copy; $LAB - " . $romyear[$year] . " &nbsp; [<a href=\"$URL_WEBMASTER\">webmaster</a>] &nbsp;&nbsp;&nbsp; <tt>http://$_SERVER[SERVER_NAME]$_SERVER[PHP_SELF]</tt> viewed by $_SERVER[REMOTE_ADDR] - $date \n");
	print("</div>\n");
	print("<div id=\"footercopy\">\n");
	phpubli_foot();
	print("</div>\n");
}

function warning()
{
	// ce message s'affiche en bas des principales pages du site.
	print "<b>!!!! phase expérimentale, la base de données n'est ni complète ni vraiment au point !!!!</b><br>\n";
	// print "<b>!!!! phase de mise en place&nbsp;: à part les articles et les thèses, la base de données est encore très incomplète&nbsp;!!!!</b><br>\n";
	// print "<b>!!!! à part les documents récents, la base de données est encore très incomplète&nbsp;!!!!</b><br>\n";
}

?>

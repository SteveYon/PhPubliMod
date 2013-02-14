<?php session_start();
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

	$rootdir="..";
	$localdir="intranet";
	$filename="index.php";
	require_once ("$rootdir/include.php");
	include ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	// check if there is a user logged in
	$currentuser=current_user();

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Op�rations sur la base des publications</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("intranet"); ?>

<div id=mainarea>
<!-- start main panel -->

<h1>Op�rations sur la base des publications</h1>

<?php

//if (!isset($_SESSION['user']))
if (empty($currentuser))
{
	echo "Pour faire des op�rations sur la base de donn�es, vous devez d'abord vous identifier ";
	echo "(<a href=\"$rootdir/intranet/login.php\">login</a>).<br>\n";
}
else{

print "<h2>Modifications r�centes</h2>\n";

print "<a href=\"$rootdir/$localdir/last_document.php?limit=20\">Liste des derniers documents modifi�s</a><br>\n";

print "<h2>Saisir de nouvelles donn�es</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article&mode=insert\">Ajouter un article depuis le formulaire</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=fichier&mode=import\">Ajouter un article depuis un fichier</a><br>\n";

/*
print "<a href=\"$rootdir/$localdir/document.php?doc=these&mode=insert\">Ajouter une th�se/hdr</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_proceeding&mode=insert\">Ajouter une communication (invit�e ou non) dans une conf�rence avec actes publi�s</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_abstract&mode=insert\">Ajouter une communication (invit�e ou non) dans une conf�rence sans actes</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=book&mode=insert\">Ajouter un livre</a><br>\n";

print "<br>\n";

print "<a href=\"$rootdir/$localdir/personne.php?mode=insert\">Ajouter une personne</a><br>\n";

print "<a href=\"$rootdir/$localdir/journal.php?mode=insert\">Ajouter un journal</a><br>\n";

print "<a href=\"$rootdir/$localdir/institution.php?mode=insert\">Ajouter une institution</a><br>\n";

print "<a href=\"$rootdir/$localdir/publisher.php?mode=insert\">Ajouter un �diteur commercial</a><br>\n";

print "<a href=\"$rootdir/$localdir/conference.php?mode=insert\">Ajouter une conf�rence</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=proceedings_book&mode=insert\">Ajouter un livre d'actes d'une conf�rence</a><br>\n";
*/
print "<h2>Modifier des donn�es existantes</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article\">Liste des articles</a><br>\n";
/*
print "<a href=\"$rootdir/$localdir/document.php?doc=these\">Liste des th�ses/hdr</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_proceeding\">Liste des communications dans une conf�rence avec actes publi�s</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_abstract\">Liste des communications dans une conf�rence sans actes</a><br>\n";

print "<br>\n";

print "<a href=\"$rootdir/$localdir/personne.php\">Liste des personnes</a><br>\n";

print "<a href=\"$rootdir/$localdir/journal.php\">Liste des journaux</a><br>\n";

print "<a href=\"$rootdir/$localdir/institution.php\">Liste des institutions</a><br>\n";

print "<a href=\"$rootdir/$localdir/publisher.php\">Liste des �diteurs commerciaux</a><br>\n";

print "<a href=\"$rootdir/$localdir/conference.php\">Liste des conf�rences</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=proceedings_book\">Liste des livres d'actes d'une conf�rence</a><br>\n";
*/

print "<h2>Supprimer des donn�es existantes</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article\">Supprimer des articles</a><br>\n";
}
?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

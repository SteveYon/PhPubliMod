<?php session_start();
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
<title>Opérations sur la base des publications</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("intranet"); ?>

<div id=mainarea>
<!-- start main panel -->

<h1>Opérations sur la base des publications</h1>

<?php

//if (!isset($_SESSION['user']))
if (empty($currentuser))
{
	echo "Pour faire des opérations sur la base de données, vous devez d'abord vous identifier ";
	echo "(<a href=\"$rootdir/intranet/login.php\">login</a>).<br>\n";
}
else{

print "<h2>Modifications récentes</h2>\n";

print "<a href=\"$rootdir/$localdir/last_document.php?limit=20\">Liste des derniers documents modifiés</a><br>\n";

print "<h2>Saisir de nouvelles données</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article&mode=insert\">Ajouter un article depuis le formulaire</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=fichier&mode=import\">Ajouter un article depuis un fichier</a><br>\n";

/*
print "<a href=\"$rootdir/$localdir/document.php?doc=these&mode=insert\">Ajouter une thèse/hdr</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_proceeding&mode=insert\">Ajouter une communication (invitée ou non) dans une conférence avec actes publiés</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_abstract&mode=insert\">Ajouter une communication (invitée ou non) dans une conférence sans actes</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=book&mode=insert\">Ajouter un livre</a><br>\n";

print "<br>\n";

print "<a href=\"$rootdir/$localdir/personne.php?mode=insert\">Ajouter une personne</a><br>\n";

print "<a href=\"$rootdir/$localdir/journal.php?mode=insert\">Ajouter un journal</a><br>\n";

print "<a href=\"$rootdir/$localdir/institution.php?mode=insert\">Ajouter une institution</a><br>\n";

print "<a href=\"$rootdir/$localdir/publisher.php?mode=insert\">Ajouter un éditeur commercial</a><br>\n";

print "<a href=\"$rootdir/$localdir/conference.php?mode=insert\">Ajouter une conférence</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=proceedings_book&mode=insert\">Ajouter un livre d'actes d'une conférence</a><br>\n";
*/
print "<h2>Modifier des données existantes</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article\">Liste des articles</a><br>\n";
/*
print "<a href=\"$rootdir/$localdir/document.php?doc=these\">Liste des thèses/hdr</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_proceeding\">Liste des communications dans une conférence avec actes publiés</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=conference_abstract\">Liste des communications dans une conférence sans actes</a><br>\n";

print "<br>\n";

print "<a href=\"$rootdir/$localdir/personne.php\">Liste des personnes</a><br>\n";

print "<a href=\"$rootdir/$localdir/journal.php\">Liste des journaux</a><br>\n";

print "<a href=\"$rootdir/$localdir/institution.php\">Liste des institutions</a><br>\n";

print "<a href=\"$rootdir/$localdir/publisher.php\">Liste des éditeurs commerciaux</a><br>\n";

print "<a href=\"$rootdir/$localdir/conference.php\">Liste des conférences</a><br>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=proceedings_book\">Liste des livres d'actes d'une conférence</a><br>\n";
*/

print "<h2>Supprimer des données existantes</h2>\n";

print "<a href=\"$rootdir/$localdir/document.php?doc=article\">Supprimer des articles</a><br>\n";
}
?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

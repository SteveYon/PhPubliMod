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
        $rootdir=".";
	$localdir=".";
	$filename="index.php";
	require_once ("$rootdir/include.php");
	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);
?>
<?php preamble(); ?>
<html>

<head>
<title>Publications du <?php echo $LABO; ?></title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu(""); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Production scientifique du <?php echo $LABO; ?></h1>

<p>
	<h5>Bienvenue sur le portail de Gestion des Artciles de rechercher du laboratoire LITIS:</h5>
	<p>
	A partir de se Portail vous pourrez:
	<p>
	Gérer les articles
	<p>
	Consulter des articles
	<!--

<a href="./search.php">Recherche d'articles, de thèses, de congrès&hellip; dans la base de données</a>
<p>
Recherche par année&nbsp;:
<?php

for ($year=date("Y"); $year>1999; $year--)
{
	print("<a href=\"./search.php?search=year&amp;id=$year\">$year</a>, ");
}

?>
&nbsp;&hellip;

<p>
Publications du <?php echo $LABO; ?> dans l'archive ouverte
<?php echo anchor("http://hal.archives-ouvertes.fr/lab/$LABO/", "HAL"); ?>.
<br><br>

<p>
Derniers documents ajoutés/modifiés dans la base&nbsp;:<br>


<?php
	$query = "SELECT * from document";
	$query .= " WHERE typedoc_id != '7'";
        $query .= " ORDER BY date DESC ";
        $query .= " LIMIT 10";
	$res = $bd->exec_query($query);

	$lines="<tr><td></td><td></td></tr>\n";

	$i=0; $fl=0;
	while ( ($doc = $bd->fetch_object($res)) )
	{
		$lines .= document_singleline($i, $doc, $bd, $fl);
	}

	$lines .= "<tr><td>&nbsp;</td></tr>\n";

	echo "<table>" . $lines . "</table>\n";
?>

<p>
-->
<!--<?php warning(); ?>-->

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>
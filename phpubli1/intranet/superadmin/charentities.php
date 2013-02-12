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
	$rootdir="../..";
	$localdir="intranet/superadmin";
	$filename="charentities.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_root_login($bd);

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Caractères spéciaux</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("superadmin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Enlever les caractères spéciaux en ascii</h1>

Remplacer "&#64257;" (char #64257) par "fi" <br>
Remplacer "&#64258;" (char #64258) par "fl" <br>

<a href="charentities.php?action=yes">Transformer maintenant</a>
<br>


<?php

	if ( isset($_GET['action']) && ($_GET['action']=="yes") )
	{
		echo "START <br>";
		//$query = "SELECT * from document WHERE doc_id='4444'";
		$query = "SELECT * from document";
		$result = $bd->exec_query ($query);

		while ( $document = $bd->fetch_object($result) )
		{
			$doc_id=$document->doc_id;
			$title=stripSlashes($document->title);

			$ttitle=$title;
			$title=str_replace("&#64257;", "fi", $ttitle);
			$ttitle=$title;
			$title=str_replace("&#64258;", "fl", $ttitle);

			$newtitle=addSlashes($title);
			$query = "UPDATE document SET "
				. " title ='$newtitle' "
				. " WHERE doc_id = '$doc_id' ";
			echo $query . "<br>";
			$res = $bd->exec_query($query);
		}
		echo "END <br>";
	}

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

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
	$localdir=".";
	$filename="searchDouble.php";
	require_once ("../include.php");
	require_once ("../functions_export.php");
	require_once ("../functions.php");
	require_once ("include.php");
	require_once ("doublon.php");
	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);
	check_login($bd);
?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Publications du <?php echo LABO; ?></title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu("search"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Recherche dans la base de donnees</h1>
<tr align="center">
<td><p> titre :</p></td>
<form method="post" action="searchDouble.php?search=true">
<td><input type="text" name="title" value="" size="120" maxlength="255"></td>
<td><input type="submit" name="ok" value="rechercher"></td>
</form>
</tr>

<?php
if(isset($_GET['search'])){
    $titre = $_POST['title'];
    $req = "SELECT * FROM document";
    $res= $bd->exec_query($req);
    $tab = array();
    while ($obj = $bd->fetch_object($res)) {
	    $percent = analyseSentence($titre,$obj->title);
	    if($percent>50){
		// similaire
		$tab[document_lines($bd,$obj->typedoc_id)] = $percent;
		//echo "ICI: ".$obj->typedoc_id;
	    }
    }
    arsort($tab);
    foreach ($tab as $key => $val) {
	echo "$key <b> similitude : $val %</b>\n";
    }
}
?>
</div>
</body>
</html>
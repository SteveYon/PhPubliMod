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
        $rootdir="..";
	$localdir="install";
	$filename="5_param.php";
	require_once ("$rootdir/include.php");
	require_once ("functions_installer.php");

if(isset($_POST["save_param"]))
{
	$nomlabo=stripslashes($_POST['nomlabo']);
	$lab=stripslashes($_POST['sigle']);
	$adr1=stripslashes($_POST['adr1']);
	$adr2=stripslashes($_POST['adr2']);
	$adr3=stripslashes($_POST['adr3']);
	$adr4=stripslashes($_POST['adr4']);
	$adr5=stripslashes($_POST['adr5']);
	$halid=$_POST['halid'];
	$urlwebmaster=$_POST['urlwebmaster'];

	$file = "../param_labo.default.php";
	$handle = fopen($file, "r");
	$contents = fread($handle, filesize($file));
	fclose($handle);

	// Replace the settings
	$contents = preg_replace("/NOM_LABO/", "$nomlabo", $contents);
	$contents = preg_replace("/SIGLE/", "$lab", $contents);
	$contents = preg_replace("/ADR1/", "$adr1", $contents);
	$contents = preg_replace("/ADR2/", "$adr2", $contents);
	$contents = preg_replace("/ADR3/", "$adr3", $contents);
	$contents = preg_replace("/ADR4/", "$adr4", $contents);
	$contents = preg_replace("/ADR5/", "$adr5", $contents);
	$contents = preg_replace("/LABOHALID/", "$halid", $contents);
	$contents = preg_replace("/URLWEBMASTER/", "$urlwebmaster", $contents);

       	// Save as param_labo.php
	$file = "../param_labo.php";
	$handle = fopen($file, "w");
	fwrite($handle, $contents);
	fclose($handle);

	header("Location: 6_end.php" );
}



?>
<?php preamble(); ?>
<html>

<head>
<title>Installation de PhPubli</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu_installer("5"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Paramétrage du site</h1>

Pour finaliser l'installation, il faut renseigner les champs ci-dessous&nbsp;:<br>
<br><br>

<form name="param" method="POST" action="5_param.php">
<table>
	<tr>
		<td>Nom du laboratoire&nbsp;:</td>
		<td><input name="nomlabo" type="text" size="64" value="<?php echo $LABO;?>"></td>
	</tr>
	<tr>
		<td>sigle&nbsp;:</td>
		<td><input name="sigle" type="text" size="64" value="<?php echo $LAB;?>"></td>
	</tr>
	<tr>
		<td>adresse1&nbsp;:</td>
		<td><input name="adr1" type="text" size="64" value="<?php echo $ADRLABO1;?>"></td>
	</tr>
	<tr>
		<td>adresse2&nbsp;:</td>
		<td><input name="adr2" type="text" size="64" value="<?php echo $ADRLABO2;?>"></td>
	</tr>
	<tr>
		<td>adresse3&nbsp;:</td>
		<td><input name="adr3" type="text" size="64" value="<?php echo $ADRLABO3;?>"></td>
	</tr>
	<tr>
		<td>adresse4&nbsp;:</td>
		<td><input name="adr4" type="text" size="64" value="<?php echo $ADRLABO4;?>"></td>
	</tr>
	<tr>
		<td>adresse5&nbsp;:</td>
		<td><input name="adr5" type="text" size="64" value="<?php echo $ADRLABO5;?>"></td>
	</tr>
	<tr>
		<td>Identifiant HAL du laboratoire&nbsp;:</td>
		<td><input name="halid" type="text" size="64" value="<?php echo $LABO_HALID;?>"></td>
	</tr>
	<tr>
		<td>URL du webmaster&nbsp;:</td>
		<td><input name="urlwebmaster" type="text" size="64" value="<?php echo $URL_WEBMASTER;?>"></td>
	</tr>
</table>
<input type="hidden" name="save_param" value="0">
<input type="submit" name="submit" value="enregistrer" class="button">
</form>
<br>

	Il est toujours possible de modifier ces valeurs plus tard dans le fichier param_labo.php.

<?php

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

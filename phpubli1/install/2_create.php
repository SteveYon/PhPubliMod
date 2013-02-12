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
	$filename="index.php";
	require_once ("$rootdir/include.php");
	require_once ("functions_installer.php");

	$dbhost_def="localhost";
	$dbname_def="phpubli";
	$dbuser_def="phpubli_login";
	$dbpwd_def="phpubli_password";

if(isset($_POST["save_values"]))
{
	$dbhost=$_POST['dbhost'];
	$dbname=$_POST['dbname'];
	$dbuser=$_POST['dbuser'];
	$dbpwd=$_POST['dbpwd'];

	$dbhost_def=$dbhost;
	$dbname_def=$dbname;
	$dbuser_def=$dbuser;
	$dbpwd_def=$dbpwd;

	// echo "host=$dbhost name=$dbname user=$dbuser pwd=$dbpwd <p";

	$connexion = mysql_pconnect($dbhost, $dbuser, $dbpwd);
	if (!$connexion)
	{
		$errmsg="<b>Connection to server $dbhost failed.</b>";
	}
	else
	{
		if (!mysql_select_db($dbname, $connexion))
		{
			$errmsg="<b>Access to database $dbname denied.</b>";
		}
		else
		{
			// connexion OK, write parameters to ../connexion_param.php
			$file = "../connexion_param.default.php";
			$handle = fopen($file, "r");
			$contents = fread($handle, filesize($file));
			fclose($handle);

			// Replace the settings
			$contents = preg_replace("/phpubli_UNAME/", "$dbuser", $contents);
			$contents = preg_replace("/phpubli_UPASSWORD/", "$dbpwd", $contents);
			$contents = preg_replace("/phpubli_SERVER/", "$dbhost", $contents);
			$contents = preg_replace("/phpubli_BASE/", "$dbname", $contents);

        		// Save as connexion_param.php
			$file = "../connexion_param.php";
			$handle = fopen($file, "w");
			fwrite($handle, $contents);
			fclose($handle);
			// $errmsg="<b>Connexion parameters are now saved.</b>";
		}
	}

	// $bd = new MySQL($dbuser, $dbpwd, $dbname, $dbhost);
	header("Location: 3_configuration.php" );
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

<?php lhsmenu_installer("2"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Création de la base de données</h1>

<?php if ($errmsg) echo "ERROR: $errmsg <br><br>"; ?>

Créez une base de données vide (par exemple en exécutant le script phpubli_create.sql par mysql)
puis renseignez ci-dessous les informations nécessaires pour faire une connexion.
<p>

<form name="db_create" method="POST" action="2_create.php">
<table>
	<tr>
		<td width="150">Serveur (host) :</td>
		<td><input name="dbhost" type="text" value="<?php echo $dbhost_def;?>"></td>
	</tr>
	<tr>
		<td width="150">Base de données :</td>
		<td><input name="dbname" type="text" value="<?php echo $dbname_def;?>"></td>
	</tr>
	<tr>
		<td width="150">Utilisateur (user) :</td>
		<td><input name="dbuser" type="text" value="<?php echo $dbuser_def;?>"></td>
	</tr>
	<tr>
		<td width="150">Mot de passe :</td>
		<td><input name="dbpwd" type="password" value="<?php echo $dbpwd_def;?>"></td>
	</tr>
</table>
<input type="hidden" name="save_values" value="0">
<input type="submit" name="submit" value="enregistrer" class="button">
</form>

<p>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

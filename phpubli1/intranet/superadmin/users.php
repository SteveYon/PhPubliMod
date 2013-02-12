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
	$filename="users.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");
	require_once ("functions_users.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_root_login($bd);


$displayid=""; // if not null, redirect to page for editing user with u_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['edituser'])) $action="edituser";
	if (isSet($_POST['updateuser'])) $action="updateuser";
	if (isSet($_POST['editpassword'])) $action="editpassword";
	if (isSet($_POST['updatepassword'])) $action="updatepassword";
	if (isSet($_POST['insertuser'])) $action="insertuser";
	if (isSet($_POST['deleteuser'])) $action="deleteuser";
	if (isSet($_POST['deleteusernow'])) $action="deleteusernow";
	//echo "action=$action <p>\n";

	$u_id=$_POST['u_id'];
	// echo "u_id=$u_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$u_id;
	}
	if ($action=="updateuser")
	{
		// echo "action=$action<br>\n";
		user_update($_POST, $bd);
		$displayid=$u_id;
	}
	if ($action=="insertuser")
	{
		//echo "action=$action<br>\n";
		$u_id=user_insert($_POST, $bd);
		//echo "u_id=$u_id<br>\n";
		$displayid=$u_id;
	}
	if ($action=="updatepassword")
	{
		// echo "action=$action<br>\n";
		password_update($_POST, $bd);
		$displayid=$u_id;
	}
	if ($displayid!="")	
	{
		//echo "header(\"Location: $filename?mode=edit&id=$displayid\"); <br>\n";
		header("Location: $filename?mode=edit&id=$displayid");
		exit;
	}
}


?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Utilisateurs de la base</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("superadmin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Utilisateurs de la base</h1>

<?php

if (isSet($_POST['action']))
{
	if ($action=="edituser")
	{
		//echo "action=$action<br>\n";
		echo "Mise à jour des données d'un utilisateur<br>\n";
		echo "<form method=\"post\" action=\"users.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"edituser\">\n";
		echo "<input type=\"hidden\" name=\"u_id\" value=\"$u_id\">\n";
		echo "<center>\n";
		user_form("update", $u_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updateuser\" value=\"mettre à jour l'utilisateur\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="editpassword")
	{
		//echo "action=$action<br>\n";
		echo "Nouveau mot de passe<br>\n";
		echo "<form method=\"post\" action=\"users.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editpassword\">\n";
		echo "<input type=\"hidden\" name=\"u_id\" value=\"$u_id\">\n";
		echo "<center>\n";
		password_form($u_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatepassword\" value=\"mettre à jour le mot de passe\">\n";
		echo "</form>\n";
	}
	if ($action=="deleteuser")
	{
		//echo "action=$action<br>\n";
		print ("<b>Supprimer effectivement cet utilisateur&nbsp;?</b>\n");
		echo "<form method=\"post\" action=\"users.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"deleteuser\">\n";
		echo "<input type=\"hidden\" name=\"u_id\" value=\"$u_id\">\n";
		echo "<center>\n";
		user_fixed($u_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"deleteusernow\" value=\"supprimer maintenant\">\n";
		echo "</form>\n";
	}
	if ($action=="deleteusernow")
	{
		//echo "action=$action<br>\n";

		print ("<b>Suppression de l'utilisateur $u_id</b><br>\n");
		user_delete($u_id, $bd);
	}
}

if (isSet($_GET['mode']))
{
	if ($_GET['mode']=="insert")
        {
                echo "Saisie d'un nouvel utilisateur<br>\n";
                echo "<form method=\"post\" action=\"users.php\" name=\"form\">\n";
                echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
                echo "<center>\n";
                user_form("insert", "", $bd);
                echo "</center>\n";
                echo "<input type=\"submit\" name=\"insertuser\" value=\"enregistrer les données (ne pas oublier de choisir ensuite un mot de passe)\"><br>\n";
                echo "</form>\n";
        }
	if ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) )
	{
		// entry point to edit an existing user given its u_id
		$u_id=$_GET['id'];
		echo "<center>\n";
		user_fixed($u_id, $bd);
		echo "</center>\n";
		
		$query = "SELECT * from user WHERE u_id = $u_id";
		$res = $bd->exec_query($query);
		$user = $bd->fetch_object($res);
			echo "<br>\n";
			echo "<form method=\"post\" action=\"users.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"u_id\" value=\"$u_id\">\n";
			echo "<input type=\"submit\" name=\"edituser\" value=\"modifier les données (sans le mot de passe)\">\n";
			echo "<input type=\"submit\" name=\"editpassword\" value=\"modifier le mot de passe\">\n";
			echo "<input type=\"submit\" name=\"deleteuser\" value=\"supprimer l'utilisateur\"><br>\n";
			echo "</form>";

	}

}

if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
        echo anchor("$filename?mode=insert", "Ajouter un nouvel utilisateur") . "<br>";
        echo user_lines($bd);
}
        echo anchor("$filename?mode=insert", "Ajouter un nouvel utilisateur") . "<br>";

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

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
	$filename="publisher.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$displayid=""; // if not null, redirect to page for editing institytion with publisher_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['editpublisher'])) $action="editpublisher";
	if (isSet($_POST['validatepublisher'])) $action="validatepublisher";
	if (isSet($_POST['updatepublisher'])) $action="updatepublisher";
	if (isSet($_POST['insertpublisher'])) $action="insertpublisher";
	if (isSet($_POST['deletepublisher'])) $action="deletepublisher";
	if (isSet($_POST['deletepublishernow'])) $action="deletepublishernow";
	//echo "action=$action <p>\n";

	$publisher_id=$_POST['publisher_id'];
	//echo "publisher_id=$publisher_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$publisher_id;
	}
	if ($action=="validatepublisher")
	{
		// echo "action=$action<br>\n";
		publisher_validate($publisher_id, $bd);
		$displayid=$publisher_id;
	}
	if ($action=="updatepublisher")
	{
		// echo "action=$action<br>\n";
		publisher_update($_POST, $bd);
		$displayid=$publisher_id;
	}
	if ($action=="insertpublisher")
	{
		// echo "action=$action<br>\n";
		$publisher_id=publisher_insert($_POST, $bd);
		// echo "publisher_id=$publisher_id<br>\n";
		$displayid=$publisher_id;
	}
	if ($action=="deletepublishernow")
	{
		//echo "action=$action<br>\n";
		// print ("<b>Suppression de la maison d'�dition $publisher_id</b><br>\n");
		publisher_delete($publisher_id, $bd);
		header("Location: $filename");
		exit;
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
<title>Maisons d'�dition</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("publisher"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Op�rations sur la table des maisons d'�dition</h1>

<?php

if (isSet($_POST['action']))
{
	if ($action=="editpublisher")
	{
		//echo "action=$action<br>\n";
		echo "Mise � jour des donn�es d'une maison d'�dition<br>\n";
		echo "<form method=\"post\" action=\"publisher.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editpublisher\">\n";
		echo "<input type=\"hidden\" name=\"publisher_id\" value=\"$publisher_id\">\n";
		echo "<center>\n";
		publisher_form("update", $publisher_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatepublisher\" value=\"mettre � jour la maison d'�dition\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"r�initialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="deletepublisher")
	{
		//echo "action=$action<br>\n";
	
/*

	ICICICICI
		$query = "select count(*) from document where publisher_id='$publisher_id'";
        	// print ("query= $query <p>\n");
        	$res = $bd->exec_query($query);
		// print "res=$res <br>\n";
		$ob = $bd->fetch_row ($res);
		if ( $ob[0] > 0 )
		{
			publisher_fixed($publisher_id, $bd);
			print ("<b>Impossible de supprimer cette publisher&nbsp;: des "
				. anchor("$rootdir/search.php?search=publisher&id=$publisher_id", "documents")
				. " en d�pendent.</b><br><br>\n");
		}
		else
		{
*/
			print ("<b>Supprimer effectivement cette maison d'�dition&nbsp;?</b>\n");
			echo "<form method=\"post\" action=\"publisher.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deletepublisher\">\n";
			echo "<input type=\"hidden\" name=\"publisher_id\" value=\"$publisher_id\">\n";
			echo "<center>\n";
			publisher_fixed($publisher_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deletepublishernow\" value=\"supprimer maintenant\">\n";
			echo "</form>\n";
/*
		}
*/
	}
}

if (isSet($_GET['mode']))
{
	if ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) )
	{
		// entry point to edit an existing publisher given its publisher_id
		$publisher_id=$_GET['id'];
		echo "<center>\n";
		publisher_fixed($publisher_id, $bd);
		echo "</center>\n";

		
		$query = "SELECT * from publisher WHERE publisher_id = $publisher_id";
		$res = $bd->exec_query($query);
		$publisher = $bd->fetch_object($res);
		$log=$publisher->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Donn�es non modifiables<br><br>\n";
		}
		else
		{
			echo "<br>\n";
			echo "<form method=\"post\" action=\"publisher.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"publisher_id\" value=\"$publisher_id\">\n";
			echo "<input type=\"submit\" name=\"editpublisher\" value=\"modifier les donn�es\">\n";
			echo "<input type=\"submit\" name=\"deletepublisher\" value=\"supprimer les donn�es\"><br>\n";
                	if (check_admin_priv($bd))
               		echo "<br>Si vous �tes s�r(e) que les donn�es sont compl�tes et correctes, vous pouvez <input type=\"submit\" name=\"validatepublisher\" value=\"valider d�finitivement la saisie et emp�cher les modifications ult�rieures.\">\n";
			echo "</form>";
		}

	}
	if ($_GET['mode']=="insert")
	{
		echo "Saisie d'une nouvelle maison d'�dition<br>\n";
		echo "<form method=\"post\" action=\"publisher.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		publisher_form("insert", "", $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"insertpublisher\" value=\"enregistrer les donn�es\"><br>\n";
		echo "</form>\n";
	}
}


if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	echo anchor("$filename?mode=insert", "Ajouter une nouvelle maison d'�dition") . "<br>";
	echo publisher_lines($bd);
}

	echo anchor("$filename?mode=insert", "Ajouter une nouvelle maison d'�dition") . "<br>";


?>


</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

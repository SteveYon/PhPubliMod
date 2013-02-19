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
	$filename="conference.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$displayid=""; // if not null, redirect to page for editing institytion with conference_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['editconference'])) $action="editconference";
	if (isSet($_POST['validateconference'])) $action="validateconference";
	if (isSet($_POST['updateconference'])) $action="updateconference";
	if (isSet($_POST['insertconference'])) $action="insertconference";
	if (isSet($_POST['deleteconference'])) $action="deleteconference";
	if (isSet($_POST['deleteconferencenow'])) $action="deleteconferencenow";
	// echo "action=$action <p>\n";

	$conference_id=$_POST['conference_id'];
// echo "conference_id=$conference_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$conference_id;
	}
	if ($action=="validateconference")
	{
		// echo "action=$action<br>\n";
		conference_validate($conference_id, $bd);
		$displayid=$conference_id;
	}
	if ($action=="updateconference")
	{
		// echo "action=$action<br>\n";
		conference_update($_POST, $bd);
		$displayid=$conference_id;
	}
	if ($action=="insertconference")
	{
		// echo "action=$action<br>\n";
		$conference_id=conference_insert($_POST, $bd);
		// echo "conference_id=$conference_id<br>\n";
		$displayid=$conference_id;
	}
	if ($action=="deleteconferencenow")
	{
		//echo "action=$action<br>\n";
		// print ("<b>Suppression de la maison d'édition $conference_id</b><br>\n");
		conference_delete($conference_id, $bd);
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
<title>Conférences</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("conference"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Opérations sur la table des conférences</h1>

<?php

if (isSet($_POST['action']))
{
	if ($action=="editconference")
	{
		//echo "action=$action<br>\n";
		echo "Mise à jour des données d'une conférence<br>\n";
		echo "<form method=\"post\" action=\"conference.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editconference\">\n";
		echo "<input type=\"hidden\" name=\"conference_id\" value=\"$conference_id\">\n";
		echo "<center>\n";
		conference_form("update", $conference_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updateconference\" value=\"mettre à jour la conférence\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="deleteconference")
	{
		//echo "action=$action<br>\n";
	
/*

	ICICICICI
		$query = "select count(*) from document where conference_id='$conference_id'";
        	// print ("query= $query <p>\n");
        	$res = $bd->exec_query($query);
		// print "res=$res <br>\n";
		$ob = $bd->fetch_row ($res);
		if ( $ob[0] > 0 )
		{
			conference_fixed($conference_id, $bd);
			print ("<b>Impossible de supprimer cette conference&nbsp;: des "
				. anchor("$rootdir/search.php?search=conference&id=$conference_id", "documents")
				. " en dépendent.</b><br><br>\n");
		}
		else
		{
*/
			print ("<b>Supprimer effectivement cette conférence&nbsp;?</b>\n");
			echo "<form method=\"post\" action=\"conference.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deleteconference\">\n";
			echo "<input type=\"hidden\" name=\"conference_id\" value=\"$conference_id\">\n";
			echo "<center>\n";
			conference_fixed($conference_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deleteconferencenow\" value=\"supprimer maintenant\">\n";
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
		// entry point to edit an existing conference given its conference_id
		$conference_id=$_GET['id'];
		echo "<center>\n";
		conference_fixed($conference_id, $bd);
		echo "</center>\n";
		
		$query = "SELECT * from conference WHERE conference_id = $conference_id";
		$res = $bd->exec_query($query);
		$conference = $bd->fetch_object($res);
		$log=$conference->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Données non modifiables<br><br>\n";
		}
		else
		{
			echo "<br>\n";
			echo "<form method=\"post\" action=\"conference.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"conference_id\" value=\"$conference_id\">\n";
			echo "<input type=\"submit\" name=\"editconference\" value=\"modifier les données\">\n";
			echo "<input type=\"submit\" name=\"deleteconference\" value=\"supprimer les données\"><br>\n";
                	if (check_admin_priv($bd))
               		echo "<br>Si vous êtes sûr(e) que les données sont complètes et correctes, vous pouvez <input type=\"submit\" name=\"validateconference\" value=\"valider définitivement la saisie et empêcher les modifications ultérieures.\">\n";
			echo "</form>";
		}

	}
	if ($_GET['mode']=="insert")
	{
		echo "Saisie d'une nouvelle conférence<br>\n";
		echo "<form method=\"post\" action=\"conference.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		conference_form("insert", "", $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"insertconference\" value=\"enregistrer les données\"><br>\n";
		echo "</form>\n";
	}
}

if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	echo anchor("$filename?mode=insert", "Ajouter une nouvelle conférence") . "<br>";
	echo conference_lines($bd);
}

	echo anchor("$filename?mode=insert", "Ajouter une nouvelle conférence") . "<br>";


?>


</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

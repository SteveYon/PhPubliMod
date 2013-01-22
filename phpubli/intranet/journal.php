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
	$filename="journal.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$displayid=""; // if not null, redirect to page for editing journal with journal_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['editjournal'])) $action="editjournal";
	if (isSet($_POST['validatejournal'])) $action="validatejournal";
	if (isSet($_POST['updatejournal'])) $action="updatejournal";
	if (isSet($_POST['insertjournal'])) $action="insertjournal";
	if (isSet($_POST['deletejournal'])) $action="deletejournal";
	if (isSet($_POST['deletejournalnow'])) $action="deletejournalnow";
	//echo "action=$action <p>\n";

	$journal_id=$_POST['journal_id'];
	// echo "journal_id=$journal_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$journal_id;
	}
	if ($action=="validatejournal")
	{
		// echo "action=$action<br>\n";
		journal_validate($journal_id, $bd);
		$displayid=$journal_id;
	}
	if ($action=="updatejournal")
	{
		// echo "action=$action<br>\n";
		journal_update($_POST, $bd);
		$displayid=$journal_id;
	}
	if ($action=="insertjournal")
	{
		//echo "action=$action<br>\n";
		$journal_id=journal_insert($_POST, $bd);
		//echo "journal_id=$journal_id<br>\n";
		$displayid=$journal_id;
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
<title>Journaux</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("journal"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Opérations sur la table des journaux</h1>

<?php

if (isSet($_POST['action']))
{
	if ($action=="editjournal")
	{
		//echo "action=$action<br>\n";
		echo "Mise à jour des données d'un journal<br>\n";
		echo "<form method=\"post\" action=\"journal.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editjournal\">\n";
		echo "<input type=\"hidden\" name=\"journal_id\" value=\"$journal_id\">\n";
		echo "<center>\n";
		journal_form("update", $journal_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatejournal\" value=\"mettre à jour le journal\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="deletejournal")
	{
		//echo "action=$action<br>\n";
	
		$query = "select count(*) from document where journal_id='$journal_id'";
        	// print ("query= $query <p>\n");
        	$res = $bd->exec_query($query);
		// print "res=$res <br>\n";
		$ob = $bd->fetch_row ($res);
		if ( $ob[0] > 0 )
		{
			journal_fixed($journal_id, $bd);
			print ("<b>Impossible de supprimer ce journal&nbsp;: des "
				. anchor("$rootdir/search.php?search=journal&id=$journal_id", "documents")
				. " en dépendent.</b><br><br>\n");
		}
		else
		{
			print ("<b>Supprimer effectivement ce journal&nbsp;?</b>\n");
			echo "<form method=\"post\" action=\"journal.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deletejournal\">\n";
			echo "<input type=\"hidden\" name=\"journal_id\" value=\"$journal_id\">\n";
			echo "<center>\n";
			journal_fixed($journal_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deletejournalnow\" value=\"supprimer maintenant\">\n";
			echo "</form>\n";
		}
	}
	if ($action=="deletejournalnow")
	{
		//echo "action=$action<br>\n";

		print ("<b>Suppression du journal $journal_id</b><br>\n");
		journal_delete($journal_id, $bd);
	}

}

if (isSet($_GET['mode']))
{
	if ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) )
	{
		// entry point to edit an existing journal given its journal_id
		$journal_id=$_GET['id'];
		echo "<center>\n";
		journal_fixed($journal_id, $bd);
		echo "</center>\n";

		
		$query = "SELECT * from journal WHERE journal_id = $journal_id";
		$res = $bd->exec_query($query);
		$journal = $bd->fetch_object($res);
		$log=$journal->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Données non modifiables<br><br>\n";
		}
		else
		{
			echo "<br>\n";
			echo "<form method=\"post\" action=\"journal.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"journal_id\" value=\"$journal_id\">\n";
			echo "<input type=\"submit\" name=\"editjournal\" value=\"modifier les données\">\n";
			echo "<input type=\"submit\" name=\"deletejournal\" value=\"supprimer le journal\"><br>\n";
                	if (check_admin_priv($bd))
               		echo "<br>Si vous êtes sûr(e) que les données sont complètes et correctes, vous pouvez <input type=\"submit\" name=\"validatejournal\" value=\"valider  définitivement la saisie et empêcher les modifications ultérieures.\">\n";
			echo "</form>";
		}

	}
	if ($_GET['mode']=="insert")
	{
		echo "Saisie d'un nouveau journal<br>\n";
		echo "<form method=\"post\" action=\"journal.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		journal_form("insert", "", $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"insertjournal\" value=\"enregistrer les données\"><br>\n";
		echo "</form>\n";
	}

/*
	if ($_GET['mode']=="alter")
	{
		echo "START <br>";
		for ($i=1; $i<141; $i++)
		{
			$query = "SELECT * from journal WHERE journal_id = $i";
			$res = $bd->exec_query($query);
			$journal = $bd->fetch_object($res);
			$fullname=addSlashes($journal->journal_fullname);
			echo "id=$journal->journal_id name=$journal->journal_name fullname=$journal->journal_fullname <br>";
			$query = "REPLACE INTO `journal` (`journal_id`, `journal_name`, `journal_fullname`) VALUES ($journal->journal_id, '$fullname', '$fullname');";
			echo $query . "<br>";
			$res = $bd->exec_query($query);
		}
		echo "END <br>";
	}
*/
}


if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	echo anchor("$filename?mode=insert", "Ajouter un nouveau journal") . "<br>";
	echo journal_lines($bd);
}

	echo anchor("$filename?mode=insert", "Ajouter un nouveau journal") . "<br>";


?>


</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

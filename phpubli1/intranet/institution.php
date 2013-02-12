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
	$filename="institution.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$displayid=""; // if not null, redirect to page for editing institytion with institution_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['editinstitution'])) $action="editinstitution";
	if (isSet($_POST['validateinstitution'])) $action="validateinstitution";
	if (isSet($_POST['updateinstitution'])) $action="updateinstitution";
	if (isSet($_POST['insertinstitution'])) $action="insertinstitution";
	if (isSet($_POST['deleteinstitution'])) $action="deleteinstitution";
	if (isSet($_POST['deleteinstitutionnow'])) $action="deleteinstitutionnow";
	//echo "action=$action <p>\n";

	$institution_id=$_POST['institution_id'];
	// echo "institution_id=$institution_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$institution_id;
	}
	if ($action=="validateinstitution")
	{
		// echo "action=$action<br>\n";
		institution_validate($institution_id, $bd);
		$displayid=$institution_id;
	}
	if ($action=="updateinstitution")
	{
		// echo "action=$action<br>\n";
		institution_update($_POST, $bd);
		$displayid=$institution_id;
	}
	if ($action=="insertinstitution")
	{
		//echo "action=$action<br>\n";
		$institution_id=institution_insert($_POST, $bd);
		//echo "institution_id=$institution_id<br>\n";
		$displayid=$institution_id;
	}
	if ($action=="deleteinstitutionnow")
	{
		//echo "action=$action<br>\n";
		// print ("<b>Suppression de l'institution $institution_id</b><br>\n");
		institution_delete($institution_id, $bd);
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
<title>Institutions</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("institution"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Opérations sur la table des institutions</h1>

<?php

if (isSet($_POST['action']))
{
	if ($action=="editinstitution")
	{
		//echo "action=$action<br>\n";
		echo "Mise à jour des données d'une institution<br>\n";
		echo "<form method=\"post\" action=\"institution.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editinstitution\">\n";
		echo "<input type=\"hidden\" name=\"institution_id\" value=\"$institution_id\">\n";
		echo "<center>\n";
		institution_form("update", $institution_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updateinstitution\" value=\"mettre à jour l'institution\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="deleteinstitution")
	{
		//echo "action=$action<br>\n";
	
		$query = "select count(*) from document where institution_id='$institution_id'";
        	// print ("query= $query <p>\n");
        	$res = $bd->exec_query($query);
		// print "res=$res <br>\n";
		$ob = $bd->fetch_row ($res);
		if ( $ob[0] > 0 )
		{
			institution_fixed($institution_id, $bd);
			print ("<b>Impossible de supprimer cette institution&nbsp;: des "
				. anchor("$rootdir/search.php?search=institution&id=$institution_id", "documents")
				. " en dépendent.</b><br><br>\n");
		}
		else
		{
			print ("<b>Supprimer effectivement cette institution&nbsp;?</b>\n");
			echo "<form method=\"post\" action=\"institution.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deleteinstitution\">\n";
			echo "<input type=\"hidden\" name=\"institution_id\" value=\"$institution_id\">\n";
			echo "<center>\n";
			institution_fixed($institution_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deleteinstitutionnow\" value=\"supprimer maintenant\">\n";
			echo "</form>\n";
		}
	}

}

if (isSet($_GET['mode']))
{
	if ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) )
	{
		// entry point to edit an existing institution given its institution_id
		$institution_id=$_GET['id'];
		echo "<center>\n";
		institution_fixed($institution_id, $bd);
		echo "</center>\n";

		
		$query = "SELECT * from institution WHERE institution_id = $institution_id";
		$res = $bd->exec_query($query);
		$institution = $bd->fetch_object($res);
		$log=$institution->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Données non modifiables<br><br>\n";
		}
		else
		{
			echo "<br>\n";
			echo "<form method=\"post\" action=\"institution.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"institution_id\" value=\"$institution_id\">\n";
			echo "<input type=\"submit\" name=\"editinstitution\" value=\"modifier les données\">\n";
			echo "<input type=\"submit\" name=\"deleteinstitution\" value=\"supprimer l'institution\"><br>\n";
                	if (check_admin_priv($bd))
               		echo "<br>Si vous êtes sûr(e) que les données sont complètes et correctes, vous pouvez <input type=\"submit\" name=\"validateinstitution\" value=\"valider  définitivement la saisie et empêcher les modifications ultérieures.\">\n";
			echo "</form>";
		}

	}
	if ($_GET['mode']=="insert")
	{
		echo "Saisie d'une nouvelle institution<br>\n";
		echo "<form method=\"post\" action=\"institution.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		institution_form("insert", "", $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"insertinstitution\" value=\"enregistrer les données\"><br>\n";
		echo "</form>\n";
	}
}


if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	echo anchor("$filename?mode=insert", "Ajouter une nouvelle institution") . "<br>";
	echo institution_lines($bd);
}

	echo anchor("$filename?mode=insert", "Ajouter une nouvelle institution") . "<br>";


?>


</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

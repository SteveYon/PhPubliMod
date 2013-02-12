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
	$filename="personne.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$displayid=""; // if not null, redirect to page for editing person with pers_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['editpersonne'])) $action="editpersonne";
	if (isSet($_POST['validatepersonne'])) $action="validatepersonne";
	if (isSet($_POST['updatepersonne'])) $action="updatepersonne";
	if (isSet($_POST['insertpersonne'])) $action="insertpersonne";
	if (isSet($_POST['deletepersonne'])) $action="deletepersonne";
	if (isSet($_POST['deletepersonnenow'])) $action="deletepersonnenow";
	//echo "action=$action <p>\n";

	$pers_id=$_POST['pers_id'];
	// echo "pers_id=$pers_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=$action<br>\n";
		$displayid=$pers_id;
	}
	if ($action=="validatepersonne")
	{
		// echo "action=$action<br>\n";
		personne_validate($pers_id, $bd);
		$displayid=$pers_id;
	}
	if ($action=="updatepersonne")
	{
		// echo "action=$action<br>\n";
		personne_update($_POST, $bd);
		$displayid=$pers_id;
	}
	if ($action=="insertpersonne")
	{
		//echo "action=$action<br>\n";
		$pers_id=personne_insert($_POST, $bd);
		//echo "pers_id=$pers_id<br>\n";
		$displayid=$pers_id;
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
<title>Personnes</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("personne"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Opérations sur la table des personnes</h1>


<?php

if (isSet($_POST['action']))
{
	if ($action=="editpersonne")
	{
		//echo "action=$action<br>\n";
		echo "Mise à jour des données d'une personne<br>\n";
		echo "<form method=\"post\" action=\"personne.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editpersonne\">\n";
		echo "<input type=\"hidden\" name=\"pers_id\" value=\"$pers_id\">\n";
		echo "<center>\n";
		personne_form("update", $pers_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatepersonne\" value=\"mettre à jour la personne\">\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="deletepersonne")
	{
		//echo "action=$action<br>\n";
	
		$query = "select count(*) from participer where pers_id='$pers_id'";
        	// print ("query= $query <p>\n");
        	$res = $bd->exec_query($query);
		// print "res=$res <br>\n";
		$ob = $bd->fetch_row ($res);
		if ( $ob[0] > 0 )
		{
			personne_fixed($pers_id, $bd);
			print ("<b>Impossible de supprimer cette personne&nbsp;: des "
				. anchor("$rootdir/search.php?search=personne&id=$pers_id", "documents")
				. " en dépendent.</b><br><br>\n");
		}
		else
		{
			print ("<b>Supprimer effectivement cette personne&nbsp;?</b>\n");
			echo "<form method=\"post\" action=\"personne.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deletepersonne\">\n";
			echo "<input type=\"hidden\" name=\"pers_id\" value=\"$pers_id\">\n";
			echo "<center>\n";
			personne_fixed($pers_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deletepersonnenow\" value=\"supprimer maintenant\">\n";
			echo "</form>\n";
		}
	}
	if ($action=="deletepersonnenow")
	{
		//echo "action=$action<br>\n";

		print ("<b>Suppression de la personne $pers_id</b><br>\n");
		personne_delete($pers_id, $bd);
	}
}

if (isSet($_GET['mode']))
{
	if ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) )
	{
		// entry point to edit an existing person given its pers_id
		$pers_id=$_GET['id'];
		echo "<center>\n";
		personne_fixed($pers_id, $bd);
		echo "</center>\n";
		
		$query = "SELECT * from personne WHERE pers_id = $pers_id";
		$res = $bd->exec_query($query);
		$personne = $bd->fetch_object($res);
		$log=$personne->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Données non modifiables<br><br>\n";
		}
		else
		{
			echo "<br>\n";
			echo "<form method=\"post\" action=\"personne.php\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"pers_id\" value=\"$pers_id\">\n";
			echo "<input type=\"submit\" name=\"editpersonne\" value=\"modifier les données\">\n";
			echo "<input type=\"submit\" name=\"deletepersonne\" value=\"supprimer la personne\"><br>\n";
                	if (check_admin_priv($bd))
               		echo "<br>Si vous êtes sûr(e) que les données sont complètes et correctes, vous pouvez <input type=\"submit\" name=\"validatepersonne\" value=\"valider  définitivement la saisie et empêcher les modifications ultérieures.\">\n";
			echo "</form>";
		}

	}
	if ($_GET['mode']=="insert")
	{
		echo "Saisie d'une nouvelle personne<br>\n";
		echo "<form method=\"post\" action=\"personne.php\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		personne_form("insert", "", $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"insertpersonne\" value=\"enregistrer les données\"><br>\n";
		echo "</form>\n";
	}
}


if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	echo anchor("$filename?mode=insert", "Ajouter une nouvelle personne") . "<br>";
	echo personne_lines($bd);
}
	echo anchor("$filename?mode=insert", "Ajouter une nouvelle personne") . "<br>";

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

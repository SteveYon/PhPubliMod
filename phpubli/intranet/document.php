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
	$localdir="intranet";
	$filename="document.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/functions_export.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

$typedoc="";


if ( (isSet($_GET['mode'])) && ($_GET['mode']=="edit") && (isSet($_GET['id'])) )
{
	$docid=$_GET['id'];
	$result = $bd->exec_query("SELECT * FROM document WHERE doc_id='$docid' "); 
	$ob=$bd->fetch_object($result);
	$typedoc_id=$ob->typedoc_id;

	$result = $bd->exec_query("SELECT * FROM typedoc WHERE typedoc_id='$typedoc_id' "); 
	$ob=$bd->fetch_object($result);
	$typedoc=$ob->typedoc_libelle;
}


if ( (isSet($_GET['doc'])) && ($_GET['doc']!="") )
	$typedoc=$_GET['doc'];

$fonction_range="123";
if ($typedoc=="article")
	$fonction_range="1";	// only authors
if ($typedoc=="conference_proceeding")
	$fonction_range="1";	// only authors
if ($typedoc=="conference_abstract")
	$fonction_range="1";	// only authors
if ($typedoc=="these")
	$fonction_range="13";	// author or advisor
if ($typedoc=="proceedings_book")
	$fonction_range="2";	// only editors
if ($typedoc=="book")
	$fonction_range="1";	// only authors

if ("$typedoc"!="")
{
	$result = $bd->exec_query("SELECT typedoc_id FROM typedoc WHERE typedoc_libelle='$typedoc' "); 
	$ob=$bd->fetch_object($result);
	$typedoc_id=$ob->typedoc_id;

	$docflag="?doc=$typedoc";
}
else
{
	$typedoc_id="";

	$docflag="";
}

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Documents</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("doc"); ?>

<div id=mainarea>
<!-- start main panel -->

<h1>Opérations sur la table des documents</h1>


<?php

$displayid=""; // if not null, display doc with doc_id==displayid

if (isSet($_POST['action']))
{
	if (isSet($_POST['edit'])) $action="edit";
	if (isSet($_POST['validate'])) $action="validate";
	if (isSet($_POST['deletedocument'])) $action="deletedocument";
	if (isSet($_POST['deletedocumentnow'])) $action="deletedocumentnow";

	if (isSet($_POST['editdocumentdata'])) $action="editdocumentdata";
	if (isSet($_POST['editdocumentauth'])) $action="editdocumentauth";

	if (isSet($_POST['updatedocumentdata'])) $action="updatedocumentdata";
	if (isSet($_POST['updatedocumentauth'])) $action="updatedocumentauth";

	if (isSet($_POST['insertdocumentdata'])) $action="insertdocumentdata";
	if (isSet($_POST['insertdocumentauth'])) $action="insertdocumentauth";

	$doc_id=$_POST['doc_id'];
	//echo "doc_id=$doc_id <br>\n";

	if ($action=="edit")
	{
		//echo "action=edit<br>\n";
		//header("Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id");
		$displayid=$doc_id;
	}
	if ($action=="validate")
	{
		//echo "action=$action<br>\n";

		document_data_validate($doc_id, $bd);
		document_auth_validate($doc_id, $bd);
		$displayid=$doc_id;
	}
	if ($action=="editdocumentdata")
	{
		//echo "action=editdocumentdata<br>\n";
		echo "Mise à jour des données (sauf personnes) d'un document<br>\n";
		echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editdocumentdata\">\n";
		echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
		echo "<center>\n";
		document_data_form($typedoc_id, "update", $doc_id, $bd);
		document_auth_fixed($doc_id, $bd);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatedocumentdata\" value=\"mettre à jour le document\"><br>\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="updatedocumentdata")
	{
		//echo "action=updatedocumentdata<br>\n";
		document_data_update($_POST, $bd);

		//echo "<center>\n";
		//document_data_fixed($doc_id, $bd);
		//document_auth_fixed($doc_id, $bd);
		//echo "</center>\n";

		//header("Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id");
		$displayid=$doc_id;
	}
	if ($action=="insertdocumentdata")
	{
		// echo "action=insertdocumentdata<br>\n";
		$doc_id=document_data_insert($_POST, $bd);
		// echo "doc_id=$doc_id <br>\n";

		echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insertdocumentdata\">\n";
		echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
		echo "<center>\n";

		//MODIFIER
		document_data_fixed($doc_id, $bd);
		document_auth_form("insert", $doc_id, $bd, $fonction_range);
		echo "<input type=\"submit\" name=\"edit\" value=\"Annuler\">";

		echo "<input type=\"submit\" name=\"insertdocumentauth\" value=\"Valider\"><br>\n";
		echo "</center>\n";

		echo "</form>\n";
	}
	if ($action=="editdocumentauth")
	{
		//echo "action=editdocumentauth <br>\n";
		echo "Mise à jour des auteurs, éditeurs... d'un document<br>\n";
		echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"editdocumentauth\">\n";
		echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
		echo "<center>\n";
		document_data_fixed($doc_id, $bd);
		document_auth_form("update", $doc_id, $bd, $fonction_range);
		echo "</center>\n";
		echo "<input type=\"submit\" name=\"updatedocumentauth\" value=\"mettre à jour les personnes\"><br>\n";
		echo "<input type=\"submit\" name=\"edit\" value=\"réinitialiser\">\n";
		echo "</form>\n";
	}
	if ($action=="updatedocumentauth")
	{
		//echo "action=$action<br>\n";
		document_auth_update("update", $_POST, $bd);

		//echo "header(\"Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id\"); <br>";
		//header("Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id");
		$displayid=$doc_id;
	}
	if ($action=="insertdocumentauth")
	{
		//echo "action=$action<br>\n";
		document_auth_update("insert", $_POST, $bd);

		//echo "header(\"Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id\"); <br>";
		//header("Location: $rootdir/$localdir/$filename?mode=edit&id=$doc_id");
		$displayid=$doc_id;
	}
	if ($action=="deletedocument")
	{
		//echo "action=deletedocument<br>\n";

		$c=0;
		if ( $typedoc="proceedings_book")
		{
			$query = "select count(*) from document where proceedings_id='$doc_id'";
			//print ("query=$query <p>\n");
			$res = $bd->exec_query($query);
			//print "res=$res <br>\n";
			$ob = $bd->fetch_row ($res);
			$c=$ob[0];
			//print "c=$c <br>\n";
		}
		
		if ($c>0)
		{
			document_data_fixed($doc_id, $bd);
			document_auth_fixed($doc_id, $bd);
			print ("<b>Impossible de supprimer ce livre d'actes&nbsp;: des "
                                // . anchor("$rootdir/search.php?search=journal&id=$journal_id", "documents")
                                . " documents en dépendent.</b><br><br>\n");
		}
		else
		{
			print ("<b>Supprimer effectivement ce document&nbsp;?</b><br>\n");
			echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"deletedocument\">\n";
			echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
			echo "<center>\n";
			document_data_fixed($doc_id, $bd);
			document_auth_fixed($doc_id, $bd);
			echo "</center>\n";
			echo "<input type=\"submit\" name=\"deletedocumentnow\" value=\"supprimer maintenant\">\n";
			echo "</form>\n";
		}
	}
	if ($action=="deletedocumentnow")
	{
		//echo "action=deletedocumentnow<br>\n";

		print ("<b>Suppression du document $doc_id</b><br>\n");
		document_auth_delete($doc_id, $bd);
		document_data_delete($doc_id, $bd);
	}
}

if ( (isSet($_GET['mode'])) || ($displayid!="") )
{
	if ( ( ($_GET['mode']=="edit") and (isSet($_GET['id'])) ) || ($displayid!="") )
	{
		// entry point to edit an existing document given its doc_id
		if ($displayid!="") 
			$doc_id=$displayid;
		else
			$doc_id=$_GET['id'];
		echo "<center>\n";
		document_data_fixed($doc_id, $bd);
		document_auth_fixed($doc_id, $bd);
		echo "</center>\n";

		
		$query = "SELECT * from document WHERE doc_id = $doc_id";
		$res = $bd->exec_query($query);
		$document = $bd->fetch_object($res);

		$log=$document->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
		{
			echo "Données non modifiables<br><br>\n";
		}
		else
		{
			echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"mode_edit\">\n";
			echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
			echo "<input type=\"submit\" name=\"editdocumentdata\" value=\"Modifier les données\"><br>\n";
			echo "<input type=\"submit\" name=\"editdocumentauth\" value=\"Modifier les auteurs\"><br>\n";
			echo "<input type=\"submit\" name=\"deletedocument\" value=\"Supprimer ce document\"><br>\n";

			if ( "$document->hal"=="")
			{
				echo "<br>";
				echo "L'identifiant HAL n'est pas renseigné.<br>";
				$hal_search_url=hal_search($bd, $doc_id);
				//echo "Créer un " . anchor("./export_notice_hal.php?docid=$doc_id", "fichier XML") ." pour " . anchor_ext("http://import.ccsd.cnrs.fr/importXML.php", "transférer automatiquement") ." les données ci-dessus vers HAL.<br><br>\n";
				//echo "Créer un " . anchor("./export_bibtex.php?docid=$doc_id", "fichier Bibtex") ." pour " . anchor_ext("http://import.ccsd.cnrs.fr/importXML.php", "transférer automatiquement") ." les données ci-dessus vers HAL.<br><br>\n";
				echo "Créer un " . anchor("./export_notice_hal.php?docid=$doc_id", "fichier XML") . "<br>\n";
				echo "Créer un " . anchor("./export_bibtex.php?docid=$doc_id", "fichier Bibtex") ."<br><br>\n";
				echo "Effectuer une " . anchor_ext($hal_search_url, "recherche") . " dans l'archive ouverte HAL, pour vérifier que le document n'y figure pas déjà.<br>\n";

			}

			/*if (check_admin_priv($bd)>0)
			{
               			echo "<br>Si vous êtes sûr(e) que les données sont complètes et correctes, vous pouvez <input type=\"submit\" name=\"validate\" value=\"valider définitivement la saisie et empêcher les modifications ultérieures.\">\n";
			}*/
		}

		echo "</form>";
	}

	if ($_GET['mode']=="insert")
	{			
		echo "<center><h2>\n";

		if ("$typedoc" == "article")
			echo "Saisie d'un nouvel article<br>\n";
		else if ("$typedoc" == "these")
			echo "Saisie d'une nouvelle thèse<br>\n";
		else if ("$typedoc" == "proceedings_book")
			echo "Saisie d'un nouveau livre d'actes d'une conférence<br>\n";
		else if ("$typedoc" == "conference_proceeding")
			echo "Saisie d'une nouvelle communication dans une conférence avec actes publiés<br>\n";
		else if ("$typedoc" == "conference_abstract")
			echo "Saisie d'une nouvelle communication dans une conférence sans actes<br>\n";
		else if ("$typedoc" == "book")
			echo "Saisie d'un nouveau livre<br>\n";
		else
			echo "Saisie d'un nouveau document. Attention, selon le type de document choisi, seuls certains des champs ci-dessous sont pertinents.<br>\n";
		echo "</h2></center>\n";

		echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"insert\">\n";
		echo "<center>\n";
		document_data_form($typedoc_id, "insert", "", $bd);
		echo "<input type=\"submit\" name=\"insertdocumentdata\" value=\"Annuler\">";
		echo "<input type=\"submit\" name=\"insertdocumentdata\" value=\"Suite (Ajout des auteurs)\"><br>\n";
		echo "</center>\n";
		echo "</form>\n";
	}

	if ($_GET['mode']=="import"){
		if ("$typedoc" == "fichier"){
		echo "<form method=\"post\" action=\"document.php$docflag\" name=\"form\">\n";
		document_data_import($typedoc_id, "insert", "", $bd);
		echo "</form>\n";
		}
	}

/*
	if ($_GET['mode']=="alter")
	{
		echo "START <br>";
			// $query = "SELECT * from document WHERE typedoc_id=4 AND year=2006 ";
			$query = "SELECT * from document WHERE typedoc_id=4";
			$res = $bd->exec_query($query);
			$i=0;
			echo "<table>\n";
			while ( ($document = $bd->fetch_object($res)) )
			{
				$i++;

				$title=addSlashes($document->title);
				$year=addSlashes($document->year);
				$volume=addSlashes($document->volume);
				$doi=addSlashes($document->doi);
				$journal_id=addSlashes($document->journal_id);
				$doc_id=$document->doc_id;

				$page_start=$document->page_start;
				$page_end=$document->page_end;

				// $pages=addSlashes($document->pages);
				$pages=trim($document->pages);

				if ("$pages"!="")
				{
					// $pagearray=explode("--", $pages);
					$pagearray=explode("-", $pages);
					if ("$pagearray[0]"!="")
					{
						$page_start=trim($pagearray[0]);
						$page_end=trim($pagearray[1]);
						$query = "update document set pages='', page_start='$page_start', page_end='$page_end' where doc_id='$doc_id'";
						echo $query . "<br>";
						$bd->exec_query($query);
					}
				}

				$line="<td>$i</td> <td>doc_id=$doc_id</td>";
				// $line .= " title=$title year=$year volume=$volume doi=$doi journal_id=$journal_id";
				$line .= " <td>pages=$pages</td>     <td>page_start=$page_start</td> <td>page_end=$page_end</td>";
				echo "<tr>$line </tr>\n";
/ *
			$query = "INSERT INTO `document` (`doc_id`, `title`, `journal_id`, `year`, `volume`, `pages`, `doi`) VALUES ('$doc_id', '$title', '$journal_id', '$year', '$volume', '$pages', '$doi');";
			echo $query . "<br>";
			$bd->exec_query($query);
* /
			}
			echo "</table>\n";
		echo "END <br>";
	}
*/

}

if ( (!isSet($_GET['mode'])) and  (!isSet($_POST['action'])) )
{
	/*echo anchor("document.php?doc=article&mode=insert", "Ajouter e un nouvel article") . "<br>";
	echo anchor("document.php?doc=these&mode=insert", "Ajouter une nouvelle thèse") . "<br>";
	echo anchor("document.php?doc=conference_proceeding&mode=insert", "Ajouter une nouvelle communication dans une conférence avec actes publiés") . "<br>";
	echo anchor("document.php?doc=conference_abstract&mode=insert", "Ajouter une nouvelle communication dans une conférence sans actes") . "<br>";
	echo anchor("document.php?doc=proceedings_book&mode=insert", "Ajouter un nouveau livre d'actes d'une conférence") . "<br>";
	echo anchor("document.php?doc=book&mode=insert", "Ajouter un nouveau livre") . "<br>";*/

	//pour les articles
	$typedoc_id=4;
	echo document_lines($bd, $typedoc_id);
}
	/*echo anchor("document.php?doc=article&mode=insert", "Ajouter un nouvel article") . "<br>";
	echo anchor("document.php?doc=these&mode=insert", "Ajouter une nouvelle thèse") . "<br>";
	echo anchor("document.php?doc=conference_proceeding&mode=insert", "Ajouter une nouvelle communication dans une conférence avec actes publiés") . "<br>";
	echo anchor("document.php?doc=conference_abstract&mode=insert", "Ajouter une nouvelle communication dans une conférence sans actes") . "<br>";
	echo anchor("document.php?doc=proceedings_book&mode=insert", "Ajouter un nouveau livre d'actes d'une conférence") . "<br>";
	echo anchor("document.php?doc=book&mode=insert", "Ajouter un nouveau livre") . "<br>";*/

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

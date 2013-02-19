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
	$rootdir=".";
	$localdir=".";
	$filename="search.php";
	require_once ("$rootdir/include.php");
?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Publications du <?php echo $LABO; ?></title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu("search"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Recherche dans la base de données</h1>

<?php

$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

// empty table for default values
$NULL_SEARCH = array ("author"=>"", "test_author"=>"0", "year"=>"", "test_year"=>"0", "journal_id"=>"0", "test_tri"=>"0", "test_ordre"=>"0", "groupe"=>"");

// $message = ControleSaisie($_POST);

if (isSet($_GET['search']))
{
	$search=$_GET['search'];
	$argid=$_GET['id'];

	//echo "argid=$argid <br>";
	$idlist=explode("OR", $argid);
	//echo "idlist_e=$idlist[0] $idlist[1] <br>";
	$n=count($idlist);
	//echo "count=$n <br>";

	if (isSet($_GET['groupe']))
		$groupid=$_GET['groupe'];
	else
		$groupid="-1";


	if ("$search"=="doc")
	{
 		$query = "SELECT * FROM document WHERE";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
       				$query .= " doc_id = $idlist[$i]";
			else
       				$query .= " OR doc_id = $idlist[$i]";
		}
        	$query .= " ORDER BY document.year DESC ";
	}
	if ("$search"=="personne")
	{
 		$query = "SELECT DISTINCT document.*"
                	. " FROM document, participer, personne"
                	. " WHERE document.doc_id = participer.doc_id"
			. " AND participer.pers_id = personne.pers_id ";
			// . " AND participer.fonction_id=1";
		if ($groupid>=0)
			$query .= " AND document.groupe LIKE '%$groupid%'";
		$query .= " AND (";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
       				$query .= " participer.pers_id = $idlist[$i]";
			else
       				$query .= " OR participer.pers_id = $idlist[$i]";
		}
		$query .= " )";
        	$query .= " ORDER BY document.year DESC ";
	}
	if ("$search"=="journal")
	{
 		$query = "SELECT DISTINCT document.*"
                	. " FROM document, participer, personne"
                	. " WHERE document.doc_id = participer.doc_id"
			. " AND participer.pers_id = personne.pers_id "
			. " AND participer.fonction_id=1";
		if ($groupid>=0)
			$query .= " AND document.groupe LIKE '%$groupid%'";
		$query .= " AND (";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
       				$query .= " document.journal_id = $idlist[$i]";
			else
       				$query .= " OR document.journal_id = $idlist[$i]";
		}
		$query .= " )";
        	$query .= " ORDER BY document.year DESC ";
	}
	if ("$search"=="year")
	{
 		$query = "SELECT DISTINCT document.*"
                	. " FROM document, participer, personne"
                	. " WHERE document.doc_id = participer.doc_id"
			. " AND participer.pers_id = personne.pers_id "
			. " AND participer.fonction_id=1"
			. " AND participer.rang=1";
		if ($groupid>=0)
			$query .= " AND document.groupe LIKE '%$groupid%'";
		$query .= " AND (";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
       				$query .= " document.year = $idlist[$i]";
			else
       				$query .= " OR document.year = $idlist[$i]";
		}
		$query .= " )";
        	$query .= " ORDER BY document.year DESC, personne.pers_last ASC, personne.pers_first ASC ";
	}
	if ("$search"=="conf")
	{
 		$query = "SELECT DISTINCT doc1.*"
                	. " FROM document doc1, document doc2, participer, personne"
                	. " WHERE doc1.doc_id = participer.doc_id"
			. " AND participer.pers_id = personne.pers_id "
			. " AND participer.fonction_id=1"
			. " AND participer.rang=1";
		if ($groupid>=0)
			$query .= " AND doc1.groupe LIKE '%$groupid%'";
		$query .= " AND (";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
			{
				$query .= " ( ";
       				$query .= " doc1.conference_id = $idlist[$i]";
				$query .= " OR ( doc2.conference_id = $idlist[$i] AND doc1.proceedings_id=doc2.doc_id ) ";
				$query .= " ) ";
			}
			else
			{
				$query .= " OR ( ";
       				$query .= " doc1.conference_id = $idlist[$i]";
				$query .= " OR ( doc2.conference_id = $idlist[$i] AND doc1.proceedings_id=doc2.doc_id ) ";
				$query .= " ) ";
			}
		}
		$query .= " )";
        	$query .= " ORDER BY doc1.year DESC, personne.pers_last ASC, personne.pers_first ASC ";
	}
	if ("$search"=="proc")
	{
 		$query = "SELECT DISTINCT document.*"
                	. " FROM document, participer, personne"
                	. " WHERE document.doc_id = participer.doc_id"
			. " AND participer.pers_id = personne.pers_id "
			. " AND participer.fonction_id=1"
			. " AND participer.rang=1";
		if ($groupid>=0)
			$query .= " AND document.groupe LIKE '%$groupid%'";
		$query .= " AND (";
		for ($i=0; $i<$n; $i++)
		{
			if ($i==0)
       				$query .= " document.proceedings_id = $idlist[$i]";
			else
       				$query .= " OR document.proceedings_id = $idlist[$i]";
		}
		$query .= " )";
        	$query .= " ORDER BY document.year DESC, personne.pers_last ASC, personne.pers_first ASC ";
	}
	if ("$search"=="last")
	{
 		$query = "SELECT * from document";
        	$query .= " WHERE typedoc_id != '7'";
        	$query .= " ORDER BY date DESC ";
        	$query .= " LIMIT 20";
	}

	//echo "query=$query <br>";

}

if (isSet($_POST['action']))
{
	$action=$_POST['action'];
	// echo "action=$action <p>\n";

 	$query = setup_searchquery($_POST, $bd);
	// echo "query = $query <p>\n";

	// search_form($_POST, $bd);
}

$result = $bd->exec_query("SELECT * FROM typedoc");
while ( $ob=$bd->fetch_object($result))
{
	$list_typedocname[$ob->typedoc_id]="$ob->typedoc_name";
	$list_typedoclibelle[$ob->typedoc_id]="$ob->typedoc_libelle";
}


if ( "$query" != "")
{
	if (isSet($_POST['action']))
	{
		echo "<br><a href=\"#query\">Nouvelle requête</a><br><br>\n";
	}

	$res = $bd->exec_query($query);

	$lines="";
	$i=0;

	$lines_articles="<tr><td></td><td><a name=\"" . $list_typedoclibelle["4"] . "\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>" . $list_typedocname["4"] . "</b></td></tr>\n";
	$n_articles=0;
	$n_articles_tot=0;
	$flag_ext_a=0;

	$lines_theses="<tr><td></td><td><a name=\"" . $list_typedoclibelle["6"] . "\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>" . $list_typedocname["6"] . "</b></td></tr>\n";
	$n_theses=0;
	$n_theses_tot=0;
	$flag_ext_t=0;

	$lines_confproc="<tr><td></td><td><a name=\"" . $list_typedoclibelle["3"] . "\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>" . $list_typedocname["3"] . "</b></td></tr>\n";
	$n_confproc=0;
	$n_confproc_tot=0;
	$flag_ext_p=0;

	$lines_confabs="<tr><td></td><td><a name=\"" . $list_typedoclibelle["8"] . "\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>" . $list_typedocname["8"] . "</b></td></tr>\n";
	$n_confabs=0;
	$n_confabs_tot=0;
	$flag_ext_c=0;

	$lines_invited="<tr><td></td><td><a name=\"invited\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>conférences invitées</b></td></tr>\n";
	$n_invited=0;
	$n_invited_tot=0;
	$flag_ext_i=0;

	$lines_books="<tr><td></td><td><a name=\"" . $list_typedoclibelle["1"] . "\"></a></td><td>&nbsp;</td></tr>\n<tr><td></td><td></td><td><b>" . $list_typedocname["1"] . "</b></td></tr>\n";
	$n_books=0;
	$n_books_tot=0;
	$flag_ext_b=0;

	$lines_all="<tr><td></td><td></td></tr>\n";
	$n_all=0;
	$n_all_tot=0;
	$flag_ext_all=0;

	while ( ($doc = $bd->fetch_object($res)) )
	{
		// $i++;
		// $lines .= document_singleline($i, $doc, $bd, $flag_ext);

			$lines_all .= document_singleline($n_all, $doc, $bd, $flag_ext_all);
			$n_all_tot++;

		if ( ( "$doc->typedoc_id" == "3" ) && ( "$doc->soustypedoc_id" != "31" ) )
		{
			$lines_confproc .= document_singleline($n_confproc, $doc, $bd, $flag_ext_p);
			$n_confproc_tot++;
		}
		if ( ( "$doc->typedoc_id" == "8" ) && ( "$doc->soustypedoc_id" != "81" ) )
		{
			$lines_confabs .= document_singleline($n_confabs, $doc, $bd, $flag_ext_c);
			$n_confabs_tot++;
		}
		if ( "$doc->typedoc_id" == "4" )
		{
			$lines_articles .= document_singleline($n_articles, $doc, $bd, $flag_ext_a);
			$n_articles_tot++;
		}
		if ( "$doc->typedoc_id" == "6" )
		{
			$lines_theses .= document_singleline($n_theses, $doc, $bd, $flag_ext_t);
			$n_theses_tot++;
		}
		if ( "$doc->typedoc_id" == "1" )
		{
			$lines_books .= document_singleline($n_books, $doc, $bd, $flag_ext_t);
			$n_books_tot++;
		}
		if ( ( "$doc->soustypedoc_id" == "31" ) || ( "$doc->soustypedoc_id" == "81" ) )
		{
			$lines_invited .= document_singleline($n_invited, $doc, $bd, $flag_ext_i);
			$n_invited_tot++;
		}
	}

	if ("$search"=="last")
	{
		$lines .= "</td></tr>\n";
		if ( $n_all > 0 )	$lines.=$lines_all;
	}
	else
	{
		$lines = "<tr><td></td><td></td><td>";
		if ( $n_articles_tot > 0 )	$lines.="|<a href=\"#" . $list_typedoclibelle["4"] . "\">" . $list_typedocname["4"] . "</a>|";
		if ( $n_theses_tot > 0 )	$lines.="|<a href=\"#" . $list_typedoclibelle["6"] . "\">" . $list_typedocname["6"] . "</a>|";
		if ( $n_invited_tot > 0 )	$lines.="|<a href=\"#invited\">conférences invitées</a>|";
		if ( $n_confproc_tot > 0 )	$lines.="|<a href=\"#" . $list_typedoclibelle["3"] . "\">" . $list_typedocname["3"] . "</a>|";
		if ( $n_confabs_tot > 0 )	$lines.="|<a href=\"#" . $list_typedoclibelle["8"] . "\">" . $list_typedocname["8"] . "</a>|";
		if ( $n_books_tot > 0 )	$lines.="|<a href=\"#" . $list_typedoclibelle["1"] . "\">" . $list_typedocname["1"] . "</a>|";
		$lines .= "</td></tr>\n";
		if ( $n_articles_tot > 0 )	$lines.=$lines_articles;
		if ( $n_theses_tot > 0 )	$lines.=$lines_theses;
		if ( $n_invited_tot > 0 )	$lines.=$lines_invited;
		if ( $n_confproc_tot > 0 )	$lines.=$lines_confproc;
		if ( $n_confabs_tot > 0 )	$lines.=$lines_confabs;
		if ( $n_books_tot > 0 )	$lines.=$lines_books;
	}

	$lines .= "<tr><td>&nbsp;</td></tr>\n";
	if ( ($flag_ext_a>0) || ($flag_ext_i>0) || ($flag_ext_p>0) || ($flag_ext_c>0) || ($flag_ext_t>0) || ($flag_ext_b>0) )
	{
		$lines .= "<tr><td></td></tr>\n<tr><td></td><td>*:</td><td>Publication hors $LABO</td></tr>\n";
	}

	// DOI icon
	//$lines .= "<tr><td></td></tr>\n<tr><td></td><td>" . anchor_ext_icon("http://www.doi.org/", "doi.ico")
	//		. ":</td><td>Lien " . anchor("http://www.doi.org/", "DOI") . " vers le document original"
	//		. " </td></tr>\n";

	//HAL icon
	//$lines .= "<tr><td></td></tr>\n<tr><td></td><td>" . anchor_ext_icon("http://hal.archives-ouvertes.fr/", "hal.ico")
	//		. ":</td><td>Accéder au document dans l'archive ouverte "
	//		. anchor("http://hal.archives-ouvertes.fr/", "HAL (Hyperarticles en ligne)")
	//		. " </td></tr>\n";

	// google icon
	//$lines .= "<tr><td></td></tr>\n<tr><td></td><td>" . anchor_ext_icon("http://scholar.google.fr/", "google.ico")
	//		. ":</td><td>Recherche du document avec "
	//		. anchor("http://scholar.google.fr/", "Google Scholar")
	//		. " </td></tr>\n";

	echo "<form method=\"post\" action=\"selection.php\">\n";
	echo "<table>" . $lines . "</table>\n";
	echo "<input type=\"hidden\" name=\"currentselection\">\n";
	echo "<input type=\"submit\" name=\"addtoselection\" value=\"add selected items to marked list\">\n";
	echo "<input type=\"submit\" name=\"addalltoselection\" value=\"add all items to marked list\">\n";
	echo "<input type=\"submit\" name=\"clearselection\" value=\"clear selection\">\n";
	echo "</form>\n";
}


if (isSet($_POST['action']))
{
	echo "<br><br><a name=\"query\"></a><h2>Nouvelle requête&nbsp</h2>\n";
	search_form($_POST, $bd);
}
else
{
	search_form($NULL_SEARCH, $bd);
}

//warning(); 
?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

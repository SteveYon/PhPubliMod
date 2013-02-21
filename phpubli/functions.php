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

// ****************************************************************
// search operations

function search_form($tab, $bd)
{
	// get lists 
	$list_journal["0"]=" -- tous -- ";
	$result = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname"); 
	while ( $ob=$bd->fetch_object($result))
		$list_journal[$ob->journal_id]="$ob->journal_fullname";

	$list_typedoc["0"]=" -- tous -- ";
	$result = $bd->exec_query("SELECT * FROM typedoc ORDER BY typedoc.order"); 
	while ( $ob=$bd->fetch_object($result))
		if ("$ob->typedoc_id"!="7")
		$list_typedoc[$ob->typedoc_id]="$ob->typedoc_name";

		// quelques hacks pour les cas spéciaux
		$list_typedoc["X1"]="communications invitées";

	$list_groupe["0"]=" -- tous -- ";
	$result = $bd->exec_query("SELECT * FROM groupes"); 
	while ( $ob=$bd->fetch_object($result))
		$list_groupe[$ob->g_id]="$ob->g_fullname";

	$test_string = array ("contient", "est", "commence par", "finit par");
	$test_year = array ("=", "<", ">");
	// $test_tri = array ("par année", "par premier auteur");
	// $test_ordre = array ("descendant", "ascendant");

	echo "<form method='post' action='search.php' name='form'>\n";
	echo "<input type='hidden' name=\"action\" value=\"searchnow\">\n";
	echo "<table>\n";
	echo "<tr><td><b>Auteur</b></td>\n";
	echo "<td><select name=\"test_author\" size=\"1\">";
	foreach ($test_string as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"==$tab['test_author']) echo " selected";
                        echo ">$name</option>\n";
                }
	echo "</select><input type='text' name=\"author\" value=\"" . $tab['author'] . "\" size='20' maxlength='40'>";
	echo "</td></tr>\n";
	echo "<tr><td><b>Année</b></td>\n";
	echo "<td><select name=\"test_year\" size=\"1\">";
	foreach ($test_year as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"==$tab['test_year']) echo " selected";
                        echo ">$name</option>\n";
                }
	echo "</select><input type='text' name=\"year\" value=\"" . $tab['year'] . "\" size='4' maxlength='4'>";
	echo "</td></tr>\n";
	/*echo "<tr><td><b>Type de Document</b></td>\n";*/
	/*echo "<td><select name=\"typedoc_id\" size=\"1\">";
	foreach ($list_typedoc as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"==$tab['typedoc_id']) echo " selected";
                        echo ">$name</option>\n";
                }
	echo "</select></td></tr>\n";*/

	echo"<input type=\"hidden\"  name=\"typedoc_id\"  value=\"4\">";


	echo "<tr><td><b>Groupe</b></td>\n";
	echo "<td><select name=\"groupe\" size=\"1\">";
	foreach ($list_groupe as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"==$tab['groupe']) echo " selected";
                        echo ">$name</option>\n";
                }
	echo "</select></td></tr>\n";
	echo "<tr><td></td><td><input type='submit' name=\"rechercher\" value=\"Rechercher\"></td></tr>\n";
	echo "</table>\n";
	echo "</form>\n";
}

function setup_searchquery($tab, $bd)
{
	$author = $bd->prepare_string($tab['author']);
	$year = $bd->prepare_string($tab['year']);
	$typedoc_id = $bd->prepare_string($tab['typedoc_id']);
	$groupe = $bd->prepare_string($tab['groupe']);

	// author query
	$authquery="";
	if ($tab['author']!="")
	{
		if ($tab['test_author']=="0")	// contient
			$authquery = " personne.pers_last LIKE '%$author%'";
		if ($tab['test_author']=="1")	// est identique
			$authquery = " personne.pers_last LIKE '$author'";
		if ($tab['test_author']=="2")	// commence par
			$authquery = " personne.pers_last LIKE '$author%'";
		if ($tab['test_author']=="3")	// finit par
			$authquery = " personne.pers_last LIKE '%$author'";
	}

	// year query
	$yearquery="";
	if ($tab['year']!="")
	{
		if ($tab['test_year']=="0")
			$yearquery = " document.year='$year'";
		if ($tab['test_year']=="1")
			$yearquery = " document.year<'$year'";
		if ($tab['test_year']=="2")
			$yearquery = " document.year>'$year'";
	}

	// specify doc type
	$typedocquery="";
	if ($tab['typedoc_id']!="0")
	{
			if ($tab['typedoc_id']=="X1")
				$typedocquery .= " ( document.soustypedoc_id='31' OR document.soustypedoc_id='81' ) ";
			else if ($tab['typedoc_id']=="3")
				$typedocquery .= " document.typedoc_id='3' AND document.soustypedoc_id!='31' ";
			else if ($tab['typedoc_id']=="8")
				$typedocquery .= " document.typedoc_id='8' AND document.soustypedoc_id!='81' ";
			else
				$typedocquery .= " document.typedoc_id='$typedoc_id' ";
	}

	// specify doc groupe
	$groupequery="";
	if ($tab['groupe']!="0")
	{
			$groupequery .= " document.groupe LIKE '%$groupe%'";
	}

	// ordering information
	if ($tab['test_ordre']=="0")
		$order="DESC";
	else
		$order="ASC";
	if ($tab['test_tri']=="0")
		$orderby=" ORDER BY document.year $order, personne.pers_last ASC, personne.pers_first ASC";
	else
		$orderby=" ORDER BY personne.pers_last $order, personne.pers_first, $order document.year DESC";


	$query = "SELECT DISTINCT document.*"
		. " FROM document"//, personne, participer"
		. " WHERE typedoc_id = '4' ";//document.doc_id = participer.doc_id"
		//. " AND personne.pers_id = participer.pers_id";

	/*if ( $tab['author']=="")
	{
		$query .= " AND participer.fonction_id=1"
			. " AND participer.rang=1";
		if ($tab['year']!="")		$query .= " AND " . $yearquery;
		if ($tab['typedoc_id']!="0")	$query .= " AND " . $typedocquery;
		if ($tab['groupe']!="0")	$query .= " AND " . $groupequery;
		$query .= " ORDER BY year DESC,  personne.pers_last, personne.pers_first";
	}
	else
	{*/
		//$query .= " AND " . $authquery;
		//if ($tab['typedoc_id']!="0")	$query .= " AND " . $typedocquery;
		if ($tab['groupe']!="0")	$query .= " AND " . $groupequery;
		if ($tab['year']!="")		$query .= " AND " . $yearquery;
		$query .= " ORDER BY  document.year DESC";
	//}

	return $query;
}

// ****************************************************************
// Display operations

function document_lines($bd, $tid)
{
	if ("$tid"!="")
		$query = "SELECT * FROM document WHERE typedoc_id='$tid'";
	else
		$query = "SELECT * FROM document";
	$query .= " ORDER BY year";
	//echo "query=$query <br>\n";
	$result = $bd->exec_query ($query);
	$lines="";
	$i=0;
	$flag_ext=0;
	while ( $document = $bd->fetch_object ($result) )
	{
		//$i++;
		$lines .= document_singleline($i, $document, $bd, $flag_ext);
	}
	if ($flag_ext>0)
	{
		$lines .= "<tr><td></td></tr>\n<tr><td></td><td>*:</td><td>Publication hors LITIS</td></tr>\n";
	}
	return "<table>\n" . $lines . "</table>\n" ;
}

function document_singleline(&$i, $document, $bd, &$flag)
{
		$result = $bd->exec_query("SELECT * FROM groupes WHERE g_name='exter' ");
        $ob=$bd->fetch_object($result);
		$extgid=$ob->g_id;

		$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

		$i++;
		global $rootdir;
		$lines="";
		$str="";

		$style="";

		$groupe=$document->groupe;
		if (strpbrk($groupe,$extgid))
		{
			$flag=1;
			$ref="*";
			$i--;
			$style=" style=\"color:gray\"";
		}
		else{
			$ref="$i";
		}

		$str .= "<td>"
			. "<input type=\"checkbox\" value=\"docid_sel\" name=\"" . $document->doc_id . "\" >"
			. "<input type=\"hidden\" value=\"docid_selall\" name=\"X" . $document->doc_id . "\" >"
			. "</td>";

		$str .= "<td $style> ";
		$log=$document->log;
		if (check_status($bd)>-1)
		{
			if ("$typedoc_libelle"=="article")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
			if ("$typedoc_libelle"=="these")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
			if ("$typedoc_libelle"=="proceedings_book")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
			if ("$typedoc_libelle"=="conference_proceeding")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
			if ("$typedoc_libelle"=="conference_abstract")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
			if ("$typedoc_libelle"=="book")
				$str .= anchor("$rootdir/intranet/document.php?mode=edit&amp;id=$document->doc_id", $ref) . "."  ;
		}
		else
			$str .= "$ref" . "."  ;
		$str .= "</td>";

		$str .= "<td $style>";

		// author list
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '1' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author=stripSlashes($auth->pers_first) . " " . my_strtoUpper(stripSlashes($auth->pers_last));
			$name=anchor("$rootdir/search.php?search=personne&amp;id=$ob->pers_id", $author);

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}

	/*if ("$typedoc_libelle"=="these")
	{
		// advisor list
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '3' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		if (mysql_num_rows($aresult)>0)
		{

		$str .= " (dir.: ";
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&amp;id=$ob->pers_id", $author);

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}
		$str .= ")";
		}
	}*/

	/*if ("$typedoc_libelle"=="proceedings_book")
	{
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		if (mysql_num_rows($aresult)>0)
		{

		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&amp;id=$ob->pers_id", $author) . " (ed.)";

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}
		}
	}*/

		$str .= " ($document->year, $document->month).";
		$str .= "</td>";
		$lines .= "<tr> " . $str . "</tr>\n";

		$str="<td></td><td></td>";
		$str .= "<td><b>";
		$str .= stripSlashes($document->title);
		$str .= "</b></td>";
		$lines .= "<tr>" . $str . "</tr>\n";
/*

	if ("$typedoc_libelle"=="these")
	{
		$str = "<td></td><td></td><td $style>";
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="Habilitation";
		else
			$key="Thèse";
		$str .= "$key $institution->institution_name";

		// doi
		$doi=stripSlashes($document->doi);
		if ( "$doi"!="")
		{
			$str .= " " . anchor_icon("http://dx.doi.org/$doi", "doi:$doi", "doi.ico");
		}
		// HAL
		$hal=stripSlashes($document->hal);
		if ( "$hal"!="")
		{
			$str .= " " . anchor_ext_icon("http://hal.archives-ouvertes.fr/$hal", "hal.ico");
		}

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ("$typedoc_libelle"=="book")
	{
		$str = "<td></td><td></td><td $style>";
		$query = "SELECT * FROM publisher WHERE publisher_id=$document->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);
		$str .= $publisher->publisher_name . ", " . $publisher->publisher_address . "." ;

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ("$typedoc_libelle"=="proceedings_book")
	{
		$str = "<td></td><td></td><td $style>";

		$query = "SELECT * FROM conference WHERE conference_id=$document->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);
		$str .= "Proceedings of <i>" . stripSlashes($conference->conference_title) . "</i>";

		$str .= ", held in ". stripSlashes($conference->conference_city);

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$cresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($cresult);
		$str .= ", " . $country->printable_name;

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";

		$str = "<td></td><td></td><td $style>";
		$query = "SELECT * FROM publisher WHERE publisher_id=$document->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);
		$str .= $publisher->publisher_name . ", " . $publisher->publisher_address . "." ;

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ( ("$typedoc_libelle"=="conference_abstract") || ("$typedoc_libelle"=="conference_proceeding") )
	{
		$str = "<td></td><td></td><td $style>";
		if ("$typedoc_libelle"=="conference_abstract")
			$confid=$document->conference_id;
		if ("$typedoc_libelle"=="conference_proceeding")
		{
			$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
			$presult = $bd->exec_query ($query);
			$proceedings = $bd->fetch_object ($presult);

			$confid=$proceedings->conference_id;
		}

		$query = "SELECT * FROM conference WHERE conference_id=$confid";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		// $str .= "<i>" . stripSlashes($conference->conference_title) . "</i>";
		$str .= anchor("$rootdir/search.php?search=conf&amp;id=$confid", "<i>" . stripSlashes($conference->conference_title) . "</i>");
		$str .= ", " . stripSlashes($conference->conference_city);

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$cresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($cresult);
		$str .= ", " . $country->printable_name;

		$str .= ".";

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ("$typedoc_libelle"=="conference_proceeding"){
		$str = "<td></td><td></td><td $style>";

		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);
		$str .= "In: ";

		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->proceedings_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		if (mysql_num_rows($aresult)>0)
		{

		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&amp;id=$ob->pers_id", $author) . " (Ed.), ";

			$str .= $name;
		}
		}

		// $str .= "<i>" .  stripSlashes($proceedings->title) . "</i>";
		$str .= anchor("$rootdir/search.php?search=proc&amp;id=$document->proceedings_id", "<i>" . stripSlashes($proceedings->title) . "</i>");

		$query = "SELECT publisher.* FROM publisher, document WHERE publisher.publisher_id=document.publisher_id AND document.doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);
		$str .= ", " . $publisher->publisher_name . ", " . $publisher->publisher_address;

		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$str .= ", $pages_eid";
			if ( "$pages_num"!="")	$str .= " ($pages_num pages)";
		}
		else if ( "$pages_start"!="")
		{
			$str .= ", $pages_start";
			if ( ( "$pages_end"!="") && ( "$pages_end"!="$pages_start") )
				$str .= "&ndash;$pages_end";
		}
		$str .= ".";

		// doi
		$doi=stripSlashes($document->doi);
		if ( "$doi"!="")
		{
			$str .= " " . anchor_icon("http://dx.doi.org/$doi", "doi:$doi", "doi.ico");
		}
		// HAL
		$hal=stripSlashes($document->hal);
		if ( "$hal"!="")
		{
			$str .= " " . anchor_ext_icon("http://hal.archives-ouvertes.fr/$hal", "hal.ico");
		}

		$googlescholar=google_search($bd, $document->doc_id);
		$str .= " " . anchor_ext_icon("$googlescholar", "google.ico");

		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

*/


		$note=stripSlashes($document->note);
		if ( "$note"!="")
		{
			$str="<td></td><td></td><td $style>" . $note . "</td>";
			$lines .= "<tr>" . $str . "</tr>\n";
		}

	return $lines;
}

function document_singleselection($docid, $bd)
{
	$query="SELECT * FROM document WHERE doc_id = $docid";
	$res=$bd->exec_query($query);
	$document=$bd->fetch_object($res);


	$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

		$i++;
		global $rootdir;
		$lines="";
		$str="";

		$open="";
		$close="";

		$ref="$i";

		$str .= "<td><input type=\"checkbox\" value=\"docid_sel\" name=\"" . $document->doc_id . "\" checked ></td>";

		$str .= "<td>" ;

		// author list
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '1' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author=stripSlashes($auth->pers_first) . " " . my_strtoUpper(stripSlashes($auth->pers_last));
			$name=anchor("$rootdir/search.php?search=personne&id=$ob->pers_id", $author);

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}

	if ("$typedoc_libelle"=="these")
	{
		// advisor list
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '3' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		if (mysql_num_rows($aresult)>0)
		{

		$str .= " (dir.: ";
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&id=$ob->pers_id", $author);

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}
		$str .= ")";
		}
	}

	if ("$typedoc_libelle"=="proceedings_book")
	{
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		if (mysql_num_rows($aresult)>0)
		{

		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&id=$ob->pers_id", $author) . " (ed.)";

			$str .= $space;
			$str .= $name;
			$space = ", ";
		}
		}
	}

		$str .= " ($document->year).";
		$str .= "</b>";
			// if (check_status($bd)>-1)
			{
				$halsearch=hal_search($bd, $docid);
				$str .= " [" . anchor_icon("$halsearch", "? HAL", "search.png") . "]" ;
			}
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";



		$str="<td></td>";
		$str .= "<td>"  ;
		$str .= stripSlashes($document->title);
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";

	if ("$typedoc_libelle"=="article")
	{
		$str="<td></td>";
		$str .= "<td>" ;
		$query = "SELECT * FROM journal WHERE journal_id=$document->journal_id";
		$jresult = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($jresult);
		// $str .= "<i>$journal->journal_name</i> ";
		$journalname=anchor("$rootdir/search.php?search=journal&id=$document->journal_id", "<i>$journal->journal_name</i>");
		$str .= $journalname . " ";
		$str .= "<b>" . stripSlashes($document->volume) . "</b>";
		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$str .= ", $pages_eid";
			if ( "$pages_num"!="")	$str .= " ($pages_num pages)";
		}
		else if ( "$pages_start"!="")
		{
			$str .= ", $pages_start";
			if ( "$pages_end"!="")	$str .= "&ndash;$pages_end";
		}
		$str .= ".";

		// doi
		$doi=stripSlashes($document->doi);
		if ( "$doi"!="")
		{
			$str .= " " . anchor_icon("http://dx.doi.org/$doi", "doi:$doi", "doi.ico");
		}
		// HAL
		$hal=stripSlashes($document->hal);
		if ( "$hal"!="")
		{
			$str .= " " . anchor_ext_icon("http://hal.archives-ouvertes.fr/$hal", "hal.ico");
		}
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ("$typedoc_libelle"=="these")
	{
		$str = "<td></td><td>" ;
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="Habilitation";
		else
			$key="Thèse";
		$str .= "$key $institution->institution_name";
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	if ("$typedoc_libelle"=="proceedings_book")
	{
		$str = "<td></td><td>" . $open ;

		$query = "SELECT * FROM conference WHERE conference_id=$document->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);
		$str .= "Proceedings of <i>" . stripSlashes($conference->conference_title) . "</i>";

		$str .= ", held in ". stripSlashes($conference->conference_city);

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$cresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($cresult);
		$str .= ", " . $country->printable_name;

		$str .= $close . "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";

		$str = "<td></td><td></td><td>" . $open ;
		$query = "SELECT * FROM publisher WHERE publisher_id=$document->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);
		$str .= $publisher->publisher_name . ", " . $publisher->publisher_address . "." ;

		$str .= $close . "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ( ("$typedoc_libelle"=="conference_abstract") || ("$typedoc_libelle"=="conference_proceeding") )
	{
		$str = "<td></td><td>" . $open ;
		if ("$typedoc_libelle"=="conference_abstract")
			$confid=$document->conference_id;
		if ("$typedoc_libelle"=="conference_proceeding")
		{
			$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
			$presult = $bd->exec_query ($query);
			$proceedings = $bd->fetch_object ($presult);

			$confid=$proceedings->conference_id;
		}

		$query = "SELECT * FROM conference WHERE conference_id=$confid";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		//$str .= "<i>" . stripSlashes($conference->conference_title) . "</i>";
		$str .= anchor("$rootdir/search.php?search=conf&id=$confid", "<i>" . stripSlashes($conference->conference_title) . "</i>");
		$str .= ", " . stripSlashes($conference->conference_city);

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$cresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($cresult);
		$str .= ", " . $country->printable_name;

		$str .= ".";

		$str .= $close . "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}
	if ("$typedoc_libelle"=="conference_proceeding")
	{
		$str = "<td></td><td>" . $open ;

		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);
		$str .= "In: ";

		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->proceedings_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		if (mysql_num_rows($aresult)>0)
		{

		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			$author="$auth->pers_first" . " " . my_strtoUpper($auth->pers_last);
			$name=anchor("$rootdir/search.php?search=personne&id=$ob->pers_id", $author) . " (Ed.), ";

			$str .= $name;
		}
		}

		//$str .= "<i>" . stripSlashes($proceedings->title) . "</i>";
		$str .= anchor("$rootdir/search.php?search=proc&id=$document->proceedings_id", "<i>" . stripSlashes($proceedings->title) . "</i>");

		$query = "SELECT publisher.* FROM publisher, document WHERE publisher.publisher_id=document.publisher_id AND document.doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);
		$str .= ", " . $publisher->publisher_name . ", " . $publisher->publisher_address;

		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$str .= ", $pages_eid";
			if ( "$pages_num"!="")	$str .= " ($pages_num pages)";
		}
		else if ( "$pages_start"!="")
		{
			$str .= ", $pages_start";
			if ( ( "$pages_end"!="") && ( "$pages_end"!="$pages_start") )
				$str .= "&ndash;$pages_end";
		}
		$str .= ".";

		// doi
		$doi=stripSlashes($document->doi);
		if ( "$doi"!="")
		{
			$str .= " " . anchor_ext("http://dx.doi.org/$doi", "doi:$doi");
			// $str .= " " . anchor_icon("http://dx.doi.org/$doi", "doi:$doi", "icon_pdf.gif");
		}
		// HAL
		$hal=stripSlashes($document->hal);
		if ( "$hal"!="")
		{
			$str .= " " . anchor_ext_icon("http://hal.archives-ouvertes.fr/$hal", "hal.ico");
		}

		$str .= $close . "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

		$note=stripSlashes($document->note);
		if ( "$note"!="")
		{
			$str="<td></td><td>" . $note . "</td>";
			$lines .= "<tr>" . $str . "</tr>\n";
		}

	return $lines;
}

function google_search($bd, $doc_id)
{
	$query="select * from document where doc_id='$doc_id'";
	$result=$bd->exec_query($query);
	$document=$bd->fetch_object($result);

	$searchurl = "?hl=fr&amp;lr=";

	//$searchurl .= "&amp;q=intitle%3A%22" . urlencode(remove_accents(stripslashes($document->title))) . "%22" ;
	// $searchurl .= "&amp;q=intitle%3A%22" . urlencode(stripslashes($document->title)) . "%22" ;
	$searchurl .= "&amp;q=intitle%3A%22" . urlencode(utf8_encode(stripslashes($document->title))) . "%22" ;

	//$searchauthors="&amp;as_authors=";
	//$sa="";
	// author list
	$query = "SELECT pers_id FROM participer"
		. " WHERE doc_id='$doc_id'"
		. " AND fonction_id = '1' "
		. " ORDER BY rang";
	$aresult = $bd->exec_query ($query);
	while ($ob = $bd->fetch_object ($aresult) )
	{
		$query = "SELECT * FROM personne"
			. " WHERE pers_id='$ob->pers_id'";
		$a = $bd->exec_query ($query);
		$auth=$bd->fetch_object($a);

		// $author=ascii2tex(stripSlashes($auth->pers_first)) . " {" . ascii2tex(stripSlashes($auth->pers_last)) . "}";

		$searchurl .= "+AND+author%3A%22" . urlencode(remove_accents(stripSlashes($auth->pers_last))) . "%22";
		//$searchauthors .= "$sa" . urlencode(remove_accents(stripSlashes($auth->pers_last)));
		//$sa=" ";
		
	}

	//$searchurl .= $searchauthors;

	$searchurl .= "&amp;as_ylo=" . $document->year;
	$searchurl .= "&amp;as_yhi=" . $document->year;

	$searchurl .= "&amp;btnG=Rechercher&amp;lr=";
	
	return "http://scholar.google.fr/scholar" .  $searchurl;
}

function hal_search($bd, $doc_id)
{
	$query="select * from document where doc_id='$doc_id'";
	$result=$bd->exec_query($query);
	$document=$bd->fetch_object($result);

	$searchurl = "?action_todo=search&amp;s_type=advanced&amp;submit=1&amp;search_without_file=YES";
	$n=0;

		$searchurl .= "&amp;p_$n=contained&amp;f_$n=TITLE&amp;l_$n=and&amp;v_$n=" . urlencode(stripSlashes($document->title));
		$n++;

	// author list
	$query = "SELECT pers_id FROM participer"
		. " WHERE doc_id='$doc_id'"
		. " AND fonction_id = '1' "
		. " ORDER BY rang";
	$aresult = $bd->exec_query ($query);
	while ($ob = $bd->fetch_object ($aresult) )
	{
		$query = "SELECT * FROM personne"
			. " WHERE pers_id='$ob->pers_id'";
		$a = $bd->exec_query ($query);
		$auth=$bd->fetch_object($a);

		$searchurl .= "&amp;p_$n=is_exactly&amp;f_$n=NMAUTHOR&amp;l_$n=and&amp;v_$n=" . urlencode(stripSlashes($auth->pers_last));
		$n++;
		
	}

		$searchurl .= "&amp;p_$n=is_exactly&amp;f_$n=YEAR&amp;l_$n=and&amp;v_$n=" . $document->year;

	return "http://hal.archives-ouvertes.fr/index.php" .  $searchurl;
}

?>

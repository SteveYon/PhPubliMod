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

// ******************************************************************************
// functions_export.php : export des données à différents formats
//			bibtex, xml compatible HAL, xml générique, RIS
// ******************************************************************************

function export_document_bibtex($docid, $bd)
{
	$lines="";
	$query="SELECT * FROM document WHERE doc_id = $docid";
	$res=$bd->exec_query($query);
	$document=$bd->fetch_object($res);

	$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

	if ("$typedoc_libelle"=="book")	$lines="@BOOK{";
	if ("$typedoc_libelle"=="these")	$lines="@PHDTHESIS{";
	if ("$typedoc_libelle"=="article")	$lines="@ARTICLE{";
	if ("$typedoc_libelle"=="conference_proceeding")	$lines="@INPROCEEDINGS{";

if ( "$lines"!="")
{
	$lines .="lmfa_pub_$docid,\n";

	// author list
	$authlist="";
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

		// $author=ascii2tex(stripSlashes($auth->pers_first)) . " {" . ascii2tex(stripSlashes($auth->pers_last)) . "}";
		$author=ascii2tex(stripSlashes($auth->pers_last)) . ", " . ascii2tex(stripSlashes($auth->pers_first));
		$authlist .= $space;
		$authlist .= $author;
		$space = " AND ";
	}
	$lines .= "\tauthor={" . $authlist . "},\n" ;

	$lines .= "\tyear={" . $document->year . "},\n" ;

	$lines .= "\ttitle={" . ascii2tex(stripSlashes($document->title)) . "},\n" ;

	if ("$typedoc_libelle"=="article")
	{
		$query = "SELECT * FROM journal WHERE journal_id=$document->journal_id";
		$jresult = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($jresult);
		$lines .= "\tjournal={" . ascii2tex(stripSlashes($journal->journal_name)) . "},\n";

		$lines .= "\tvolume={" . $document->volume . "},\n";

		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$lines .= "\tpages={" . $pages_eid . "},\n";
		}
		else if ( "$pages_start"!="")
		{
			$lines .= "\tpages={" . $pages_start;
			if ( "$pages_end"!="")	$lines .= "--$pages_end";
			$lines .= "},\n";
		}
	}

	if ("$typedoc_libelle"=="these")
	{
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="HDR";
		else
			$key="PHD";

		$lines .= "\tschool={" . ascii2tex(stripSlashes($institution->institution_name)) . "},\n";
		$lines .= "\ttype={" . $key . "},\n";
	}
	if ("$typedoc_libelle"=="conference_proceeding")
	{
		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$lines .= "\tpages={" . $pages_eid . "},\n";
		}
		else if ( "$pages_start"!="")
		{
			$lines .= "\tpages={" . $pages_start;
			if ( "$pages_end"!="")	$lines .= "--$pages_end";
			$lines .= "},\n";
		}

		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);

		$lines .= "\tbooktitle={" . ascii2tex(stripSlashes($proceedings->title)) . "},\n";

		// editor list
		$authlist="";
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$proceedings->doc_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		$space="";
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);

			// $author=ascii2tex(stripSlashes($auth->pers_first)) . " {" . ascii2tex(stripSlashes($auth->pers_last)) . "}";
			$author=ascii2tex(stripSlashes($auth->pers_last)) . ", " . ascii2tex(stripSlashes($auth->pers_first));
			$authlist .= $space;
			$authlist .= $author;
			$space = " AND ";
		}
		$lines .= "\teditor={" . $authlist . "},\n" ;

		$query = "SELECT * FROM publisher WHERE publisher_id=$proceedings->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "\tpublisher={" . ascii2tex(stripSlashes($publisher->publisher_name)) . "},\n";
		$lines .= "\taddress={" . ascii2tex(stripSlashes($publisher->publisher_address)) . "},\n";
	}
	if ("$typedoc_libelle"=="book")
	{
		$query = "SELECT * FROM publisher WHERE publisher_id=$document->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "\tpublisher={" . ascii2tex(stripSlashes($publisher->publisher_name)) . "},\n";
		$lines .= "\taddress={" . ascii2tex(stripSlashes($publisher->publisher_address)) . "},\n";
	}

	$note=stripSlashes($document->note);
	if ( "$note"!="")
	{
		$lines .= "\tnote={" . ascii2tex(stripSlashes($note)) . "},\n";
	}

	$lines .= "}\n\n";

	echo $lines;
}
}

function export_document_xmlhal($docid, $bd)
{
	global $LABO_HALID;
	$lines.="\t<NOTICE>\n";
	$query="SELECT * FROM document WHERE doc_id = $docid";
	$res=$bd->exec_query($query);
	$document=$bd->fetch_object($res);

	$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

	// metadonnees - begin
	$lines .= "\t<META_ART_NOTICE>\n";

	$lines .= "\t\t<LANGUE>" . $document->lang . "</LANGUE>\n";

	$lines .= "\t\t<TITLE>" . stripSlashes($document->title) . "</TITLE>\n" ;

	$lines .= "\t\t<REFERENCE_BIBLIO>\n";
	if ("$typedoc_libelle"=="article")
	{
		$lines .= "\t\t<ART_ACL>\n";

		$lines .= "\t\t\t<DATEPUB>" . $document->year . "</DATEPUB>\n" ;

		$lines .= "\t\t\t<JOURNAL>";
			$query = "SELECT * FROM journal WHERE journal_id=$document->journal_id";
			$jresult = $bd->exec_query ($query);
			$journal = $bd->fetch_object ($jresult);
		$lines .= stripSlashes($journal->journal_fullname);
		$lines .= "</JOURNAL>\n";
		$lines .= "\t\t\t<AUDIENCE>" . $journal->journal_audience . "</AUDIENCE>\n" ;

		$lines .= "\t\t\t<VOLUME>" . $document->volume . "</VOLUME>\n";

		$lines .= "\t\t\t<PAGE>";
			$pages_start=$document->pages_start;
			$pages_end=$document->pages_end;
			$pages_eid=$document->pages_eid;
			$pages_num=$document->pages_num;
			if ( "$pages_eid"!="")
			{
				$lines .= $pages_eid;
			}
			else if ( "$pages_start"!="")
			{
				$lines .= $pages_start;
				if ( "$pages_end"!="")
				$lines .= "-" . $pages_end;
			}
		$lines .= "</PAGE>\n";

		$doi=$document->doi;
		if ( "$doi"!="")
		$lines .= "\t\t\t<DOI>" . $doi . "</DOI>\n";

		$lines .= "\t\t</ART_ACL>\n";
	}
	else if ("$typedoc_libelle"=="conference_proceeding")
	{
		$lines .= "\t\t<COMM_ACT>\n";

		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);
		$lines .= "\t\t\t<TITOUV>" . stripSlashes($proceedings->title) . "</TITOUV>\n";

		$query = "SELECT * FROM conference WHERE conference_id=$proceedings->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		$lines .= "\t\t\t<TITCONF>" . stripSlashes($conference->conference_title) . "</TITCONF>\n";
		$lines .= "\t\t\t<DATECONF>" . substr($conference->conference_date_start, 0, 4) . "</DATECONF>\n";
		$lines .= "\t\t\t<VILLE>" . stripSlashes($conference->conference_city) . "</VILLE>\n";
		$lines .= "\t\t\t<PAYS>" . stripSlashes($conference->conference_country_code) . "</PAYS>\n";
		$lines .= "\t\t\t<AUDIENCE>" . $conference->conference_audience . "</AUDIENCE>\n" ;

		$query = "SELECT * FROM publisher WHERE publisher_id=$proceedings->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "\t\t\t<EDCOM>" . stripSlashes($publisher->publisher_name) . "</EDCOM>\n";

		$lines .= "\t\t\t<DATEPUB>" . $document->year . "</DATEPUB>\n" ;

		$lines .= "\t\t\t<PAGE>";
			$pages_start=$document->pages_start;
			$pages_end=$document->pages_end;
			$pages_eid=$document->pages_eid;
			$pages_num=$document->pages_num;
			if ( "$pages_eid"!="")
			{
				$lines .= $pages_eid;
			}
			else if ( "$pages_start"!="")
			{
				$lines .= $pages_start;
				if ( "$pages_end"!="")
				$lines .= "-" . $pages_end;
			}
		$lines .= "</PAGE>\n";

		$doi=$document->doi;
		if ( "$doi"!="")
		$lines .= "\t\t\t<DOI>" . $doi . "</DOI>\n";

		$lines .= "\t\t</COMM_ACT>\n";
	}
	else if ("$typedoc_libelle"=="conference_abstract")
	{
		$lines .= "\t\t<COMM_SACT>\n";

		$query = "SELECT * FROM conference WHERE conference_id=$document->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		$lines .= "\t\t\t<TITCONF>" . stripSlashes($conference->conference_title) . "</TITCONF>\n";
		$lines .= "\t\t\t<DATECONF>" . substr($conference->conference_date_start, 0, 4) . "</DATECONF>\n";
		$lines .= "\t\t\t<VILLE>" . stripSlashes($conference->conference_city) . "</VILLE>\n";
		$lines .= "\t\t\t<PAYS>" . stripSlashes($conference->conference_country_code) . "</PAYS>\n";

		$lines .= "\t\t</COMM_SACT>\n";
	}
	else if ("$typedoc_libelle"=="these")
	{
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="HDR";
		else
			$key="THESE";

		$lines .= "\t\t<$key>\n";

		$lines .= "\t\t\t<THESIS_SCHOOL>" . stripSlashes($institution->institution_name) . "</THESIS_SCHOOL>\n";

		$lines .= "\t\t</$key>\n";
	}
	$lines .= "\t\t</REFERENCE_BIBLIO>\n";

	$note=stripSlashes($document->note);
	if ( "$note"!="") $lines .= "\t\t<COMMENT>" . stripSlashes($note) . "</COMMENT>\n";

	$lines.="\t</META_ART_NOTICE>\n";
	// metadonnees - done


	// author list
	$lines .= "\t<AUTLAB>\n";
	$lines .= "\t\t<AUTEURS>\n";

	$query = "SELECT * FROM participer"
		. " WHERE doc_id='$document->doc_id'"
		. " AND fonction_id = '1' "
		. " ORDER BY rang";
	$aresult = $bd->exec_query ($query);
	while ($ob = $bd->fetch_object ($aresult) )
	{
		$query = "SELECT * FROM personne"
			. " WHERE pers_id='$ob->pers_id'";
		$a = $bd->exec_query ($query);
		$auth=$bd->fetch_object($a);

		$lines .= "\t\t\t<AUTEUR>\n";
		$lines .= "\t\t\t\t<PRENOM>" . stripSlashes($auth->pers_first) . "</PRENOM>\n";
		$lines .= "\t\t\t\t<NOM>" . stripSlashes($auth->pers_last) . "</NOM>\n";
		if ("$auth->lab"=="1")
			$lines .= "\t\t\t\t<LABIDS>$LABO_HALID</LABIDS>\n";
		$lines .= "\t\t\t</AUTEUR>\n";
	}

	$lines .= "\t\t</AUTEURS>\n";
	$lines .= "\t\t<LABORATOIRES>\n";
	$lines .= "\t\t\t<LABORATOIRE LABID='$LABO_HALID'></LABORATOIRE>\n";
	$lines .= "\t\t</LABORATOIRES>\n";
	$lines .= "\t</AUTLAB>\n";


	$lines.="\t</NOTICE>\n\n";

	return $lines;
}

function export_document_xml($docid, $bd)
{
	$lines="\t<biblioentry id=\"publilmfa$docid\" ";
	$query="SELECT * FROM document WHERE doc_id = $docid";
	$res=$bd->exec_query($query);
	$document=$bd->fetch_object($res);

	$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

	if ("$typedoc_libelle"=="article")	$lines.="type=\"article\">\n";
	else if ("$typedoc_libelle"=="book")	$lines.="type=\"book\">\n";
	else if ("$typedoc_libelle"=="these")	$lines.="type=\"thesis\">\n";
	else if ("$typedoc_libelle"=="conference_proceeding")	$lines.="type=\"inproceedings\">\n";
	else if ("$typedoc_libelle"=="conference_abstract")	$lines.="type=\"abstract\">\n";
	else $lines="";

if ( "$lines"!="")
{
	// author list
	$query = "SELECT * FROM participer"
		. " WHERE doc_id='$document->doc_id'"
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
		$lines.="\t\t<author id=\"" . $ob->pers_id . "\" rang=\"" . $ob->rang . "\">\n"
			. "\t\t\t<firstname>" . stripSlashes($auth->pers_first) . "</firstname>\n"
			. "\t\t\t<surname>" . stripSlashes($auth->pers_last) . "</surname>\n"
			. "\t\t</author>\n";
	}

	if ("$typedoc_libelle"=="these")
	{
		// advisor list
			$query = "SELECT * FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '3' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);
	
			// $author=ascii2tex(stripSlashes($auth->pers_first)) . " {" . ascii2tex(stripSlashes($auth->pers_last)) . "}";
			$lines.="\t\t<advisor id=\"" . $ob->pers_id . "\" rang=\"" . $ob->rang . "\">\n"
				. "\t\t\t<firstname>" . stripSlashes($auth->pers_first) . "</firstname>\n"
				. "\t\t\t<surname>" . stripSlashes($auth->pers_last) . "</surname>\n"
				. "\t\t</advisor>\n";
	}
	}

	$lines .= "\t\t<date>" . $document->year . "</date>\n" ;

	$lines .= "\t\t<title>" . stripSlashes($document->title) . "</title>\n" ;

	if ("$typedoc_libelle"=="article")
	{
		$query = "SELECT * FROM journal WHERE journal_id=$document->journal_id";
		$jresult = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($jresult);
		$lines .= "\t\t<journal id=\"" . $document->journal_id . "\">". stripSlashes($journal->journal_name) . "</journal>\n";

		$lines .= "\t\t<volume>" . $document->volume . "</volume>\n";
	}

	if ( ("$typedoc_libelle"=="article") || ("$typedoc_libelle"=="conference_proceeding") )
	{
		$lines .= "\t\t<pages>\n";
		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$lines .= "\t\t\t<eid>" . $pages_eid . "</eid>\n";
		}
		else if ( "$pages_start"!="")
		{
			$lines .= "\t\t\t<startpage>" . $pages_start . "</startpage>\n";
			if ( "$pages_end"!="")
			$lines .= "\t\t\t<endpage>" . $pages_end . "</endpage>\n";
		}
		$lines .= "\t\t</pages>\n";
	}

	if ("$typedoc_libelle"=="these")
	{
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="HDR";
		else
			$key="PHD";

		$lines .= "\t\t<school>" . stripSlashes($institution->institution_name) . "</school>\n";
		$lines .= "\t\t<thesistype>" . $key . "</thesistype>\n";
	}

	if ("$typedoc_libelle"=="conference_proceeding")
	{
		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);

		$lines .= "\t\t<proceedings id=\"" . $document->proceedings_id . "\">\n";
		$lines .= "\t\t\t<proceedingstitle>" . stripSlashes($proceedings->title) . "</proceedingstitle>\n";

		$query = "SELECT * FROM publisher WHERE publisher_id=$proceedings->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "\t\t\t<publisher id=\"" . $proceedings->publisher_id ."\">\n";
		$lines .= "\t\t\t\t<publishername>" . stripSlashes($publisher->publisher_name) . "</publishername>\n";
		$lines .= "\t\t\t\t<publisheraddress>" . stripSlashes($publisher->publisher_address) . "</publisheraddress>\n";
		$lines .= "\t\t\t</publisher>\n";

		$lines .= "\t\t</proceedings>\n";

		$query = "SELECT * FROM conference WHERE conference_id=$proceedings->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		$lines .= "\t\t<conference id=\"" . $conference->conference_id . "\">\n";
		$lines .= "\t\t\t<conferencetitle>" . stripSlashes($conference->conference_title) . "</conferencetitle>\n";
		$lines .= "\t\t\t<conferencecity>" . stripSlashes($conference->conference_city) . "</conferencecity>\n";

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$ccresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($ccresult);
		$lines .= "\t\t\t<conferencecountry>" . stripSlashes($country->printable_name) . "</conferencecountry>\n";

		$lines .= "\t\t</conference>\n";
	}

	if ("$typedoc_libelle"=="book")
	{
		$query = "SELECT * FROM publisher WHERE publisher_id=$document->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "\t\t<publisher id=\"" . $document->publisher_id ."\">\n";
		$lines .= "\t\t\t<publishername>" . stripSlashes($publisher->publisher_name) . "</publishername>\n";
		$lines .= "\t\t\t<publisheraddress>" . stripSlashes($publisher->publisher_address) . "</publisheraddress>\n";
		$lines .= "\t\t</publisher>\n";
	}

	if ("$typedoc_libelle"=="conference_abstract")
	{
		$query = "SELECT * FROM conference WHERE conference_id=$document->conference_id";
		$cresult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($cresult);

		$lines .= "\t\t<conference id=\"" . $conference->conference_id . "\">\n";
		$lines .= "\t\t\t<conferencetitle>" . stripSlashes($conference->conference_title) . "</conferencetitle>\n";
		$lines .= "\t\t\t<conferencecity>" . stripSlashes($conference->conference_city) . "</conferencecity>\n";

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$ccresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($ccresult);
		$lines .= "\t\t\t<conferencecountry>" . stripSlashes($country->printable_name) . "</conferencecountry>\n";

		$lines .= "\t\t</conference>\n";
	}

	$note=stripSlashes($document->note);
	if ( "$note"!="")
	{
		$lines .= "\t\t<note>" . stripSlashes($note) . "</note>\n";
	}

	$lines.="\t</biblioentry>\n\n";

	echo $lines;
}
}

function export_document_RIS($docid, $bd)
{
	$lines="";
	$query="SELECT * FROM document WHERE doc_id = $docid";
	$res=$bd->exec_query($query);
	$document=$bd->fetch_object($res);

	$result = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob=$bd->fetch_object($result);
        $typedoc_libelle=$ob->typedoc_libelle;	

	if ("$typedoc_libelle"=="article")	$lines="TY  - JOUR\n";
	if ("$typedoc_libelle"=="these")	$lines="TY  - THES\n";
	if ("$typedoc_libelle"=="conference_proceeding")	$lines="TY  - CONF\n";
	if ("$typedoc_libelle"=="conference_abstract")	$lines="TY  - ABST\n";

if ( "$lines"!="")
{
	// id
	$lines .="ID  - lmfa_pub_$docid\n";

	// author list
	$query = "SELECT pers_id FROM participer"
		. " WHERE doc_id='$document->doc_id'"
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
		$lines.="A1  - " . stripSlashes($auth->pers_last) . "," . initials_from_name(stripSlashes($auth->pers_first)) . "\n";
	}

	// advisors list
	if ("$typedoc_libelle"=="these")
	{
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->doc_id'"
			. " AND fonction_id = '3' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);
	
			$lines.="A2  - " . stripSlashes($auth->pers_last) . "," . initials_from_name(stripSlashes($auth->pers_first)) . "\n";
		}
	}

	$lines .= "Y1  - " . $document->year . "///\n" ;

	$lines .= "T1  - " . stripSlashes($document->title) . "\n" ;

	if ("$typedoc_libelle"=="article")
	{
		$query = "SELECT * FROM journal WHERE journal_id=$document->journal_id";
		$jresult = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($jresult);
		$lines .= "JF  - " . stripSlashes($journal->journal_fullname) . "\n";
		$lines .= "J1  - " . stripSlashes($journal->journal_name) . "\n";

		$lines .= "VL  - " . $document->volume . "\n";
	}

	if ( ("$typedoc_libelle"=="article") || ("$typedoc_libelle"=="conference_proceeding") )
	{
		$pages_start=$document->pages_start;
		$pages_end=$document->pages_end;
		$pages_eid=$document->pages_eid;
		$pages_num=$document->pages_num;
		if ( "$pages_eid"!="")
		{
			$lines .= "SP  - " . $pages_eid . "\n";
			//if ( "$pages_num"!="")	$lines .= "EP  - " . $pages_num . "\n";
		}
		else if ( "$pages_start"!="")
		{
			$lines .= "SP  - " . $pages_start . "\n";
			if ( "$pages_end"!="")
			$lines .= "EP  - " . $pages_end . "\n";
		}
	}

	if ("$typedoc_libelle"=="these")
	{
		$query = "SELECT * FROM institution WHERE institution_id=$document->institution_id";
		$iresult = $bd->exec_query ($query);
		$institution = $bd->fetch_object ($iresult);
		if ("$document->soustypedoc_id"=="61")
			$key="HDR";
		else
			$key="PHD";

		$lines .= "PB  - " . stripSlashes($institution->institution_name) . "\n";
		$lines .= "M1  - " . "$key" . "\n";
	}

	if ("$typedoc_libelle"=="conference_proceeding")
	{
		$query = "SELECT * FROM document WHERE doc_id=$document->proceedings_id";
		$presult = $bd->exec_query ($query);
		$proceedings = $bd->fetch_object ($presult);
		$conf_id=$proceedings->conference_id;

		$lines .= "T3  - " . stripSlashes($proceedings->title) . "\n";

		// editors list
		$query = "SELECT pers_id FROM participer"
			. " WHERE doc_id='$document->proceedings_id'"
			. " AND fonction_id = '2' "
			. " ORDER BY rang";
		$aresult = $bd->exec_query ($query);
		while ($ob = $bd->fetch_object ($aresult) )
		{
			$query = "SELECT * FROM personne"
				. " WHERE pers_id='$ob->pers_id'";
			$a = $bd->exec_query ($query);
			$auth=$bd->fetch_object($a);
	
			$lines.="A2  - " . stripSlashes($auth->pers_last) . "," . initials_from_name(stripSlashes($auth->pers_first)) . "\n";
		}

		$query = "SELECT * FROM publisher WHERE publisher_id=$proceedings->publisher_id";
		$presult = $bd->exec_query ($query);
		$publisher = $bd->fetch_object ($presult);

		$lines .= "PB  - " . stripSlashes($publisher->publisher_name) . "\n";
		$lines .= "CY  - " . stripSlashes($publisher->publisher_address) . "\n";
	}

	if (("$typedoc_libelle"=="conference_proceeding") || ("$typedoc_libelle"=="conference_abstract"))
	{
		if ("$typedoc_libelle"=="conference_abstract")
			$conf_id=$document->conference_id;

		$query = "SELECT * FROM conference WHERE conference_id=$conf_id";
		$presult = $bd->exec_query ($query);
		$conference = $bd->fetch_object ($presult);

		$lines .= "T2  - " . stripSlashes($conference->conference_title) . ", " . stripSlashes($conference->conference_city);

		$query = "SELECT * FROM country WHERE iso='$conference->conference_country_code'";
		$ccresult = $bd->exec_query ($query);
		$country = $bd->fetch_object ($ccresult);
		$lines .= ", " . stripSlashes($country->printable_name);
		$lines .= ", " . date_range($conference->conference_date_start,$conference->conference_date_end) . "\n";

	}

	$note=stripSlashes($document->note);
	if ( "$note"!="")
	{
		$lines .= "N1  - " . stripSlashes($note) . "\n";
	}

	$lines .= "ER  - \n\n";

	echo $lines;
}
}

?>

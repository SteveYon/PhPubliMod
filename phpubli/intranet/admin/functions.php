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

function leftmenu_admin($item)
{
	global $rootdir;
	global $bd;
	print("<!-- begin lhs menu -->\n");
	print("<div id=lhsmenu>\n");
	print("<ul>\n");

	$currentuser=current_user($bd);
	if (!empty($currentuser))
	{
		$status=check_login($bd);
		print("<li>&nbsp;</li>\n");
		print("<li>&nbsp;Bonjour : $currentuser&nbsp;</li>&nbsp;\n");

		if ($status==2)
		{
			print("<li><a href=\"$rootdir/intranet/superadmin\"");
			if ($item == "superadmin") print(" class=restractive");
			else print(" class=restr");
			print(">superadmin</a></li>\n");
		}
	}
	
	print("<li><a href=\"$rootdir/index.php\"");
	print(">Publications</a></li>\n");
	print("<li>&nbsp;</li>\n");
	print("<li><a href=\"$rootdir/intranet/\"");
	print(" class=restr");
	print(">Intranet</a></li>\n");
	print("<li>&nbsp;</li>\n");

	print("<li><a href=\"$rootdir/intranet/admin\"");
	if ($item == "") print(" class=restractive");
	else print(" class=restr");
	print(">admin</a></li>\n");
	print("<li>&nbsp;</li>\n");

	print("<li><a href=\"$rootdir/intranet/admin/history_document.php\"");
	if ($item == "doc") print(" class=restractive");
	else print(" class=restr");
	print(">documents</a></li>\n");
/*
	print("<li><a href=\"$rootdir/intranet/admin/history_participer.php\"");
	if ($item == "part") print(" class=restractive");
	else print(" class=restr");
	print(">participer</a></li>\n");
*/
	print("<li><a href=\"$rootdir/intranet/admin/history_pers.php\"");
	if ($item == "pers") print(" class=restractive");
	else print(" class=restr");
	print(">personnes</a></li>\n");
	print("<li><a href=\"$rootdir/intranet/admin/history_journal.php\"");
	if ($item == "journal") print(" class=restractive");
	else print(" class=restr");
	print(">journaux</a></li>\n");
	print("<li><a href=\"$rootdir/intranet/admin/mail.php\"");
	if ($item == "mail") print(" class=restractive");
	else print(" class=restr");
	print(">mail</a></li>\n");




	print("</ul>\n");
	print("</div>\n");
	print("<!-- end lhs menu -->\n");
}

function personne_entry($entry)
{
//print "<b>entry:</b>$entry <br>";

	$pattern="/\"\ (\w+)=/";
	$replacement="\"XXXYYYXXX\$1=";
	$alt_entry=preg_replace($pattern, $replacement, $entry);
//print "<b>alt_entry:</b>$alt_entry <br>";
	$pers_last="";
	$pers_first="";
	$pers_id="";

	foreach (explode("XXXYYYXXX", $alt_entry) as $key=>$val)
	{
		$pattern="/^(\w+)=\"/";
		$replacement="\$1=====";
		$val=preg_replace($pattern, $replacement, $val);
		$pattern="/\"\s*$/";
		$replacement="";
		$val=preg_replace($pattern, $replacement, $val);
//print "key=$key val=[$val] <br>";
		$field=explode("=====", $val);
		if ($field[0]=="pers_last") $pers_last=$field[1];
		if ($field[0]=="pers_first") $pers_first=$field[1];
		if ($field[0]=="pers_id") $pers_id=$field[1];
	}

	// return $pers_first . " " . $pers_last . "(" . $pers_id . ")" ;
	return $pers_first . " " . $pers_last ;
}

function journal_entry($entry)
{
// print "<b>entry:</b>$entry <br>";

	$pattern="/\"\ (\w+)=/";
	$replacement="\"XXXYYYXXX\$1=";
	$alt_entry=preg_replace($pattern, $replacement, $entry);
// print "<b>alt_entry:</b>$alt_entry <br>";
	$journal_name="";
	$journal_fullname="";
	$journal_id="";

	foreach (explode("XXXYYYXXX", $alt_entry) as $key=>$val)
	{
		$pattern="/^(\w+)=\"/";
		$replacement="\$1=====";
		$val=preg_replace($pattern, $replacement, $val);
		$pattern="/\"\s*$/";
		$replacement="";
		$val=preg_replace($pattern, $replacement, $val);
// print "key=$key val=[$val] <br>";
		$field=explode("=====", $val);
		if ($field[0]=="journal_id") $journal_id=$field[1];
		if ($field[0]=="journal_name") $journal_name=$field[1];
		if ($field[0]=="journal_fullname") $journal_fullname=$field[1];
	}

	return $journal_fullname . " (" . $journal_name . ")" ;
}

function document_entry($entry, $bd)
{
// print "<b>entry:</b>$entry <br>";

	$pattern="/\"\ (\w+)=/";
	$replacement="\"XXXYYYXXX\$1=";
	$alt_entry=preg_replace($pattern, $replacement, $entry);
// print "<b>alt_entry:</b>$alt_entry <br>";
	$entry="";

	foreach (explode("XXXYYYXXX", $alt_entry) as $key=>$val)
	{
		$pattern="/^(\w+)=\"/";
		$replacement="\$1=====";
		$val=preg_replace($pattern, $replacement, $val);
		$pattern="/\"\s*$/";
		$replacement="";
		$val=preg_replace($pattern, $replacement, $val);
// print "key=$key val=[$val] <br>";
		$field=explode("=====", $val);
		if ($field[0]=="doc_id") $doc_id=$field[1];
		if ($field[0]=="title") $title=stripSlashes($field[1]);
		if ($field[0]=="year") $year=$field[1];
		if ($field[0]=="volume") $volume=$field[1];
		if ($field[0]=="doi") $doi=$field[1];
		if ($field[0]=="hal") $hal=$field[1];
		if ($field[0]=="journal_id") $journal_id=$field[1];
		if ($field[0]=="pages_start") $pages_start=$field[1];
		if ($field[0]=="pages_end") $pages_end=$field[1];
		if ($field[0]=="pages_eid") $pages_eid=$field[1];
		if ($field[0]=="pages_num") $pages_num=$field[1];
		if ($field[0]=="note") $note=$field[1];
		if ($field[0]=="groupe") $groupe=$field[1];
		if ($field[0]=="lang") $lang=$field[1];
	}

	$entry .= " $title";
	if ("$journal_id"!="")
	{
		$query = "SELECT * FROM journal WHERE journal_id=$journal_id";
		$jresult = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($jresult);
		$entry .= " <i>$journal->journal_name</i>";
	}
	$entry .= " <b>" . $volume . "</b>";
	if ( "$pages_eid"!="")
                {
                        $entry .= ", $pages_eid";
                        if ( "$pages_num"!="")  $entry .= " ($pages_num pages)";
                }
                else if ( "$pages_start"!="")
                {
                        $entry .= ", $pages_start";
                        if ( "$pages_end"!="")  $entry .= "&ndash;$pages_end";
                }
	$entry .= " (" . $year . ").";
	$entry .= " [groupe: " . $groupe . "]";
	if ( "$doi"!="")
		$entry .= " " . anchor_ext("http://dx.doi.org/$doi", "doi:$doi");
	if ( "$hal"!="")
		$entry .= " " . anchor_ext_icon("http://hal.archives-ouvertes.fr/$hal", "hal.ico");

	return $entry;
}

function participer_entry($entry)
{
//print "<b>entry:</b>$entry <br>";

	$pattern="/\"\ (\w+)=/";
	$replacement="\"XXXYYYXXX\$1=";
	$alt_entry=preg_replace($pattern, $replacement, $entry);
//print "<b>alt_entry:</b>$alt_entry <br>";

	foreach (explode("XXXYYYXXX", $alt_entry) as $key=>$val)
	{
		$pattern="/^(\w+)=\"/";
		$replacement="\$1=====";
		$val=preg_replace($pattern, $replacement, $val);
		$pattern="/\"\s*$/";
		$replacement="";
		$val=preg_replace($pattern, $replacement, $val);
//print "key=$key val=[$val] <br>";
		$field=explode("=====", $val);
		if ($field[0]=="doc_id") $doc_id=$field[1];
		if ($field[0]=="pers_id") $pers_id=$field[1];
		if ($field[0]=="fonction_id") $fonction_id=$field[1];
		if ($field[0]=="rang") $rang=$field[1];
	}

	return "doc=$doc_id pers=$pers_id rang=$rang";
}

?>

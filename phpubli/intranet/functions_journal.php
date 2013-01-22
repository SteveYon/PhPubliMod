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

// ****************************************************************
// Journal operations

function journal_lines($bd)
{
	global $rootdir;

	$resa = $bd->exec_query("SELECT * FROM audience"); 
	while ( $ob=$bd->fetch_object($resa))
		$list_audience[$ob->id]="$ob->libelle";

	$list_wos[0]="non référencé dans le Web of Science";
	$list_wos[1]="référencé dans le Web of Science";

	$list_peerreview[0]="sans comité de lecture";
	$list_peerreview[1]="avec comité de lecture";


	$query = "SELECT * FROM journal ORDER BY journal_fullname";
	// $query = "SELECT * FROM journal";
	$result = $bd->exec_query ($query);

	$lines="";
	$i=0;

	while ( $journal = $bd->fetch_object ($result) )
	{
		$i++;
		$str="";
		// $str .= "<th>$i</th> ";
		$str .= "<th>";
		$log=$journal->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
			$str .= "[" . "$i";	// entry already validated, no longer modifiable
		else
			$str .= "[" . anchor("$rootdir/intranet/journal.php?mode=edit&id=$journal->journal_id", $i);
		if (check_admin_priv($bd))
			$str .= "|" . anchor("$rootdir/intranet/admin/history_journal.php?action=item&id=$journal->journal_id","log");
		$str .= "]</th>";
		$str .= "<td>";
		$str .= stripSlashes($journal->journal_fullname);
		//$str .= " (<i>$journal->journal_name</i>)";
		$str .= " (" . anchor("$rootdir/search.php?search=journal&id=$journal->journal_id", "<i>" . stripSlashes($journal->journal_name) . "</i>") . ")";
		$str .= " [" . $list_peerreview[$journal->journal_peer_review] . ", " . $list_wos[$journal->journal_type] . ", audience " . $list_audience[$journal->journal_audience] . "]";
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table>\n" . $lines . "</table>\n" ;
}

function journal_form($mode, $id, $bd)
{
	if ("$id"!="")
	{
		$query = "SELECT * from journal WHERE journal_id = $id";
		$res = $bd->exec_query($query);
		$journal = $bd->fetch_object($res);
	}

	// get lists
	$list_journaltypes[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM typejournal order by typejournal_id"); 
	while ( $ob=$bd->fetch_object($result))
		$list_journaltypes[$ob->typejournal_id]="$ob->typejournal_id - $ob->typejournal_libelle";

	$result = $bd->exec_query("SELECT * FROM audience"); 
	while ( $ob=$bd->fetch_object($result))
		$list_audience[$ob->id]="$ob->libelle";

	$list_wos[0]="non référencé dans le Web of Science";
	$list_wos[1]="référencé dans le Web of Science";

	$list_peerreview[0]="sans comité de lecture";
	$list_peerreview[1]="avec comité de lecture";

	echo "<table>\n";
	
	if ($mode=="update")
	{
		echo "<tr>\n";
		echo "<th>journal_id</th>\n";
		echo "<td>$journal->journal_id ";
		if ($tab->log=="0")
			echo "[created on $journal->date]";
		if ($tab->log=="1")
			echo "[last modified on $journal->date]";
		if ($tab->log=="2")
			echo "[validated on $journal->date]";
		echo "</td>\n";
		echo "</tr>\n";
	}
		echo "<tr>\n";
		echo "<th>journal_name</th>\n";
		echo "<td><input type=\"text\" name=\"journal_name\" value=\"" . stripSlashes($journal->journal_name) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr><th></th><td>Utiliser l'abbréviation officielle du journal.</td></tr>\n";
		echo "<tr><th>&nbsp;</th></tr>\n";
		echo "<tr>\n";
		echo "<th>journal_fullname</th>\n";
		echo "<td><input type=\"text\" name=\"journal_fullname\" value=\"" . stripSlashes($journal->journal_fullname) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr><th></th><td>Nom complet en toutes lettres.</td></tr>\n";
		echo "<tr><th>&nbsp;</th></tr>\n";

		echo "<tr>\n";
		echo "<th>journal_peer_review</th>\n";
		echo "<td><select name=\"journal_peer_review\" size=\"1\">\n";
		foreach ($list_peerreview as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$journal->journal_peer_review) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>journal_audience</th>\n";
		echo "<td><select name=\"journal_audience\" size=\"1\">\n";
		foreach ($list_audience as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ("$id"=="$journal->journal_audience") echo " selected";
			echo ">$name</option>\n";
		}
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>journal_type</th>\n";
		echo "<td><select name=\"journal_type\" size=\"1\">\n";
		foreach ($list_wos as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$journal->journal_type) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</tr>\n";

	echo "</table>\n";
}

function journal_fixed($id, $bd)
{
	$query = "SELECT * from journal WHERE journal_id = $id";
	$res = $bd->exec_query($query);
	$journal = $bd->fetch_object($res);

	// get lists
	$list_journaltypes[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM typejournal order by typejournal_id"); 
	while ( $ob=$bd->fetch_object($result))
		$list_journaltypes[$ob->typejournal_id]="$ob->typejournal_id - $ob->typejournal_libelle";

	$result = $bd->exec_query("SELECT * FROM audience"); 
	while ( $ob=$bd->fetch_object($result))
		$list_audience[$ob->id]="$ob->libelle";

	$list_wos[0]="non référencé dans le Web of Science";
	$list_wos[1]="référencé dans le Web of Science";

	$list_peerreview[0]="sans comité de lecture";
	$list_peerreview[1]="avec comité de lecture";

	echo "<table>\n";
		echo "<tr>\n";
		echo "<th>journal_id</th>\n";
		echo "<td>$journal->journal_id ";
		if ($journal->log=="0")
			echo "[created on $journal->date]";
		if ($journal->log=="1")
			echo "[last modified on $journal->date]";
		if ($journal->log=="2")
			echo "[validated on $journal->date]";
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>journal_name</th>\n";
		echo "<td>" . stripSlashes($journal->journal_name) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>journal_fullname</th>\n";
		echo "<td>" . stripSlashes($journal->journal_fullname) . "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>journal_type</th>\n";
		echo "<td>";
		foreach ($list_wos as $id=>$name)
		{
			if ($id==$journal->journal_type) echo "$name";
		}
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>journal_peer_review</th>\n";
		echo "<td>";
		foreach ($list_peerreview as $id=>$name)
		{
			if ($id==$journal->journal_peer_review) echo "$name";
		}
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>journal_audience</th>\n";
		echo "<td>";
		foreach ($list_audience as $id=>$name)
		{
			if ($id==$journal->journal_audience) echo "$name";
		}
		echo "</td>\n";
		echo "</tr>\n";


	echo "</table>\n";
}

function journal_update($journal, $bd)
{
	$name=addSlashes($journal['journal_name']);
	$fullname=addSlashes($journal['journal_fullname']);
	$type=$journal['journal_type'];
	$peer_review=$journal['journal_peer_review'];
	$audience=$journal['journal_audience'];

	$journal_id=$journal['journal_id'];

	$query = "select * from journal where journal_id = '$journal_id'";
       	$res = $bd->exec_query($query);
	$journal_old = $bd->fetch_object ($res);

	$query = "UPDATE journal SET "
		. "journal_name='$name', journal_fullname='$fullname', "
		. "journal_type='$type', "
		. "journal_peer_review='$peer_review', "
		. "journal_audience='$audience', "
		. "log='1', date=now() "
		. "WHERE journal_id = '$journal_id'";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "select * from journal where journal_id = '$journal_id'";
       	$res = $bd->exec_query($query);
	$journal_new = $bd->fetch_object ($res);

	log_entry("journal", $journal_id, "update", $journal_old, $journal_new, $bd);
}

function journal_validate($journal_id, $bd)
{
	$query = "select * from journal where journal_id = '$journal_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$journal = $bd->fetch_object ($res);

	$name=$journal->journal_name;
	$fullname=$journal->journal_fullname;
	// print ("<b>Validation de $fullname ($name).</b><br>\n");

	$query = "UPDATE journal SET "
		. "log='2', date=now() "
               	. "WHERE journal_id = '$journal_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("journal", $journal_id, "validate", $journal, "", $bd);
}
	
function journal_insert($journal, $bd)
{
	$name=addSlashes($journal['journal_name']);
	$fullname=addSlashes($journal['journal_fullname']);
	$type=$journal['journal_type'];
	$audience=$journal['journal_audience'];
	$peer_review=$journal['journal_peer_review'];

	$query = "INSERT INTO journal (journal_name, journal_fullname, journal_type, journal_audience, journal_peer_review, log, date) "
			. " VALUES ( '$name', '$fullname', '$type', '$audience', '$peer_review', '0', now()) " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$name = $bd->prepare_string($name);
	$fullname = $bd->prepare_string($fullname);

	$query = "SELECT * "
		. "FROM journal "
		. "WHERE journal_name LIKE '%$name' "
		. "AND journal_fullname LIKE '%$fullname%' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$journal = $bd->fetch_object ($res);
	$returnid=$journal->journal_id;

	log_entry("journal", $returnid, "insert", "", $journal, $bd);

	// echo "returnid=$returnid <p>\n";
	return $returnid;
}

function journal_delete($journal_id, $bd)
{
	$query = "select * from journal where journal_id = '$journal_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$journal_old = $bd->fetch_object ($res);

	$query = "DELETE FROM journal "
               	. "WHERE journal_id = '$journal_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("journal", $journal_id, "delete", $journal_old, "", $bd);
}

?>

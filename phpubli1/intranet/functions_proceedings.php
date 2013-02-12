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
// Institution operations

function proceedings_lines($bd)
{
	global $rootdir;
	$query = "SELECT * FROM proceedings ORDER BY proc_year, proc_title";
	$result = $bd->exec_query ($query);

	$lines="";
	$lines.="<tr><th></th><td>title</td><td>year</td></tr>\n";
	$i=0;

	while ( $proceedings = $bd->fetch_object ($result) )
	{
		$i++;
		$str="";
		$str .= "<th>";
		$log=$proceedings->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
			$str .= "[" . "$i";	// entry already validated, no longer modifiable
		else
			$str .= "[" . anchor("$rootdir/intranet/proceedings.php?mode=edit&id=$proceedings->proceedings_id", $i);
		$str .= "]</th>";
		$str .= "<td>";
		$str .= stripSlashes($proceedings->proc_title);
		$str .= "</td>";
		$str .= "<td>";
		$str .= $proceedings->proc_year;
		$str .= "</td>";

		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table>\n" . $lines . "</table>\n" ;
}

function proceedings_data_form($mode, $id, $bd)
{
	$list_conferences[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM conference ORDER BY conference_title"); 
	while ( $conference=$bd->fetch_object($result))
		$list_conferences[$conference->conference_id]="$conference->conference_title";

	$list_publishers[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM publisher ORDER BY publisher_name"); 
	while ( $publisher=$bd->fetch_object($result))
		$list_publishers[$publisher->publisher_id]="$publisher->publisher_name";

	if ("$id"!="")
	{
		$query = "SELECT * from proceedings WHERE proceedings_id = $id";
		$res = $bd->exec_query($query);
		$proceedings = $bd->fetch_object($res);
	}

	echo "<table>\n";
	
	if ($mode=="update")
	{
		echo "<tr>\n";
		echo "<th>id</th>\n";
		echo "<td>$proceedings->proc_id ";
		if ($tab->log=="0")
			echo "[created on $proc->date]";
		if ($tab->log=="1")
			echo "[last modified on $proc->date]";
		if ($tab->log=="2")
			echo "[validated on $proc->date]";
		echo "</td>\n";
		echo "</tr>\n";
	}
		echo "<tr>\n";
		echo "<th>conference</th>\n";
		echo "<td><select name=\"proc_conf_id\" size=\"1\">\n";
		foreach ($list_conferences as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$proceedings->proc_conf_id) echo " selected";
			echo ">$name</option>\n";
		}

		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>proceedings title</th>\n";
		echo "<td><input type=\"text\" name=\"proc_title\" value=\"" . stripSlashes($proceedings->proc_title) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>year</th>\n";
		echo "<td><input type=\"text\" name=\"proc_year\" value=\"" . $proceedings->proc_year . "\" size=\"4\" maxlength=\"4\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>publisher</th>\n";
		echo "<td><select name=\"proc_pub_id\" size=\"1\">\n";
		foreach ($list_publishers as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$proceedings->proc_pub_id) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</td>\n";
		echo "</tr>\n";

	echo "</table>\n";
}
	
function proceedings_data_insert($proceedings, $bd)
{
	$title=addSlashes($proceedings['proc_title']);
	$year=$proceedings['proc_year'];
	$conf_id=$proceedings['proc_conf_id'];
	$pub_id=$proceedings['proc_pub_id'];

	$query = "INSERT INTO proceedings (proc_title, proc_year, proc_conf_id, proc_pub_id, log, date) "
			. " VALUES ( '$title', '$year', '$conf_id', '$pub_id', '0', now()) " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$title = $bd->prepare_string($title);

	$query = "SELECT * "
		. "FROM proceedings "
		. "WHERE proc_title LIKE '%$title%' "
		. "AND proc_year = '$year' "
		. "AND proc_conf_id = '$conf_id' "
		. "AND proc_pub_id = '$pub_id' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$proceedings = $bd->fetch_object ($res);
	$returnid=$proceedings->proc_id;

	log_entry("proceedings", $returnid, "insert", "", $proceedings, $bd);

	echo "returnid=$returnid <p>\n";
	return $returnid;
}

/*
function proceedings_fixed($id, $bd)
{
	$list_countries[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM country ORDER BY printable_name"); 
	while ( $country=$bd->fetch_object($result))
		$list_countries[$country->iso]="$country->iso - $country->printable_name";

	$query = "SELECT * from proceedings WHERE proceedings_id = $id";
	$res = $bd->exec_query($query);
	$proceedings = $bd->fetch_object($res);

	echo "<table>\n";
		echo "<tr>\n";
		echo "<th>proceedings_id</th>\n";
		echo "<td>$proceedings->proceedings_id ";
		if ($proceedings->log=="0")
			echo "[created on $proceedings->date]";
		if ($proceedings->log=="1")
			echo "[last modified on $proceedings->date]";
		if ($proceedings->log=="2")
			echo "[validated on $proceedings->date]";
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>proceedings_title</th>\n";
		echo "<td>" . stripSlashes($proceedings->proceedings_title) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>proceedings_city</th>\n";
		echo "<td>" . stripSlashes($proceedings->proceedings_city) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>proceedings_country</th>\n";
		echo "<td>";
		foreach ($list_countries as $id=>$name)
                {
                        if ("$id" == "$proceedings->proceedings_country_code" ) echo "$name";
                }
		echo "<tr>\n";
		echo "<th>proceedings_date_start</th>\n";
		echo "<td>" . $proceedings->proceedings_date_start . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>proceedings_date_end</th>\n";
		echo "<td>" . $proceedings->proceedings_date_end . "</td>\n";
		echo "</tr>\n";

		echo "</td>\n";
		echo "</tr>\n";
	echo "</table>\n";
}

function proceedings_update($proceedings, $bd)
{
	$title=addSlashes($proceedings['proceedings_title']);
	$city=addSlashes($proceedings['proceedings_city']);
	$country_code=$proceedings['proceedings_country_code'];

	$date_start=$proceedings['proceedings_start_yyyy'] . "-"
			. $proceedings['proceedings_start_mm'] . "-"
			. $proceedings['proceedings_start_dd'] ;
	echo "date_start=$date_start";

	$proceedings_id=$proceedings['proceedings_id'];

	$query = "select * from proceedings where proceedings_id = '$proceedings_id'";
       	$res = $bd->exec_query($query);
	$proceedings_old = $bd->fetch_object ($res);

	$query = "UPDATE proceedings SET "
		. "proceedings_title='$title', proceedings_city='$city', proceedings_country_code='$country_code' "
		. ", proceedings_date_start='"
			. $proceedings['proceedings_start_yyyy'] . "-"
			. $proceedings['proceedings_start_mm'] . "-"
			. $proceedings['proceedings_start_dd'] . "'"
		. ", proceedings_date_end='"
			. $proceedings['proceedings_end_yyyy'] . "-"
			. $proceedings['proceedings_end_mm'] . "-"
			. $proceedings['proceedings_end_dd'] . "'"
		. ", log='1', date=now() "
		. "WHERE proceedings_id = '$proceedings_id'";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "select * from proceedings where proceedings_id = '$proceedings_id'";
       	$res = $bd->exec_query($query);
	$proceedings_new = $bd->fetch_object ($res);

	log_entry("proceedings", $proceedings_id, "update", $proceedings_old, $proceedings_new, $bd);
}

function proceedings_validate($proceedings_id, $bd)
{
	$query = "select * from proceedings where proceedings_id = '$proceedings_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$proceedings = $bd->fetch_object ($res);

	$query = "UPDATE proceedings SET "
		. "log='2', date=now() "
               	. "WHERE proceedings_id = '$proceedings_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("proceedings", $proceedings_id, "validate", $proceedings, "", $bd);
}

function proceedings_delete($proceedings_id, $bd)
{
	$query = "select * from proceedings where proceedings_id = '$proceedings_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$proceedings_old = $bd->fetch_object ($res);

	$query = "DELETE FROM proceedings "
               	. "WHERE proceedings_id = '$proceedings_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("proceedings", $proceedings_id, "delete", $proceedings_old, "", $bd);
}
*/

?>

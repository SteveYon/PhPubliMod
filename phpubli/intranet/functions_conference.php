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

function conference_lines($bd)
{
	global $rootdir;
	$query = "SELECT * FROM conference ORDER BY conference_date_start, conference_title";
	$result = $bd->exec_query ($query);

	$lines="";
	$lines.="<tr><th></th><td>title</td><td>address</td><td></td><td>dates</td></tr>\n";
	$i=0;

	while ( $conference = $bd->fetch_object ($result) )
	{
		$i++;
		$str="";
		$str .= "<th>";
		$log=$conference->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
			$str .= "[" . "$i";	// entry already validated, no longer modifiable
		else
			$str .= "[" . anchor("$rootdir/intranet/conference.php?mode=edit&id=$conference->conference_id", $i);
		$str .= "]</th>";
		$str .= "<td>";
		$str .= stripSlashes($conference->conference_title);
		$str .= "</td>";
		$str .= "<td>";
		$str .= stripSlashes($conference->conference_city);
		$str .= "</td>";

		$ccode=$conference->conference_country_code;
		$cquery = "SELECT * FROM country WHERE iso='$ccode'";
		$cresult = $bd->exec_query ($cquery);
		$country = $bd->fetch_object ($cresult);
		$str .= "<td>";
		$str .= $country->printable_name;
		$str .= "</td>";

		$str .= "<td>";
		$str .= $conference->conference_date_start . " &ndash; " . $conference->conference_date_end;
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table>\n" . $lines . "</table>\n" ;
}

function conference_form($mode, $id, $bd)
{
	$list_countries[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM country ORDER BY printable_name"); 
	while ( $country=$bd->fetch_object($result))
		$list_countries[$country->iso]="$country->iso - $country->printable_name";

	$result = $bd->exec_query("SELECT * FROM audience");
        while ( $ob=$bd->fetch_object($result))
                $list_audience[$ob->id]="$ob->libelle";

	$list_days[0]="--";
	for ($i=1; $i<10; $i++)
		$list_days[$i]="0$i";
	for ($i=10; $i<32; $i++)
		$list_days[$i]="$i";
	$list_months[0]="--";
	for ($i=1; $i<10; $i++)
		$list_months[$i]="0$i";
	for ($i=10; $i<13; $i++)
		$list_months[$i]="$i";
	$list_years[0]="----";
	for ($i=date("Y")+1; $i>1949; $i--)
		$list_years[$i]="$i";

	if ("$id"!="")
	{
		$query = "SELECT * from conference WHERE conference_id = $id";
		$res = $bd->exec_query($query);
		$conference = $bd->fetch_object($res);
	}

	echo "<table>\n";
	
	if ($mode=="update")
	{
		echo "<tr>\n";
		echo "<th>conference_id</th>\n";
		echo "<td>$conference->conference_id ";
		if ($tab->log=="0")
			echo "[created on $conference->date]";
		if ($tab->log=="1")
			echo "[last modified on $conference->date]";
		if ($tab->log=="2")
			echo "[validated on $conference->date]";
		echo "</td>\n";
		echo "</tr>\n";
	}
		echo "<tr>\n";
		echo "<th>conference_title</th>\n";
		echo "<td><input type=\"text\" name=\"conference_title\" value=\"" . stripSlashes($conference->conference_title) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_city</th>\n";
		echo "<td><input type=\"text\" name=\"conference_city\" value=\"" . stripSlashes($conference->conference_city) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>conference_country</th>\n";
		echo "<td><select name=\"conference_country_code\" size=\"1\">\n";
		foreach ($list_countries as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$conference->conference_country_code) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</td>\n";
		echo "</tr>\n";

		$date_start=explode('-',$conference->conference_date_start);
		$start_yyyy=$date_start[0];
		$start_mm=$date_start[1];
		$start_dd=$date_start[2];
		$date_end=explode('-',$conference->conference_date_end);
		$end_yyyy=$date_end[0];
		$end_mm=$date_end[1];
		$end_dd=$date_end[2];

		echo "<tr>\n";
		echo "<th>conference_date_start</th>\n";
		echo "<td>\n";
		echo "<select name=\"conference_start_dd\" size=\"1\">\n";
		foreach ($list_days as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$start_dd) echo " selected";
			echo ">$name</option>\n";
		}
		echo "<select name=\"conference_start_mm\" size=\"1\">\n";
		foreach ($list_months as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$start_mm) echo " selected";
			echo ">$name</option>\n";
		}
		echo "<select name=\"conference_start_yyyy\" size=\"1\">\n";
		foreach ($list_years as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$start_yyyy) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_date_end</th>\n";
		echo "<td>\n";
		echo "<select name=\"conference_end_dd\" size=\"1\">\n";
		foreach ($list_days as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$end_dd) echo " selected";
			echo ">$name</option>\n";
		}
		echo "<select name=\"conference_end_mm\" size=\"1\">\n";
		foreach ($list_months as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$end_mm) echo " selected";
			echo ">$name</option>\n";
		}
		echo "<select name=\"conference_end_yyyy\" size=\"1\">\n";
		foreach ($list_years as $id=>$name)
		{
			echo "<option value=\"$id\"";
			if ($id==$end_yyyy) echo " selected";
			echo ">$name</option>\n";
		}
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
                echo "<th>conference_audience</th>\n";
                echo "<td><select name=\"conference_audience\" size=\"1\">\n";
                foreach ($list_audience as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"=="$conference->conference_audience") echo " selected";
                        echo ">$name</option>\n";
                }
                echo "</tr>\n";

	echo "</table>\n";
}
	
function conference_insert($conference, $bd)
{
	$title=addSlashes($conference['conference_title']);
	$city=addSlashes($conference['conference_city']);
	$country_code=$conference['conference_country_code'];
	$audience=$conference['conference_audience'];

	$date_start=$conference['conference_start_yyyy'] . "-"
			. $conference['conference_start_mm'] . "-"
			. $conference['conference_start_dd'] ;
	// echo "date_start=$date_start";
	$date_end=$conference['conference_end_yyyy'] . "-"
			. $conference['conference_end_mm'] . "-"
			. $conference['conference_end_dd'] ;
	// echo "date_end=$date_end";


	$query = "INSERT INTO conference (conference_title, conference_city, conference_country_code, conference_audience"
			. ", conference_date_start, conference_date_end"
			. ", log, date) "
			. " VALUES ( '$title', '$city', '$country_code', '$audience'"
				. ", '" . $conference['conference_start_yyyy'] . "-"
					. $conference['conference_start_mm'] . "-"
					. $conference['conference_start_dd'] . "'"
				. ", '" . $conference['conference_end_yyyy'] . "-"
					. $conference['conference_end_mm'] . "-"
					. $conference['conference_end_dd'] . "'"
			. ", '0', now()) " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$title = $bd->prepare_string($title);
	$city = $bd->prepare_string($city);

	$query = "SELECT * "
		. "FROM conference "
		. "WHERE conference_title LIKE '%$title%' "
		. "AND conference_city LIKE '%$city%' "
		. "AND conference_country_code LIKE '%$country_code%' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$conference = $bd->fetch_object ($res);
	$returnid=$conference->conference_id;

	log_entry("conference", $returnid, "insert", "", $conference, $bd);

	// echo "returnid=$returnid <p>\n";
	return $returnid;
}

function conference_fixed($id, $bd)
{
	$list_countries[0]="-------------------- (select from list) --------------------";
	$result = $bd->exec_query("SELECT * FROM country ORDER BY printable_name"); 
	while ( $country=$bd->fetch_object($result))
		$list_countries[$country->iso]="$country->iso - $country->printable_name";

	$result = $bd->exec_query("SELECT * FROM audience");
        while ( $ob=$bd->fetch_object($result))
                $list_audience[$ob->id]="$ob->libelle";

	$query = "SELECT * from conference WHERE conference_id = $id";
	$res = $bd->exec_query($query);
	$conference = $bd->fetch_object($res);

	echo "<table>\n";
		echo "<tr>\n";
		echo "<th>conference_id</th>\n";
		echo "<td>$conference->conference_id ";
		if ($conference->log=="0")
			echo "[created on $conference->date]";
		if ($conference->log=="1")
			echo "[last modified on $conference->date]";
		if ($conference->log=="2")
			echo "[validated on $conference->date]";
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_title</th>\n";
		echo "<td>" . stripSlashes($conference->conference_title) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_city</th>\n";
		echo "<td>" . stripSlashes($conference->conference_city) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_country</th>\n";
		echo "<td>";
		foreach ($list_countries as $id=>$name)
                {
                        if ("$id" == "$conference->conference_country_code" ) echo "$name";
                }
		echo "<tr>\n";
		echo "<th>conference_date_start</th>\n";
		echo "<td>" . $conference->conference_date_start . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_date_end</th>\n";
		echo "<td>" . $conference->conference_date_end . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>conference_audience</th>\n";
		echo "<td>";
		foreach ($list_audience as $id=>$name)
                {
                        if ("$id" == "$conference->conference_audience" ) echo "$name";
                }
		echo "<tr>\n";

	echo "</table>\n";
}

function conference_update($conference, $bd)
{
	$title=addSlashes($conference['conference_title']);
	$city=addSlashes($conference['conference_city']);
	$country_code=$conference['conference_country_code'];
	$audience=$conference['conference_audience'];

	$date_start=$conference['conference_start_yyyy'] . "-"
			. $conference['conference_start_mm'] . "-"
			. $conference['conference_start_dd'] ;
	// echo "date_start=$date_start";
	$date_end=$conference['conference_end_yyyy'] . "-"
			. $conference['conference_end_mm'] . "-"
			. $conference['conference_end_dd'] ;
	// echo "date_end=$date_end";

	$conference_id=$conference['conference_id'];

	$query = "select * from conference where conference_id = '$conference_id'";
       	$res = $bd->exec_query($query);
	$conference_old = $bd->fetch_object ($res);

	$query = "UPDATE conference SET "
		. "conference_title='$title', conference_city='$city'"
		. ", conference_country_code='$country_code', conference_audience='$audience'"
		. ", conference_date_start='"
			. $conference['conference_start_yyyy'] . "-"
			. $conference['conference_start_mm'] . "-"
			. $conference['conference_start_dd'] . "'"
		. ", conference_date_end='"
			. $conference['conference_end_yyyy'] . "-"
			. $conference['conference_end_mm'] . "-"
			. $conference['conference_end_dd'] . "'"
		. ", log='1', date=now() "
		. "WHERE conference_id = '$conference_id'";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "select * from conference where conference_id = '$conference_id'";
       	$res = $bd->exec_query($query);
	$conference_new = $bd->fetch_object ($res);

	log_entry("conference", $conference_id, "update", $conference_old, $conference_new, $bd);
}

function conference_validate($conference_id, $bd)
{
	$query = "select * from conference where conference_id = '$conference_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$conference = $bd->fetch_object ($res);

	$query = "UPDATE conference SET "
		. "log='2', date=now() "
               	. "WHERE conference_id = '$conference_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("conference", $conference_id, "validate", $conference, "", $bd);
}

function conference_delete($conference_id, $bd)
{
	$query = "select * from conference where conference_id = '$conference_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$conference_old = $bd->fetch_object ($res);

	$query = "DELETE FROM conference "
               	. "WHERE conference_id = '$conference_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("conference", $conference_id, "delete", $conference_old, "", $bd);
}

?>

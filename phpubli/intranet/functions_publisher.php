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

function publisher_lines($bd)
{
	global $rootdir;
	$query = "SELECT * FROM publisher ORDER BY publisher_name";
	$result = $bd->exec_query ($query);

	$lines="<tr><th></th><td>name</td><td>address</td></tr>\n";
	$i=0;

	while ( $publisher = $bd->fetch_object ($result) )
	{
		$i++;
		$str="";
		$str .= "<th>";
		$log=$publisher->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
			$str .= "[" . "$i";	// entry already validated, no longer modifiable
		else
			$str .= "[" . anchor("$rootdir/intranet/publisher.php?mode=edit&id=$publisher->publisher_id", $i);
		$str .= "]</th>";
		$str .= "<td>";
		$str .= stripSlashes($publisher->publisher_name);
		$str .= "</td>";
		$str .= "<td>";
		$str .= stripSlashes($publisher->publisher_address);
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table>\n" . $lines . "</table>\n" ;
}

function publisher_form($mode, $id, $bd)
{
	if ("$id"!="")
	{
		$query = "SELECT * from publisher WHERE publisher_id = $id";
		$res = $bd->exec_query($query);
		$publisher = $bd->fetch_object($res);
	}

	echo "<table>\n";
	
	if ($mode=="update")
	{
		echo "<tr>\n";
		echo "<th>publisher_id</th>\n";
		echo "<td>$publisher->publisher_id ";
		if ($tab->log=="0")
			echo "[created on $publisher->date]";
		if ($tab->log=="1")
			echo "[last modified on $publisher->date]";
		if ($tab->log=="2")
			echo "[validated on $publisher->date]";
		echo "</td>\n";
		echo "</tr>\n";
	}
		echo "<tr>\n";
		echo "<th>publisher_name</th>\n";
		echo "<td><input type=\"text\" name=\"publisher_name\" value=\"" . stripSlashes($publisher->publisher_name) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr><th>&nbsp;</th></tr>\n";
		echo "<tr>\n";
		echo "<th>publisher_address</th>\n";
		echo "<td><input type=\"text\" name=\"publisher_address\" value=\"" . stripSlashes($publisher->publisher_address) . "\" size=\"70\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";
		echo "<tr><th>&nbsp;</th></tr>\n";

	echo "</table>\n";
}
	
function publisher_insert($publisher, $bd)
{
	$name=addSlashes($publisher['publisher_name']);
	$address=addSlashes($publisher['publisher_address']);

	$query = "INSERT INTO publisher (publisher_name, publisher_address, log, date) "
			. " VALUES ( '$name', '$address', '0', now()) " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$name = $bd->prepare_string($name);
	$address = $bd->prepare_string($address);

	$query = "SELECT * "
		. "FROM publisher "
		. "WHERE publisher_name LIKE '%$name%' "
		. "AND publisher_address LIKE '%$address%' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$publisher = $bd->fetch_object ($res);
	$returnid=$publisher->publisher_id;

	log_entry("publisher", $returnid, "insert", "", $publisher, $bd);

	// echo "returnid=$returnid <p>\n";
	return $returnid;
}

function publisher_fixed($id, $bd)
{
	$query = "SELECT * from publisher WHERE publisher_id = $id";
	$res = $bd->exec_query($query);
	$publisher = $bd->fetch_object($res);

	echo "<table>\n";
		echo "<tr>\n";
		echo "<th>publisher_id</th>\n";
		echo "<td>$publisher->publisher_id ";
		if ($publisher->log=="0")
			echo "[created on $publisher->date]";
		if ($publisher->log=="1")
			echo "[last modified on $publisher->date]";
		if ($publisher->log=="2")
			echo "[validated on $publisher->date]";
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>publisher_name</th>\n";
		echo "<td>" . stripSlashes($publisher->publisher_name) . "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<th>publisher_address</th>\n";
		echo "<td>" . stripSlashes($publisher->publisher_address) . "</td>\n";
		echo "</tr>\n";
	echo "</table>\n";
}

function publisher_update($publisher, $bd)
{
	$name=addSlashes($publisher['publisher_name']);
	$address=addSlashes($publisher['publisher_address']);

	$publisher_id=$publisher['publisher_id'];

	$query = "select * from publisher where publisher_id = '$publisher_id'";
       	$res = $bd->exec_query($query);
	$publisher_old = $bd->fetch_object ($res);

	$query = "UPDATE publisher SET "
		. "publisher_name='$name', publisher_address='$address', "
		. "log='1', date=now() "
		. "WHERE publisher_id = '$publisher_id'";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "select * from publisher where publisher_id = '$publisher_id'";
       	$res = $bd->exec_query($query);
	$publisher_new = $bd->fetch_object ($res);

	log_entry("publisher", $publisher_id, "update", $publisher_old, $publisher_new, $bd);
}

function publisher_validate($publisher_id, $bd)
{
	$query = "select * from publisher where publisher_id = '$publisher_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$publisher = $bd->fetch_object ($res);

	$name=$publisher->publisher_name;
	$address=$publisher->publisher_address;
	// print ("<b>Validation de $name, $address.</b><br>\n");

	$query = "UPDATE publisher SET "
		. "log='2', date=now() "
               	. "WHERE publisher_id = '$publisher_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("publisher", $publisher_id, "validate", $publisher, "", $bd);
}

function publisher_delete($publisher_id, $bd)
{
	$query = "select * from publisher where publisher_id = '$publisher_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
	$publisher_old = $bd->fetch_object ($res);

	$query = "DELETE FROM publisher "
               	. "WHERE publisher_id = '$publisher_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("publisher", $publisher_id, "delete", $publisher_old, "", $bd);
}

?>

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
// Personne operations

function personne_lines($bd)
{
	global $rootdir;
	$query = "SELECT * FROM personne ORDER BY pers_last";
	$result = $bd->exec_query ($query);

	$lines="";
	$i=0;

	while ( $personne = $bd->fetch_object ($result) )
	{
		$i++;
		$str="";
		$str .= "<th>";
		$log=$personne->log;
		if ( ( "$log"=="2" ) && (check_root_priv($bd)<1) )
			$str .= "[" . "$i";	// entry already validated, no longer modifiable
		else
			$str .= "[" . anchor("$rootdir/intranet/personne.php?mode=edit&id=$personne->pers_id", $i);

		if (check_admin_priv($bd))
			$str .= "|" . anchor("$rootdir/intranet/admin/history_pers.php?action=item&id=$personne->pers_id","log");
		$str .= "]</th>";
		$str .= "<td>";
		$str .= stripSlashes($personne->pers_first);
		$str .= "</td>";
		$str .= "<td>";
		//$str .= stripSlashes($personne->pers_last);
		$str .= anchor("$rootdir/search.php?search=personne&id=$personne->pers_id", stripSlashes($personne->pers_last));
		$str .= "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table>\n" . $lines . "</table>\n" ;
}

function personne_form($mode, $id, $bd)
{
	global $LABO;
	if ("$id"!="")
	{
		$query = "SELECT * from personne WHERE pers_id = $id";
		$res = $bd->exec_query($query);
		$personne = $bd->fetch_object($res);
	}

	echo "<table>\n";

	if ($mode=="update")
	{
		echo "<tr>\n";
		echo "<th>pers_id</th>\n";
		echo "<td>$personne->pers_id ";
		if ($personne->log=="0")
			echo "[created on $personne->date]";
		if ($personne->log=="1")
			echo "[last modified on $personne->date]";
		if ($personne->log=="2")
			echo "[validated on $personne->date]";
		echo "</td>\n";
		echo "</tr>\n";
	}
		echo "<tr><th></th><td>Utiliser des majuscules seulement pour les initiales du prénom (<i>pers_first</i>) et du nom (<i>pers_last</i>), des minuscules pour tout le reste. Mettre le prénom en entier.</td></tr>";

		echo "<tr>\n";
		echo "<th>pers_first</th>\n";
		echo "<td><input type=\"text\" name=\"pers_first\" value=\"" . stripSlashes($personne->pers_first) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>pers_last</th>\n";
		echo "<td><input type=\"text\" name=\"pers_last\" value=\"" . stripSlashes($personne->pers_last) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>lab</th>\n";
		echo "<td><input type=\"checkbox\" name=\"lab\" value=\"lab\"";
		if ($personne->lab=="1")	echo "checked";
		echo ">personne affiliée (même temporairement) au " . $LABO . "</td>\n";
		echo "</tr>\n";

	echo "</table>\n";
}

function personne_fixed($id, $bd)
{
	global $LABO;
	$query = "SELECT * from personne WHERE pers_id = $id";
	$res = $bd->exec_query($query);
	$personne = $bd->fetch_object($res);

	echo "<table>\n";
		echo "<tr>\n";
		echo "<th>pers_id</th>\n";
		echo "<td>$personne->pers_id ";
		if ($personne->log=="0")
			echo "[created on $personne->date]";
		if ($personne->log=="1")
			echo "[last modified on $personne->date]";
		if ($personne->log=="2")
			echo "[validated on $personne->date]";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>pers_first</th>\n";
		echo "<td>" . stripslashes($personne->pers_first) . "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>pers_last</th>\n";
		echo "<td>" . stripslashes($personne->pers_last) . "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>lab</th>\n";
		if ($personne->lab=="1")
			echo "<td>personne affiliée (même temporairement) au " . $LABO . "</td>\n";
		else
			echo "<td>personne non affiliée au " . $LABO . "</td>\n";
		echo "</tr>\n";

	echo "</table>\n";
}

function personne_update($personne, $bd)
{
	$first=addSlashes($personne['pers_first']);
	$last=addSlashes($personne['pers_last']);

	$pers_id=$personne['pers_id'];

	$lab="0";
	if (isset($personne['lab']))	$lab="1";

	$query = "select * from personne where pers_id = '$pers_id'";
       	$res = $bd->exec_query($query);
	$personne_old = $bd->fetch_object ($res);

	$query = "UPDATE personne SET "
		. "pers_first='$first', pers_last='$last', lab='$lab', "
		. "log='1', date=now() "
		. "WHERE pers_id = '$pers_id'";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "select * from personne where pers_id = '$pers_id'";
       	$res = $bd->exec_query($query);
	$personne_new = $bd->fetch_object ($res);

	log_entry("personne", $pers_id, "update", $personne_old, $personne_new, $bd);
}

function personne_validate($pers_id, $bd)
{
	$query = "select * from personne where pers_id = '$pers_id'";
       	$res = $bd->exec_query($query);
	$personne = $bd->fetch_object ($res);

	$first=$personne->pers_first;
	$last=$personne->pers_last;
	//print ("<b>Validation de $first $last.</b><br>\n");

	$query = "UPDATE personne SET "
		. "log='2', date=now() "
               	. "WHERE pers_id = '$pers_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("personne", $pers_id, "validate", $personne, "", $bd);
}

function personne_insert($personne, $bd)
{
	$first=addSlashes($personne['pers_first']);
	$last=addSlashes($personne['pers_last']);
	$lab="0";
	if (isset($personne['lab']))	$lab="1";

	$query = "INSERT INTO personne (pers_first, pers_last, lab, log, date) "
		. " VALUES ( '$first', '$last', '$lab', '0', now()) " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "SELECT * "
		. "FROM personne "
		. "WHERE pers_first LIKE '%$first' "
		. "AND pers_last LIKE '%$last%' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$personne = $bd->fetch_object ($res);
	$returnid=$personne->pers_id;

	log_entry("personne", $returnid, "insert", "", $personne, $bd);
	return $returnid;
}

function personne_delete($pers_id, $bd)
{
	$query = "select * from personne where pers_id = '$pers_id'";
       	$res = $bd->exec_query($query);
	$personne_old = $bd->fetch_object ($res);

	$query = "DELETE FROM personne "
               	. "WHERE pers_id = '$pers_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);

	log_entry("personne", $pers_id, "delete", $personne_old, "", $bd);
}

?>

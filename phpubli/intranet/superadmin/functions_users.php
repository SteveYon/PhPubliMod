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

function user_lines($bd)
{
	global $rootdir;

	$list_group[0]="aucun";
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ( $ob=$bd->fetch_object($result))
                $list_group[$ob->g_id]="$ob->g_name";

        $result = $bd->exec_query("SELECT * FROM priv");
        while ( $ob=$bd->fetch_object($result))
                $list_priv[$ob->priv_id]="$ob->priv_libelle";

	$lines="<tr>" . "<th></th>". "<th>prénom</th>". "<th>nom</th>". "<th>login</th>". "<th>email</th>". "<th>group</th>". "<th>priv</th>". "</tr>\n";
	$i=0;

	$query="select * from user order by u_name";
	$result = $bd->exec_query($query);
	while ( $user=$bd->fetch_object($result))
	{
		$i++;
		$str="";

		$bfo="";
		$bfc="";
		if ( $user->u_status == 1 )
		{
			$bfo="<font color='red'>"; $bfc="</font>";
		}
		if ( $user->u_status == 2 )
		{
			$bfo="<font color='red'><b>"; $bfc="</b></font>";
		}

		// $str .= "<td>" . $i . "</td>";
		$str .= "<td>" . $bfo . anchor("users.php?mode=edit&id=$user->u_id", $i) . $bfc . "</td>";
		$str .= "<td>" . $bfo . $user->u_first . $bfc . "</td>";
		$str .= "<td>" . $bfo . $user->u_name . $bfc . "</td>";
		$str .= "<td>" . $bfo . $user->u_login . $bfc . "</td>";
		$str .= "<td>" . $bfo . $user->u_mail . $bfc . "</td>";
		$str .= "<td>" . $bfo . $list_group[$user->u_groupid] . $bfc . "</td>";
		$str .= "<td>" . $bfo . $list_priv[$user->u_status] . $bfc . "</td>";
		$lines .= "<tr>" . $str . "</tr>\n";
	}

	return "<table border=\"1\">\n" . $lines . "</table>\n" ;
}

function user_fixed($id, $bd)
{
	$query = "SELECT * from user WHERE u_id = $id";
	$res = $bd->exec_query($query);
	$user = $bd->fetch_object($res);

	// get lists
        $result = $bd->exec_query("SELECT * FROM priv");
        while ( $ob=$bd->fetch_object($result))
                $list_priv[$ob->priv_id]="$ob->priv_id - $ob->priv_libelle";
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ( $ob=$bd->fetch_object($result))
                $list_group[$ob->g_id]="$ob->g_id - $ob->g_name";

	echo "<table>\n";

		echo "<tr>\n";
		echo "<th>prénom</th>\n";
		echo "<td>" . stripSlashes($user->u_first) ."</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>nom</th>\n";
		echo "<td>" . stripSlashes($user->u_name) ."</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>email</th>\n";
		echo "<td>" . stripSlashes($user->u_mail) ."</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>login</th>\n";
		echo "<td>" . stripSlashes($user->u_login) ."</td>\n";
		echo "</tr>\n";

/*
		echo "<tr>\n";
		echo "<th>md5(password)</th>\n";
		echo "<td>" . stripSlashes($user->u_password) ."</td>\n";
		echo "</tr>\n";
*/

		echo "<tr>\n";
		echo "<th>groupe</th>\n";
		echo "<td>" . $list_group[$user->u_groupid] . "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>statut</th>\n";
		echo "<td>" . $list_priv[$user->u_status] . "</td>\n";
		echo "</tr>\n";

	echo "</table>\n";
}

function user_form($mode, $id, $bd)
{
	if ("$id"!="")
	{
		$query = "SELECT * from user WHERE u_id = $id";
		$res = $bd->exec_query($query);
		$user = $bd->fetch_object($res);
	}

	// get lists
        $result = $bd->exec_query("SELECT * FROM priv");
        while ( $ob=$bd->fetch_object($result))
                $list_priv[$ob->priv_id]="$ob->priv_id - $ob->priv_libelle";
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ( $ob=$bd->fetch_object($result))
                $list_group[$ob->g_id]="$ob->g_id - $ob->g_name";

	echo "<table>\n";

		echo "<tr>\n";
		echo "<th>prénom</th>\n";
		echo "<td><input type=\"text\" name=\"u_first\" value=\"" . stripSlashes($user->u_first) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>nom</th>\n";
		echo "<td><input type=\"text\" name=\"u_name\" value=\"" . stripSlashes($user->u_name) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>email</th>\n";
		echo "<td><input type=\"text\" name=\"u_mail\" value=\"" . stripSlashes($user->u_mail) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>login</th>\n";
		echo "<td><input type=\"text\" name=\"u_login\" value=\"" . stripSlashes($user->u_login) ."\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>groupe</th>\n";
		echo "<td><select name=\"u_groupid\" size=\"1\">\n";
		foreach ($list_group as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"=="$user->u_groupid") echo " selected";
                        echo ">$name</option>\n";
                }
		echo "</td></tr>\n";

		echo "<tr>\n";
		echo "<th>statut</th>\n";
		echo "<td><select name=\"u_status\" size=\"1\">\n";
		foreach ($list_priv as $id=>$name)
                {
                        echo "<option value=\"$id\"";
                        if ("$id"=="$user->u_status") echo " selected";
                        echo ">$name</option>\n";
                }
		echo "</td></tr>\n";

	echo "</table>\n";
}

function user_update($user, $bd)
{
	$u_id=$user['u_id'];
	$first=addSlashes($user['u_first']);
	$name=addSlashes($user['u_name']);
	$mail=addSlashes($user['u_mail']);
	$login=addSlashes($user['u_login']);
	$groupid=$user['u_groupid'];
	$status=$user['u_status'];

	$query = "UPDATE user SET"
		. " u_first='$first', u_name='$name', u_mail='$mail', u_login='$login', u_groupid='$groupid', u_status='$status'"
		. " where u_id='$u_id';";
	//print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	return $u_id;
}

function password_form($id, $bd)
{
	$query = "SELECT * from user WHERE u_id = $id";
	$res = $bd->exec_query($query);
	$user = $bd->fetch_object($res);

	echo "<table>\n";

		echo "<tr>\n";
		echo "<th>prénom</th>\n";
		echo "<td>" . stripSlashes($user->u_first) ."</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>nom</th>\n";
		echo "<td>" . stripSlashes($user->u_name) ."</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<th>password</th>\n";
		echo "<td><input type=\"text\" name=\"u_password\" size=\"50\" maxlength=\"255\"></td>\n";
		echo "</tr>\n";

	echo "</table>\n";
}

function password_update($user, $bd)
{
	$u_id=$user['u_id'];
	$password=addSlashes($user['u_password']);

	$query = "UPDATE user SET"
		. " u_password=md5('$password')"
		. " where u_id='$u_id';";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	return $u_id;
}

function user_insert($user, $bd)
{
	$first=addSlashes($user['u_first']);
	$name=addSlashes($user['u_name']);
	$mail=addSlashes($user['u_mail']);
	$login=addSlashes($user['u_login']);
	$password=$user['u_password'];
	$groupid=$user['u_groupid'];
	$status=$user['u_status'];

	$query = "INSERT INTO user (u_first, u_name, u_mail, u_login, u_password, u_groupid, u_status) "
		. " VALUES ( '$first', '$name', '$mail', '$login', md5('$password'), '$groupid', '$status') " ;
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);

	$query = "SELECT * "
		. "FROM user "
		. "WHERE u_first = '$first' "
		. "AND u_name = '$name' ";
	// print ("query= $query <p>\n");
	$res = $bd->exec_query($query);
	$usr = $bd->fetch_object ($res);
	$returnid=$usr->u_id;

	return $returnid;
}

function user_delete($u_id, $bd)
{
	$query = "DELETE FROM user "
               	. "WHERE u_id = '$u_id'";
       	// print ("query= $query <p>\n");
       	$res = $bd->exec_query($query);
}


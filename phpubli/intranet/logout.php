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

        $rootdir="..";
	$localdir="intranet";
	$filename="logout.php";
	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

if(isset($_SESSION['id']))
{
	$query="insert into history (u_id, action, date_entry) values (" 
		. "'" . $_SESSION['id'] . "', 'logout', now()  )";
	$result=$bd->exec_query($query);
	unset ($_SESSION['id']);
}
if(isset($_SESSION['login']))	unset ($_SESSION['login']);
if(isset($_SESSION['status']))	unset ($_SESSION['status']);
if(isset($_SESSION['group']))	unset ($_SESSION['group']);
if(isset($_SESSION['site']))	unset ($_SESSION['site']);

echo "&nbsp<meta http-equiv=\"refresh\" content=\"0; url='index.php'\">\n"
	
?>

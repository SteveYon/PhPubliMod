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
	$rootdir="../..";
	$localdir="intranet/superadmin";
	$filename="readonly.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$status=0;
	$status=check_root_login($bd);

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Mode maintenance</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("superadmin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Mode maintenance</h1>

<a href="readonly.php?action=readonly">Passer en mode <i>readonly</i></a>
<br>

<a href="readonly.php?action=readwrite">Passer en mode <i>read/write</i></a>
<br>

<?php

if ( isset($_GET['action']) )
{
	if ($_GET['action']=="readonly")
	{
		$query = "UPDATE flags SET value='1' WHERE name='readonly' ";
		//print ("query= $query <p>\n");
		$bd->exec_query($query);
	}
	if ($_GET['action']=="readwrite")
	{
		$query = "UPDATE flags SET value='0' WHERE name='readonly' ";
		//print ("query= $query <p>\n");
		$bd->exec_query($query);
	}
}

?>

<?php

	print("<br>\n La base est maintenant en mode ");
	$query = "SELECT * from flags where name='readonly'";
	// print ("query= $query <p>\n");
	$res=$bd->exec_query($query);
	$flag=$bd->fetch_object($res);
	
	if ("$flag->value"=="0")
		print("<i>read/write</i><br>\n");
	if ("$flag->value"=="1")
		print("<i>read only</i><br>\n");
?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

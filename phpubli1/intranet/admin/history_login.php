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
	$localdir="intranet/admin";
	$filename="history_login.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");
	include ("functions.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$status=0;
	$status=check_admin_login($bd);

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Historique des login/logout</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("admin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Historique des login/logout</h1>

<?php

		$query = "SELECT * FROM history where action='login' OR action='logout' ORDER BY date_entry DESC";
		//print ("query= $query <p>\n");
		$result=$bd->exec_query($query);
		$lines="";

		print "<table>\n";
		while ( $logentry=$bd->fetch_object($result))
		{
			$str="";

			$str .= "<td>";
			$str .= "$logentry->date_entry";
			$str .= "</td>";

			$str .= "<td>";

			$uid=$logentry->u_id;
			$query="SELECT * FROM user WHERE u_id='$uid'";
			// print ("query= $query <p>\n");
			$u=$bd->exec_query($query);
			$uu=$bd->fetch_object($u);
			$user="$uu->u_first" . " " . "$uu->u_name";

			$str .= "$logentry->action: $user ($logentry->u_id)";

			$str .= "</td>";

			$lines .= "<tr>" . $str . "</tr>\n";
		}
		print "<table>\n" . $lines . "</table>\n" ;

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

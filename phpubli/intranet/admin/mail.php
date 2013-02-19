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
	$filename="mail.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");
	include ("functions.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_admin_login($bd);


?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Administration de la base</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_admin("mail"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Administration de la base</h1>

<?php

	$query = "SELECT * FROM user WHERE u_status=1 order by u_name";
	$mresult = $bd->exec_query ($query);
	$maillist="";
	$sep="";
	while ($admin = $bd->fetch_object ($mresult) )
	{
		$mail=$admin->u_mail;
		if ( "$mail" != "" )
		{
			$maillist .= $sep . $mail;
			$sep=",";
		}
	}

	echo "<a href=\"mailto:" . $maillist . "?subject=[publilmfa admin]\">Envoyer un mail à tous les administrateurs de la base</a></br>\n";

	$query = "SELECT * FROM user WHERE u_status<2 order by u_name";
	$mresult = $bd->exec_query ($query);
	$maillist="";
	$sep="";
	while ($admin = $bd->fetch_object ($mresult) )
	{
		$mail=$admin->u_mail;
		if ( "$mail" != "" )
		{
			$maillist .= $sep . $mail;
			$sep=",";
		}
	}

	echo "<a href=\"mailto:" . $maillist . "?subject=[publilmfa users]\">Envoyer un mail à tous les utilisateurs de la base</a></br>\n";

?>

<br>
</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

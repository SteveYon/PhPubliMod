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
	$filename="index.php";
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

<!-- <?php leftmenu_admin(""); ?>-->

<!-- start main panel -->
<div id=mainarea>

<h1>Administration de la base</h1>

<a href="history_document.php">Historique des modifications de la table des documents</a></br>
<br>

<a href="history_pers.php">Historique des modifications de la table des personnes</a></br>
<br>

<a href="history_journal.php">Historique des modifications de la table des journaux</a></br>
<br>

<?php
	if (check_root_priv($bd))
	echo "<a href=\"history_login.php\">Historique des login/logout</a></br>\n<br>\n";
?>


<br>
<a href="mail.php">Envoyer un mail aux utilisateurs/administrateurs de la base</a></br>
<br>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

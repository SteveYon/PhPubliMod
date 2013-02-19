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
	$filename="index.php";
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
<title>Super-Administration de la base</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>
<?php leftmenu_intranet("superadmin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Super-Administration de la base</h1>

<!--
<a href="backup.php">Sauvegarde de la base</a><br>
-->

<a href="readonly.php">Passer en mode maintenance</a></br>
<br>

<a href="personne_minuscules.php">Passer les noms des personnes en minuscules</a></br>
<br>

<a href="charentities.php">Transformer les charactères spéciaux en ascii</a></br>
<br>

<a href="users.php">Liste des utilisateurs de la base</a></br>
<br>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

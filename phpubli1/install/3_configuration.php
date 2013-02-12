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
        $rootdir="..";
	$localdir="install";
	$filename="3_configuration.php";
	require_once ("$rootdir/include.php");
	require_once ("functions_installer.php");
?>
<?php preamble(); ?>
<html>

<head>
<title>Installation de PhPubli</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu_installer("3"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Paramétrage de la base de données</h1>

La configuration des paramètres de connexion de la base de données a réussi.
<p>

<a href="4_initial.php">Initialiser la base de données</a>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

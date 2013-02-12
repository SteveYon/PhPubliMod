<?php
/*****************************************************************************
 * Copyright (C) 2007-2009 CNRS
 *
 * Author: Beno�t PIER  <http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier>
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
	$filename="index.php";
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

<?php lhsmenu_installer("1"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Permissions</h1>

<?php

echo "Les fichiers suivants doivent �tre accessibles en �criture&nbsp;:<br>\n";
echo "<ul>\n";

$allOK=true;

$file="connexion_param.php" ;
if (is_writable("../$file"))
{
	echo "<li style=\"color:green\">";
}
else
{
	echo "<li style=\"color:red\">";
	$allOK=false;
}
echo "<tt>$file</tt></li>\n";

$file="param_labo.php" ;
if (is_writable("../$file"))
{
	echo "<li style=\"color:green\">";
}
else
{
	echo "<li style=\"color:red\">";
	$allOK=false;
}
echo "<tt>$file</tt></li>\n";

echo "</ul>\n";

if ($allOK)
{
	echo "Ils le sont&nbsp;!<br>";
	echo "<a href=\"2_create.php\">Continuer</a>";
}
else
{
	echo "Faire \"chmod 666 <tt>fichiers_en_rouge</tt>.\"<br>";
	echo "<a href=\"1_permissions.php\">R�essayer</a>";
}

?>



</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

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
	$rootdir="../..";
	$localdir="intranet/superadmin";
	$filename="personne_minuscules.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_root_login($bd);

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Personnes</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("superadmin"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Passer les noms de personnes en minuscules</h1>

<a href="personne_minuscules.php?action=yes">Transformer maintenant</a>
<br>


<?php

	if ( isset($_GET['action']) && ($_GET['action']=="yes") )
	{
		echo "START <br>";
		$query = "SELECT * from personne ORDER BY pers_last";
		$result = $bd->exec_query ($query);

		while ( $personne = $bd->fetch_object($result) )
		{
			$id=$personne->pers_id;
			$last = $personne->pers_last;

			$alast=explode(" ", $last);
			$mlast="";
			for ($i=0; $i<count($alast); $i++)
			{
				$string=strtolower($alast[$i]);
				if ( ("$string"!="de") && ("$string"!="van") )
					$string[0]=strtoupper($string[0]);

				$blast=explode("-", $string);
				$string=$blast[0];
				for ($j=1; $j<count($blast); $j++)
				{
					$substring=$blast[$j];
					$substring[0]=strtoupper($substring[0]);
					$string .= "-" . $substring;
				}

				$mlast .= $string;
				if ($i<count($alast)-1) $mlast .= " ";
			}

			echo "id=$id last=$last a=" . count($alast) . " b=" . count($blast) . " mlast=$mlast<br>";
			$query = "UPDATE personne SET "
				. " pers_last='$mlast' "
				. " WHERE pers_id = '$id' ";
			echo $query . "<br>";
			$res = $bd->exec_query($query);
		}
		echo "END <br>";
	}

	// display all entries
	echo personne_lines($bd);

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

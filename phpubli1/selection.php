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
	$rootdir=".";
	$localdir=".";
	$filename="selection.php";
	require_once ("$rootdir/include.php");

	if (isset($_POST['clearselection']))
	{
		//$_SESSION=array("selection_array"=>array());
		$_SESSION["selection_array"]=array();
		header("Location: index.php" );
		exit;
	}

	if (isset($_POST['addtoselection']))
	{
		foreach ($_POST as $key=>$val)
		{
			if ("$val"=="docid_sel")
				$_SESSION["selection_array"][]=$key;
		}
	}
	if (isset($_POST['addalltoselection']))
	{
		foreach ($_POST as $key=>$val)
		{
			if ("$val"=="docid_selall")
			{
				$docid=substr($key, 1);
				$_SESSION["selection_array"][]=$docid;
			}
		}
	}

	if (isset($_POST['updateselection']))
	{
		$_SESSION["selection_array"]=array();
		foreach ($_POST as $key=>$val)
		{
			if ("$val"=="docid_sel")
				$_SESSION["selection_array"][]=$key;
		}
	}


?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Publications du LMFA</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu("selection"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Documents sélectionnés</h1>

<?php

$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

$no_items=count($_SESSION["selection_array"]);
if ($no_items>0)
{
	echo "<h2>Current selection: $no_items items</h2>\n";
	$lines="";
	foreach  ($_SESSION["selection_array"] as $key => $docid )
	{
		$lines .= document_singleselection($docid, $bd);
	}
	echo "<form method=\"post\" action=\"selection.php\">\n";
	echo "<table>" . $lines . "</table>\n";
	echo "<input type=\"submit\" name=\"updateselection\" value=\"update list\">\n";
	echo "<input type=\"submit\" name=\"clearselection\" value=\"clear list\">\n";
	echo "<br>\n";
	echo "</form>";

	echo "Export list as:\n";
	echo "<a href=\"export.php?format=bibtex\" target=\"_blank\">bibtex</a>\n";
	echo ", ";
	echo "<a href=\"export.php?format=RIS\" target=\"_blank\">RIS</a>\n";
	echo ", ";
	echo "<a href=\"export.php?format=xml\" target=\"_blank\">XML (générique)</a>\n";
	echo ", ";
	echo "<a href=\"export.php?format=xmlhal\" target=\"_blank\">XML (compatible HAL)</a>\n";
	echo "<br>\n";
}

warning(); 
?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

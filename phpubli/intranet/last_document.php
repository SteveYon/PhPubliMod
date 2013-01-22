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
	$filename="last_document.php";

	require_once ("$rootdir/include.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

        check_login($bd);

        $result = $bd->exec_query("SELECT * FROM groupes");
        while ( $ob=$bd->fetch_object($result))
                $list_groupes[$ob->g_id]="$ob->g_fullname";
        $groupe_id=current_group($bd);
        $groupe_name=$list_groupes[$groupe_id];

	if (isSet($_GET['limit']))
		$limit=$_GET['limit'];
	else
		$limit=20;
?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Liste des derniers documents modifiés</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("doc"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Liste des <?php echo "$limit"; ?> derniers documents modifiés</h1>

<?php

	$query = "SELECT * from document";
	$query .= " WHERE typedoc_id != '7'";
        $query .= " ORDER BY date DESC ";
        $query .= " LIMIT $limit";
	$res = $bd->exec_query($query);

	$lines="<tr><td></td><td></td></tr>\n";

	$i=0;	$fl=0;
	while ( ($doc = $bd->fetch_object($res)) )
	{
		$lines .= document_singleline($i, $doc, $bd, $fl);
		
	}

	$lines .= "<tr><td>&nbsp;</td></tr>\n";

	echo "<table>" . $lines . "</table>\n";

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

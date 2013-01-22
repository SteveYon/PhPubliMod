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
	$filename="history_journal.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/intranet/include.php");
	include ("functions.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_admin_login($bd);

	$result = $bd->exec_query("SELECT * FROM groupes");
        while ( $ob=$bd->fetch_object($result))
                $list_groupes[$ob->g_id]="$ob->g_fullname";
        $groupe_id=current_group($bd);
        $groupe_name=$list_groupes[$groupe_id];

?>
<?php preamble(); ?>
<html>

<!-- ------------------------------------------------------------------------- -->

<head>
<title>Historique des modifications &mdash; Table des journaux</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_admin("journal"); ?>

<!-- start main panel -->
<div id=mainarea>

<h1>Historique des modifications &mdash; Table des journaux</h1>

<?php

if ( isset($_GET['action']) )
{
	if ( ($_GET['action']=="listall") || ($_GET['action']=="listnonvalidated") )
	{
		if ($_GET['action']=="listall")
		{
			if (check_root_priv($bd))
			{
				print "<h2>Toutes les modifications</h2>\n";
				$query = "SELECT * from history where table_id='2' ORDER BY date_entry DESC, id DESC";
			}
			else if (check_admin_priv($bd))
			{
				print "<h2>Toutes les modifications par des membres du groupe &ldquo;$groupe_name&rdquo;</h2>\n";
				$query = "SELECT * from history where table_id='2' AND g_id='$groupe_id' ORDER BY date_entry DESC, id DESC";
			}
		}
		if ($_GET['action']=="listnonvalidated")
		{
			if (check_root_priv($bd))
			{
				print "<h2>Toutes les modifications non validées</h2>\n";
				$query = "SELECT DISTINCT history.* FROM history,journal WHERE history.table_id='2' AND history.item_id=journal.journal_id AND journal.log<2 ORDER BY history.date_entry DESC, history.id DESC";
			}
			else if (check_admin_priv($bd))
			{
				print "<h2>Entrées non validées modifiées par des membres du groupe &ldquo;$groupe_name&rdquo;</h2>\n";
				$query = "SELECT DISTINCT history.* FROM history,journal WHERE history.table_id='2' AND history.item_id=journal.journal_id AND history.g_id='$groupe_id' AND journal.log<2 ORDER BY history.date_entry DESC, history.id DESC";
			}
		}
		//print ("query= $query <p>\n");
		$result=$bd->exec_query($query);

		print "<table>\n";
			$lines = "<tr>";
			$lines .= "<th></th>";
			$lines .= "<td>date and time</td>";
			$lines .= "<td>id</td>";
			$lines .= "<td>user</td>";
			$lines .= "<td><b>action</b></td>";
			$lines .= "</tr>\n";
			$lines .= "<tr><td>&nbsp;</td></tr>\n";
		while ( $logentry=$bd->fetch_object($result))
		{
			$str="";

			$str .= "<th>";
			$str .= "$logentry->id";
			$str .= "</th>";

			$str .= "<td>";
			$str .= "$logentry->date_entry";
			$str .= "</td>";

			$str .= "<td>";
			if ($_GET['action']=="listall")
				$str .= "$logentry->item_id";
			if ($_GET['action']=="listnonvalidated")
				$str .= anchor("$filename?action=item&id=$logentry->item_id", $logentry->item_id) ;
			$str .= "</td>";

			$uid=$logentry->u_id;
			$query="SELECT * FROM user WHERE u_id='$uid'";
			// print ("query= $query <p>\n");
			$u=$bd->exec_query($query);
			$uu=$bd->fetch_object($u);
			$user="$uu->u_first" . " " . "$uu->u_name";
			$str .= "<td>";
			$str .= "$user";
			$str .= "</td>";

			$str .= "<td>";
			if ("$logentry->action"=="insert")
			{
				$str .= "<b>insert:</b> " . journal_entry($logentry->entry_new);
			}
			if ("$logentry->action"=="update")
			{
				$str .= "<b>update:</b> " . journal_entry($logentry->entry_new) 
					. " <b>was:</b> " . journal_entry($logentry->entry_old) ;
			}
			if ("$logentry->action"=="delete")
			{
				$str .= "<b>delete:</b> " . journal_entry($logentry->entry_old);
			}
			if ("$logentry->action"=="validate")
			{
				$str .= "<b>validate:</b> " . journal_entry($logentry->entry_old);
			}
			$str .= "</td>";

			$lines .= "<tr>" . $str . "</tr>\n";
		}
		print "<table>\n" . $lines . "</table>\n" ;
	}
	if ( ($_GET['action']=="item") && ( isset($_GET['id']) ) )
	{
		$item_id=$_GET['id'];
		print "<h3>Modifications de l'entrée $item_id dans la table des journaux</h3>\n";

		$query = "SELECT * from history where table_id='2' AND item_id='$item_id' ORDER BY date_entry DESC";
		//print ("query= $query <p>\n");
		$result=$bd->exec_query($query);

		print "<table>\n";
			$lines = "<tr>";
			$lines .= "<td>date and time</td>";
			$lines .= "<td>user</td>";
			$lines .= "<td><b>action</b></td>";
			$lines .= "</tr>\n";
			$lines .= "<tr><td>&nbsp;</td></tr>\n";
		while ( $logentry=$bd->fetch_object($result))
		{
			$str="";

			$str .= "<td>";
			$str .= "$logentry->date_entry";
			$str .= "</td>";

			$uid=$logentry->u_id;
			$query="SELECT * FROM user WHERE u_id='$uid'";
			// print ("query= $query <p>\n");
			$u=$bd->exec_query($query);
			$uu=$bd->fetch_object($u);
			$user="$uu->u_first" . " " . "$uu->u_name";
			$str .= "<td>";
			$str .= "$user";
			$str .= "</td>";

			$str .= "<td>";
			if ("$logentry->action"=="insert")
			{
				$str .= "<b>insert:</b> " . journal_entry($logentry->entry_new);
			}
			if ("$logentry->action"=="update")
			{
				$str .= "<b>update:</b> " . journal_entry($logentry->entry_new) 
					. " <b>was:</b> " . journal_entry($logentry->entry_old) ;
			}
			if ("$logentry->action"=="delete")
			{
				$str .= "<b>delete:</b> " . journal_entry($logentry->entry_old);
			}
			if ("$logentry->action"=="validate")
			{
				$str .= "<b>validate:</b> " . journal_entry($logentry->entry_old);
			}
			$str .= "</td>";

			$lines .= "<tr>" . $str . "</tr>\n";
		}
		print "<table>\n" . $lines . "</table>\n" ;


		$query = "SELECT * FROM journal WHERE journal_id='$item_id'";
        	$res = $bd->exec_query ($query);
		$journal = $bd->fetch_object ($res);
		$log=$journal->log;
		if ($log<2)
			print anchor("$rootdir/intranet/journal.php?mode=edit&id=$item_id", "Corriger et/ou valider définitivement l'entrée $item_id");
	}
}

?>

<br>
<br>
<br>

<?php 

if (check_root_priv($bd))
{
	echo "<a href=\"history_journal.php?action=listnonvalidated\">Toutes les modifications non validées</a>\n<br>\n";
	echo "<a href=\"history_journal.php?action=listall\">Toutes les modifications</a>\n<br>\n";
}
else if (check_admin_priv($bd))
{
	echo "<a href=\"history_journal.php?action=listnonvalidated\">Entrées non validées modifiées par des membres du groupe &ldquo;$groupe_name&rdquo;</a>\n<br>\n";
	echo "<a href=\"history_journal.php?action=listall\">Toutes les modifications par des membres du groupe &ldquo;$groupe_name&rdquo;</a>\n<br>\n";
}


?>

</div>
<!-- end main panel -->

<?php footer(); ?>

<!-- ------------------------------------------------------------------------- -->

</body>

</html>

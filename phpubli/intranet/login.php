<?php session_start();
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
	$localdir="intranet";
	$filename="login.php";
	require_once ("$rootdir/include.php");
        require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

$redirectpage=$filename;

if ( (isset($_POST['action'])) && ($_POST['action']=="login") )
{
//print ("login <br>");
	if (isset($_POST['connect']))
	{
//print ("connect <br>");
		// if ( isset($_POST['login']) & !empty($_POST['login']) & isset($_POST['plogin']) & !empty($_POST['plogin']) )
		if ( isset($_POST['login']) && isset($_POST['plogin']) )
		{
			$login=$_POST['login'];
			$password=$_POST['plogin'];
			$query = "SELECT * FROM user WHERE `u_login` = '$login' AND `u_password` =md5('$password')";
			//print( "$query <br>\n");
			$result=$bd->exec_query($query);
			if (mysql_num_rows($result)==1)	// login success
			{
				$ob=$bd->fetch_object($result);
				$_SESSION['id']=$ob->u_id;
				$_SESSION['login']=$ob->u_login;
				$_SESSION['status']=$ob->u_status;
				$_SESSION['group']=$ob->u_groupid;
				$_SESSION['site']="phpubli";
				$redirectpage="index.php";

				$query="insert into history (u_id, action, date_entry) values (" 
					. "'" . $ob->u_id . "', 'login', now()  )";
				$result=$bd->exec_query($query);
				if ( (maintenance($bd)>0) && ($ob->u_status!=2) )
				{
 					if(isset($_SESSION['id']))   unset ($_SESSION['id']);
                			if(isset($_SESSION['login']))   unset ($_SESSION['login']);
                			if(isset($_SESSION['status']))  unset ($_SESSION['status']);
                			if(isset($_SESSION['group']))   unset ($_SESSION['group']);
                			if(isset($_SESSION['site']))    unset ($_SESSION['site']);
					$redirectpage="login.php?mode=maintenance";
				}
			}
			else
			{
				$redirectpage="login.php?mode=failed";
			}
		}

	}
	if (isset($_POST['cancel']))
	{
//print ("cancel <br>");
		$redirectpage="index.php";
	}

	// redirect
	header("Location: $redirectpage" );
	// exit();
}

?>
<?php preamble(); ?>
<html>

<head>
<title>Publications du LMFA</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php leftmenu_intranet("login"); ?>

<!-- begin main panel -->
<div id=mainarea>

<?php

if (isset($_GET['mode']))
{
	$mode=$_GET['mode'];
	if ("$mode"=="failed")
	echo "<b>Login failed, try again.</b><br>\n";
	if ("$mode"=="maintenance")
	echo "<b>Database currently readonly, try again later.</b><br>\n";
}

print("<h1>Connexion</h1>\n");

print("<form name=\"login\" action=\"login.php\" method=\"post\">\n");
print("<center>\n");
print("<input type=\"hidden\" name=\"action\" value=\"login\">\n");
print("<table>\n");
print("<tr>\n");
print("<td>Login:</td>\n");
print("<td><input type=\"text\" name=\"login\" maxlength=\"20\"></td>\n");
print("</tr>\n");
print("<tr>\n");
print("<td>Password:</td>\n");
print("<td><input type=\"password\" name=\"plogin\" maxlength=\"20\"></td>\n");
print("</tr>\n");
print("<tr>\n");
print("<td></td><td>\n");
print("<input name=\"connect\" type=\"submit\" value=\"Connexion\">\n");
print("<input name=\"cancel\" type=\"submit\" value=\"Annuler\">\n");
print("</td>\n");
print("</tr>\n");
print("</table>\n");
print("</center>\n");

print("</form>\n");

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>
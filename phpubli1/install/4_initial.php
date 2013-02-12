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
	$filename="4_initial.php";
	require_once ("$rootdir/include.php");
	require_once ("functions_installer.php");

	$ngroups=0;

if ( (isset($_GET['step'])) && ($_GET['step']=="create_tables") )
{
	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$sqlfile="../../phpubli_load_web.sql";
	$lines = file($sqlfile); 

	$scriptfile = false; 

	/* Get rid of the comments and form one jumbo line */ 
	foreach($lines as $line)
	{
		$line = trim($line); 
		if(!ereg('^--', $line)) { $scriptfile.=" ".$line; } 
	} 
	/* Split the jumbo line into smaller lines */ 
	$queries = explode(';', $scriptfile); 

$n=0;

	/* Run each line as a query */
	foreach($queries as $query)
	{
		$query = trim($query); 
		if($query == "") { continue; } 
//echo "$n: $query <br>\n";
//$n++;
		if(!mysql_query($query.';')) 
		{ 
			$errmsg = "query ".$query." failed"; 
			return false; 
		} 
	} 
	header("Location: 4_initial.php?step=groups" );
}

if (isset($_POST['set_ngroups']))
{
	$ngroups=$_POST['n_groups'];
	if ($ngroups<0) { $ngroups=0;}
}

if ( (isset($_GET['step'])) && ($_GET['step']=="create_groups") )
{
	//echo "ngroups=$ngroups<br>";
	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	for ($n=1; $n<=$ngroups+1; $n++)
	{
		foreach ($_POST as $key=>$val)
		{
			if ("$key"=="gid$n")	$gid=$val;
			if ("$key"=="gname$n")	$gname=$val;
			if ("$key"=="gfullname$n")	$gfullname=$val;
		}
		//echo "n=$n	gid=$gid	gname=$gname	gfullname=$gfullname <br>\n";
		$query="INSERT INTO `groupes` (`g_id`, `g_name`, `g_fullname`) VALUES ($gid, '$gname', '$gfullname');";
		//echo "$query <br>\n";
		if(!mysql_query($query)) 
		{ 
			$errmsg = "query ".$query." failed"; 
			return false; 
		} 
	}
	header("Location: 4_initial.php?step=users" );
}

if ( (isset($_GET['step'])) && ($_GET['step']=="create_users") )
{
	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$id=$_POST['root_id'];
	$first=$_POST['root_first'];
	$email=$_POST['root_email'];
	$login=$_POST['root_login'];
	$pwd=$_POST['root_pwd'];
	$gid=$_POST['root_gid'];
	$status=$_POST['root_status'];
	$query="INSERT INTO `user` (`u_id`, `u_first`, `u_name`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES ($id, '$first', '', '$email', '$login', md5('$pwd'), $gid, $status);";
	//echo "$query <br>\n";
	if(!mysql_query($query)) 
	{ 
		$errmsg = "query ".$query." failed"; 
echo "$errmsg <br>";
		return false; 
	} 

	$id=$_POST['admin_id'];
	$first=$_POST['admin_first'];
	$email=$_POST['admin_email'];
	$login=$_POST['admin_login'];
	$pwd=$_POST['admin_pwd'];
	$gid=$_POST['admin_gid'];
	$status=$_POST['admin_status'];
	$query="INSERT INTO `user` (`u_id`, `u_first`, `u_name`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES ($id, '$first', '', '$email', '$login', md5('$pwd'), $gid, $status);";
	//echo "$query <br>\n";
	if(!mysql_query($query)) 
	{ 
		$errmsg = "query ".$query." failed"; 
echo "$errmsg <br>";
		return false; 
	} 

	$id=$_POST['user_id'];
	$first=$_POST['user_first'];
	$email=$_POST['user_email'];
	$login=$_POST['user_login'];
	$pwd=$_POST['user_pwd'];
	$gid=$_POST['user_gid'];
	$status=$_POST['user_status'];
	$query="INSERT INTO `user` (`u_id`, `u_first`, `u_name`, `u_mail`, `u_login`, `u_password`, `u_groupid`, `u_status`) VALUES ($id, '$first', '', '$email', '$login', md5('$pwd'), $gid, $status);";
	//echo "$query <br>\n";
	if(!mysql_query($query)) 
	{ 
		$errmsg = "query ".$query." failed"; 
echo "$errmsg <br>";
		return false; 
	} 

	header("Location: 5_param.php" );
}

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

<?php lhsmenu_installer("4"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Initialisation de la base de données</h1>

<?php

if (isset($_GET['step']))
{

	if ($_GET['step']=="groups")
	{
		echo "<s>1. Création et préremplissage des tables.</s><br>\n";
		echo "2. Création des équipes de recherche.<br><br><br>\n";
		if ("$ngroups"=="0")
		{
			echo "<form name=\"set_ngroups\" method=\"POST\" action=\"4_initial.php?step=groups\">\n";
			echo "Nombre d'équipes de recherche (il en faut au moins une)&nbsp;: <input name=\"n_groups\" type=\"text\" size=\"2\" value=\"4\">\n";
			echo "<input type=\"hidden\" name=\"set_ngroups\">\n";
			echo "<input type=\"submit\" name=\"submit\" value=\"continuer\">\n";
			echo "</form>";
		}
		else
		{
			echo "Indiquer un nom abrégé et un nom complet pour chacune des $ngroups équipes de recherche :<br>\n";
			echo "<form name=\"create_groups\" method=\"POST\" action=\"4_initial.php?step=create_groups\">\n";
			echo "<input type=\"hidden\" name=\"set_ngroups\">\n";
			echo "<input type=\"hidden\" name=\"n_groups\" value=\"$ngroups\">\n";
			echo "<table>\n";
			echo "<tr><th>id</th><th>name</th><th>full_name</th></tr>\n";
			for ($n=1; $n<=$ngroups; $n++)
			{
				echo "<tr>\n";
				echo "<td>$n <input type=\"hidden\" name=\"gid$n\" value=\"$n\"></td>\n";
				echo "<td><input type=\"text\" size=\"8\" name=\"gname$n\" value=\"grp$n\"></td>\n";
				echo "<td><input type=\"text\" size=\"24\" name=\"gfullname$n\" value=\"équipe de recherche $n\"></td>\n";
				echo "</tr>\n";
			}
				echo "<tr>\n";
				echo "<td>$n <input type=\"hidden\" name=\"gid$n\" value=\"$n\"></td>\n";
				echo "<td><input type=\"hidden\" name=\"gname$n\" value=\"ext\">ext</td>\n";
				echo "<td><input type=\"hidden\" name=\"gfullname$n\" value=\"publication hors labo\">publication hors labo</td>\n";
				echo "</tr>\n";
			echo "</table>\n";
			echo "<input type=\"hidden\" name=\"create_ngroups\">\n";
			echo "<input type=\"submit\" name=\"submit\" value=\"continuer\">\n";
			echo "</form>\n";
		}
	}
	if ($_GET['step']=="users")
	{
		echo "<s>1. Création et préremplissage des tables.</s><br>\n";
		echo "<s>2. Création des équipes de recherche.</s><br>\n";
		echo "3. Création des premiers utilisateurs.<br><br><br>\n";

		echo "Pour pouvoir commencer à utiliser la base il faut créer au moins trois utilisateurs&nbsp;:\n";
		echo "<ul><li>root&nbsp;: superutilisateur (priv=2) qui n'appartient à aucun groupe de recherche et a (presque) tous les pouvoirs.</li>";
		echo "<li>admin1&nbsp;: un utilisateur ayant certains pouvoirs d'administration (priv=1) pour les publications et les utilisateurs appartenant à son groupe de recherche.</li>\n";
		echo "<li>user1&nbsp;: un utilisateur lambda du premier groupe de recherche.</li></ul>\n";
		echo "Il est vivement recommandé de changer les mots de passe et de renseigner correctement les
adresses électroniques (utiles pour envoyer des messages à tous les utilisateurs de la base).<br><br>\n";

		echo "<form name=\"create_users\" method=\"POST\" action=\"4_initial.php?step=create_users\">\n";

		echo "<table>\n";
		echo "<tr><th>id</th><th>nom</th><th>email</th><th>login</th><th>mot de passe</th><th>groupe</th><th>privilège</th></tr>\n";
		echo "<tr>\n";
		echo "<td>1<input type=\"hidden\" name=\"root_id\" value=\"1\"></td>\n";
		echo "<td>root<input type=\"hidden\" name=\"root_first\" value=\"root\"></td>\n";
		echo "<td><input type=\"text\" name=\"root_email\" value=\"root@phpubli.org\"></td>\n";
		echo "<td>root<input type=\"hidden\" name=\"root_login\" value=\"root\"></td>\n";
		echo "<td><input type=\"text\" name=\"root_pwd\" value=\"phpubli\"></td>\n";
		echo "<td>0<input type=\"hidden\" name=\"root_gid\" value=\"0\"></td>\n";
		echo "<td>2<input type=\"hidden\" name=\"root_status\" value=\"2\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>2<input type=\"hidden\" name=\"admin_id\" value=\"2\"></td>\n";
		echo "<td>admin1<input type=\"hidden\" name=\"admin_first\" value=\"admin1\"></td>\n";
		echo "<td><input type=\"text\" name=\"admin_email\" value=\"admin1@phpubli.org\"></td>\n";
		echo "<td>admin1<input type=\"hidden\" name=\"admin_login\" value=\"admin1\"></td>\n";
		echo "<td><input type=\"text\" name=\"admin_pwd\" value=\"phpubli_admin1\"></td>\n";
		echo "<td>1<input type=\"hidden\" name=\"admin_gid\" value=\"1\"></td>\n";
		echo "<td>1<input type=\"hidden\" name=\"admin_status\" value=\"1\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>3<input type=\"hidden\" name=\"user_id\" value=\"3\"></td>\n";
		echo "<td>user1<input type=\"hidden\" name=\"user_first\" value=\"user1\"></td>\n";
		echo "<td><input type=\"text\" name=\"user_email\" value=\"user1@phpubli.org\"></td>\n";
		echo "<td>user1<input type=\"hidden\" name=\"user_login\" value=\"user1\"></td>\n";
		echo "<td><input type=\"text\" name=\"user_pwd\" value=\"phpubli_user1\"></td>\n";
		echo "<td>1<input type=\"hidden\" name=\"user_gid\" value=\"1\"></td>\n";
		echo "<td>0<input type=\"hidden\" name=\"user_status\" value=\"0\"></td>\n";
		echo "</tr>\n";

		echo "</table>\n";

		echo "<input type=\"hidden\" name=\"create_users\">\n";
		echo "<input type=\"submit\" name=\"submit\" value=\"continuer\">\n";
		echo "</form>";
	}

}
else
{
echo "1. Commencer par créer les tables et par les préremplir, en cliquant ";
echo "<a href=\"4_initial.php?step=create_tables\">ici</a>. <p>\n";
}

/*
L'initialisation de la base de données a réussi.
<p>

<a href="5_end.php">Terminer</a>
*/

?>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

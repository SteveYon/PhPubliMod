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
	if (isset($_POST['connect']))
	{
		if ( isset($_POST['login']) && isset($_POST['plogin']) )
		{
			$login=$_POST['login'];
			$password=$_POST['plogin'];
			/*
			 *Modifications ajout�es dans le but de v�rifier si les utilisateurs sont dans l'annuaire ldap
			*/
			$LDAPHost = SERVERLDAP;       //Le serveur LDAP
  			$dn =ADMINDN; //Le DN de l'admin ldap
  			$racine = LDAPROOT;  //La racine � partir duquel on effectues des recherches dans la base ldap
  			$LDAPUser = UNAMELDAP;        //login permettant d'effectuer les op�rations de bases dans la base ldap
  			$LDAPUserPassword = UPASSWORDLDAP; //Mot de passe admin
  			$LDAPFieldsToFind = array("cn", "ou", "uid", "status");//Les champs utiles pour la connexion
    
  			$cnx = ldap_connect($LDAPHost) or die("Could not connect to LDAP");
  			ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3); 
  			ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);        
  			ldap_bind($cnx,$dn,$LDAPUserPassword) or die("Could not bind to LDAP");
  				error_reporting (E_ALL ^ E_NOTICE); 
  			$filter="(cn=$login)"; //Permet de selectionner les cn
  			$sr=ldap_search($cnx, $racine, $filter, $LDAPFieldsToFind);
  			$info = ldap_get_entries($cnx, $sr);

			$entry = ldap_first_entry($cnx, $sr);
    			$dnUser = ldap_get_dn($cnx, $entry);	
			$resConnection = ldap_bind($cnx,$dnUser,$password);
		

			if($resConnection==1)//Connection OK
			{
				$_SESSION['id']=$info[0]['uid'][0];
				$_SESSION['login']=$login;
				$_SESSION['status']=$info[0]['status'][0];
				$_SESSION['group']=$info[0]['ou'][0];
				$_SESSION['site']="phpubli";
				$redirectpage="index.php";
				

				
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

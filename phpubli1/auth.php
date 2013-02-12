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

// ****************************************************************
// authentification functions
/*
*Fichier modifié par Adrien UWINDEKWE MatIS 2013
*Motivations: Adapter ce fichier pour mettre en place l'identification LDAP
*/


function current_user()
{
	$current_user="";
	if ((isset($_SESSION['id']) && (!empty($_SESSION['id']))) || isset($_SESSION['login']) && isset($_SESSION['group']) && isset($_SESSION['site']) && ($_SESSION['site']=="phpubli") )
	{
		$current_user= $_SESSION['login'];
	}
	return $current_user;
}

function current_group()
{
	$current_group="";
	if ( isset($_SESSION['group']) )
		$current_group=$_SESSION['group'];
	return $current_group;
}

function check_user($login, $password)
{

	$response="";
	$LDAPHost = SERVERLDAP;       //Le 
	$dn =ADMINDN; //Le DN de l'admin
	$racine = LDAPROOT;  //Racine à partir de laquelle les recherches sont faites
	$LDAPUser = UNAMELDAP;        //Login admin permettant d'effectuer les recherches de bases
	$LDAPUserPassword = UPASSWORDLDAP; //Mot de passe admin
	$LDAPFieldsToFind = array("cn", "givenname", "homedirectory", "mail", "ou", "uid", "status");//Les champs utiles pour la connexion
    
	$cnx = ldap_connect($LDAPHost) or die("Could not connect to LDAP");
	ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);  
	ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);         
	ldap_bind($cnx,$dn,$LDAPUserPassword) or die("Could not bind to LDAP");
  				error_reporting (E_ALL ^ E_NOTICE);  
	$filter="(cn=$login)"; 
	$sr=ldap_search($cnx, $racine, $filter, $LDAPFieldsToFind);
	$info = ldap_get_entries($cnx, $sr);

	$entry = ldap_first_entry($cnx, $sr);
	$dnUser = ldap_get_dn($cnx, $entry);	
	$resConnection = ldap_bind($cnx,$dnUser,$password);
	if($resConnection==1){
		$response=$login;	
	}
	/*$query="select * from user where `u_login`='$login' and `u_password`=md5('$password')";
	// print "$query <br>\n";
	$result=$bd->exec_query($query);
	if (mysql_num_rows($result)==1)
	{
		$ob=$bd->fetch_object($result);	
		$_SESSION['id']=$ob->u_id;
		$response=$ob->u_login;
	}*/
	return $response;
}

function check_login($bd)
{
	$currentuser=current_user();
	global $rootdir;
	if (empty($currentuser))
	{
		header("Location: $rootdir/intranet/");
	}
	else if ( (maintenance($bd)>0) && ($_SESSION['status']!=2) )
	{
		if(isset($_SESSION['id']))   unset ($_SESSION['id']);
		if(isset($_SESSION['login']))   unset ($_SESSION['login']);
		if(isset($_SESSION['status']))  unset ($_SESSION['status']);
		if(isset($_SESSION['group']))   unset ($_SESSION['group']);
		if(isset($_SESSION['site']))    unset ($_SESSION['site']);
		header("Location: $rootdir/intranet/login.php?mode=maintenance");
	}
	else
	{
		return $_SESSION['status'];
	}
}

function check_status()
{
	$currentuser=current_user();
	if (empty($currentuser))
	{
		$status=-1;
	}
	else
	{
		$status=$_SESSION['status'];
	}
	return $status;
}

function check_admin_priv()
{
	$currentuser=current_user();
	if (empty($currentuser))
	{
		$priv=0;
	}
	else
	{
		$status=$_SESSION['status'];
		if ($status>0)	$priv=1;
		else 		$priv=0;
	}
	return $priv;
}

function check_admin_login()
{
	$currentuser=current_user();
	global $rootdir;
	if (empty($currentuser))
	{
		header("Location: $rootdir/intranet/");
	}
	else if ($_SESSION['status']<1)
	{
		if(isset($_SESSION['id']))   unset ($_SESSION['id']);
		if(isset($_SESSION['login']))   unset ($_SESSION['login']);
		if(isset($_SESSION['status']))  unset ($_SESSION['status']);
		if(isset($_SESSION['group']))   unset ($_SESSION['group']);
		if(isset($_SESSION['site']))    unset ($_SESSION['site']);
		header("Location: $rootdir/intranet/login.php");
	}
	else
	{
		return $_SESSION['status'];
	}
}

function check_root_priv()
{
	$currentuser=current_user();
	if (empty($currentuser))
	{
		$priv=0;
	}
	else
	{
		$status=$_SESSION['status'];
		if ($status>1)	$priv=1;
		else 		$priv=0;
	}
	return $priv;
}

function check_root_login()
{
	$currentuser=current_user();
	global $rootdir;
	if (empty($currentuser))
	{
		header("Location: $rootdir/intranet/");
	}
	else if ($_SESSION['status']!=2)
	{
		if(isset($_SESSION['id']))   unset ($_SESSION['id']);
		if(isset($_SESSION['login']))   unset ($_SESSION['login']);
		if(isset($_SESSION['status']))  unset ($_SESSION['status']);
		if(isset($_SESSION['group']))   unset ($_SESSION['group']);
		if(isset($_SESSION['site']))    unset ($_SESSION['site']);
		header("Location: $rootdir/intranet/login.php");
	}
	else
	{
		return $_SESSION['status'];
	}
}

?>

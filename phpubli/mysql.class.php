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

// ******************************************************************************
// mysql.class.php
// ******************************************************************************

class MySQL
{
	private $connexion, $name;

	// construc
	function MySQL ($login, $password, $base, $server)
	{
		$this->name = $base;
		// connect to server
		$this->connexion = mysql_pconnect ($server, $login, $password);
		// connect to database
		mysql_select_db ($this->name, $this->connexion);
	}

	public function exec_query ($query)
	{
		$result = mysql_query ($query, $this->connexion);

		if (!$result)
		{
			$mess  = "Problème dans l'exécution de la requête : $query. ";
			$mess .= mysql_error($this->connexion);

			print ("<b> $mess </b> <p>\n");
		}

		return $result;
	}

	// fetch a line in result of query
	public function fetch_object ($result)
	{
		return mysql_fetch_object ($result);
	}
	public function fetch_assoc ($result)
	{
		return mysql_fetch_assoc ($result);
	}
	public function fetch_row ($result)
	{
		return mysql_fetch_row ($result);
	}

	// prepare for insertion
	public function prepare_string($text)
	{
		return mysql_real_escape_string($text);
	}

	// destruc
	function __destruct ()
	{
		mysql_close ($this->connexion);
	}

}

?>

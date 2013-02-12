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
	$filename="export.php";
	require_once ("$rootdir/include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$exportfilename="publilmfa_list";


if ( isset($_GET['format']) && ($_GET['format']=="bibtex") )
{
	$exportfilename.=".bib";
	header("Content-Disposition: inline; filename=$exportfilename");
	header("Content-Type: text/plain; charset=iso-8859-1");

	$no_items=count($_SESSION["selection_array"]);

	if ($no_items>0)
	{
		foreach  ($_SESSION["selection_array"] as $key => $docid )
		{
			export_document_bibtex($docid, $bd);
		}
	}

}
else if ( isset($_GET['format']) && ($_GET['format']=="xml") )
{
	$exportfilename.=".xml";
	header("Content-Disposition: inline; filename=$exportfilename");
	header("Content-Type: text/plain; charset=iso-8859-1");

	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-15\"?>\n";
	// echo "<!DOCTYPE bibliography PUBLIC \"-//OASIS//DTD DocBook XML V4.2//EN\" \"http://www.oasis-open.org/docbook/xml/4.2/docbookx.dtd\">\n";
	echo "<bibliography>\n\n";

	$no_items=count($_SESSION["selection_array"]);

	if ($no_items>0)
	{
		foreach  ($_SESSION["selection_array"] as $key => $docid )
		{
			export_document_xml($docid, $bd);
		}
	}
	echo "</bibliography>\n";
}
else if ( isset($_GET['format']) && ($_GET['format']=="xmlhal") )
{
	$exportfilename="HAL.xml";
	header("Content-Disposition: inline; filename=$exportfilename");
	header("Content-Type: text/plain; charset=iso-8859-1");

	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
	echo "<HAL>\n";
	echo "<CONNEXION LOGIN='toto' PASSWORD='xxxxxxxxx' />\n";

	$no_items=count($_SESSION["selection_array"]);

	if ($no_items>0)
	{
		foreach  ($_SESSION["selection_array"] as $key => $docid )
		{
			$lines=export_document_xmlhal($docid, $bd);
			echo $lines;
		}
	}
	echo "</HAL>\n";
}
else if ( isset($_GET['format']) && ($_GET['format']=="RIS") )
{
	$exportfilename.=".ris";
	header("Content-Disposition: inline; filename=$exportfilename");
	header("Content-Type: text/plain; charset=iso-8859-1");

	$no_items=count($_SESSION["selection_array"]);

	if ($no_items>0)
	{
		foreach  ($_SESSION["selection_array"] as $key => $docid )
		{
			export_document_RIS($docid, $bd);
		}
	}
}
else
{
	// echo "unrecognized format";
	header("Location: selection.php");
	exit;
}

?>

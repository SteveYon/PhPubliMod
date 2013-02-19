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
	$localdir="intranet";
	$filename="export_notice_hal.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/functions_export.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	$exportfilename="HAL.bib";

	$docid=$_GET['docid'];

	header("Content-Disposition: inline; filename=$exportfilename");
	header("Content-Type: text/plain; charset=iso-8859-1");

	echo export_document_bibtex($docid, $bd);

?>

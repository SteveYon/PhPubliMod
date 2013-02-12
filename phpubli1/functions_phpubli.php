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

$PHPUBLI_VERSION="v1.0";


function phpubli_copy()
{
	global $PHPUBLI_VERSION;
	global $localdir;
	global $filename;
	print("\n");
	print("<!--[ File: PHPUBLI_ROOTDIR/$localdir/$filename ]-->\n");
	print("<!--[ This file is part of PhPubli " . $PHPUBLI_VERSION . " Copyright (C) 2007-2009 CNRS ]-->\n");
	print("<!--[ Author: Benoît PIER  <http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier> ]-->\n");
	print("<!--[ This program is distributed under the terms of the GNU General Public License version 3, see <http://www.gnu.org/licences/> ]-->\n");
	// print("<!--[ ]-->\n");
	print("\n");
}

function phpubli_foot()
{
	print("Site réalisé avec <a href=\"http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier/computing/phpubli.php\">PhPubli</a>\n");
}



?>

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
// html.php : ensemble de routines pour faciliter la production du code html
// ******************************************************************************


function anchor($url, $text)
{
	return "<a href='$url'>$text</a>";
}
function anchor_icon($url, $text, $icon)
{
	global $rootdir;
	global $imagesdir;
	return "<a href='$url'>$text <img src=\"$imagesdir/$icon\" border=\"0\" alt=\"$icon\"></a>";
}
function anchor_icon_and_text($url, $icon, $text)
{
	global $rootdir;
	global $imagesdir;
	return "<a href='$url'><img src=\"$imagesdir/$icon\" border=\"0\" alt=\"$icon\">$text</a>";
}

// link that opens in new window
function anchor_win($url, $text)
{
	global $rootdir;
	return "<a href='$url' target='_blank'>$text</a>";
}
// link to external pages
function anchor_ext($url, $text)
{
	global $rootdir;
	global $imagesdir;
	return "<a href='$url' target='_blank'>$text <img src=\"$imagesdir/iconout.png\" border=\"0\" alt=\"iconout.png\"></a>";
}
function anchor_ext_icon($url, $icon)
{
	global $rootdir;
	global $imagesdir;
	return "<a href='$url' target='_blank'><img src=\"$imagesdir/$icon\" border=\"0\" alt=\"$icon\"></a>";
}

?>

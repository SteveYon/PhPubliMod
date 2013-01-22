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
// php.php : ici on met pêle-mêle des routines php qui peuvent être utiles
// ******************************************************************************

function xml2html($xmlfile, $xsltfile)
{
	$xml = new DomDocument; // from /ext/dom
	$xml->load($xmlfile);

	$xsl = new DomDocument;
	$xsl->load($xsltfile);

	/* Configure the transformer */
	$proc = new xsltprocessor;
	$proc->importStyleSheet($xsl); // attach the xsl rules
	echo $proc->transformToXML($xml); // actual transformation
}

function xml2html_withxslparam($xmlfile, $xsltfile, $pname, $pvalue)
{
	$xml = new DomDocument; // from /ext/dom
	$xml->load($xmlfile);

	$xsl = new DomDocument;
	$xsl->load($xsltfile);

	/* Configure the transformer */
	$proc = new xsltprocessor;
	$proc->importStyleSheet($xsl); // attach the xsl rules
	$proc->setParameter("xsl", $pname, $pvalue); // set parameter value
	echo $proc->transformToXML($xml); // actual transformation
}

function my_strtoupper($text)
{
	return strtr(strtoupper($text), "äâàáåãéèëêòóôõöøìíîïùúûüýñçþÿæð","ÄÂÀÁÅÃÉÈËÊÒÓÔÕÖØÌÍÎÏÙÚÛÜÝÑÇÞÝÆÐ");
}

function ascii2tex($text)
{
	$ascii	=array(	"é",	"É",	"è",	"É",	"ê",	"Ê",	"ë",	"Ë",
			"à",	"À",	"â",	"Â",	"Å",
			"ù",	"Ù",	"û",	"Û",
			"î",	"Î",	"ï",	"Ï",
			"ô",	"Ô",	"ö",	"Ö",
			"ç",	"Ç"	);
	$tex	=array(	"\'e",	"\'E",	"\`e",	"\`E",	"\^e",	"\^E",	"\\\"e","\\\"E",
			"\`a",	"\`A",	"\^a",	"\^A",	"\{AA}",
			"\`u",	"\`U",	"\^u",	"\^U",
			"\^{\i}","\^I",	"\\\"{\i}","\\\"I",
			"\^o",	"\^O",	"\\\"o","\\\"O",
			"\c{c}","\c{C}");
	return str_replace($ascii, $tex, $text);
}

function remove_accents($text)
{
	return strtr($text, "ÉÈÊËéèêëÀÂÅàâÙÛùûÎÏîïÔôÇç", "EEEEeeeeAAAaaUUuuIIiiOoCc");
}

function initials_from_name($name)
{
	$sname = split('[ .]', $name);
	$initials="";
	foreach($sname as $key => $value)
	{
		$pname=$sname[$key];
		if ( strpbrk($pname, '-'))
		{
			$ppname = split('-', $pname);
			$initials .= $ppname[0][0] . ".-" . $ppname[1][0] . ". ";
		}
		else
		{
			if ($pname[0])
			$initials .= $pname[0] . ". " ;
		}
	}
	return $initials;
}

function date_range($datestart, $dateend)
{
	$date=split('-',$datestart);
	$ystart=$date[0];
	$mstart=$date[1];
	$dstart=$date[2];
	$date=split('-',$dateend);
	$yend=$date[0];
	$mend=$date[1];
	$dend=$date[2];

	$range="";

	if ($ystart<$yend)
	{
		$range="$dstart/$mstart/$ystart-$dend/$mend/$yend";
	}
	else if ($mstart<$mend)
	{
		$range="$dstart/$mstart-$dend/$mend/$yend";
	}
	else if ($dstart<$dend)
	{
		$range="$dstart-$dend/$mend/$yend";
	}
	else
		$range="$dend/$mend/$yend";
	return $range;
}

?>

<?php
session_start();
/*****************************************************************************
 * Copyright (C) 2007-2009 CNRS
 *
 * Author: Benoît PIER <http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier>
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *****************************************************************************/

// ****************************************************************
// Document operations

function document_edit($mode, $doc_id, $bd)
{
        $query    = "SELECT * from document WHERE doc_id = $doc_id";
        $res      = $bd->exec_query($query);
        $document = $bd->fetch_object($res);
        
        echo "DOCUMENT_EDIT <br>\n";
        // get lists
        
        $list_journal[0] = "-------------------- (select from list) --------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        
        //if ($mode=="update") echo "mise à jour/suppression d'un article<p>\n";
        //if ($mode=="insert") echo "ajout d'un article<p>\n";
        
        echo "<center>\n";
        echo "<form method=\"post\" action=\"article.php\" name=\"form\">\n";
        echo "<input type=\"hidden\" name=\"action\" value=\"$mode\">\n";
        if ($mode == "update")
                echo "<input type=\"hidden\" name=\"doc_id\" value=\"$tab->doc_id\">\n";
        echo "<input type=\"hidden\" name=\"typedoc_id\" value=\"$tab->typedoc_id\">\n";
        
        echo "<table>\n";
        
        if ($mode == "editdocument") {
                echo "<tr>\n";
                echo "<th>doc_id</th>\n";
                echo "<td>$document->doc_id ";
                if ($document->log == "0")
                        echo "[created on $document->date]";
                if ($document->log == "1")
                        echo "[last modified on $document->date]";
                echo "</td>\n";
                echo "</tr>\n";
        }
        echo "<tr>\n";
        echo "<th>typedoc_id</th>\n";
        echo "<td><select name=\"typedoc_id\" size=\"1\">\n";
        foreach ($list_typedoc as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $document->typedoc_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>title</th>\n";
        echo "<td><input type=\"text\" name=\"title\" value=\"" . stripSlashes($document->title) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>year</th>\n";
        echo "<td><input type=\"text\" name=\"year\" value=\"" . $document->year . "\" size=\"120\" maxlength=\"4\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>volume</th>\n";
        echo "<td><input type=\"text\" name=\"volume\" value=\"" . stripSlashes($document->volume) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        echo "<tr><th></th><td>Pour saisir les pages&nbsp:</td></tr>\n";
        echo "<tr><th></th><td>utiliser \"<i>pages_start</i>&ndash;<i>pages_end</i>\" pour les journaux dont toutes les pages d'un volume sont numérotées&nbsp;;</td></tr>\n";
        echo "<tr><th></th><td>utiliser \"<i>eid</i> (<i>pages_num</i> pages)\" quand l'article est identifié par un numéro.</td></tr>\n";
        
        echo "<tr>\n";
        echo "<th>pages_start</th>\n";
        echo "<td><input type=\"text\" name=\"pages_start\" value=\"" . $document->pages_start . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>pages_end</th>\n";
        echo "<td><input type=\"text\" name=\"pages_end\" value=\"" . $document->pages_end . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>eid</th>\n";
        echo "<td><input type=\"text\" name=\"pages_eid\" value=\"" . $document->pages_eid . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>pages_num</th>\n";
        echo "<td><input type=\"text\" name=\"pages_num\" value=\"" . $document->pages_num . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>doi</th>\n";
        echo "<td><input type=\"text\" name=\"doi\" value=\"" . stripSlashes($document->doi) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>journal</th>\n";
        echo "<td><select name=\"journal_id\" size=\"1\">\n";
        foreach ($list_journal as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $document->journal_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>note</th>\n";
        echo "<td><input type=\"text\" name=\"note\" value=\"" . stripSlashes($document->note) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>groupe</th>\n";
        echo "<td>\n";
        
        foreach ($list_groupes as $id => $name) {
                echo "<input type=\"checkbox\" name=\"groupe$id\" value=\"groupeid\"";
                if (in_array($id, explode(" ", $document->groupe))) {
                        echo "checked";
                }
                echo ">$name<br> \n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "</table>\n";
        
        // specific instructions for dealing with authors
        echo "auteur(s)&nbsp;:<p>\n";
        echo "<table>\n";
        
        if ($mode == "update") {
                // author list
                $query   = "SELECT * FROM participer" . " WHERE doc_id='$tab->doc_id'" . " AND fonction_id = '1' " . " ORDER BY rang";
                // echo "query=$query <br>";
                $aresult = $bd->exec_query($query);
                while ($ob = $bd->fetch_object($aresult)) {
                        $pers_id = $ob->pers_id;
                        $rang    = $ob->rang;
                        $query   = "SELECT * FROM personne WHERE pers_id='$ob->pers_id'";
                        //echo "query=$query <br>";
                        $auth    = $bd->exec_query($query);
                        $author  = $bd->fetch_object($auth);
                        $name    = "$author->pers_first $author->pers_last";
                        //echo "rang=$rang name=$name <br>";
                        echo "<tr><th>$rang</th><td>$name</td></tr>\n";
                }
        }
        echo "</table>\n";
        // end authors
        
        if ($mode == "insert") {
                echo "<input type=\"submit\" name=\"insertdocument\" value=\"ajouter le document\">\n";
                echo "<input type=\"submit\" name=\"addauthinsert\" value=\"ajouter des auteurs\">\n";
        }
        if ($mode == "update") {
                echo "<input type=\"submit\" name=\"updatedocument\" value=\"mettre à jour le document\">\n";
                echo "<input type=\"submit\" name=\"deletedocument\" value=\"supprimer le document\">\n";
                $status = check_status($bd);
                // echo "status=$status ";
                // if ($status>0)
                // echo "<input type=\"submit\" name=\"validatedocument\" value=\"valider le document\">\n";
                
                
                echo "<input type=\"submit\" name=\"changeauth\" value=\"modifier les auteurs\">\n";
        }
        echo "<input type=\"submit\" name=\"reset\" value=\"réinitialiser\">\n";
        
        echo "</form>\n";
        echo "</center>\n";
}

function document_form($mode, $tab, $bd)
{
        // get lists

        $list_journal[0] = "-------------------- (select from list) --------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        
        if ($mode == "update")
                echo "mise à jour/suppression d'un article<p>\n";
        if ($mode == "insert")
                echo "ajout d'un article<p>\n";
        
        echo "<center>\n";
        echo "<form method=\"post\" action=\"article.php\" name=\"form\">\n";
        echo "<input type=\"hidden\" name=\"action\" value=\"journal_form\">\n";
        if ($mode == "update")
                echo "<input type=\"hidden\" name=\"doc_id\" value=\"$tab->doc_id\">\n";
        echo "<input type=\"hidden\" name=\"typedoc_id\" value=\"$tab->typedoc_id\">\n";
        
        echo "<table>\n";
        
        if ($mode == "update") {
                echo "<tr>\n";
                echo "<th>doc_id</th>\n";
                echo "<td>$tab->doc_id ";
                if ($tab->log == "0")
                        echo "[created on $tab->date]";
                if ($tab->log == "1")
                        echo "[last modified on $tab->date]";
                echo "</td>\n";
                echo "</tr>\n";
        }
        echo "<tr>\n";
        echo "<th>typedoc_id</th>\n";
        echo "<td><select name=\"typedoc_id\" size=\"1\">\n";
        foreach ($list_typedoc as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $tab->typedoc_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>title</th>\n";
        echo "<td><input type=\"text\" name=\"title\" value=\"" . stripSlashes($tab->title) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>year</th>\n";
        echo "<td><input type=\"text\" name=\"year\" value=\"" . $tab->year . "\" size=\"120\" maxlength=\"4\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>volume</th>\n";
        echo "<td><input type=\"text\" name=\"volume\" value=\"" . stripSlashes($tab->volume) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        echo "<tr><th></th><td>Pour saisir les pages&nbsp:</td></tr>\n";
        echo "<tr><th></th><td>utiliser \"<i>pages_start</i>&ndash;<i>pages_end</i>\" pour les journaux dont toutes les pages d'un volume sont numérotées&nbsp;;</td></tr>\n";
        echo "<tr><th></th><td>utiliser \"<i>eid</i> (<i>pages_num</i> pages)\" quand l'article est identifié par un numéro.</td></tr>\n";
        
        echo "<tr>\n";
        echo "<th>pages_start</th>\n";
        echo "<td><input type=\"text\" name=\"pages_start\" value=\"" . $tab->pages_start . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>pages_end</th>\n";
        echo "<td><input type=\"text\" name=\"pages_end\" value=\"" . $tab->pages_end . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>eid</th>\n";
        echo "<td><input type=\"text\" name=\"pages_eid\" value=\"" . $tab->pages_eid . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>pages_num</th>\n";
        echo "<td><input type=\"text\" name=\"pages_num\" value=\"" . $tab->pages_num . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>doi</th>\n";
        echo "<td><input type=\"text\" name=\"doi\" value=\"" . stripSlashes($tab->doi) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>journal</th>\n";
        echo "<td><select name=\"journal_id\" size=\"1\">\n";
        foreach ($list_journal as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $tab->journal_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>note</th>\n";
        echo "<td><input type=\"text\" name=\"note\" value=\"" . stripSlashes($tab->note) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>groupe</th>\n";
        echo "<td>\n";
        
        foreach ($list_groupes as $id => $name) {
                echo "<input type=\"checkbox\" name=\"groupe$id\" value=\"groupeid\"";
                if (in_array($id, explode(" ", $tab->groupe))) {
                        echo "checked";
                }
                echo ">$name<br> \n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "</table>\n";
        
        // specific instructions for dealing with authors
        echo "auteur(s)&nbsp;:<p>\n";
        echo "<table>\n";
        
        if ($mode == "update") {
                // author list
                $query   = "SELECT * FROM participer" . " WHERE doc_id='$tab->doc_id'" . " AND fonction_id = '1' " . " ORDER BY rang";
                // echo "query=$query <br>";
                $aresult = $bd->exec_query($query);
                while ($ob = $bd->fetch_object($aresult)) {
                        $pers_id = $ob->pers_id;
                        $rang    = $ob->rang;
                        $query   = "SELECT * FROM personne WHERE pers_id='$ob->pers_id'";
                        //echo "query=$query <br>";
                        $auth    = $bd->exec_query($query);
                        $author  = $bd->fetch_object($auth);
                        $name    = "$author->pers_first $author->pers_last";
                        //echo "rang=$rang name=$name <br>";
                        echo "<tr><th>$rang</th><td>$name</td></tr>\n";
                }
        }
        echo "</table>\n";
        // end authors
        
        if ($mode == "insert") {
                echo "<input type=\"submit\" name=\"insertdocument\" value=\"ajouter le document\">\n";
                echo "<input type=\"submit\" name=\"addauthinsert\" value=\"ajouter des auteurs\">\n";
        }
        if ($mode == "update") {
                echo "<input type=\"submit\" name=\"updatedocument\" value=\"mettre à jour le document\">\n";
                echo "<input type=\"submit\" name=\"deletedocument\" value=\"supprimer le document\">\n";
                $status = check_status($bd);
                // echo "status=$status ";
                // if ($status>0)
                // echo "<input type=\"submit\" name=\"validatedocument\" value=\"valider le document\">\n";
                
                
                echo "<input type=\"submit\" name=\"changeauth\" value=\"modifier les auteurs\">\n";
        }
        echo "<input type=\"submit\" name=\"reset\" value=\"réinitialiser\">\n";
        
        echo "</form>\n";
        echo "</center>\n";
}

function document_data_fixed($doc_id, $bd)
{
        $query    = "SELECT * from document WHERE doc_id = $doc_id";
        $res      = $bd->exec_query($query);
        $document = $bd->fetch_object($res);
        
        $result          = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$document->typedoc_id' ");
        $ob              = $bd->fetch_object($result);
        $typedoc_libelle = $ob->typedoc_libelle;
        
        // get lists
        
        /*$list_journal[0] = "-------------------- (select from list) --------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $list_institution[0] = "-------------------- (select from list) --------------------";
        $result              = $bd->exec_query("SELECT * FROM institution");
        while ($ob = $bd->fetch_object($result))
                $list_institution[$ob->institution_id] = stripSlashes($ob->institution_name);
        
        $list_proceedings[0] = "-------------------- (select from list) --------------------";
        $result              = $bd->exec_query("SELECT * FROM document where typedoc_id='7' ORDER BY year desc");
        while ($proceedings = $bd->fetch_object($result))
                $list_proceedings[$proceedings->doc_id] = "$proceedings->year - $proceedings->title";
        
        $list_conference[0] = "-------------------- (select from list) --------------------";
        $result             = $bd->exec_query("SELECT * FROM conference ORDER BY conference_date_start, conference_title");
        while ($conference = $bd->fetch_object($result)) {
                $cdate_start                                 = explode('-', $conference->conference_date_start);
                $cyear                                       = $cdate_start[0];
                $list_conference[$conference->conference_id] = "$cyear - " . stripSlashes($conference->conference_title) . " - " . stripSlashes($conference->conference_city);
        }
        
        $list_publisher[0] = "-------------------- (select from list) --------------------";
        $result            = $bd->exec_query("SELECT * FROM publisher ORDER BY publisher_name");
        while ($publisher = $bd->fetch_object($result))
                $list_publisher[$publisher->publisher_id] = "$publisher->publisher_name";
        */
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        
        $result = $bd->exec_query("SELECT * FROM soustypedoc WHERE soustypedoc_id LIKE '$document->typedoc_id%'");
        while ($ob = $bd->fetch_object($result))
                $list_soustypedoc[$ob->soustypedoc_id] = "$ob->soustypedoc_id - $ob->soustypedoc_libelle";
        
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        // $list_groupes[$ob->g_id]="$ob->g_name";
        
        $result = $bd->exec_query("SELECT * FROM language");
        while ($ob = $bd->fetch_object($result))
                $list_lang[$ob->iso] = "$ob->iso - $ob->name";
        
        echo "<table>\n";
        
        echo "<tr>\n";
        //echo "<th>doc_id</th>\n";
        echo "<th>Modifications</th>\n";
        //echo "<td>$document->doc_id ";
        echo "<td>";
        if ($document->log == "0")
                echo "Créé le $document->date ";
        if ($document->log == "1")
                echo "Dernière Modification: $document->date ";
        if ($document->log == "2")
                echo "Validé le $document->date";
        echo "</td>\n";
        echo "</tr>\n";
        
        
        //MODIFIER Formulaire
        echo "<tr>\n";
        echo "<th>Document</th>\n";
        echo "<td>Article";
        /*foreach ($list_typedoc as $id=>$name)
        {
        if ($id==$document->typedoc_id) echo "$name";
}*/
echo "</td>\n";
echo "</tr>\n";

        /*echo "<tr>\n";
        echo "<th>Sous-Type de Document</th>\n";
        echo "<td>";
        if ("$list_soustypedoc" != "")
        foreach ($list_soustypedoc as $id=>$name)
        {
        if ($id==$document->soustypedoc_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="proceedings_book") )
        {
        echo "<tr>\n";
        echo "<th>conference</th>\n";
        echo "<td>";
        foreach ($list_conference as $id=>$name)
        {
        if ($id==$document->conference_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
        }
        if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="book") || ("$typedoc_libelle"=="proceedings_book") )
        {
        echo "<tr>\n";
        echo "<th>éditeur commercial</th>\n";
        echo "<td>";
        foreach ($list_publisher as $id=>$name)
        {
        if ($id==$document->publisher_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
}*/

echo "<tr>\n";
echo "<th>Titre</th>\n";
echo "<td>" . stripSlashes($document->title) . "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<th>Citation</th>\n";
echo "<td>" . $document->citation . "</td>\n";
echo "</tr>\n";


        /*if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="conference_proceeding") )
        {
        echo "<tr>\n";
        echo "<th>livre de proceedings</th>\n";
        echo "<td>In: ";
        foreach ($list_proceedings as $id=>$name)
        {
        if ($id==$document->proceedings_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
}*/

        /*if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="conference_abstract") )
        {
        echo "<tr>\n";
        echo "<th>conférence</th>\n";
        echo "<td>";
        foreach ($list_conference as $id=>$name)
        {
        if ($id==$document->conference_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
}*/



if ("$typedoc_libelle" == "article") {
        echo "<tr>\n";
        echo "<th>Journal</th>\n";
        echo "<td>".$document->journal."</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Volume</th>\n";
        echo "<td>" . stripSlashes($document->volume) . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Début</th>\n";
        echo "<td>" . $document->pages_start . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Fin</th>\n";
        echo "<td>" . $document->pages_end . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Nombre de pages</th>\n";
        echo "<td>" . $document->pages_num . "</td>\n";
        echo "</tr>\n";


        echo "<tr>\n";
        echo "<th>Année</th>\n";
        echo "<td>" . $document->year . "</td>\n";
        echo "</tr>\n";  


        echo "<tr>\n";
        echo "<th>Mois</th>\n";
        echo "<td>" . $document->month . "</td>\n";

        echo "</tr>\n";  

        echo "<tr>\n";
        echo "<th>HAL</th>\n";
        echo "<td>";
        $hal = stripSlashes($document->hal);
        if ("$hal" != "")
                echo anchor_icon("http://hal.archives-ouvertes.fr/$hal", "$hal", "hal.ico");
        // echo "<td>" . stripSlashes($document->hal) . "</td>\n";
        echo "</td>";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>URL</th>\n";
        echo "<td>" . stripSlashes($document->url) . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>DOI</th>\n";
        echo "<td>";
        $doi = stripSlashes($document->doi);
        if ("$doi" != "")
                echo anchor_ext("http://dx.doi.org/$doi", "$doi");
        // echo "<td>" . stripSlashes($document->doi) . "</td>\n";
        echo "</td>";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Abstract</th>\n";
        echo "<td>" . $document->note . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Mots Clés</th>\n";
        echo "<td>" . $document->keywords . "</td>\n";
        echo "</tr>\n";

        /*echo "<tr>\n";
        echo "<th>Publisher</th>\n";
        echo "<td>";
        echo "<td>" . $document->publisher . "</td>\n";
        echo "</td>";
        echo "</tr>\n";*/

       /* echo "<tr>\n";
        echo "<th>Langue</th>\n";
        echo "<td>";
        echo "<td>" . $document->langue . "</td>\n";
        echo "</td>";
        echo "</tr>\n";*/

        echo "<tr>\n";
        echo "<th>Langue</th>\n";
        echo "<td>";
        foreach ($list_lang as $id => $name) {
                if ($id == $document->lang)
                        echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";



}

        /*if ("$typedoc_libelle"=="these")
        {
        echo "<tr>\n";
        echo "<th>institution</th>\n";
        echo "<td>";
        foreach ($list_institution as $id=>$name)
        {
        if ($id==$document->institution_id) echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
}*/



/*

echo "<tr>\n";
echo "<th>Abstract</th>\n";
echo "<td>" . stripSlashes($document->note) . "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<th>Equipe</th>\n";
echo "<td>";
        // echo "$document->groupe";
$groupe = "";
foreach ($list_groupes as $id => $name) {
        if (in_array($id, explode(" ", $document->groupe))) {
                $groupe .= "$id-$list_groupes[$id] ";
        }
}
echo "$groupe";
echo "</td>";
echo "</tr>\n";

*/

echo "</table></br>\n";
}
//fonction qui permet d'afficher le formulaire en fonction de la base de donnée
function document_data_form($typedoc_id, $mode, $doc_id, $bd)
{
        // mode is either "insert" or "update"

        global $rootdir;
        global $localdir;
        $typedocid = $typedoc_id;
        //echo "typedocid=$typedocid";
        if ("$doc_id" != "") {
                $query     = "SELECT * from document WHERE doc_id = $doc_id";
                $res       = $bd->exec_query($query);
                $document  = $bd->fetch_object($res);
                $typedocid = $document->typedoc_id; // override the value given as argument
        }
        if ("$typedocid" != "") // get typedoc name to only display fields that are relevant
        {
                $result          = $bd->exec_query("SELECT typedoc_libelle FROM typedoc WHERE typedoc_id='$typedoc_id' ");
                $ob              = $bd->fetch_object($result);
                $typedoc_libelle = $ob->typedoc_libelle;
        }
        
        // get lists
        $result = $bd->exec_query("SELECT * FROM soustypedoc WHERE soustypedoc_id LIKE '$typedocid%'");
        while ($ob = $bd->fetch_object($result))
                $list_soustypedoc[$ob->soustypedoc_id] = "$ob->soustypedoc_id - $ob->soustypedoc_libelle";
        
        
        $list_journal[0] = "-------------------- (select from list) --------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $list_institution[0] = "-------------------- (select from list) --------------------";
        $result              = $bd->exec_query("SELECT * FROM institution");
        while ($ob = $bd->fetch_object($result))
                $list_institution[$ob->institution_id] = stripSlashes($ob->institution_name);
        
        $list_proceedings[0] = "-------------------- (select from list) --------------------";
        $result              = $bd->exec_query("SELECT * FROM document where typedoc_id='7' ORDER BY year desc");
        while ($proceedings = $bd->fetch_object($result))
                $list_proceedings[$proceedings->doc_id] = "$proceedings->year - $proceedings->title";
        
        $list_conference[0] = "-------------------- (select from list) --------------------";
        $result             = $bd->exec_query("SELECT * FROM conference ORDER BY conference_date_start, conference_title");
        while ($conference = $bd->fetch_object($result)) {
                $cdate_start                                 = explode('-', $conference->conference_date_start);
                $cyear                                       = $cdate_start[0];
                //$list_conference[$conference->conference_id]="$cyear - $conference->conference_title";
                //$list_conference[$conference->conference_id]="$cyear - " . stripSlashes($conference->conference_title);
                $list_conference[$conference->conference_id] = "$cyear - " . stripSlashes($conference->conference_title) . " - " . stripSlashes($conference->conference_city);
        }
        
        $list_publisher[0] = "-------------------- (select from list) --------------------";
        $result            = $bd->exec_query("SELECT * FROM publisher ORDER BY publisher_name");
        while ($publisher = $bd->fetch_object($result))
                $list_publisher[$publisher->publisher_id] = "$publisher->publisher_name";
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        
        $result = $bd->exec_query("SELECT * FROM language");
        while ($ob = $bd->fetch_object($result))
                $list_lang[$ob->iso] = "$ob->iso - $ob->name";
        
        echo "<table>\n";
        
        if ($mode == "update") {
                echo "<tr>\n";
                echo "<th>Modification</th>\n";
                echo "<td>";//$document->doc_id ";
                if ($document->log == "0")
                        echo "Créé le $document->date ";
                if ($document->log == "1")
                        echo "Dernière Modification: $document->date ";
                 if ($document->log == "2")
                        echo "Validé le $document->date";
                echo "</td>\n";
                echo "</tr>\n";
        }
        if ("$typedocid" != "") // no choice, transmit by hidden field
        {
                echo "<tr>\n";
                echo "<th>Document</th>\n";
                echo "<td>";
                foreach ($list_typedoc as $id => $name) {
                        if ($id == $typedocid)
                                echo "Article"; //echo "$name";
                }
                echo "<input type=\"hidden\" name=\"typedoc_id\" value=\"$typedocid\">\n";
                echo "</td>\n";
                echo "</tr>\n";
        } else {
                echo "<tr>\n";
                echo "<th>typedoc_id</th>\n";
                echo "<td><select name=\"typedoc_id\" size=\"1\">\n";
                foreach ($list_typedoc as $id => $name) {
                        echo "<option value=\"$id\"";
                        if ($id == $document->typedoc_id)
                                echo " selected";
                        echo ">$name</option>\n";
                }
                echo "</td>\n";
                echo "</tr>\n";
        }
        /*echo "<tr>\n";
        echo "<th>Sous-Type de Document</th>\n";
        echo "<td><select name=\"soustypedoc_id\" size=\"1\">\n";
        if ("$list_soustypedoc" != "")
        foreach ($list_soustypedoc as $id=>$name)
        {
        echo "<option value=\"$id\"";
        if ($id==$document->soustypedoc_id) echo " selected";
        echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="proceedings_book") || ("$typedoc_libelle"=="conference_abstract") )
        {
        echo "<tr>\n";
        echo "<th>conference</th>\n";
        echo "<td><select name=\"conference_id\" size=\"1\">\n";
        foreach ($list_conference as $id=>$name)
        {
        echo "<option value=\"$id\"";
        if ($id==$document->conference_id) echo " selected";
        echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<td></td><td>\n";
        echo "Si la conférence ne figure pas encore dans la liste, il faut d'abord la <a href=\"$rootdir/$localdir/conference.php?mode=insert\">saisir</a>.";
        echo "</td>\n";
        echo "</tr>\n";
        }
        
        if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="book") || ("$typedoc_libelle"=="proceedings_book") )
        {
        echo "<tr>\n";
        echo "<th>éditeur commercial</th>\n";
        echo "<td><select name=\"publisher_id\" size=\"1\">\n";
        foreach ($list_publisher as $id=>$name)
        {
        echo "<option value=\"$id\"";
        if ($id==$document->publisher_id) echo " selected";
        echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<td></td><td>\n";
        echo "Si la maison d'édition ne figure pas encore dans la liste, il faut d'abord la <a href=\"$rootdir/$localdir/publisher.php?mode=insert\">saisir</a>.";
        echo "</td>\n";
        echo "</tr>\n";
        
}*/

echo "<tr>\n";
echo "<th>Titre</th>\n";
echo "<td><input type=\"text\" name=\"title\" value=\"" . stripSlashes($document->title) . "\" size=\"120\" maxlength=\"255\" class=\"required\"></td>\n";
echo "</tr>\n";


        /*if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="conference_proceeding") )
        {
        echo "<tr>\n";
        echo "<th>livre de proceedings</th>\n";
        echo "<td>In: <select name=\"proceedings_id\" size=\"1\">\n";
        foreach ($list_proceedings as $id=>$name)
        {
        echo "<option value=\"$id\"";
        if ($id==$document->proceedings_id) echo " selected";
        echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<td></td><td>\n";
        echo "Si le livre des proceedings ne figure pas encore dans la liste, il faut d'abord le <a href=\"$rootdir/$localdir/document.php?doc=proceedings_book&mode=insert\">saisir</a>.";
        echo "</td>\n";
        echo "</tr>\n";
}*/

if (("$typedoc_libelle" != "conference_proceeding") && ("$typedoc_libelle" != "conference_abstract")) {
        echo "<tr>\n";
        echo "<th>Citation</th>\n";
                //MODIFIER
        echo "<td><input type=\"text\" name=\"citation\" value=\"" . $document->citation . "\" size=\"120\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";

}

if (("$typedoc_libelle" == "") || ("$typedoc_libelle" == "article")) {
        echo "<tr>\n";
        echo "<th>Journal</th>\n";
                /*echo "<td><select name=\"journal_id\" size=\"1\">\n";
                foreach ($list_journal as $id=>$name)
                {
                echo "<option value=\"$id\"";
                if ($id==$document->journal_id) echo " selected";
                echo ">$name</option>\n";
        }*/
        echo "<td><input type=\"text\" name=\"journal\" value=\"" . $document->journal . "\" size=\"120\" ></td>\n";

        echo "</td>\n";
        echo "</tr>\n";
}

if (("$typedoc_libelle" == "") || ("$typedoc_libelle" == "article")) {
        echo "<tr>\n";
        echo "<th>Volume</th>\n";
        echo "<td><input type=\"text\" name=\"volume\" value=\"" . stripSlashes($document->volume) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
}
if (("$typedoc_libelle" == "") || ("$typedoc_libelle" == "article") || ("$typedoc_libelle" == "conference_proceeding")) {
        echo "<tr>\n";
        echo "<th>Début</th>\n";
        echo "<td><input type=\"text\" name=\"pages_start\" value=\"" . $document->pages_start . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<th>Fin</th>\n";
        echo "<td><input type=\"text\" name=\"pages_end\" value=\"" . $document->pages_end . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Nombre de Pages</th>\n";
        echo "<td><input type=\"text\" name=\"pages_num\" value=\"" . $document->pages_num . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        echo "<th>Année</th>\n";
        //echo "<td><input type=\"text\" name=\"year\" value=\"" . $document->year . "\" size=\"120\" maxlength=\"4\" class=\"required\"></td>\n";
        $date = date('Y');               //On prend l'année en cours
        echo "<td><select name=\"year\" value=\"" . $document->year . "\ size=\"120\"> ";
                for ($y=$date; $y>=1980; $y--) {         
                echo '<option value="'.$y.'">'.$y.'</option>';
                }
        echo "</select></td>";

        echo "</tr>\n";
        echo "<th>Mois</th>\n";
        //echo "<td><input type=\"text\" name=\"month\" value=\"" . $document->month . "\" size=\"120\" maxlength=\"4\" ></td>\n";
        echo "<td><select name=\"month\" value=\"" . $document->month . "\ size=\"120\"> ";
        $month = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        for ($i = 0 ; $i <12 ; $i++){      
                echo '<option value="'.$month[$i].'">'.$month[$i].'</option>';
        }
                echo "</select></td>";
        echo "</tr>\n";
}
        /* if ( ("$typedoc_libelle"=="") || ("$typedoc_libelle"=="these") )
        {
        echo "<tr>\n";
        echo "<th>institution</th>\n";
        echo "<td><select name=\"institution_id\" size=\"1\">\n";
        foreach ($list_institution as $id=>$name)
        {
        echo "<option value=\"$id\"";
        if ($id==$document->institution_id) echo " selected";
        echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
}*/


        //echo "<tr><th></th><td>Indiquer l'identifiant du dépôt dans HAL, comme hal-01234567 ou tel-01234567</td></tr>\n";
echo "<tr>\n";
        echo "<th>Identifiant HAL</th>\n"; //http://hal.archives-ouvertes.fr/
        echo "<td><input type=\"text\" name=\"hal\" value=\"" . stripSlashes($document->hal) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        //modifier
        echo "<tr>\n";
        echo "<th>URL</th>\n";
        echo "<td><input type=\"text\" name=\"url\" value=\"" . stripSlashes($document->url) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>DOI</th>\n";
        echo "<td><input type=\"text\" name=\"doi\" value=\"" . stripSlashes($document->doi) . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>Note</th>\n";
        echo "<td><textarea cols=\"85\" rows=\"4\" name=\"note\" class=\"required\" value=\"" . $document->note . "\" >$document->note </textarea></td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>Abstract</th>\n";
        echo "<td><textarea cols=\"85\" rows=\"4\" name=\"abstract\" class=\"required\" value=\"" . $document->abstract . "\" >$document->abstract </textarea></td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>Mots Clés</th>\n";
        echo "<td><input type=\"text\" name=\"keywords\" value=\"" . $document->keywords . "\" size=\"120\" maxlength=\"255\"></td>\n";
        echo "</tr>\n";
        
        //MODIFIER
        
        /*echo "<tr>\n";
        echo "<th>Groupes</th>\n";
        echo "<td>\n";
        
        foreach ($list_groupes as $id=>$name)
        {
        echo "<input type=\"checkbox\" name=\"groupe$id\" value=\"groupeid\"";
        if ( in_array($id, explode(" ", $document->groupe)) )
        {
        echo "checked";
        }
        echo ">$name<br> \n";
        }
        echo "</td>\n";
        echo "</tr>\n";*/
        
        echo "<tr>\n";
        echo "<th>Langue</th>\n";
        echo "<td><select name=\"lang\" size=\"1\">\n";
        foreach ($list_lang as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $document->lang)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "</table></br></br>\n";
        
}


function document_data_import($typedoc_id, $mode, $doc_id, $bd)
{
	echo "<input type=\"hidden\" name=\"action\" value=\"import\"><br>\n";
	echo"<label>Vous pouvez copier coller un fichier Bibtex</label><br> \n";
	echo"<textarea rows=\"4\" cols=\"50\" id=\"bibtex_input\"></textarea><br> \n";
	echo"<label>Vous pouvez également importer depuis un fichier</label><br> \n";
	echo "<input type=\"file\" name=\"\" value=\"Depuis un Fichier Bibtex\"><br> \n";
	echo "<input type=\"submit\" name=\"\" value=\"Envoyer\" onclick=\"parseBib()\"><br>\n";        
}


//Modifier la
function document_data_update($document, $bd){

        
        /*if ("$typedoc_id" == "3") // conference proceedings, use year from proceedings book. This is redundant but useful for sorting...
        {
                $query = "select * from document where doc_id='$proceedings_id'";
                $res   = $bd->exec_query($query);
                $proc  = $bd->fetch_object($res);
                $year  = $proc->year;
        }
        
        if ("$typedoc_id" == "8") // conference abstract, use year from conference. This is redundant but useful for sorting...
        {
                $query      = "select * from conference where conference_id='$conference_id'";
                $res        = $bd->exec_query($query);
                $conf       = $bd->fetch_object($res);
                $date_start = explode('-', $conf->conference_date_start);
                $year       = $date_start[0];
        }
        
        foreach ($document as $key => $val) {
                if ("$val" == "groupeid") {
                        $gid = preg_replace("/^groupe/", "", $key);
                        $groupe .= "$gid ";
                }
        }*/
        // print "groupe=$groupe<br>";
        
                $doc_id     = $document['doc_id'];
        $title          = addSlashes($document['title']);
        $citation       = $document['citation'];
        $journal        = $document['journal'];
        $volume         = addSlashes($document['volume']);
        $pages_start    = $document['pages_start'];
        $pages_end      = $document['pages_end'];
        $pages_num      = $document['pages_num'];        
        //$institution_id = $document['institution_id'];
        $year           = $document['year'];
        $month          = $document['month'];
        $hal            = addSlashes($document['hal']);
        $url            = addSlashes($document['url']);
        $doi            = addSlashes($document['doi']);
        $note           = addSlashes($document['note']);
        $abstract           = addSlashes($document['abstract']);
        $keywords       = $document['keywords'];
        $authors      = $document['authors'];
        $publisher      = $document['publisher'];
        $groupe         = $document['groupe'];
        $lang           = $document['lang'];
//date
        $typedoc_id     = $document['typedoc_id'];
        $soustypedoc_id = $document['soustypedoc_id'];
        $pages_eid      = $document['pages_eid'];
//log
        $conference_id  = $document['conference_id'];
        $proceedings_id = $document['proceedings_id'];

        $doc_id = $document['doc_id'];
        
        $query        = "select * from document where doc_id = '$doc_id'";
        $res          = $bd->exec_query($query);
        $document_old = $bd->fetch_object($res);
        

        //ici !!
        $query = "UPDATE document SET " . "title='$title', citation='$citation', year='$year', month='$month', volume='$volume', " . "pages_start='$pages_start', pages_end='$pages_end', pages_num='$pages_num', " . "doi='$doi', hal='$hal', url='$url', " . "journal='$journal', " . "publisher='$publisher', authors='$authors', keywords='$keywords', " . "note='$note', abstract='$abstract', groupe='$groupe', lang='$lang', " . "typedoc_id='$typedoc_id', " . "soustypedoc_id='$soustypedoc_id', " .  "log='1', date=now() " . "WHERE doc_id = '$doc_id'";
        //print ("query= $query <p>\n");
        $res   = $bd->exec_query($query);
        
        $query        = "select * from document where doc_id = '$doc_id'";
        $res          = $bd->exec_query($query);
        $document_new = $bd->fetch_object($res);
        
        
        log_entry("document", $doc_id, "update", $document_old, $document_new, $bd);
}

function document_data_insert($document, $bd)
{
        $doc_id     = $document['doc_id'];
        $title          = addSlashes($document['title']);
        $citation       = $document['citation'];
        $journal        = $document['journal'];
        $volume         = addSlashes($document['volume']);
        $pages_start    = $document['pages_start'];
        $pages_end      = $document['pages_end'];
        $pages_num      = $document['pages_num'];        
        //$institution_id = $document['institution_id'];
        $year           = $document['year'];
        $month          = $document['month'];
        $hal            = addSlashes($document['hal']);
        $url            = addSlashes($document['url']);
        $doi            = addSlashes($document['doi']);
        $note           = addSlashes($document['note']);
        $abstract           = addSlashes($document['abstract']);
        $keywords       = $document['keywords'];
        $authors      = $document['authors'];
        $publisher      = $document['publisher'];
        $groupe         = $document['groupe'];
        $lang           = $document['lang'];
//date
        $typedoc_id     = $document['typedoc_id'];
        $soustypedoc_id = $document['soustypedoc_id'];
        $pages_eid      = $document['pages_eid'];
//log
        $conference_id  = $document['conference_id'];
        $proceedings_id = $document['proceedings_id'];
        
      /*  if ("$typedoc_id" == "3") // conference proceedings, use year from proceedings book. This is redundant but useful for sorting...
                {
                $query = "select * from document where doc_id='$proceedings_id'";
                $res   = $bd->exec_query($query);
                $proc  = $bd->fetch_object($res);
                $year  = $proc->year;
        }
        
        if ("$typedoc_id" == "8") // conference abstract, use year from conference. This is redundant but useful for sorting...
                {
                $query      = "select * from conference where conference_id='$conference_id'";
                $res        = $bd->exec_query($query);
                $conf       = $bd->fetch_object($res);
                $date_start = explode('-', $conf->conference_date_start);
                $year       = $date_start[0];
        }
        
        foreach ($document as $key => $val) {
                if ("$val" == "groupeid") {
                        $gid = preg_replace("/^groupe/", "", $key);
                        $groupe .= "$gid ";
                }
        }*/
        // print "groupe=$groupe<br>";
        
        //MODIFIER LA

        //$query = "INSERT INTO document ( " . "typedoc_id, soustypedoc_id, institution_id, title" . ", year, volume, pages_start, pages_end, pages_eid, pages_num, doi, hal" . ", journal_id, conference_id, publisher_id, proceedings_id" . ", note, groupe, lang" . ", log, date " . ") VALUES ( " . " '$typedoc_id', '$soustypedoc_id', '$institution_id', '$title'" . ", '$year', '$volume', '$pages_start', '$pages_end', '$pages_eid', '$pages_num', '$doi', '$hal'" . ", '$journal_id', '$conference_id', '$publisher_id', '$proceedings_id'" . ", '$note', '$groupe', '$lang'" . ", '0', now()) ";
        $query = "INSERT INTO document ( " . " doc_id ,title ,citation ,journal ,volume ,pages_start ,pages_end ,pages_num ,year ,month ,hal ,url ,doi ,note, abstract ,keywords, authors ,publisher ,groupe ,lang ,date ,typedoc_id ,soustypedoc_id ,pages_eid ,log ,conference_id ,proceedings_id".")VALUES (" . " '$doc_id', '$title', '$citation', '$journal', '$volume', '$pages_start', '$pages_end', '$pages_num', '$year', '$month', '$hal', '$url', '$doi', '$note', '$abstract', '$keywords', '$authors', '$publisher', '$groupe', '$lang', "."now()".", '$typedoc_id', '$soustypedoc_id', '$pages_eid', "."0".", '$conference_id', '$proceedings_id'" . ")";
        //print ("query= $query <p>\n");
        
        $res = $bd->exec_query($query);
        
        $query        = "SELECT * " . "FROM document " . "WHERE title='$title' " . "AND year='$year' " . "AND volume='$volume' " . "AND pages_start='$pages_start' " . "AND pages_end='$pages_end' " . "AND pages_eid='$pages_eid' " . "AND pages_num='$pages_num' " . "AND doi='$doi' " . "AND hal='$hal' " . "AND journal='$journal' " . "AND publisher='$publisher' " . "AND lang='$lang' ";
        // print ("query= $query <p>\n");
        $res          = $bd->exec_query($query);
        $document_new = $bd->fetch_object($res);
        $doc_id       = $document_new->doc_id;
        // echo "doc_id=$doc_id <p>\n";
        
        log_entry("document", $doc_id, "insert", "", $document_new, $bd);
        
        return $doc_id;
}

function document_auth_fixed($doc_id, $bd)
{
        $lfquery  = "SELECT * FROM fonction";
        $lfresult = $bd->exec_query($lfquery);
        while ($fonction = $bd->fetch_object($lfresult))
                $list_fonctions[$fonction->fonction_id] = "$fonction->fonction_libelle";
        
        //echo "auteur(s), directeur(s), éditeur(s)...&nbsp;:<p>\n";
        echo "<table>\n";
        
        // author list
        $query   = "SELECT * FROM participer" . " WHERE doc_id='$doc_id'" . " ORDER BY rang";
        // echo "query=$query <br>";
        $aresult = $bd->exec_query($query);
        while ($ob = $bd->fetch_object($aresult)) {
                echo "<tr>";
                $rang = $ob->rang;
                echo "<th>$rang</th>";
                
                $pers_id = $ob->pers_id;
                $query   = "SELECT * FROM personne WHERE pers_id='$ob->pers_id'";
                //echo "query=$query <br>";
                $auth    = $bd->exec_query($query);
                $author  = $bd->fetch_object($auth);
                $name    = stripSlashes($author->pers_first) . " " . stripSlashes($author->pers_last);
                echo "<td>$name</td>";
                
                $fonction_id = $ob->fonction_id;
                $query       = "SELECT * FROM fonction WHERE fonction_id='$ob->fonction_id'";
                $fonc        = $bd->exec_query($query);
                $fonction    = $bd->fetch_object($fonc);
                $libelle     = "$fonction->fonction_libelle";
                echo "<td>($libelle)</td>";
                
                //echo "rang=$rang name=$name fonction=$libelle<br>";
                
                /*
                echo "<td>";
                if ($ob->log=="0")
                echo "[added on $ob->date]";
                if ($ob->log=="1")
                echo "[last modified on $ob->date]";
                if ($ob->log=="2")
                echo "[validated on $ob->date]";
                echo "</td>";
                */
                echo "</tr>\n";
        }
        
        echo "</table>\n";
}

function document_auth_form($mode, $doc_id, $bd, $fonc)
{
        echo "auteur(s), directeur(s), éditeur(s)...&nbsp;:<p>\n";
        echo "<table>\n";
        
        // produce a list with all known authors
        
        // $list_authors[-1]="(sélectionner un auteur)";
        
        /*$laquery = "SELECT * FROM personne ORDER BY pers_last, pers_first";
        //echo "query=$laquery <p>\n";
        $laresult = $bd->exec_query ($laquery);
        while ($author=$bd->fetch_object($laresult))
        {
        //$name="$author->pers_last, $author->pers_first";
        $name=stripSlashes($author->pers_last) . ", " . stripSlashes($author->pers_first);
        $list_authors[$author->pers_id]=$name;
}*/



$LDAPHost         = SERVERLDAP;
$dn               = ADMINDN;
$racine           = LDAPROOT;
$LDAPUser         = UNAMELDAP;
$LDAPUserPassword = UPASSWORDLDAP;
$LDAPFieldsToFind = array(
        "cn",
        "ou"
        );

$cnx = ldap_connect($LDAPHost);
ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);
$connexionAdmin  = ldap_bind($cnx, $dn, $LDAPUserPassword);
$list_authors[0] = "--------------------";
$list_groups[0]  = "--------------------";
if ($connexionAdmin) {
        $filter = "(cn=*)";
        $sr     = ldap_search($cnx, $racine, $filter, $LDAPFieldsToFind);
        $info   = ldap_get_entries($cnx, $sr);
        for ($x = 0; $x < $info["count"]; $x++) {
                $name                = $info[$x]['cn'][0];
                $list_authors[$name] = $name;
        }

        for ($x = 0; $x < $info["count"]; $x++) {
                $group               = $info[$x]['ou'][0];
                $list_groups[$group] = $group;
        }
}

$lfquery  = "SELECT * FROM fonction";
$lfresult = $bd->exec_query($lfquery);
while ($fonction = $bd->fetch_object($lfresult)) {
        if (("$fonc" == "") || (strpbrk("$fonc", "$fonction->fonction_id")))
                $list_fonctions[$fonction->fonction_id] = "$fonction->fonction_libelle";
}

$rang = 0;

$query   = "SELECT * FROM participer WHERE doc_id='$doc_id' ORDER BY rang";
        // echo "query=$query <p>\n";
$aresult = $bd->exec_query($query);
while ($ob = $bd->fetch_object($aresult)) {
        $pers_id     = $ob->pers_id;
        $fonction_id = $ob->fonction_id;
                // $rang=$ob->rang;
        $rang++;
        echo "<tr>\n";
        echo "<th>" . $rang . "</th>\n";
        echo "<td><select name=\"auth$rang\" size=\"1\">\n";
        foreach ($list_authors as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $pers_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "<td><select name=\"fonc$rang\" size=\"1\">\n";
        foreach ($list_fonctions as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == $fonction_id)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";

        echo "<td><select name=\"group$rang\" size=\"1\">\n";
        foreach ($list_groups as $id => $group) {
                echo "<option value=\"$id\"";
                        //if ($id==$fonction_id) echo " selected";
                echo ">$group</option>\n";
        }
        echo "</td>\n";
        echo "</tr>\n";
}
for ($i = 0; $i < 3; $i++) {
        $rang++;
        echo "<tr>\n";
        echo "<th>" . $rang . "</th>\n";
        echo "<td><select name=\"auth$rang\" size=\"1\">\n";
        foreach ($list_authors as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == 0)
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "<td><select name=\"fonc$rang\" size=\"1\">\n";
        foreach ($list_fonctions as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == "1")
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "<td><select name=\"group$rang\" size=\"1\">\n";
        foreach ($list_groups as $id => $name) {
                echo "<option value=\"$id\"";
                if ($id == "1")
                        echo " selected";
                echo ">$name</option>\n";
        }
        echo "</td>\n";
        echo "</td>\n";
        echo "</td>\n";
        echo "</tr>\n";
}
echo "</table>\n";
echo "S'il faut ajouter des personnes supplémentaires, enregistrer déjà celles-ci, puis cliquer sur \"modifier les personnes\".<p>";
}

function document_auth_update($mode, $document, $bd)
{
        $doc_id = $document['doc_id'];
        
        for ($rang = 1; $rang < 1000; $rang++) {
                //echo "rang=$rang ";

                foreach ($_POST as $key => $val) {
                        if ("$key" == "auth$rang") {
                                // get fonction for auth$rang
                                foreach ($_POST as $fkey => $fval) {
                                        if ("$fkey" == "fonc$rang")
                                                $fonc = $fval;
                                }
                                
                                //echo "auth$rang exists in post, val=$val fonc=$fonc.<br> ";
                                
                                $query   = "select * from participer where `doc_id`=$doc_id and `rang`=$rang";
                                $aresult = $bd->exec_query($query);
                                if (mysql_num_rows($aresult) > 0) // an author already of exists at this rank
                                {
                                        $ob = $bd->fetch_object($aresult);
                                        $id = $ob->id;
                                        //echo " participer_id=$id ";
                                        if ($val > 0) {
                                                // update author
                                                $query     = "select * from participer where id='$id'";
                                                $res       = $bd->exec_query($query);
                                                $old_entry = $bd->fetch_object($res);
                                                
                                                $query = "update participer set pers_id='$val', fonction_id='$fonc', log='1', date=now() where id = '$id'";
                                                // print("$query <br>");
                                                $bd->exec_query($query);
                                                
                                                $query     = "select * from participer where id='$id'";
                                                $res       = $bd->exec_query($query);
                                                $new_entry = $bd->fetch_object($res);
                                                log_entry("participer", $id, "update", $old_entry, $new_entry, $bd);
                                        } else // delete entry
                                        {
                                                $query     = "select * from participer where id='$id'";
                                                $res       = $bd->exec_query($query);
                                                $old_entry = $bd->fetch_object($res);
                                                
                                                $query = "delete from participer where id = '$id'";
                                                // print("$query <br>");
                                                $bd->exec_query($query);
                                                
                                                log_entry("participer", $id, "delete", $old_entry, "", $bd);
                                        }
                                } else // no author exists at this rank
                                if ($val > 0) {
                                        $query = "insert into participer (doc_id, pers_id, fonction_id, rang, log, date) values ('$doc_id', '$val', '$fonc', '$rang', '0', now() )";
                                        // print("$query <br>");
                                        $bd->exec_query($query);
                                        
                                        $query     = "select * from participer where doc_id='$doc_id' and pers_id='$val' and fonction_id='$fonc' and rang='$rang'";
                                        $res       = $bd->exec_query($query);
                                        $new_entry = $bd->fetch_object($res);
                                        $newid     = $new_entry->id;
                                        log_entry("participer", $newid, "insert", "", $new_entry, $bd);
                                }
                        }
                }
                
                //echo " <br>\n";
        }
        // make sure the authors' ranks are unique and consecutive
        $query   = "SELECT * FROM participer WHERE doc_id='$doc_id' ORDER BY rang";
        $aresult = $bd->exec_query($query);
        $rang    = 0;
        while ($ob = $bd->fetch_object($aresult)) {
                $id = $ob->id;
                $rang++;
                $query = "update participer set rang='$rang' where id = '$id'";
                // print("$query <br>");
                $bd->exec_query($query);
        }
        
        if ("$mode" == "update") {
                $query = "UPDATE document SET " . "log='1', date=now() " . "WHERE doc_id = '$doc_id'";
                //print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
        }
}
function document_auth_delete($doc_id, $bd)
{
        $query   = "SELECT * FROM participer" . " WHERE doc_id='$doc_id'";
        // echo "query=$query <br>";
        $aresult = $bd->exec_query($query);
        while ($ob = $bd->fetch_object($aresult)) {
                $id    = $ob->id;
                $query = "delete from participer where id ='$id'";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                log_entry("participer", $id, "delete", $ob, "", $bd);
        }
}
function document_auth_validate($doc_id, $bd)
{
        $query   = "SELECT * FROM participer" . " WHERE doc_id='$doc_id'";
        // echo "query=$query <br>";
        $aresult = $bd->exec_query($query);
        while ($ob = $bd->fetch_object($aresult)) {
                $id    = $ob->id;
                $query = "UPDATE participer SET " . "log='2', date=now() " . "WHERE id = '$id'";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                log_entry("participer", $id, "validate", "", "", $bd);
        }
}

function document_data_validate($doc_id, $bd)
{
        $query = "UPDATE document SET " . "log='2', date=now() " . "WHERE doc_id = '$doc_id'";
        // print ("query= $query <p>\n");
        $res   = $bd->exec_query($query);
        
        log_entry("document", $doc_id, "validate", "", "", $bd);
}

function document_data_delete($doc_id, $bd)
{
        $query   = "select * from document where doc_id='$doc_id'";
        $res     = $bd->exec_query($query);
        $doc_old = $bd->fetch_object($res);
        
        $query = "DELETE FROM document " . "WHERE doc_id = '$doc_id'";
        // print ("query= $query <p>\n");
        $res   = $bd->exec_query($query);
        
        log_entry("document", $doc_id, "delete", $doc_old, "", $bd);
}


// Ca sert quand ?
function document_fixed($doc_id, $bd)
{
        $query    = "SELECT * from document WHERE doc_id = $doc_id";
        $res      = $bd->exec_query($query);
        $document = $bd->fetch_object($res);
        
        // get lists
        
        $list_journal[0] = "-------------------- (select from list) --------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        // $list_groupes[$ob->g_id]="$ob->g_name";
        
        //echo "<center>\n";
        
        echo "<table>\n";
        
        echo "<tr>\n";
        echo "<th>doc_id</th>\n";
        echo "<td>$document->doc_id ";

        //Modifier la
        if ($document->log == "0")
                echo "Créé le $document->date ";
        if ($document->log == "1")
                echo "Dernière Modification: $document->date ";
        if ($document->log == "2")
                echo "Validé le $document->date";
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>typedoc_id</th>\n";
        echo "<td>";
        foreach ($list_typedoc as $id => $name) {
                if ($id == $document->typedoc_id)
                        echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>title</th>\n";
        echo "<td>" . stripSlashes($document->title) . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>year</th>\n";
        echo "<td>" . $document->year . "</td>\n";
        echo "</tr>\n";

        echo "<tr>\n";
        echo "<th>volume</th>\n";
        echo "<td>" . stripSlashes($document->volume) . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>pages_start</th>\n";
        echo "<td>" . $document->pages_start . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>pages_end</th>\n";
        echo "<td>" . $document->pages_end . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>eid</th>\n";
        echo "<td>" . $document->pages_eid . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>pages_num</th>\n";
        echo "<td>" . $document->pages_num . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>doi</th>\n";
        echo "<td>" . stripSlashes($document->doi) . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>journal</th>\n";
        echo "<td>";
        foreach ($list_journal as $id => $name) {
                if ($id == $document->journal_id)
                        echo "$name";
        }
        echo "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>note</th>\n";
        echo "<td>" . stripSlashes($document->note) . "</td>\n";
        echo "</tr>\n";
        
        echo "<tr>\n";
        echo "<th>groupe</th>\n";
        echo "<td>";
        // echo "$document->groupe";
        $groupe = "";
        foreach ($list_groupes as $id => $name) {
                if (in_array($id, explode(" ", $document->groupe))) {
                        $groupe .= "$id-$list_groupes[$id] ";
                }
        }
        echo "$groupe";
        echo "</td>";
        echo "</tr>\n";
        
        echo "</table>\n";
        
        // specific instructions for dealing with authors
        echo "auteur(s)&nbsp;:<p>\n";
        echo "<table>\n";
        
        // author list
        $query   = "SELECT * FROM participer" . " WHERE doc_id='$document->doc_id'" . " AND fonction_id = '1' " . " ORDER BY rang";
        // echo "query=$query <br>";
        $aresult = $bd->exec_query($query);
        while ($ob = $bd->fetch_object($aresult)) {
                $pers_id = $ob->pers_id;
                $rang    = $ob->rang;
                $query   = "SELECT * FROM personne WHERE pers_id='$ob->pers_id'";
                //echo "query=$query <br>";
                $auth    = $bd->exec_query($query);
                $author  = $bd->fetch_object($auth);
                $name    = "$author->pers_first $author->pers_last";
                //echo "rang=$rang name=$name <br>";
                echo "<tr><th>$rang</th><td>$name</td></tr>\n";
        }
        
        echo "</table>\n";
        // end authors
        
        //echo "</center>\n";
}

function document_update_old($action, $document, $bd)
{
        // get lists

        $list_journal[0] = "--------------------";
        $result          = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
        // $list_journal[$ob->journal_id]="$ob->journal_id - $ob->journal_name";
                $list_journal[$ob->journal_id] = "$ob->journal_fullname";
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        // echo "action=$action <p>\n";
        
        $returnid = -2;
        
        /*$typedoc_id  = $document['typedoc_id'];
        $title       = addSlashes($document['title']);
        $year        = $document['year'];
        $volume      = addSlashes($document['volume']);
        $pages_start = $document['pages_start'];
        $pages_end   = $document['pages_end'];
        $pages_eid   = $document['pages_eid'];
        $pages_num   = $document['pages_num'];
        $doi         = addSlashes($document['doi']);
        $journal_id  = $document['journal_id'];
        $note        = addSlashes($document['note']);*/


        $doc_id     = $document['doc_id'];
        $title          = addSlashes($document['title']);
        $citation       = $document['citation'];
        $journal        = $document['journal'];
        $volume         = addSlashes($document['volume']);
        $pages_start    = $document['pages_start'];
        $pages_end      = $document['pages_end'];
        $pages_num      = $document['pages_num'];        
        //$institution_id = $document['institution_id'];
        $year           = $document['year'];
        $month          = $document['month'];
        $hal            = addSlashes($document['hal']);
        $url            = addSlashes($document['url']);
        $doi            = addSlashes($document['doi']);
        $note           = addSlashes($document['note']);
        $abstract       = addSlashes($document['abstract']);
        $keywords       = $document['keywords'];
        $authors        = $document['authors'];
        $publisher      = $document['publisher'];
        $groupe         = $document['groupe'];
        $lang           = $document['lang'];
//date
        $typedoc_id     = $document['typedoc_id'];
        $soustypedoc_id = $document['soustypedoc_id'];
        $pages_eid      = $document['pages_eid'];
//log
        $conference_id  = $document['conference_id'];
        $proceedings_id = $document['proceedings_id'];
        
        foreach ($document as $key => $val) {
                if ("$val" == "groupeid") {
                        $gid = preg_replace("/^groupe/", "", $key);
                        $groupe .= "$gid ";
                }
        }
        // print "groupe=$groupe<br>";
        
        if ($action == "updatedocument") {
                $doc_id = $document['doc_id'];
                
                $query        = "select * from document where doc_id = '$doc_id'";
                $res          = $bd->exec_query($query);
                $document_old = $bd->fetch_object($res);
                

                //ajouter pour les mises a jour ICI
                $query = "UPDATE document SET " . "typedoc_id='$typedoc_id', " . "title='$title', citation='$citation', journal='$journal', volume='$volume',  " . "pages_start='$pages_start', pages_end='$pages_end', pages_num='$pages_num', " . " year='$year', month='$month', hal='$hal', url='$url', doi='$doi',  note='$note', abstract='$abstract',keywords='$keywords', authors='$authors' ,groupe='$groupe', lang='$lang', " . "log='1', date=now() " . "WHERE doc_id = '$doc_id'";
                //print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                
                $query        = "select * from document where doc_id = '$doc_id'";
                $res          = $bd->exec_query($query);
                $document_new = $bd->fetch_object($res);
                
                log_entry("document", $doc_id, "update", $document_old, $document_new, $bd);
                
                $returnid = $doc_id;
        } else if ($action == "deletedocument") {
                $doc_id = $document['doc_id'];
                
                print("<b>Supprimer effectivement ce document&nbsp;?</b>\n");
                
                $query = "select * from document where doc_id='$doc_id'";
                $res   = $bd->exec_query($query);
                $doc   = $bd->fetch_object($res);
                
                $f = new form("POST", "article.php");
                $f->field_hidden("action", "article_form");
                $f->begin_table();
                
                $f->field_hidden("doc_id", "$doc->doc_id");
                $f->field_fixed("doc_id", "$doc->doc_id");
                $typedoc = $list_typedoc[$doc->typedoc_id];
                $f->field_fixed("typedoc_id", "$typedoc");
                // $f->field_fixed("typedoc_id", "$list_typedoc['$typedoc_id']");
                
                $f->field_fixed("title", $doc->title);
                $f->field_fixed("year", $doc->year);
                $f->field_fixed("volume", $doc->volume);
                
                $f->field_fixed("pages_start", $doc->pages_start);
                $f->field_fixed("pages_end", $doc->pages_end);
                $f->field_fixed("eid", $doc->pages_eid);
                $f->field_fixed("pages_num", $doc->pages_num);
                
                $f->field_fixed("doi", $doc->doi);
                // $f->field_fixed("journal", $list_journal['$doc->journal_id']);
                
                $journal = $list_journal[$doc->journal_id];
                $f->field_fixed("journal", "$journal");
                $f->field_fixed("groupe", $doc->groupe);
                
                $f->field_fixed("note", $doc->note);
                
                $f->end_table();
                
                // authors list
                $f->add_text("auteur(s) :<p>");
                $f->begin_table();
                // author list
                $query   = "SELECT * FROM participer" . " WHERE doc_id='$doc->doc_id'" . " AND fonction_id = '1' " . " ORDER BY rang";
                // echo "query=$query <br>";
                $aresult = $bd->exec_query($query);
                while ($ob = $bd->fetch_object($aresult)) {
                        $pers_id = $ob->pers_id;
                        $rang    = $ob->rang;
                        $query   = "SELECT * FROM personne WHERE pers_id='$ob->pers_id'";
                        //echo "query=$query <br>";
                        $auth    = $bd->exec_query($query);
                        $author  = $bd->fetch_object($auth);
                        $name    = "$author->pers_first $author->pers_last";
                        //echo "rang=$rang name=$name <br>";
                        $f->field_fixed("$rang", "$name");
                }
                $f->end_table();
                // end authors
                
                $f->field_submit("deletedocumentnow", "supprimer maintenant");
                echo $f->output_html();
                
        } else if ($action == "deletedocumentnow") {
                $doc_id = $document['doc_id'];
                
                // delete authors first
                $query   = "SELECT * FROM participer" . " WHERE doc_id='$doc_id'";
                // echo "query=$query <br>";
                $aresult = $bd->exec_query($query);
                while ($ob = $bd->fetch_object($aresult)) {
                        $id    = $ob->id;
                        $query = "delete from participer where id ='$id'";
                        // print ("query= $query <p>\n");
                        $res   = $bd->exec_query($query);
                        log_entry("participer", $id, "delete", $ob, "", $bd);
                }
                // end authors
                
                $query   = "select * from document where doc_id='$doc_id'";
                $res     = $bd->exec_query($query);
                $doc_old = $bd->fetch_object($res);
                
                $query = "DELETE FROM document " . "WHERE doc_id = '$doc_id'";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                
                log_entry("document", $doc_id, "delete", $doc_old, "", $bd);
        } else if ($action == "validatedocumentnow") {
                $doc_id = $document['doc_id'];
                print("<b>Validation du document $doc_id.</b><br>\n");
                
                $query = "UPDATE document SET " . "log='2', date=now() " . "WHERE doc_id = '$doc_id'";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                
                log_entry("document", $doc_id, "validate", "", "", $bd);
                $returnid = $doc_id;
                
                // ICI VALIDATE AUTHORS
                
        } else // insertdocument or insertdocumentnow
        {
                $query = "INSERT INTO document ( " . " doc_id ,title ,citation ,journal ,volume ,pages_start ,pages_end ,pages_num ,year ,month ,hal ,url ,doi ,note, abstract ,keywords, authors ,publisher ,groupe ,lang ,date ,typedoc_id ,soustypedoc_id ,pages_eid ,log ,conference_id ,proceedings_id".")VALUES (" . " '$doc_id', '$title', '$citation', '$journal', '$volume', '$pages_start', '$pages_end', '$pages_num', '$institution_id', '$year', '$month', '$hal', '$url', '$doi', '$note', '$abstract', '$keywords', '$authors' '$publisher', '$groupe', '$lang', "."now()"." '$typedoc_id', '$soustypedoc_id', '$pages_eid', "."0"." '$conference_id', '$proceedings_id'" . ")";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                
                $title      = $bd->prepare_string($title);
                $year       = $bd->prepare_string($year);
                $journal_id = $bd->prepare_string($journal_id);
                
                $query        = "SELECT * " . "FROM document " . "WHERE title LIKE '%$title' " . "AND year LIKE '%$year%' " . "AND journal LIKE '%$journal%' ";
                // print ("query= $query <p>\n");
                $res          = $bd->exec_query($query);
                $document_new = $bd->fetch_object($res);
                $returnid     = $document_new->doc_id;
                // echo "returnid=$returnid <p>\n";
                
                log_entry("document", $returnid, "insert", "", $document_new, $bd);
                
                $doc_id = $returnid;
                
                // specific instructions for dealing with authors
                
                if ("$action" == "insertdocumentnow") {
                        for ($rang = 1; $rang < 1000; $rang++) {
                                //echo "rang=$rang ";

                                foreach ($document as $key => $val) {
                                        if ("$key" == "auth$rang") {
                                                //echo "auth$rang exists in post, val=$val ";
                                                if ($val > 0) {
                                                        $query = "insert into participer (doc_id, pers_id, fonction_id, rang, log, date) values ('$doc_id', '$val', '1', '$rang', '0', now())";
                                                        //print("$query <br>");
                                                        $bd->exec_query($query);
                                                        
                                                        $query     = "select * from participer where doc_id='$doc_id' and pers_id='$val' and fonction_id='1' and rang='$rang'";
                                                        $res       = $bd->exec_query($query);
                                                        $new_entry = $bd->fetch_object($res);
                                                        $newid     = $new_entry->id;
                                                        log_entry("participer", $newid, "insert", "", $new_entry, $bd);
                                                }
                                        }
                                }
                                
                                
                                //echo " <br>\n";
                        }
                }
        }
        return $returnid;
}

function document_auth($action, $tab, $bd)
{
        // possible actions
        // changeauth: modify, add, delete authors
        // updateauthnow: do it

        // **************888

        // get lists
        $result = $bd->exec_query("SELECT * FROM journal ORDER BY journal_fullname");
        while ($ob = $bd->fetch_object($result))
                $list_journal[$ob->journal_id] = stripSlashes($ob->journal_fullname);
        
        $result = $bd->exec_query("SELECT * FROM typedoc");
        while ($ob = $bd->fetch_object($result))
                $list_typedoc[$ob->typedoc_id] = "$ob->typedoc_id - $ob->typedoc_name";
        
        $result = $bd->exec_query("SELECT * FROM groupes");
        while ($ob = $bd->fetch_object($result))
                $list_groupes[$ob->g_id] = "$ob->g_fullname";
        
        echo "<center>\n";
        echo "<form method=\"post\" action=\"article.php\" name=\"form\">\n";
        echo "<input type=\"hidden\" name=\"action\" value=\"books_chauth\">\n";
        
        echo "<table>\n";
        
        if ("$action" != "addauthinsert")
                $doc_id = $tab['doc_id'];
        else
                $doc_id = "";
        if ("$doc_id" != "") {
                echo "<tr>\n";
                echo "<th>doc_id</th>\n";
                echo "<td>$doc_id ";
                echo "</td>\n";
                echo "</tr>\n";
                echo "<input type=\"hidden\" name=\"doc_id\" value=\"$doc_id\">\n";
        }
        
        $typedoc_id = $tab['typedoc_id'];
        echo "<tr>\n";
        echo "<th>typedoc_id</th>\n";
        echo "<td>";
        foreach ($list_typedoc as $id => $name) {
                if ($id == $typedoc_id)
                        echo " $name";
        }
        echo "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"typedoc_id\" value=\"$typedoc_id\">\n";
        
        $title = $tab['title'];
        echo "<tr>\n";
        echo "<th>title</th>\n";
        echo "<td>" . stripSlashes($title) . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"title\" value=\"$title\">\n";
        
        $year = $tab['year'];
        echo "<tr>\n";
        echo "<th>year</th>\n";
        echo "<td>" . $year . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"year\" value=\"$year\">\n";
        
        $volume = $tab['volume'];
        echo "<tr>\n";
        echo "<th>volume</th>\n";
        echo "<td>" . stripSlashes($volume) . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"volume\" value=\"$volume\">\n";
        
        $pages_start = $tab['pages_start'];
        echo "<tr>\n";
        echo "<th>pages_start</th>\n";
        echo "<td>" . $pages_start . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"pages_start\" value=\"$pages_start\">\n";
        
        $pages_end = $tab['pages_end'];
        echo "<tr>\n";
        echo "<th>pages_end</th>\n";
        echo "<td>" . $pages_end . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"pages_end\" value=\"$pages_end\">\n";
        
        $pages_eid = $tab['pages_eid'];
        echo "<tr>\n";
        echo "<th>eid</th>\n";
        echo "<td>" . $pages_eid . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"pages_eid\" value=\"$pages_eid\">\n";
        
        $pages_num = $tab['pages_num'];
        echo "<tr>\n";
        echo "<th>pages_num</th>\n";
        echo "<td>" . $pages_num . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"pages_num\" value=\"$pages_num\">\n";
        
        $journal_id = $tab['journal_id'];
        echo "<tr>\n";
        echo "<th>journal</th>\n";
        echo "<td>";
        foreach ($list_journal as $id => $name) {
                if ($id == $journal_id)
                        echo "$name";
        }
        echo "</td>";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"journal_id\" value=\"$journal_id\">\n";
        
        $doi = $tab['doi'];
        echo "<tr>\n";
        echo "<th>doi</th>\n";
        echo "<td>" . stripSlashes($doi) . "</td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "<input type=\"hidden\" name=\"doi\" value=\"$doi\">\n";
        
        $note = $tab['note'];
        echo "<th>note</th>\n";
        echo "<td>" . stripSlashes($note) . "</td>\n";
        echo "</tr>\n";
        echo "<input type=\"hidden\" name=\"note\" value=\"$note\">\n";
        
        $groupe = "";
        foreach ($tab as $key => $val) {
                if ("$val" == "groupeid") {
                        $gid = preg_replace("/^groupe/", "", $key);
                        $groupe .= "$gid ";
                        echo "<input type=\"hidden\" name=\"$key\" value=\"groupeid\">\n";
                }
        }
        echo "<tr>\n";
        echo "<th>groupe</th>\n";
        echo "<td>" . $groupe . "</td>";
        echo "<td>\n";
        echo "<input type=\"hidden\" name=\"groupe\" value=\"$groupe\">\n";
        
        echo "</table>\n";
        
        // specific instructions for dealing with authors
        
        if ("$action" == "updateauthnow") {
                for ($rang = 1; $rang < 1000; $rang++) {
                        //echo "rang=$rang ";

                        foreach ($_POST as $key => $val) {
                                if ("$key" == "auth$rang") {
                                        echo "auth$rang exists in post, val=$val<br> ";
                                        
                                        $query   = "select * from participer where `doc_id`=$doc_id and `rang`=$rang";
                                        $aresult = $bd->exec_query($query);
                                        if (mysql_num_rows($aresult) > 0) // an author already of exists at this rank
                                        {
                                                $ob = $bd->fetch_object($aresult);
                                                $id = $ob->id;
                                                //echo " participer_id=$id ";
                                                if ($val > 0) {
                                                        if ($ob->pers_id != $val) // update author
                                                        {
                                                                $query     = "select * from participer where id='$id'";
                                                                $res       = $bd->exec_query($query);
                                                                $old_entry = $bd->fetch_object($res);
                                                                
                                                                $query = "update participer set pers_id='$val', log='1', date=now() where id = '$id'";
                                                                // print("$query <br>");
                                                                $bd->exec_query($query);
                                                                
                                                                $query     = "select * from participer where id='$id'";
                                                                $res       = $bd->exec_query($query);
                                                                $new_entry = $bd->fetch_object($res);
                                                                log_entry("participer", $id, "update", $old_entry, $new_entry, $bd);
                                                        } else {
                                                                print("no update needed <br>");
                                                                $query = "update participer set pers_id='$val', log='1', date=now() where id = '$id'";
                                                                // print("$query <br>");
                                                                $bd->exec_query($query);
                                                        }
                                                } else // delete entry
                                                {
                                                        $query     = "select * from participer where id='$id'";
                                                        $res       = $bd->exec_query($query);
                                                        $old_entry = $bd->fetch_object($res);
                                                        
                                                        $query = "delete from participer where id = '$id'";
                                                        // print("$query <br>");
                                                        $bd->exec_query($query);
                                                        
                                                        log_entry("participer", $id, "delete", $old_entry, "", $bd);
                                                }
                                        } else // no author exists at this rank
                                        if ($val > 0) {
                                                $query = "insert into participer (doc_id, pers_id, fonction_id, rang, log, date) values ('$doc_id', '$val', '1', '$rang', '0', now() )";
                                                // print("$query <br>");
                                                $bd->exec_query($query);
                                                
                                                $query     = "select * from participer where doc_id='$doc_id' and pers_id='$val' and fonction_id='1' and rang='$rang'";
                                                $res       = $bd->exec_query($query);
                                                $new_entry = $bd->fetch_object($res);
                                                $newid     = $new_entry->id;
                                                log_entry("participer", $newid, "insert", "", $new_entry, $bd);
                                        }
                                }
                        }
                        
                        
                        //echo " <br>\n";
                }
                // make sure the authors' ranks are unique and consecutive
                $query   = "SELECT * FROM participer WHERE doc_id='$doc_id' ORDER BY rang";
                $aresult = $bd->exec_query($query);
                $rang    = 0;
                while ($ob = $bd->fetch_object($aresult)) {
                        $id = $ob->id;
                        $rang++;
                        $query = "update participer set rang='$rang' where id = '$id'";
                        // print("$query <br>");
                        $bd->exec_query($query);
                }
        }
        
        echo "auteur(s)&nbsp;:<p>\n";
        echo "<table>\n";
        
        // produce a list with all known authors
        $list_authors[0] = "--------------------";
        // $list_authors[-1]="(sélectionner un auteur)";
        $laquery         = "SELECT * FROM personne ORDER BY pers_last, pers_first";
        //echo "query=$laquery <p>\n";
        $laresult        = $bd->exec_query($laquery);
        while ($author = $bd->fetch_object($laresult)) {
                $name                           = "$author->pers_last, $author->pers_first";
                $list_authors[$author->pers_id] = $name;
        }
        
        $rang = 0;
        
        if ("$doc_id" != "") {
                $query   = "SELECT * FROM participer WHERE doc_id='$doc_id' ORDER BY rang";
                // echo "query=$query <p>\n";
                $aresult = $bd->exec_query($query);
                while ($ob = $bd->fetch_object($aresult)) {
                        $pers_id = $ob->pers_id;
                        // $rang=$ob->rang;
                        $rang++;
                        if (("$action" == "changeauth") || ("$action" == "updateauthnow")) {
                                echo "<tr>\n";
                                echo "<th>" . $rang . "</th>\n";
                                //$f->field_list("$rang", "auth$rang", $pers_id, 1, $list_authors);
                                echo "<td><select name=\"auth$rang\" size=\"1\">\n";
                                foreach ($list_authors as $id => $name) {
                                        echo "<option value=\"$id\"";
                                        if ($id == $pers_id)
                                                echo " selected";
                                        echo ">$name</option>\n";
                                }
                                echo "</td>\n";
                                echo "</tr>\n";
                        }
                }
        }
        
        if (("$action" == "changeauth") || ("$action" == "addauthinsert") || ("$action" == "updateauthnow")) {
                $rang = $rang + 1;
                echo "<tr>\n";
                echo "<th>" . $rang . "</th>\n";
                echo "<td><select name=\"auth$rang\" size=\"1\">\n";
                foreach ($list_authors as $id => $name) {
                        echo "<option value=\"$id\"";
                        if ($id == 0)
                                echo " selected";
                        echo ">$name</option>\n";
                }
                echo "</td>\n";
                echo "</tr>\n";
                $rang = $rang + 1;
                echo "<tr>\n";
                echo "<th>" . $rang . "</th>\n";
                echo "<td><select name=\"auth$rang\" size=\"1\">\n";
                foreach ($list_authors as $id => $name) {
                        echo "<option value=\"$id\"";
                        if ($id == 0)
                                echo " selected";
                        echo ">$name</option>\n";
                }
                echo "</td>\n";
                echo "</tr>\n";
                $rang = $rang + 1;
                echo "<tr>\n";
                echo "<th>" . $rang . "</th>\n";
                echo "<td><select name=\"auth$rang\" size=\"1\">\n";
                foreach ($list_authors as $id => $name) {
                        echo "<option value=\"$id\"";
                        if ($id == 0)
                                echo " selected";
                        echo ">$name</option>\n";
                }
                echo "</td>\n";
                echo "</tr>\n";
        }
        
        // end authors
        echo "</table>\n";
        
        if ("$action" == "addauthinsert") {
                echo "<input type=\"submit\" name=\"insertdocumentnow\" value=\"ajouter le document\">\n";
        }
        if (("$action" == "changeauth") || ("$action" == "updateauthnow")) {
                echo "<input type=\"submit\" name=\"updateauthnow\" value=\"mettre à jour les auteurs\">\n";
        }
        echo "<input type=\"submit\" name=\"reset\" value=\"réinitialiser\">\n";
        
        echo "</form>\n";
        echo "</center>\n";
        
        return -2;
}

?>

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
        $rootdir=".";
	$localdir=".";
	$filename="faq.php";
	require_once ("$rootdir/include.php");
?>
<?php preamble(); ?>
<html>

<head>
<title>Foire aux questions</title>
<?php csslink(); ?>
<?php metadata(); ?>
</head>

<!-- ------------------------------------------------------------------------- -->

<body>

<?php head(); ?>

<?php lhsmenu("faq"); ?>

<!-- begin main panel -->
<div id=mainarea>

<h1>Foire aux questions</h1>

<h3><a href="#search">Interrogation de la base</a></h3>

<h3><a href="#update">Mise à jour de la base</a></h3>

<h3><a href="#hal">Base du <?php echo $LABO;?> et serveur d'archives ouvertes HAL</a></h3>

<h3><a href="#devel">Questions techniques</a></h3>

<br><br>

<a name="search"></a>
<h2>Interrogation de la base</h2>

<a name="search01"></a>
<h3>Comment accéder au texte intégral des publications&nbsp;?</h3>

La base de données a pour vocation de recenser toutes les publications du <?php echo $LABO;?> mais non de les archiver.
L'icône <img src="./images/hal.ico" border="0" alt="hal.ico"> permet d'accéder à la publication dans l'archive
ouverte HAL.
L'icône <img src="./images/google.ico" border="0" alt="google.ico"> effectue une recherche du document par Google Scholar
(un "web search" permet ensuite souvent de trouver le document).
Le lien DOI renvoie vers l'original du document, dont l'accès en texte intégral peut être restreint par l'éditeur commercial.
Si aucune de ces solutions ne permet de mettre la main sur le document, vous êtes encouragés à suggérer aux auteurs
de le déposer dans HAL (la création de notices dans HAL à partir des données de la base se fait <a href="#hal11">automatiquement</a>)

<a name="search02"></a>
<h3>Comment exporter une sélection de références dans un format utilisable par d'autres logiciels&nbsp;?</h3>

Le contenu de la base de données est facilement exportable sous différents formats,
utiles par exemple pour créer des références bibliographiques lors de la rédaction d'articles ou de rapports.
<br>

Pour créer une liste de références, il faut d'abord les sélectionner parmi celles renvoyées par une ou plusieurs
interrogations de la base (cocher les cases et cliquer &ldquo;add selected items to marked list&rdquo;,
 ou cliquer &ldquo;add all items to marked list&rdquo;).
Le menu de gauche indique alors le nombre total de références sélectionnées&nbsp;:
&ldquo;Sélection: XX documents&rdquo;. Cliquer dessus pour afficher la liste des références sélectionnées.
En bas de la page, des liens permettent alors d'exporter cette liste dans différents formats&nbsp;:
<ul>
<li><b>bibtex</b> pour utilisation avec Latex&nbsp;;</li>
<li><b>RIS</b> qui permet d'alimenter d'autres systèmes (Endnote, Refworks&hellip;) directement avec les données de la base&nbsp;;</li>
<li><b>XML</b> le format le plus généraliste qui permet de reproduire le plus fidèlement possible la structure des données de la
base et qui peut être mis en forme de manière très flexible par des fichiers <b>XSLT</b>. Le bouton <b>XML (générique)</b> exporte un
maximum d'informations de la base, alors que le bouton <b>XML (compatible HAL)</b> produit un fichier pour
<a href="http://import.ccsd.cnrs.fr/importXML.php">import automatique</a> des
données vers les serveurs de HAL.</li>
</ul>
Néanmoins, tous ces formats contiennent une information dégradée (plus pauvre et moins structurée)
par rapport au contenu de la base de données,
l'opération inverse (alimentation automatique de la base de données avec des fichiers bibtex,
RIS, endnote&hellip;) n'est pas possible.
<br>

S'il y a besoin de rajouter des routines pour exporter sous d'autres formats,
merci de le faire <a href="http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier">savoir</a>.


<a name="search03"></a>
<h3>Pourquoi est-ce qu'une recherche par groupe de recherche ne renvoie que
très peu de publications&nbsp;?</h3>

Le champ qui indique l'appartenance d'une publication à un ou plusieurs groupes
de recherche du <?php echo $LABO;?> n'est renseigné que pour une partie des dernières
publications. La mise à jour est en cours. Ceci dit, l'organisation du <?php echo $LABO;?> en groupes de
recherche a évolué au cours du temps et ce champ n'a donc de signification que pour les
dernières années.
<br><br>

<a name="update"></a>
<h2>Mise à jour de la base</h2>

<a name="update01"></a>
<h3>Comment modifier le contenu de la base&nbsp;?</h3>

Les opérations (ajouts, modifications) sur la base se font
dans l'espace <a href=<?php echo "\"$rootdir/intranet\""?>>intranet</a>
après identification. Pour avoir accès au système, envoyer
un nom de login et un mot de passe au
<a href=<?php echo "\"$URL_WEBMASTER\"";?>>webmaster</a>.

<a name="update02"></a>
<h3>Comment corriger les données d'une publication&nbsp;?</h3>

Dans une liste renvoyée par une interrogation de la base,
on peut modifier les données d'un document en cliquant sur son numéro,
ce qui renvoie sur
<a href=<?php echo "\"$rootdir/intranet/document.php\"";?>>
<?php echo $rootdir;?>/intranet/document.php</a>.
Si le document a déjà été validé par un des administrateurs de la base, il n'est
plus modifiable.

<a name="update03"></a>
<h3>Quelles sont les étapes pour entrer un nouvel article&nbsp;?</h3>

La première chose à faire est de
<a href=<?php echo "\"$rootdir/search.php\""?>>vérifier</a>
que la publication ne figure pas déjà dans la base.
<p>

Pour saisir un article dans un journal qui n'existe
pas encore dans la base, ou pour ajouter un nouvel auteur qui n'y figure
pas, il faut d'abord créer le journal ou l'auteur.<p>

Ensuite il faut remplir tous les champs, sélectionner le journal dans le
menu déroulant et, dans une seconde étape, rattacher
les auteurs à la publication.
Il est important d'indiquer le DOI (digital object identifier)
qui figure sur tous les articles un tant soit peu récents&nbsp;: c'est ce
champ qui permet de toujours facilement retrouver le résumé/texte
intégral sur le site de l'éditeur (et ce, même si l'éditeur réorganise
son site web ou se fait racheter par un autre et change de nom...).

<a name="update04"></a>
<h3>Comment saisir les pages d'une publication&nbsp;?</h3>

Il y a deux systèmes pour indiquer les pages d'un document&nbsp;:
"<i>pages_start&ndash;pages_end</i>" pour les journaux dont toutes les
pages d'un volume sont numérotées&nbsp;;
"<i>eid</i> (<i>pages_num</i> pages)" quand l'article est identifié par
un numéro.<p>

Il faut donc remplir, soit les champs <i>pages_start</i> et <i>pages_end</i>,
soit les champs <i>eid</i> et <i>pages_num</i>.

<a name="update05"></a>
<h3>Comment entrer une nouvelle personne&nbsp;?</h3>

Aller sur la page 
<a href=<?php echo "\"$rootdir/intranet/personne.php\"";?>><?php echo $rootdir;?>/intranet/personne.php</a>.
donner le prénom et le nom en toutes lettres (plutôt que seulement les
initiales du prénom, cela permet d'éviter les doublons ; même si après
on choisit de n'afficher que les initiales) avec seulement une
majuscule initiale le reste en minuscules.

<a name="update06"></a>
<h3>Comment entrer un nouveau journal&nbsp;?</h3>

Aller sur la page 
<a href=<?php echo "\"$rootdir/intranet/journal.php\"";?>><?php echo $rootdir;?>/intranet/journal.php</a>.
Il y a deux champs : le nom abrégé ("<i>journal</i>") et le nom complet
("<i>full name</i>"). Pour le nom abrégé, utiliser l'abbréviation officielle, comme on peut
par exemple la trouver dans le Web of Science.

<a name="update07"></a>
<h3>Pourquoi est-ce qu'on ne peut plus corriger certains documents, personnes, journaux&nbsp;?</h3>

Les données validées par un des administrateurs de la base ne sont plus
modifiables. S'il y a quand même encore des erreurs, il faut les signaler au
<a href=<?php echo "\"$URL_WEBMASTER\"";?>>webmaster</a>.

<br><br>

<a name="hal"></a>
<h2>Base du <?php echo $LABO;?> et serveur d'archives ouvertes HAL</h2>

<a name="hal1"></a>
<h3>Quelle est la différence entre les deux systèmes&nbsp;?</h3>

La base de données du <?php echo $LABO;?> a pour vocation de recenser toutes les publications du <?php echo $LABO;?> mais non de les archiver. 
En revanche, le serveur HAL est une archive ouverte dont le but premier est la diffusion libre des publications en texte intégral.
HAL permet aussi de faire figurer des publications sous forme de notice (c.-à-d. uniquement la référence bibliographique),
en attendant de rajouter le texte intégral. Les deux systèmes sont complémentaires&nbsp;: la base du <?php echo $LABO;?> permet de facilement
gérer, trier, vérifier, rechercher, formater des listes de publications&nbsp;; le serveur HAL permet de les
archiver en texte intégral, diffuser et faire recenser.
Pour éviter les doubles saisies fastidieuses, il y a la possibilité d'exporter automatiquement les données
de la base du <?php echo $LABO;?> vers le serveur HAL.

<a name="hal10"></a>
<h3>Peut-on automatiquement importer des données du serveur HAL vers la base du LMFA&nbsp;?</h3>

Non, ce n'est pas possible car les données de la base du <?php echo $LABO;?> sont strucurées plus
finement que sur HAL.

<a name="hal11"></a>
<h3>Peut-on automatiquement exporter des données de la base du LMFA vers le serveur HAL&nbsp;?</h3>

Oui, il est facile de faire figurer dans HAL (sous forme de notice) les publications de la base, sans saisie
supplémentaire. Ensuite, il est fortement conseillé de compléter cette notice en rajoutant le texte intégral.

<a name="hal12"></a>
<h3>Quelles sont les étapes pour exporter les données vers HAL&nbsp;?</h3>

Il faut disposer d'un compte sur HAL et avoir demandé au <a href="http://www.ccsd.cnrs.fr/">CCSD</a>
l'autorisation d'importer des données via un fichier XML.
Ensuite, il suffit de
<ul>
<li><a href="#hal14">vérifier</a> que les publications sélectionnées ne figurent pas déjà dans HAL&nbsp;;</li>
<li><a href="#search02">exporter</a> la liste
de publications au format XML (compatible HAL)&nbsp;;</li>
<li>dans le fichier HAL.xml ainsi créé, modifier LOGIN='toto' PASSWORD='xxxxx'&nbsp;;</li>
<li><a href="http://import.ccsd.cnrs.fr/importXML.php">importer</a> ce fichier dans HAL&nbsp;;</li>
<li>se <a href="http://hal.archives-ouvertes.fr/index.php?action_todo=login">connecter</a> sur HAL,
vérifier les notices nouvellement créées et les passer en ligne.</li>
</ul>

<a name="hal13"></a>
<h3>Quelle est la méthode la plus rapide pour répertorier complètement une publication dans les deux systèmes&nbsp;?</h3>

Pour éviter toute saisie redondante, il faut dans l'ordre
<ol>
<li>renseigner la publication dans la base du <?php echo $LABO;?>&nbsp;;</li>
<li>exporter ces données automatiquement vers HAL&nbsp;;</li>
<li>sur HAL, transformer la notice en dépôt intégral.</li>
</ol>

<a name="hal14"></a>
<h3>Comment vérifier qu'une publication ne figure pas déjà dans HAL&nbsp;?</h3>

Bien sûr, il ne faut faire l'export automatique des données de la base vers HAL que pour les publications qui
n'y figurent pas déjà. Pour faciliter cette vérification aux utilisateurs (après login dans l'espace intranet),
un lien [<img src="./images/search.png" border="0" alt="search.png"> HAL ?]
apparaît en regard de chaque publication dans la liste sélectionnée. Ce lien fait une recherche avancée automatique
dans HAL avec les données correspondantes. En principe, si cette recherche ne trouve rien, c'est que la publication
n'existe pas encore dans HAL.

<a name="hal15"></a>
<h3>Quelqu'un a mis mes publications dans HAL, comment faire pour les modifier&nbsp;?</h3>

Pour chaque dépôt dans HAL, un "contributeur" apparaît en bas de page.
Le contributeur possède tous les droits sur
le dépôt et peut, par exemple, transférer la propriété du dépôt à un autre utilisateur de HAL&nbsp;; il suffit de lui envoyer
un mail.


<br><br>

<a name="devel"></a>
<h2>Questions techniques</h2>

<a name="devel01"></a>
<h3>Plein de choses ne marchent pas, à qui les signaler&nbsp;?</h3>

Il y a certainement plein de bugs anciens qui n'ont pas encore été démasqués
et des bugs nouveaux qui viennent d'être d'introduits.
Pour pouvoir améliorer le système, il faut les <a href=<?php echo "\"$URL_WEBMASTER\"";?>>signaler</a>,
par mail de préférence, en indiquant bien dans quelles circonstances
l'erreur s'est produite. Plus il y a de personnes qui font part des problèmes rencontrés, plus vite les bugs seront
corrigés.

<a name="devel02"></a>
<h3>C'est un bon début mais il manque plein de fonctionnalités. C'est pour quand&nbsp;?</h3>

La liste des routines en attente d'être implémentées est déjà longue. Toutes les suggestions sont les bienvenues.
La rapidité et la priorité avec lesquelles ce projet va s'enrichir dépend de plein de choses et surtout du
temps et des compétences informatiques de ceux (de celui...) qui s'y investissent.

<a name="devel03"></a>
<h3>J'ai besoin d'un système similaire, où peut-on télécharger le code&nbsp;?</h3>

L'outil PhPubli repose sur des logiciels libres (ensemble
<a href="http://www.gnu.org/philosophy/words-to-avoid.html#LAMP">GLAMP</a>).
Les scripts utilisés ici peuvent donc être installés dans tout environnement informatique
qui respecte les libertés fondamentales.
<br>
PhPubli est un logiciel libre distribué sous licence GNU GPL v3 et peut être téléchargé
<a href="http:/perso/Benoit.Pier/computing/phpubli.php">ici</a>.

<p>
<?php warning(); ?>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

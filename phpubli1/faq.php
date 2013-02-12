<?php
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

<h3><a href="#update">Mise � jour de la base</a></h3>

<h3><a href="#hal">Base du <?php echo $LABO;?> et serveur d'archives ouvertes HAL</a></h3>

<h3><a href="#devel">Questions techniques</a></h3>

<br><br>

<a name="search"></a>
<h2>Interrogation de la base</h2>

<a name="search01"></a>
<h3>Comment acc�der au texte int�gral des publications&nbsp;?</h3>

La base de donn�es a pour vocation de recenser toutes les publications du <?php echo $LABO;?> mais non de les archiver.
L'ic�ne <img src="./images/hal.ico" border="0" alt="hal.ico"> permet d'acc�der � la publication dans l'archive
ouverte HAL.
L'ic�ne <img src="./images/google.ico" border="0" alt="google.ico"> effectue une recherche du document par Google Scholar
(un "web search" permet ensuite souvent de trouver le document).
Le lien DOI renvoie vers l'original du document, dont l'acc�s en texte int�gral peut �tre restreint par l'�diteur commercial.
Si aucune de ces solutions ne permet de mettre la main sur le document, vous �tes encourag�s � sugg�rer aux auteurs
de le d�poser dans HAL (la cr�ation de notices dans HAL � partir des donn�es de la base se fait <a href="#hal11">automatiquement</a>)

<a name="search02"></a>
<h3>Comment exporter une s�lection de r�f�rences dans un format utilisable par d'autres logiciels&nbsp;?</h3>

Le contenu de la base de donn�es est facilement exportable sous diff�rents formats,
utiles par exemple pour cr�er des r�f�rences bibliographiques lors de la r�daction d'articles ou de rapports.
<br>

Pour cr�er une liste de r�f�rences, il faut d'abord les s�lectionner parmi celles renvoy�es par une ou plusieurs
interrogations de la base (cocher les cases et cliquer &ldquo;add selected items to marked list&rdquo;,
 ou cliquer &ldquo;add all items to marked list&rdquo;).
Le menu de gauche indique alors le nombre total de r�f�rences s�lectionn�es&nbsp;:
&ldquo;S�lection: XX documents&rdquo;. Cliquer dessus pour afficher la liste des r�f�rences s�lectionn�es.
En bas de la page, des liens permettent alors d'exporter cette liste dans diff�rents formats&nbsp;:
<ul>
<li><b>bibtex</b> pour utilisation avec Latex&nbsp;;</li>
<li><b>RIS</b> qui permet d'alimenter d'autres syst�mes (Endnote, Refworks&hellip;) directement avec les donn�es de la base&nbsp;;</li>
<li><b>XML</b> le format le plus g�n�raliste qui permet de reproduire le plus fid�lement possible la structure des donn�es de la
base et qui peut �tre mis en forme de mani�re tr�s flexible par des fichiers <b>XSLT</b>. Le bouton <b>XML (g�n�rique)</b> exporte un
maximum d'informations de la base, alors que le bouton <b>XML (compatible HAL)</b> produit un fichier pour
<a href="http://import.ccsd.cnrs.fr/importXML.php">import automatique</a> des
donn�es vers les serveurs de HAL.</li>
</ul>
N�anmoins, tous ces formats contiennent une information d�grad�e (plus pauvre et moins structur�e)
par rapport au contenu de la base de donn�es,
l'op�ration inverse (alimentation automatique de la base de donn�es avec des fichiers bibtex,
RIS, endnote&hellip;) n'est pas possible.
<br>

S'il y a besoin de rajouter des routines pour exporter sous d'autres formats,
merci de le faire <a href="http://www.lmfa.ec-lyon.fr/perso/Benoit.Pier">savoir</a>.


<a name="search03"></a>
<h3>Pourquoi est-ce qu'une recherche par groupe de recherche ne renvoie que
tr�s peu de publications&nbsp;?</h3>

Le champ qui indique l'appartenance d'une publication � un ou plusieurs groupes
de recherche du <?php echo $LABO;?> n'est renseign� que pour une partie des derni�res
publications. La mise � jour est en cours. Ceci dit, l'organisation du <?php echo $LABO;?> en groupes de
recherche a �volu� au cours du temps et ce champ n'a donc de signification que pour les
derni�res ann�es.
<br><br>

<a name="update"></a>
<h2>Mise � jour de la base</h2>

<a name="update01"></a>
<h3>Comment modifier le contenu de la base&nbsp;?</h3>

Les op�rations (ajouts, modifications) sur la base se font
dans l'espace <a href=<?php echo "\"$rootdir/intranet\""?>>intranet</a>
apr�s identification. Pour avoir acc�s au syst�me, envoyer
un nom de login et un mot de passe au
<a href=<?php echo "\"$URL_WEBMASTER\"";?>>webmaster</a>.

<a name="update02"></a>
<h3>Comment corriger les donn�es d'une publication&nbsp;?</h3>

Dans une liste renvoy�e par une interrogation de la base,
on peut modifier les donn�es d'un document en cliquant sur son num�ro,
ce qui renvoie sur
<a href=<?php echo "\"$rootdir/intranet/document.php\"";?>>
<?php echo $rootdir;?>/intranet/document.php</a>.
Si le document a d�j� �t� valid� par un des administrateurs de la base, il n'est
plus modifiable.

<a name="update03"></a>
<h3>Quelles sont les �tapes pour entrer un nouvel article&nbsp;?</h3>

La premi�re chose � faire est de
<a href=<?php echo "\"$rootdir/search.php\""?>>v�rifier</a>
que la publication ne figure pas d�j� dans la base.
<p>

Pour saisir un article dans un journal qui n'existe
pas encore dans la base, ou pour ajouter un nouvel auteur qui n'y figure
pas, il faut d'abord cr�er le journal ou l'auteur.<p>

Ensuite il faut remplir tous les champs, s�lectionner le journal dans le
menu d�roulant et, dans une seconde �tape, rattacher
les auteurs � la publication.
Il est important d'indiquer le DOI (digital object identifier)
qui figure sur tous les articles un tant soit peu r�cents&nbsp;: c'est ce
champ qui permet de toujours facilement retrouver le r�sum�/texte
int�gral sur le site de l'�diteur (et ce, m�me si l'�diteur r�organise
son site web ou se fait racheter par un autre et change de nom...).

<a name="update04"></a>
<h3>Comment saisir les pages d'une publication&nbsp;?</h3>

Il y a deux syst�mes pour indiquer les pages d'un document&nbsp;:
"<i>pages_start&ndash;pages_end</i>" pour les journaux dont toutes les
pages d'un volume sont num�rot�es&nbsp;;
"<i>eid</i> (<i>pages_num</i> pages)" quand l'article est identifi� par
un num�ro.<p>

Il faut donc remplir, soit les champs <i>pages_start</i> et <i>pages_end</i>,
soit les champs <i>eid</i> et <i>pages_num</i>.

<a name="update05"></a>
<h3>Comment entrer une nouvelle personne&nbsp;?</h3>

Aller sur la page 
<a href=<?php echo "\"$rootdir/intranet/personne.php\"";?>><?php echo $rootdir;?>/intranet/personne.php</a>.
donner le pr�nom et le nom en toutes lettres (plut�t que seulement les
initiales du pr�nom, cela permet d'�viter les doublons ; m�me si apr�s
on choisit de n'afficher que les initiales) avec seulement une
majuscule initiale le reste en minuscules.

<a name="update06"></a>
<h3>Comment entrer un nouveau journal&nbsp;?</h3>

Aller sur la page 
<a href=<?php echo "\"$rootdir/intranet/journal.php\"";?>><?php echo $rootdir;?>/intranet/journal.php</a>.
Il y a deux champs : le nom abr�g� ("<i>journal</i>") et le nom complet
("<i>full name</i>"). Pour le nom abr�g�, utiliser l'abbr�viation officielle, comme on peut
par exemple la trouver dans le Web of Science.

<a name="update07"></a>
<h3>Pourquoi est-ce qu'on ne peut plus corriger certains documents, personnes, journaux&nbsp;?</h3>

Les donn�es valid�es par un des administrateurs de la base ne sont plus
modifiables. S'il y a quand m�me encore des erreurs, il faut les signaler au
<a href=<?php echo "\"$URL_WEBMASTER\"";?>>webmaster</a>.

<br><br>

<a name="hal"></a>
<h2>Base du <?php echo $LABO;?> et serveur d'archives ouvertes HAL</h2>

<a name="hal1"></a>
<h3>Quelle est la diff�rence entre les deux syst�mes&nbsp;?</h3>

La base de donn�es du <?php echo $LABO;?> a pour vocation de recenser toutes les publications du <?php echo $LABO;?> mais non de les archiver. 
En revanche, le serveur HAL est une archive ouverte dont le but premier est la diffusion libre des publications en texte int�gral.
HAL permet aussi de faire figurer des publications sous forme de notice (c.-�-d. uniquement la r�f�rence bibliographique),
en attendant de rajouter le texte int�gral. Les deux syst�mes sont compl�mentaires&nbsp;: la base du <?php echo $LABO;?> permet de facilement
g�rer, trier, v�rifier, rechercher, formater des listes de publications&nbsp;; le serveur HAL permet de les
archiver en texte int�gral, diffuser et faire recenser.
Pour �viter les doubles saisies fastidieuses, il y a la possibilit� d'exporter automatiquement les donn�es
de la base du <?php echo $LABO;?> vers le serveur HAL.

<a name="hal10"></a>
<h3>Peut-on automatiquement importer des donn�es du serveur HAL vers la base du LMFA&nbsp;?</h3>

Non, ce n'est pas possible car les donn�es de la base du <?php echo $LABO;?> sont strucur�es plus
finement que sur HAL.

<a name="hal11"></a>
<h3>Peut-on automatiquement exporter des donn�es de la base du LMFA vers le serveur HAL&nbsp;?</h3>

Oui, il est facile de faire figurer dans HAL (sous forme de notice) les publications de la base, sans saisie
suppl�mentaire. Ensuite, il est fortement conseill� de compl�ter cette notice en rajoutant le texte int�gral.

<a name="hal12"></a>
<h3>Quelles sont les �tapes pour exporter les donn�es vers HAL&nbsp;?</h3>

Il faut disposer d'un compte sur HAL et avoir demand� au <a href="http://www.ccsd.cnrs.fr/">CCSD</a>
l'autorisation d'importer des donn�es via un fichier XML.
Ensuite, il suffit de
<ul>
<li><a href="#hal14">v�rifier</a> que les publications s�lectionn�es ne figurent pas d�j� dans HAL&nbsp;;</li>
<li><a href="#search02">exporter</a> la liste
de publications au format XML (compatible HAL)&nbsp;;</li>
<li>dans le fichier HAL.xml ainsi cr��, modifier LOGIN='toto' PASSWORD='xxxxx'&nbsp;;</li>
<li><a href="http://import.ccsd.cnrs.fr/importXML.php">importer</a> ce fichier dans HAL&nbsp;;</li>
<li>se <a href="http://hal.archives-ouvertes.fr/index.php?action_todo=login">connecter</a> sur HAL,
v�rifier les notices nouvellement cr��es et les passer en ligne.</li>
</ul>

<a name="hal13"></a>
<h3>Quelle est la m�thode la plus rapide pour r�pertorier compl�tement une publication dans les deux syst�mes&nbsp;?</h3>

Pour �viter toute saisie redondante, il faut dans l'ordre
<ol>
<li>renseigner la publication dans la base du <?php echo $LABO;?>&nbsp;;</li>
<li>exporter ces donn�es automatiquement vers HAL&nbsp;;</li>
<li>sur HAL, transformer la notice en d�p�t int�gral.</li>
</ol>

<a name="hal14"></a>
<h3>Comment v�rifier qu'une publication ne figure pas d�j� dans HAL&nbsp;?</h3>

Bien s�r, il ne faut faire l'export automatique des donn�es de la base vers HAL que pour les publications qui
n'y figurent pas d�j�. Pour faciliter cette v�rification aux utilisateurs (apr�s login dans l'espace intranet),
un lien [<img src="./images/search.png" border="0" alt="search.png"> HAL ?]
appara�t en regard de chaque publication dans la liste s�lectionn�e. Ce lien fait une recherche avanc�e automatique
dans HAL avec les donn�es correspondantes. En principe, si cette recherche ne trouve rien, c'est que la publication
n'existe pas encore dans HAL.

<a name="hal15"></a>
<h3>Quelqu'un a mis mes publications dans HAL, comment faire pour les modifier&nbsp;?</h3>

Pour chaque d�p�t dans HAL, un "contributeur" appara�t en bas de page.
Le contributeur poss�de tous les droits sur
le d�p�t et peut, par exemple, transf�rer la propri�t� du d�p�t � un autre utilisateur de HAL&nbsp;; il suffit de lui envoyer
un mail.


<br><br>

<a name="devel"></a>
<h2>Questions techniques</h2>

<a name="devel01"></a>
<h3>Plein de choses ne marchent pas, � qui les signaler&nbsp;?</h3>

Il y a certainement plein de bugs anciens qui n'ont pas encore �t� d�masqu�s
et des bugs nouveaux qui viennent d'�tre d'introduits.
Pour pouvoir am�liorer le syst�me, il faut les <a href=<?php echo "\"$URL_WEBMASTER\"";?>>signaler</a>,
par mail de pr�f�rence, en indiquant bien dans quelles circonstances
l'erreur s'est produite. Plus il y a de personnes qui font part des probl�mes rencontr�s, plus vite les bugs seront
corrig�s.

<a name="devel02"></a>
<h3>C'est un bon d�but mais il manque plein de fonctionnalit�s. C'est pour quand&nbsp;?</h3>

La liste des routines en attente d'�tre impl�ment�es est d�j� longue. Toutes les suggestions sont les bienvenues.
La rapidit� et la priorit� avec lesquelles ce projet va s'enrichir d�pend de plein de choses et surtout du
temps et des comp�tences informatiques de ceux (de celui...) qui s'y investissent.

<a name="devel03"></a>
<h3>J'ai besoin d'un syst�me similaire, o� peut-on t�l�charger le code&nbsp;?</h3>

L'outil PhPubli repose sur des logiciels libres (ensemble
<a href="http://www.gnu.org/philosophy/words-to-avoid.html#LAMP">GLAMP</a>).
Les scripts utilis�s ici peuvent donc �tre install�s dans tout environnement informatique
qui respecte les libert�s fondamentales.
<br>
PhPubli est un logiciel libre distribu� sous licence GNU GPL v3 et peut �tre t�l�charg�
<a href="http:/perso/Benoit.Pier/computing/phpubli.php">ici</a>.

<p>
<?php warning(); ?>

</div>
<!-- end main panel -->

<?php footer(); ?>

</body>

</html>

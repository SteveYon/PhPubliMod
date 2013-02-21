<?php

	$rootdir="..";
	$localdir="intranet";
	$filename="document.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/functions_export.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);

	/* recuperation et envoi du fichier bibtex en bdd */
	$line = "";
	foreach($_POST as $key => $val){
	    $line.= '$_POST["'.$key.'"]='.$val."  ".$key."\n";
	    	
	}
	$line1=addSlashes($_POST['TITLE']);
	echo $line."  ".$line1;
	/*Requete SQL qui tue !*/
	// on peut iterer sur tout les champs grace au foreach du dessus 
	


        $typedoc_id     = 4;
        $soustypedoc_id = $_POST['soustypedoc_id'];
        $title          = addSlashes($_POST['TITLE']);
        $year           = $_POST['YEAR'];
        $institution_id = $_POST['AFFILIATION'];
        $volume         = addSlashes($_POST['VOLUME']);
        $pages_start    = $_POST['pages_start'];
        $pages_end      = $_POST['pages_end'];
        $pages_eid      = $_POST['pages_eid'];
        $pages_num      = $_POST['pages_num'];
        $doi            = addSlashes($_POST['DOI']);
        $hal            = addSlashes($_POST['HAL_ID']);
        $journal_id     = $_POST['JOURNAL'];
        $conference_id  = $_POST['conference_id'];
        $proceedings_id = $_POST['proceedings_id'];
        $publisher_id   = $_POST['PUBLISHER'];
        $note           = addSlashes($_POST['NOTE']);
        $lang           = $_POST['LANGUAGE'];
        
        if ("$typedoc_id" == "3") // conference proceedings, use year from proceedings book. This is redundant but useful for sorting...
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
        
        foreach ($_POST as $key => $val) {
                if ("$val" == "groupeid") {
                        $gid = preg_replace("/^groupe/", "", $key);
                        $groupe .= "$gid ";
                }
        }

	$bontitre = stripSlashes($title);
	$query_verif = "SELECT title from document where title like '%$bontitre%'";
	//echo $query_verif;
	$res_verif= $bd->exec_query($query_verif);
	echo "laaa".$res_verif;

	while ($obj = $bd->fetch_object($res_verif)) {
        	printf ("%s \n", $obj->title);
    	}


	




        $query = "INSERT INTO document ( " . "typedoc_id, soustypedoc_id, institution_id, title" . ", year, volume, pages_start, pages_end, 		pages_eid, pages_num, doi, hal" . ", journal_id, conference_id, publisher_id, proceedings_id" . ", note, groupe, lang" . ", log, date " . ") 		VALUES ( " . " '$typedoc_id', '$soustypedoc_id', '$institution_id', '$title'" . ", '$year', '$volume', '$pages_start', '$pages_end', 		'$pages_eid', '$pages_num', '$doi', '$hal'" . ", '$journal_id', '$conference_id', '$publisher_id', '$proceedings_id'" . ", '$note', 		'$groupe', '$lang'" . ", '0', now()) ";
                // print ("query= $query <p>\n");
                $res   = $bd->exec_query($query);
                
                $title      = $bd->prepare_string($title);
                $year       = $bd->prepare_string($year);
                $journal_id = $bd->prepare_string($journal_id);
                
                $query        = "SELECT * " . "FROM document " . "WHERE title LIKE '%$title' " . "AND year LIKE '%$year%'";
                // print ("query= $query <p>\n");
                $res          = $bd->exec_query($query);
                $document_new = $bd->fetch_object($res);
                $returnid     = $document_new->doc_id;
                // echo "returnid=$returnid <p>\n";
                
                log_entry("document", $returnid, "insert", "", $document_new, $bd);






/*
doc_id 
title                    
year
volume 
doi
hal
journal_id
institution_id
note      
typedoc_id
soustypedoc_id
pages_start 
pages_end
pages_eid
pages_num
groupe
log
date   
conference_id
publisher_id
proceedings_id
lang

$_POST["HAL_ID"]=hal-00651480  HAL_ID
$_POST["URL"]=http://hal.inria.fr/hal-00651480  URL
$_POST["TITLE"]={On comparison of clustering properties of point processes}  TITLE
$_POST["AUTHOR"]=Blaszczyszyn, Bartlomiej and Yogeshwaran, D.  AUTHOR
$_POST["ABSTRACT"]={In this paper, we propose a new comparison tool for spatial homogeneity of point processes, based on the joint examination of void probabilities and factorial moment measures. We prove that determinantal and permanental processes, as well as, more generally, negatively and positively associated point processes are comparable in this sense to the Poisson point process of the same mean measure. We provide some motivating results and preview further ones, showing that the new tool is relevant in the study of macroscopic, percolative properties of point processes. This new comparison is also implied by the directionally convex ($dcx$ ordering of point processes, which has already been shown to be relevant to comparison of spatial homogeneity of point processes. For this latter ordering, using a notion of lattice perturbation, we provide a large monotone spectrum of comparable point processes, ranging from periodic grids to Cox processes, and encompassing Poisson point process as well. They are intended to serve as a platform for further theoretical and numerical studies of clustering, as well as simple models of random point patterns to be used in applications where neither complete regularity nor the total independence property are not realistic assumptions.}  ABSTRACT
$_POST["LANGUAGE"]=Anglais  LANGUAGE
$_POST["AFFILIATION"]=TREC - INRIA Rocquencourt  AFFILIATION
$_POST["PUBLISHER"]=APT  PUBLISHER
$_POST["JOURNAL"]=Advances in Applied Probability  JOURNAL
$_POST["VOLUME"]=46  VOLUME
$_POST["NUMBER"]=1   NUMBER
$_POST["NOTE"]=24 pages, 1 figure. This submission revisits and adds to ideas concerning clustering and $dcx$ ordering presented in arXiv:1105.4293. Results on associated point process in Section 3.3 are new.   NOTE
$_POST["AUDIENCE"]=internationale   AUDIENCE
$_POST["YEAR"]=2014  YEAR
*/
?>


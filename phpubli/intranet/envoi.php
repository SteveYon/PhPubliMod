<?php

	$rootdir="..";
	$localdir="intranet";
	$filename="document.php";
	require_once ("$rootdir/include.php");
	require_once ("$rootdir/functions_export.php");
	require_once ("include.php");

	$bd = new MySQL(UNAME, UPASSWORD, BASE, SERVER);

	check_login($bd);




        $typedoc_id     = 4;
        $soustypedoc_id = $_POST['soustypedoc_id'];
        $title          = addSlashes($_POST['TITLE']);
        $year           = $_POST['YEAR'];
        $institution_id = addSlashes($_POST['AFFILIATION']);
        $volume         = addSlashes($_POST['VOLUME']);
        $pages_start    = $_POST['pages_start'];
        $pages_end      = $_POST['pages_end'];
        $pages_eid      = $_POST['pages_eid'];
        $pages_num      = $_POST['pages_num'];
        $doi            = addSlashes($_POST['DOI']);
        $hal            = addSlashes($_POST['HAL_ID']);
        $journal        = addSlashes($_POST['JOURNAL']);
        $conference_id  = $_POST['conference_id'];
        $proceedings_id = $_POST['proceedings_id'];
        $publisher   	= addSlashes($_POST['PUBLISHER']);
        $note           = addSlashes($_POST['NOTE']);
        $lang           = $_POST['LANGUAGE'];
	$month          = $_POST['MONTH'];
	$citation       = addSlashes($_POST['CITATION']);
	$url            = $_POST['URL'];
	$abstract       = addSlashes($_POST['ABSTRACT']);
        $keywords       = addSlashes($_POST['KEYWORDS']);
	$authors	= addSlashes($_POST['AUTHOR']);
	//$groupe 	= addSlaches($_POST['GROUPE']); 

	$varTitle = substr("$title", 0, -1);
        echo $title."\n";
	echo $abstract."\n";
	echo $title;
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

       
       $query        = "SELECT * " . "FROM document " . "WHERE title LIKE '%$title' " . "AND year LIKE '%$year%'";
       $reponse          = $bd->exec_query($query);
       $doc = $bd->fetch_object($reponse);
       $id     = $doc->doc_id;
       echo $id; 
      if("$id" == ""){ //Le document n'existe pas dans la base et donc nous l'ajoutons.

        $query = "INSERT INTO document ( " . "title, citation, journal, volume" . ", pages_start, pages_end, pages_num, year, month" . ", hal, url, 		doi, note" . ", abstract, keywords, authors" . ", publisher, groupe, lang, date, typedoc_id, soustypedoc_id, pages_eid, log, conference_id, 		proceedings_id " . ") VALUES ( " . " '$title', '$citation', '$journal', '$volume'" . ", '$pages_start', '$pages_end', '$pages_num', '$year', 		'$month', '$hal', '$url'" . ", '$doi', '$note', '$abstract', '$keywords'" . ", '$authors', '$publisher', '$groupe', '$lang', 'now()', 		'$typedoc_id', '$soustypedoc_id', '$pages_eid', '$log', '$conference_id', '$proceedings_id')";


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




    }else{
	echo "\nLe document existe dans la base";
    }

?>


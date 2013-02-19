<?php
	/* recuperation et envoi du fichier bibtex en bdd */
	$line = "";
	foreach($_POST as $key => $val){
	    $line.= '$_POST["'.$key.'"]='.$val;
	}
	echo $line;
	/*Requete SQL qui tue !*/
	// on peut iterer sur tout les champs grace au foreach du dessus 
?>
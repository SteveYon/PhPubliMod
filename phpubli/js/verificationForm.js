function valider() {
	string = "V\351rifier que:\n"
    monabstract = document.formAjout.abstract.value;
    montitle = document.formAjout.title.value;
    monnote = document.formAjout.note.value;

    valeurL = false;
    valeurC = false;
    valeurCV = false;

    monabstract = estPlein(monabstract);
    montitle = estPlein(montitle);
    monnote = estPlein(monnote);

    if (monnote == true & montitle == true & monabstract == true) {
        valeurL = true;
    } else {
        string+="- Tous les champs obligatoires (En rouge)\n";
        valeurL = false;
    }
    mondebut = document.formAjout.pages_start.value;
    monfin = document.formAjout.pages_end.value;
    monnb = document.formAjout.pages_num.value;

    if (isNaN(mondebut) == false & isNaN(monfin) == false & isNaN(monnb) == false) {
        // les donnees sont ok, on peut envoyer le formulaire    
        valeurC = true;
    } else {
        string+="- Les champs 'D\351but', 'Fin', 'Nombre de Page' sont des nombres \n";
        valeurC = false;
    }

    if (valeurL == true & valeurC == true) {
        return true;
    } else {
    	alert(string);
        return false;
    }
}

function validerEdit() {
	string = "V\351rifier que:\n"
    monabstract = document.formEdit.abstract.value;
    montitle = document.formEdit.title.value;
    monnote = document.formEdit.note.value;

    valeurL = false;
    valeurC = false;
    valeurCV = false;

    monabstract = estPlein(monabstract);
    montitle = estPlein(montitle);
    monnote = estPlein(monnote);

    if (monnote == true & montitle == true & monabstract == true) {
        valeurL = true;
    } else {
        string+="- Tous les champs obligatoires (En rouge)\n";
        valeurL = false;
    }
    mondebut = document.formEdit.pages_start.value;
    monfin = document.formEdit.pages_end.value;
    monnb = document.formEdit.pages_num.value;

    if (isNaN(mondebut) == false & isNaN(monfin) == false & isNaN(monnb) == false) {
        // les donnees sont ok, on peut envoyer le formulaire    
        valeurC = true;
    } else {
        string+="- Les champs 'D\351but', 'Fin', 'Nombre de Page' sont des nombres \n";
        valeurC = false;
    }


    if (valeurC == true & valeurL == true) {
        return true;
    } else {
    	alert(string);
        return false;
    }
}


function estPlein(text) {
    return (/\S/.test(text));
}
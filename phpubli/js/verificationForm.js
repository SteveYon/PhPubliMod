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

    mondebut = estPlein(mondebut);
    monfin = estPlein(monfin);
    monnb = estPlein(monnb);

    if (mondebut == true && monfin == true & monnb == true) {
        // les donnees sont ok, on peut envoyer le formulaire    
        valeurCV = true;
    } else {
        // sinon on affiche un message
        string+="- Les champs 'D\351but', 'Fin', 'Nombre de Page' ne sont pas vides \n";
        // et on indique de ne pas envoyer le formulaire
        valeurCV = false;
    }


    if (valeurC == true & valeurL == true & valeurCV == true) {
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

    mondebut = estPlein(mondebut);
    monfin = estPlein(monfin);
    monnb = estPlein(monnb);

    if (mondebut == true && monfin == true & monnb == true) {
        // les donnees sont ok, on peut envoyer le formulaire    
        valeurCV = true;
    } else {
        // sinon on affiche un message
        string+="- Les champs 'D\351but', 'Fin', 'Nombre de Page' ne sont pas vides \n";
        // et on indique de ne pas envoyer le formulaire
        valeurCV = false;
    }


    if (valeurC == true & valeurL == true & valeurCV == true) {
        return true;
    } else {
    	alert(string);
        return false;
    }
}


function estPlein(text) {
    return (/\S/.test(text));
}


function AddAuthor()    {  AddWriter ($('auteurs'));  }
function AddEditor()    {  AddWriter ($('editeurs')); }
function AddWriter (obj)
{
    authorID = getSelectValue("groupeAuteur");

    var isNew = true;
    for (var i = 0;  i < obj.length;  i++)  {
        if (obj.options [i].value == authorID)  {
            isNew = false;
            break;
        } else {
            obj.options [i].selected = false;
        }
    }
    if (isNew)  {
        newoption = new Option (1, authorID, false, true);
        obj.options [obj.length] = newoption;
    }
}

function getSelectValue(selectId)
{
    /**On récupère l'élement html <select>*/
    var selectElmt = document.getElementById(selectId);
    /**
    selectElmt.options correspond au tableau des balises <option> du select
    selectElmt.selectedIndex correspond à l'index du tableau options qui est actuellement sélectionné
    */
    return selectElmt.options[selectElmt.selectedIndex].value;
}

function RemoveAuthor() {  RemoveWriter ($('selectedauthors')); }
function RemoveEditor() {  RemoveWriter ($('selectededitors')); }
function RemoveWriter (obj)
{
    i = obj.selectedIndex;
    if (i >= 0)  {
        obj.options [i] = null; // obj.length decreases by 1...
        if (i < (obj.length)) {
            // if there is an element on the old position, mark it
            obj.options [i].selected = true;
        } else if (obj.length > 0)  {
            // otherwise it was the lowest element; mark the el. above (if any is left)
            obj.options [i-1].selected = true;
        }
    }
}
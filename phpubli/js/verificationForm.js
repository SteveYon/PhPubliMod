function valider(){
  // si la valeur du champ prenom est non vide

  monabstract=document.formAjout.abstract.value;
  montitle=document.formAjout.abstract.value;
  monnote=document.formAjout.abstract.value;

  monabstract=estPlein(monabstract);
  montitle=estPlein(montitle);
  monnote=estPlein(monnote);

  if(monnote==true & montitle==true & monabstract==true) {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }else {
    // sinon on affiche un message
    alert("Veuillez Saisir tous les champs obligatoires (En rouge)");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}

function estPlein(text) { 
    return (/\S/.test(text)); 
}
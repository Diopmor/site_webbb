// Récupération des éléments
var form = document.querySelector("#form");  // Sélectionne le formulaire par son ID
var prenom = document.getElementById("prenom");  // Sélectionne l'élément avec l'ID "prenom"
var nom = document.querySelector('#nom');  // Sélectionne l'élément avec l'ID "nom"
var email0 = document.querySelector('#email0');  // Sélectionne l'élément avec l'ID "email0"
var email1 = document.querySelector('#email1');  // Sélectionne l'élément avec l'ID "email1"
var password1= document.querySelector('#password1');  // Sélectionne l'élément avec l'ID "password"
var password2 = document.querySelector('#password2');  // Sélectionne l'élément avec l'ID "password"


// Écouteurs d'événements sur les champs de saisie
prenom.addEventListener('blur', function () { form_verify(prenom); });  // Ajoute un écouteur sur l'événement "blur" au champ "prenom"
nom.addEventListener('blur', function () { form_verify(nom); });  // Ajoute un écouteur sur l'événement "blur" au champ "nom"
email0.addEventListener('blur', function () { form_verify(email0, email1); });  // Ajoute un écouteur sur l'événement "blur" au champ "email0"
email1.addEventListener('blur', function () { form_verify(email1, email0); });  // Ajoute un écouteur sur l'événement "blur" au champ "email1"
password1.addEventListener('blur', function () { form_verify(password1, password2); });  // Ajoute un écouteur sur l'événement "blur" au champ "password"
password2.addEventListener('blur', function () { form_verify(password2,password1); });  // Ajoute un écouteur sur l'événement "blur" au champ "password"


function form_verify(elem, otherElem) {
    const value = elem.value.trim();

    // Vérification du champ spécifique
    if (value === "") {
        let message = "";

        // Sélection du message d'erreur approprié en fonction de l'élément
        if (elem === prenom) {
            message = "Prénom ne peut pas être vide";
        } else if (elem === nom) {
            message = "Nom ne peut pas être vide";
        }
         else if (elem === email0 || elem === email1) {
            message = "L'email ne peut pas être vide";
        } else if (elem === password1 || elem === password2) {
            message = "Le mot de passe ne peut pas être vide";
        }else if(password1==!password2){
            message = "Les mots de passes ne correspondent pas";
        }

        setError(elem, message);
    } else if (otherElem && otherElem.value.trim() !== "" && elem.value !== otherElem.value) {
        // Vérification si les emails sont différents
        setError(elem, "Les emails ne correspondent pas");
    } else {
        setSuccess(elem);
    }
}

// ...

function validerFormulaire() {
    if (prenom.value === "" || nom.value === "" || email0.value === "" || email1.value === "" || password1.value === "" || password2.value === "") {
        alert("Veuillez remplir tous les champs.");  // Affiche une alerte si des champs obligatoires sont vides
        return false; // Empêche la soumission du formulaire
    }

    // Ajoutez ici le code pour soumettre le formulaire si la validation est réussie.

    return true; // Permet la soumission du formulaire
}

function setError(elem, message) {
    const formControl = elem.parentElement;
    const small = formControl.querySelector('small');

    // Ajout du message d'erreur
    small.innerText = message;

    // Ajout de la classe error
    formControl.classList.remove('success');
    formControl.classList.add('error');
}

function setSuccess(elem) {
    const formControl = elem.parentElement;
    const small = formControl.querySelector('small');

    // Suppression du message d'erreur
    small.innerText = "";

    // Ajout de la classe success
    formControl.classList.remove('error');
    formControl.classList.add('success');
}

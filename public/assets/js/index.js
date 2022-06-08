//==========================================================================================================
//====================================== Loader ============================================================

/* document.onreadystatechange = function() {
    if (document.readyState != "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector(".cube").style.visibility = "visible";
    } else {
        document.querySelector(".cube").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
}; */

//==========================================================================================================
//========================== Gère le site en entier si javascript est désactivé ============================

window.onload = function() {
    elementJs = document.querySelector('.message_avertissement_javascript');
    elementJs.parentNode.removeChild(elementJs);
    elementTop = document.querySelector('.top1');
    elementTop.parentNode.removeChild(elementTop);
}

let removeAccueil = document.getElementById('accueil');
removeAccueil.removeAttribute("id");
let removePhotos = document.getElementById('photos');
removePhotos.removeAttribute("id");
let removeTarifs = document.getElementById('tarifs');
removeTarifs.removeAttribute("id");
let removeProducts = document.getElementById('produits');
removeProducts.removeAttribute("id");
let removeContact = document.getElementById('contact');
removeContact.removeAttribute("id");

let newCss = document.createElement('link');
newCss.id = 'switchStyle';
newCss.href = "{{asset('assets/css/accueil.css')}}";

document.body.appendChild(newCss);


//==========================================================================================================
//============ Permet de garder le bon fichier CSS en fonction de l'URL en cas de rechgargement ============

let urlActual = document.location.href;
let urlClean = urlActual.replace(/\/$/, "");
endUrl = urlClean.substring(urlClean.lastIndexOf("#") + 1);
let css = ('assets/css/' + endUrl + '.css');

if (css == 'assets/css/' + urlClean + '.css') {
    css = ('assets/css/accueil.css');

} else {
    css = ('assets/css/' + endUrl + '.css');
}

document.getElementById("switchStyle").setAttribute("href", css);

//==========================================================================================================
//===================================== Change le fichier CSS au click =====================================

function switchStyle(css) {
    document.getElementById("switchStyle").setAttribute("href", css);
}
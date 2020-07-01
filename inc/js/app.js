// Ici on a créé un objet qui va contenir toutes nos fonctions
// on a fait le choix de le faire en objet pour que notre JS
// soit bien organisé

// l'objet app représente ton application javascript
// il est déclaré en dehors de la IIFE
// pour être global et potentiellement exploitable ailleurs
var app = {};


// Utilisation d'une IIFE (Immediately-Invoked Function Expression (IIFE))
// C'est une fontion qui s'auto invoke (s'auto lance => auto-exécutable)
// pour défnir un contexte (le $ ici fait référence au langage Jquery)
// => on encapsule notre JS (Jquery) dans une fonction IIFE :
// => pour éviter les interferances avec d'autres langages (qui pourrait par exemple utiliser aussi le $)
// => pour créér un scope local (c'est à dire comme les variables sont dans une fonction, elle sont locales)
// => Cela empêche l'accès aux variables dans l'expression idiomatique IIFE ainsi que la pollution de la portée globale.
// => pour protéger en quelque sorte son code javascript
// => elle s'éxécute d'elle donc le code est exécuté une fois le js chargé

(function($){

	"use strict";

	// On utilise le mode stricte pour rendre les erreurs implicites explicites
	// Cela active un mode stricte, qui par exemple vous empechera d'utiliser des variables non déclarées

	/*******************
	Predefined variables
	*******************/

	var $window = $(window),
	$document = $(document),
    $body = $("body");

	$document.ready(function(){
	});

})(jQuery);
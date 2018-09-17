



function afficher_resultat(){

var cout_machine = $('.cout option:selected').text();
var temps_utilisation = parseFloat( $('.temps option:selected').text());
var resultat = cout_machine * temps_utilisation;

$('.resultat').html(resultat);
}

function afficher_resultat2(){
	
var prix_consommable = $('.prix_consommable option:selected').text();
var surface = $('.surface').val();
var resultat2 = prix_consommable * surface;


$('.resultat2').html(resultat2);
}

function afficher_resultat3(test){

var temps_presence = $('.temps_presence'+test+' option:selected').text();
var cout_accompagnement = $('.cout_accompagnement'+test+' option:selected').text();
var resultat3 = temps_presence * cout_accompagnement;


$('.resultat'+test).html(resultat3);
}
<?php
//Includo la classe phpSillaba
require_once "sillaba.php";

//Quattro testi scelti come esempio
$testo1="Il destino è una invenzione della gente fiacca e rassegnata.";
$testo2="Il ballo è una manifestazione verticale di un desiderio orizzontale.";
$testo3="Non esistono fenomeni morali ma soltanto una interpretazione morale dei fenomeni.";
$testo4="Solo i poveri riescono ad afferrare il senso della vita, i ricchi possono solo tirare a indovinare.";
?>

<!DOCTYPE HTML>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Esempio di sillabazione in PHP</title>
	<style>
		html{background-color:#EEE; font-family:'Century Gothic', CenturyGothic, AppleGothic, sans-serif; color:#222;}
		body{width:80%;margin:20px auto;background-color:#DDF; padding:2em; border-radius:2px; border:1px solid #CCC;}
		span.labeltext{min-width:160px; font-weight:bold; display: inline-block;}
	</style>
</head>
<body>
	<h1>Esempio di sillabazione in PHP</h1>

<?php
echo "<h4>".$testo1."</h4>";
//Istanzio un oggetto della classe phpSillaba
$sillabatore=new phpSillaba($testo1);
//Restituisco la frase sillabata separata da trattini
echo $sillabatore->getFraseSillabata();

echo "<hr>";
echo "<h4>".$testo2."</h4>";
//Imposto una nuova frase
$sillabatore->setFrase($testo2);
//E la stampo
echo $sillabatore->getFraseSillabata();



echo "<hr>";
echo "<h4>".$testo3."</h4>";
//Imposto una nuova frase
$sillabatore->setFrase($testo3);
//E ottengo l'array delle sillabe
$arraySillabe=$sillabatore->getArraySillabe();
//Stampo ogni sillaba separata da uno spazio
echo implode($arraySillabe,"&nbsp;")."<br>";
//Altri metodi aggiuntivi
echo "<span class='labeltext'>Sillabe totali:</span>"		.$sillabatore->getNumeroSillabe()."<br>";
echo "<span class='labeltext'>Vocali totali:</span>"		.$sillabatore->getNumeroVocali()."<br>";
echo "<span class='labeltext'>Consonanti totali:</span>"	.$sillabatore->getNumeroConsonanti()."<br>";
echo "<span class='labeltext'>Spazi totali:</span>"			.$sillabatore->getNumeroSpazi()."<br>";
echo "<span class='labeltext'>Lettere totali:</span>"		.$sillabatore->getNumeroLettere()."<br>";
?>
</body></html>
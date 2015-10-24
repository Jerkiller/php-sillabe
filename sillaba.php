<?php


class phpSillaba{

private $frase="";

function __construct($frase=""){
	$this->frase=$frase;
}

function setFrase($frase=""){
	$this->frase=$frase;
}

function getFraseSillabata(){
	return $this->sillaba($this->frase);
}

function getArraySillabe(){
	return explode("-",$this->sillaba($this->frase));
}



/* METODI PRIVATI */

/* divide gli iati */
private function dividi_iati($frase)
{
$temp=$frase;

/* aa ae ao ai */
$pattern = "/a([aeio])/";
$replacement = 'a-$1';
$temp =preg_replace($pattern, $replacement, $temp);
/* se in posiz iniziale riunisci */
$pattern = "/ a-([aeio])/";
$replacement = ' a$1';
$temp = preg_replace($pattern, $replacement, $temp);


/* ea ee eo */
$replacement = 'e-$1';
$pattern = "/e([aeo])/";
$temp = preg_replace($pattern, $replacement, $temp);


/* ia ie io ii iu - non divido? ione iena caienna aiuto */
$replacement = 'i-$1';
$pattern = "/i([aeiou])/";
//temp =temp.replace(pattern,replacement);

/* ia ie ii io iu in posiz finale varia */
$pattern = "/i([aeiou]) /";
$replacement = 'i-$1 ';
$temp = preg_replace($pattern, $replacement, $temp);

/* oa oe oo ou */
$pattern = "/o([aeou])/";
$replacement = 'o-$1';
$temp = preg_replace($pattern, $replacement, $temp);

/* bua bue bui buo ... */
$pattern = "/([bcdr])u([aeio])/";
$replacement = '$1u-$2';
//temp =temp.replace(pattern,replacement);


$replacement = 'u-$1';
$pattern = "/u([aeo])$/";
//temp =temp.replace(pattern,replacement);

$replacement = 'u-$1 ';
$pattern = "/u([aoe]) /";
//temp =temp.replace(pattern,replacement);

return $temp;
}













/* ritorna una frase senza spazi iniziali/finali e senza spazi multipli */
private function spazio($frase)
{
return " ".preg_replace('/\s\s+/', ' ', trim($frase))." ";
}





















private function dividi_prima_vocale($frase)
{
//abo ast

$pattern = "/([aeiouAEIOU])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
$replacement = '$1-$2$3';
$temp = preg_replace($pattern, $replacement, $frase);

$pattern = "/([aeiouAEIOU])([bcdfghlmnpqrstvz])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
$replacement = '$1-$2$3$4';
$temp = preg_replace($pattern, $replacement, $temp);

$pattern = "/([aeiouAEIOU])([bcdfghlmnpqrstvz])([bcdfghlmnpqrstvz])([lr])([aeiouèéàòùì])/";
$replacement = '$1-$2$3$4$5';
$temp = preg_replace($pattern, $replacement, $temp);

return $temp;
}







private function due($frase)
{

	//cacodo
	$pattern = "/([bcdfghlmnpqrstvzBCDFGHLMNPQRSTVZ])([aeiou])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
	$replacement = '$1$2-$3$4';
	$temp = preg_replace($pattern, $replacement, $frase);

	//cacodo
	$pattern = "/([bcdfghlmnpqrstvzBCDFGHLMNPQRSTVZ])([aeiou])([bcdfghlmnpqrstvz])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
	$replacement = '$1$2-$3$4$5';
	$temp = preg_replace($pattern, $replacement, $temp);

	$pattern = "/([bcdfghlmnpqrstvzBCDFGHLMNPQRSTVZ])([aeiou])([bcdfghlmnpqrstvz])([bcdfghlmnpqrstvz])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
	$replacement = '$1$2-$3$4$5$6';
	$temp = preg_replace($pattern, $replacement, $temp);

	//cacodo
	$pattern = "/que([a-z])([a-z])/";
	$replacement = 'que-$1$2';
	$temp = preg_replace($pattern, $replacement, $temp);

	// ...a-bo 
	$pattern = "/([aeiouAEIOU])([bcdfghlmnpqrstvz])([aeiouèéàòùì])/";
	$replacement = '$1-$2$3';
	$temp = preg_replace($pattern, $replacement, $temp);

	return $temp;
}



private function tre($frase)
{
	//bra-- cri vre
	$pattern = "/([bcdfgptvBCDFGPTV])([lr])([aeiou])([a-zèéàòùì])([a-zèéàòùì])/";
	$replacement = '$1$2$3-$4$5';
	$temp = preg_replace($pattern, $replacement, $frase);

	//medio-cre
	$pattern = "/([aeiouAEIOU])c([lr])([aeiou])/";
	$replacement = '$1-c$2$3';
	$temp = preg_replace($pattern, $replacement, $temp);
	return $temp;
}





function quattro($frase)
{
	//stra spre
	$pattern = "/([sS])([bcdfghlmnpqrstvz]+)([aeiou])([a-z])([a-zèéàòùì])/";
	$replacement = '$1$2$3-$4$5';
	$temp = preg_replace($pattern, $replacement, $frase);

	$temp = preg_replace("/i-e/", 'ie', $temp);

	return $temp;
}







/* divide le doppie in una frase o le altre coppie di consonanti che vanno divise */
private function dividi_doppie_consonanti($frase)
{
	$patterns = array('/ps/','/tm/','/rf/','/lp/','/lz/','/lv/','/rv/','/rd/','/rl/','/nz/','/nc/','/rc/','/rs/','/rn/','/lm/','/lt/','/rm/','/mb/','/nf/','/ms/','/rc/','/rg/','/rt/','/nd/','/ns/','/nt/','/ng/','/mp/','/rp/','/pt/','/cn/','/cq/','/bb/','/cc/','/dd/','/ff/','/gg/','/ll/','/mm/','/nn/','/pp/','/qq/','/rr/','/ss/','/tt/','/vv/','/zz/');
	$replaces = array('p-s','t-m','r-f','l-p','l-z','l-v','r-v','r-d','r-l','n-z','n-c','r-c','r-s','r-n','l-m','l-t','r-m','m-b','n-f','m-s','r-c','r-g','r-t','n-d','n-s','n-t','n-g','m-p','r-p','p-t','c-n','c-q','b-b','c-c','d-d','f-f','g-g','l-l','m-m','n-n','p-p','q-q','r-r','s-s','t-t','v-v','z-z');
	$frase=preg_replace($patterns, $replaces, $frase);

	return $frase;
}










private function sei_bis($frase)
{
	$temp=$frase;

	$pattern = "/([a-zA-Z])([lnmr])([bcdfglmnpqrstvz])([aeiou])/";
	$replacement = '$1$2-$3$4';
	$temp = preg_replace($pattern, $replacement, $temp);

	$pattern = "/s-([ct])/";
	$replacement = 's$1';
	$temp = preg_replace($pattern, $replacement, $temp);

	return $temp;
}





private function sette($frase)
{
	$patterns=array('/rst/','/ntr/','/ltr/','/rtr/','/btr/');
	$replacements=array('r-st','n-tr','l-tr','r-tr','b-tr');
	return preg_replace($patterns, $replacements, $frase);
}





private function otto($frase)
{
	//AU-guri pIO-lo
	$pattern = "/([iuIU])([aeo])([bcdfghlmnpqrstvz])/";
	$replacement = '$1$2-$3';
	return preg_replace($patterns, $replacements, $frase);

	$pattern = "/([aeoAEO])([iu])([bcdfghlmnpqrstvz])/";
	$replacement = '$1$2-$3';
	return preg_replace($patterns, $replacements, $temp);

	return $temp;
}


private function nove($frase)
{
	//pa-olo cia-o
	$pattern = "/([aeoAEO])([aeoèéàòùì])/";
	$replacement = '$1-$2';
	$temp = preg_replace($pattern, $replacement, $frase);

	return $temp;
}




private function trittongo($frase)
{
	//trittongo
	$pattern = "/([aeoAEO])([iu])([aouieèéàòùì])/";
	$replacement = '$1-$2$3';
	$temp = preg_replace($pattern, $replacement, $frase);

	$pattern = "/([aeoiuAEIOU])([aouie])([iu])/";
	$replacement = '$1-$2$3';
	$temp = preg_replace($pattern, $replacement, $temp);

	return $temp;
}




private function trittongo_monosillabo($frase)
{
	//tritongo monosillabo
	$pattern = "/([ui])([-])([aeo])([iu])/";
	$replacement = '$1$3$4';
	$temp = preg_replace($pattern, $replacement, $frase);

	$pattern = "/([ui])([aeo])-([iu])/";
	$replacement = '$1$2$3';
	$temp = preg_replace($pattern, $replacement, $temp);

	$pattern = "/([ui])-([aeo])-([iu])/";
	$replacement = '$1$2-$3';
	$temp = preg_replace($pattern, $replacement, $temp);

	return $temp;
}





private function pref_rire($temp)
{
	//ri - avere  prefisso  esperimental
	$temp = preg_replace("/ ri([eauio])/", ' ri-$1', $temp);
	$temp = preg_replace("/ re([eauio])/", ' re-$1', $temp);
	return $temp;
}






private function tredici($frase)
{
/**************************************************************************
extra rulesssss
***************************************************************************/


$temp = $frase;

$patterns=array("/ap-p /","/-dia /","/o-pia/","/cau-/","/nie-nt/","/-rie/","/fi-si-o/","/pe-rio/","/sgu-a/","/chi-o/","/e-goi/","/cu-oi-/","/rue-n/","/laust/","/fil-m/","/ma-ria/","/tuo-r/","/e-di-a/","/ae-r/","/bien/","/ni-gm/","/mi-ei/","/ghia-nd/","/uio/","/uia/","/uie/","/gu-aio/","/ i-o /","/-i-o /","/duel/","/ci-a/","/n-gs/","/scu-o/","/n-tu-a/","/pau-ro/","/fei/","/spie /","/trol-l/","/tas-ma/","/-fia/","/a-i-ro/");
$replacements=array("app ","-di-a ","o-pi-a","ca-u-","nien-t","-ri-e","fi-sio","pe-ri-o","sgua","chio","e-go-i","cuo-i","ruen","la-u-st","film","ma-ri-a","tuor","e-dia","a-e-r","bi-en","nig-m","mi-e-i","ghian-d","u-io","u-ia","u-ie","gua-io"," io ","-io ","du-el","cia","ng-s","scuo","n-tua","pa-u-ro","fe-i","spi-e ","troll","ta-sma","-fi-a","ai-ro");
$temp = preg_replace($patterns, $replacements, $temp);
$temp = preg_replace("/([aeiuo])-zi-([oae])/", '$1-zi$2', $temp); //grazie
$temp = preg_replace("/gli-([oaeu])/", 'gli$1', $temp); //meglio
$temp = preg_replace("/([a-z])-([bcdgprlmnptvz])i-([oae])/", '$1-$2i$3', $temp); //maggio
$temp = preg_replace("/([bdflmprstvz])u([aeo])([^[a-z]{0,1})/",'$1u-$2$3', $temp); //due bue...
$temp = preg_replace("/sci-([aoeu])/", 'sci$1', $temp);
$temp = preg_replace("/stru-([aoeu])/", 'stru$1', $temp);
$temp = preg_replace("/dri([aeou])/", 'dri$1', $temp);
$temp = preg_replace("/([bs])u-o([a-z])/", '$1uo-$2', $temp);
$temp = preg_replace("/([bs])uo-n-([bcdfgstvz])/", '$1uon-$2', $temp);
$temp = preg_replace("/ui-([aoe])/", 'u-i$1', $temp);
//$temp = preg_replace("", '', $temp);
/*

doit(/([bdflmprstvz])([u])([-])([aeo])([a-z])/g,'$1$2$4-$5'); // suadente 11bis
doit(/([bdflmprstvz])([u])([-])([aeo])([-])/g,'$1$2$4-'); // suadente 11tris
doit(/([s])([p])([i])([ao])/g,'$1$2$3-$4'); // spiare 29
doit(/([v])([a])([-])([i])/g,'$1$2$4'); //  vai fai dai sai mai rai  31
doit(/([ ])([v])([i])([a])([-])([cdfglmnpqrstvzib])/g,'$1$2$3-$4-$6'); //  via 32
doit(/([n])([i])([e])([-])([n])([t])/g,'$1$2$3$5-$6'); //  niente 34
doit(/([p])([o])([-])([n])([d])([e])/g,'$1$2$4-$5$6'); //  corrispondenza 38
doit(/([s])([c])([h])([i])([-])([aeou])/g,'$1$2$3$4$6'); //  schianto 39
doit(/([t])([u])([i])([-])([t])([aeio])/g,'$1$2-$3-$5$6'); //  restituita 41
doit(/([ ])([a])([u])([s])([t])/g,'$1$2$3-$4$5'); //  australiano 46
doit(/([s])([t])([r])([i])([a])/g,'$1$2$3$4-$5'); //  austri-a-co 47

doit(/([ ])([z])([i])([e])/g,'$1$2$3-$4'); //  zie 51
doit(/([q])([u])([-])([i])([e])/g,'$1$2$4$5'); //  quiete 52
doit(/([s])([t])([i])([-])([t])([u])([i])/g,'$1$2$3$4$5$6-$7'); //  resti tu-i scimelo 53
doit(/([m])([a])([-])([gc])([i])([aeou])/g,'$1$2$3$4$5-$6'); //  farma ci-a 54
doit(/([ ])([c])([u])([i])/g,'$1$2$3-$4'); //  cui
doit(/([i])([n])([-])([n])([i])([iou])/g,'$1$2$3$4$5-$6'); //  tintinnio
doit(/([r])([i])([-])([e])([-])([s])/g,'$1$2$4$5$6'); //  riesce
doit(/([t])([o])([-])([p])([i])([a])/g,'$1$2$3$4$5-$6'); //  utopia
doit(/([d])([u])([e])([-])([tl])/g,'$1$2$3$5'); //  duello
doit(/([b])([u])([-])([g])([i])([ae])/g,'$1$2$3$4$5-$6'); //  bugia

doit(/([z])([-])([z])([i])([ae])/g,'$1$2$3$4-$5'); //  razzia
doit(/([m])([e])([-])([d])([i])([-])([aeo])/g,'$1$2$3$4$5$7'); //  mediano
doit(/([p])([i])([-])([oaei])/g,'$1$2$4'); //  pio
doit(/([i])([-])([s])([i])([aeou])/g,'$1$2$3$4-$5'); //  tunisia
doit(/([c])([a])([-])([u])([-])/g,'$1$2$4$5'); //  causa
doit(/([r])([i])([-])([u])([-])/g,'$1$2$4$5'); //  riunione
doit(/([s])([i])([-])([o])([-])([n])([ei])/g,'$1$2$4$5$6$7'); //  incisione
doit(/([a])([e])([-])([r])([e])([i])/g,'$1$2$3$4$5-$6');//aerei
doit(/([-])([v])([i])([oi])/g,'$1$2$3-$4');//rinvio
doit(/([p])([a])([u])([-])([r])([ae])/g,'$1$2-$3-$5$6');//paura
doit(/([t])([u])([a])([-])([n])([-])/g,'$1$2$3$5$6');//fluttuante
doit(/([g])([u])([a])([i])([o])/g,'$1$2$3-$4$5');//guaio
doit(/([i])([n])([-])([d])([i])([-])([a])/g,'$1$2$3$4$5$7');//guaio
doit(/([n])([-])([f])([i])([-])([a])/g,'$1$2$3$4$6');//gonfdividi_iati
doit(/([q])([u])([i])([e])([-])/g,'$1$2$3-$4$5');//quiete
doit(/([o])([-])([r])([i])([-])([aioe])/g,'$1$2$3$4$6');//memo -ria
doit(/([-])([d])([i])([-])([a])([-])/g,'$1$2$3$5$6');//india
doit(/([e])([-])([l])([e])([-])([o])/g,'$1$2$3$4$6');//eleonora
doit(/([e])([-])([r])([i])([aioe])/g,'$1$2$3$4-$5');//biglietteria
doit(/([f])([-])([f])([i])([-])([ao])/g,'$1$2$3$4$6');//soffia
*/


return $temp;   
}




function sillaba(){
  $frase = $this->spazio($this->frase);
  $frase = $this->dividi_doppie_consonanti($frase); //doppie
  //$frase = $this->dividi_prima_vocale($frase);

  $frase = $this->nove($frase);   //pa-olo cia-o
  $frase = $this->sei_bis($frase); // al-to pen-sa
  $frase = $this->due($frase); //ca-cao // bi-nocolo
  $frase = $this->sette($frase); //al-tro en-tro
  $frase = $this->dividi_prima_vocale($frase);   // a-tipico u-signolo
  $frase = $this->tre($frase);  //bra cri vre 
  $frase = $this->quattro($frase); // stra spre
  $frase = $this->dividi_iati($frase);
  $frase = $this->trittongo($frase);    // trittongo
  $frase = $this->trittongo_monosillabo($frase);  //trittongo monosillabo (not necessay)
  $frase = $this->pref_rire($frase);  //ri - avere  prefisso  esperimental
  $frase = $this->tredici($frase);  // extra
  
  $frase = preg_replace("/ /", "-", trim($frase));
  return $frase;
}



}//end of class
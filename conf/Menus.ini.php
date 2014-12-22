<?php

$menus['CRUDs']=array(
	'CRUD Actualité'=>"?module=CRUDActualite"
	);
	
$menus['Inscription']="?module=Inscription";

$cat=CatManager::lister();
$mesCat=array();
foreach($cat as $key=>$value){
	$mesCat[$value]="?module=AffichageArticles&num_cat=".$key;
	}

$menus['Articles']=$mesCat;
/*$menus['Exemples']=array(
	'SimpleTPL'=>"?module=SimpleTemplate",
	'Formulaire'=>"?module=Formulaire",
	'C.R.U.D'=>"?module=CRUD",	
	'Redirect'=>"?module=Redirect",
	'Download'=>"?module=DownloadFile",
	'Ajax'=>"?module=Ajax"
	);
$menus['Test']="?module=TestMembre";*/
?>
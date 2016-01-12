<?php

function site($name){

	clearstatcache($clear_realpath_cache = True);

	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $name);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$contents = curl_exec($ch);

	$pattern = "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/";

	$abd = preg_match_all($pattern , $contents, $array);

	echo "\nIl y a " . $abd . " image(s) dans le site : " . $name . "\n";


	curl_close($ch);
	return($array[1]);

}

function http($array, $name){
	$y = 0;
	while (isset($array[$y])){
		if (strstr($name, "http") == false){
			if (strstr($array[$y], "http") == false){
				$array[$y] = "http://" . $name . "/" . $array[$y];
			}
		}
		else {
			if (strstr($array[$y], "http") == false){
				$array[$y] = $name . "/" . $array[$y];
			}
		}
		$y++;
}

	return($array);
}

function create_panel_g($array, $noms){
$tre = 0;
while ($tre < count($array)){
	$image = $array[$tre];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
if ($image == false){
	 $array[$tre] = false;
}
$tre++;
}
$image = 0;
$kpo = 1;
$fond = imagecreatetruecolor(1080, 1080);
$bg = imagecolorallocate($fond, 0xFF, 0xFF, 0xFF);
$nbr = count($array);
$nbr_image_max = 16;
$n_meta = ceil($nbr / $nbr_image_max);
$nbr_image_by_meta = ceil($nbr / $n_meta);
$nbraplus = $nbr_image_by_meta;
$racine = sqrt($nbraplus);
while (preg_match('/\./', $racine)){
	$nbraplus++;
	$racine = sqrt($nbraplus);
}
$coter = sqrt((1080 * 1080) / $nbraplus); //fond/image a revoir tout remplire
$i = 0;
$opgg = 0;
$lolp = 0;
$uop = 0;
while ($i < count($array)){
	if ($array[$i] != false){
$lolp = $coter * $uop;
$uop++;
$image = $array[$i];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
else {
$lolp = $coter * $uop;
$uop++;
$image = imagecreatefrompng("http://image.noelshack.com/fichiers/2016/01/1452072025-imagefondff.png");
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
if (ceil(($i / $kpo)) == ($nbraplus - ($nbraplus - $nbr_image_by_meta))){ // cree image meta de 1 a max meta
	echo "new image \n";
imagegif($fond, $noms . "_" . $kpo . ".gif");
$lolp = 0;
$opgg = 0;
$uop = 0;
imagedestroy($image);
$fond = imagecreatetruecolor(1080, 1080);
$kpo++;
}
$i++;
}
	echo "new image \n";
imagegif($fond, $noms . "_" . $kpo . ".gif");
}

function create_panel_j($array, $noms){
$tre = 0;
while ($tre < count($array)){
	$image = $array[$tre];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
if ($image == false){
	 $array[$tre] = false;
}
$tre++;
}
$image = 0;
$kpo = 1;
$fond = imagecreatetruecolor(1080, 1080);
$bg = imagecolorallocate($fond, 0xFF, 0xFF, 0xFF);
$nbr = count($array);
$nbr_image_max = 16;
$n_meta = ceil($nbr / $nbr_image_max);
$nbr_image_by_meta = ceil($nbr / $n_meta);
$nbraplus = $nbr_image_by_meta;
$racine = sqrt($nbraplus);
while (preg_match('/\./', $racine)){
	$nbraplus++;
	$racine = sqrt($nbraplus);
}
$coter = sqrt((1080 * 1080) / $nbraplus); //fond/image a revoir tout remplire
$i = 0;
$opgg = 0;
$lolp = 0;
$uop = 0;
while ($i < count($array)){
	if ($array[$i] != false){
$lolp = $coter * $uop;
$uop++;
$image = $array[$i];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
else {
$lolp = $coter * $uop;
$uop++;
$image = imagecreatefrompng("http://image.noelshack.com/fichiers/2016/01/1452072025-imagefondff.png");
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
if (ceil(($i / $kpo)) == ($nbraplus - ($nbraplus - $nbr_image_by_meta))){ // cree image meta de 1 a max meta
	echo "new image \n";
imagejpeg($fond, $noms . "_" . $kpo . ".jpg");
$lolp = 0;
$opgg = 0;
$uop = 0;
imagedestroy($image);
$fond = imagecreatetruecolor(1080, 1080);
$kpo++;
}
$i++;
}
	echo "new image \n";
imagejpeg($fond, $noms . "_" . $kpo . ".jpg");
}

function create_panel($array, $noms){
$tre = 0;
while ($tre < count($array)){
	$image = $array[$tre];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
if ($image == false){
	 $array[$tre] = false;
}
$tre++;
}
$image = 0;
$kpo = 1;
$fond = imagecreatetruecolor(1080, 1080);
$bg = imagecolorallocate($fond, 0xFF, 0xFF, 0xFF);
$nbr = count($array);
$nbr_image_max = 16;
$n_meta = ceil($nbr / $nbr_image_max);
$nbr_image_by_meta = ceil($nbr / $n_meta);
$nbraplus = $nbr_image_by_meta;
$racine = sqrt($nbraplus);
while (preg_match('/\./', $racine)){
	$nbraplus++;
	$racine = sqrt($nbraplus);
}
$coter = sqrt((1080 * 1080) / $nbraplus); //fond/image a revoir tout remplire
$i = 0;
$opgg = 0;
$lolp = 0;
$uop = 0;
while ($i < count($array)){
	if ($array[$i] != false){
$lolp = $coter * $uop;
$uop++;
$image = $array[$i];
if (exif_imagetype($image) == 2){
$image = imagecreatefromjpeg($image);
}
elseif (exif_imagetype($image) == 1){
$image = imagecreatefromgif($image);
}
elseif (exif_imagetype($image) == 3){
$image = imagecreatefrompng($image);
}
else {
$image = imagecreatefrompng($image);
}
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
else {
$lolp = $coter * $uop;
$uop++;
$image = imagecreatefrompng("http://image.noelshack.com/fichiers/2016/01/1452072025-imagefondff.png");
$hauteur_image = imagesy($image);
$largeur_image = imagesx($image);
if ($hauteur_image > $largeur_image) 
{   
$ratio = $coter / $hauteur_image;  
$new_hauteur = $coter;
$new_largeur = $largeur_image * $ratio; 
}
else 
{
$ratio = $coter / $largeur_image;   
$new_largeur = $coter;  
$new_hauteur = $hauteur_image * $ratio;   
}
if ($lolp == 1080){
$uop = 1;
$lolp = 0;
$opgg = $opgg + $coter;
}
imagetruecolortopalette($image, true, 255);
imagecopyresized($fond, $image, $lolp, $opgg, 0, 0, $new_largeur, $new_hauteur, $largeur_image, $hauteur_image);
}
if (ceil(($i / $kpo)) == ($nbraplus - ($nbraplus - $nbr_image_by_meta))){ // cree image meta de 1 a max meta
	echo "new image \n";
imagepng($fond, $noms . "_" . $kpo . ".png");
$lolp = 0;
$opgg = 0;
$uop = 0;
imagedestroy($image);
$fond = imagecreatetruecolor(1080, 1080);
$kpo++;
}
$i++;
}
	echo "new image \n";
imagepng($fond, $noms . "_" . $kpo . ".png");
}
error_reporting(0);
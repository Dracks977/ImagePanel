<?php
require('func.php');

// plusieur option a faire exe: -p -j -h 


$ytrez = 0;
if (isset($argv[1]) AND preg_match('/^-[a-zA-Z]*/', $argv[1]) == 1){ //si option
	$i = 2;
	if (isset($argv[2]) AND isset($argv[3]) AND preg_match('/^[a-zA-Z0-9_]*$/', $argv[$argc - 1]) == 1){
			//preg lien ici
		while (isset($argv[$i]) AND $argv[$i] != $argv[$argc - 1]){
			if(!file_exists($argv[$i])) {
				$break = 0;
				$array = site($argv[$i]);
				
				if ($argv[1][1] === 'p' || $argv[1][2] === 'p' || $argv[1][3]  === 'p' 
				|| $argv[1][4] === 'p' || $argv[1][5] === 'p' || $argv[1][6]  === 'p'){
				create_panel(http($array, $argv[$i]), $argv[$argc - 1] . $ytrez);
				$break = 1;
				}
				if ($argv[1][1] === 'j' || $argv[1][2] === 'j' || $argv[1][3]  === 'j' 
				|| $argv[1][4] === 'j' || $argv[1][5] === 'j' || $argv[1][6]  === 'j'){
					create_panel_j(http($array, $argv[$i]), $argv[$argc - 1] . $ytrez);
					$break = 1;
				}
				if ($argv[1][1] === 'g' || $argv[1][2] === 'g' || $argv[1][3]  === 'g' 
				|| $argv[1][4] === 'g' || $argv[1][5] === 'g' || $argv[1][6]  === 'g'){
					create_panel_g(http($array, $argv[$i]), $argv[$argc - 1] . $ytrez);
					$break = 1;
				}
				if ($break == 0){
					create_panel(http($array, $argv[$i]), $argv[$argc - 1] . $ytrez);
				}
				

				//fonction avec option 
			} 
			else {
				if ($argv[1][1] == 'p' || $argv[1][2] == 'p' || $argv[1][3]  == 'p' 
				|| $argv[1][4] == 'p' || $argv[1][5] == 'p' || $argv[1][6]  == 'p'){
				create_panel(site($argv[$i]), $argv[$argc - 1] . $ytrez);
				$break = 1;
				}

				if ($argv[1][1] == 'j' || $argv[1][2] == 'j' || $argv[1][3]  == 'j' 
				|| $argv[1][4] == 'j' || $argv[1][5] == 'j' || $argv[1][6]  == 'j'){
					create_panel_j(site($argv[$i]), $argv[$argc - 1] . $ytrez);
					$break = 1;
				}

				if ($argv[1][1] == 'g' || $argv[1][2] == 'g' || $argv[1][3]  == 'g' 
				|| $argv[1][4] == 'g' || $argv[1][5] == 'g' || $argv[1][6]  == 'g'){
					create_panel_g(site($argv[$i]), $argv[$argc - 1] . $ytrez);
					$break = 1;
				}
				if ($break == 0){
					create_panel(http($array, $argv[$i]), $argv[$argc - 1] . $ytrez);
				}

				//fonction avec option 
			}
			$i++;
			$ytrez++;
		}
		echo "\n";
	}
	else {
		echo "\nil faut au moins un lien et le nom de l'image de sortie\n" . "imagepanel.php [-option] (lien1) (lien2) (...) (Nom image de sortie) \n\n";
	}
}
else if (isset($argv[1])){	//si lien
	if (isset($argv[2]) AND preg_match('/^[a-zA-Z0-9_]*$/', $argv[$argc - 1]) == 1){
		$i = 1;
		//preg lien ici
		while (isset($argv[$i]) AND $argv[$i] != $argv[$argc - 1]){
			
			if(!file_exists($argv[$i])) {
				$array = site($argv[$i]);
				create_panel(http($array, $argv[$i]), $argv[$argc - 1] . $i); // a faire si pas en local condition
				//fonction avec option 
			} 
			else {
				//site($argv[$i]);
				create_panel(site($argv[$i]), $argv[$argc - 1] . $i);
				//fonction avec option 
			}

			$i++;
		}
	}
	else{
		echo "\nil faut le nom de l'image de sortie\n" . "imagepanel.php [-option] (lien1) (lien2) (...) (Nom image de sortie) \n\n";
	}
}
else{  //si rien
	echo "\nPas d'argument : imagepanel.php [-option] (lien1) (lien2) (...) (Nom image de sortie) \n\n";
}
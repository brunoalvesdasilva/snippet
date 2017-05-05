<?php
/**
 * Função que interpreta "variáveis" em um texto e replica
 * em todo o restante do texto
 */
function e($text, $return=false) {
	
	// Get all variables
	preg_match_all('|::([a-zA-Z_][a-zA-Z_0-9]+) = ([^\n]+)|', $text, $allVar);
	
	krsort($allVar[1], SORT_STRING);
	
	foreach ($allVar[1] as $ind => $var) {
		$text = str_replace($allVar[0][$ind], '', $text);
		$text = str_replace("::$var", $allVar[2][$ind], $text);
	}
	
	if ($return)
		return $text;
	
	echo $text;
}

$text 	= '
::idade = 26
::cidade = Santos
::nome = Bruno Alves

Olá ::nome sua idade é ::idade anos da cidade de ::cidade
';
e($text);

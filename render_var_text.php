<?php
/**
 * Função que pega um string e renderiza as variáveis do ambiente.
 * @author: Bruno Alves da Silva
 * @created: 05/05/2017
 */
function e($text, $return=false) {
	
	preg_match_all('|:([a-zA-Z_][a-zA-Z_0-9]+)|', $text, $all);
	
	krsort($all[1], SORT_STRING);
	
	foreach ($all[1] as $ind => $var) {
		global ${$var};
		$text = str_replace($all[0][$ind], ${$var}, $text);
	}
	
	if ($return)
		return $text;
	
	echo $text;
}


$cidade = 'Santos';
$nome 	= 'Bruno Alves';
$idade 	= 26;
$text 	= 'Olá :nome sua idade é :idade anos da cidade de :cidade';
e($text);

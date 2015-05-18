<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/
	"please_fix"		   => "Vă rugăm să adresați următoarele erori:",
	"accepted"             => "Câmpul :attribute trebuie să fie acceptat.",
	"active_url"           => "Câmpul :attribute nu este un URL valid.",
	"after"                => "Câmpul :attribute trebuie să fie o dată după :date.",
	"alpha"                => "Câmpul :attribute poate conține doar litere.",
	"alpha_dash"           => "Câmpul :attribute poate conține doar litere, cifre și cratimă.",
	"alpha_num"            => "Câmpul :attribute poate conține doar litere și cifre.",
	"array"                => "Câmpul :attribute trebuie să fie o matrice.",
	"before"               => "Câmpul :attribute trebuie să fie o dată înainte de :date.",
	"between"              => [
		"numeric" => "Câmpul :attribute trebuie să fie între :min și :max.",
		"file"    => "Câmpul :attribute trebuie să fie între :min și :max kilobiți.",
		"string"  => "Câmpul :attribute trebuie să fie între :min și :max caractere.",
		"array"   => "Câmpul :attribute trebuie să aibă între :min și :max intrări.",
	],
	"boolean"              => "Câmpul :attribute trebuie să fie adevărat sau fals.",
	"confirmed"            => "Câmpul de confirmare :attribute nu este identic.",
	"date"                 => "Câmpul :attribute nu conține o dată validă.",
	"date_format"          => "Câmpul :attribute nu respectă formatul :format.",
	"different"            => "Câmpurile :attribute și :other trebuie să fie diferite.",
	"digits"               => "Câmpul :attribute trebuie să aibă :digits cifre.",
	"digits_between"       => "Câmpul :attribute trebuie să aibă între :min și :max cifre.",
	"email"                => "Câmpul :attribute trebuie să fie o adresă de email validă.",
	"filled"               => "Câmpul :attribute este obligatoriu.",
	"exists"               => "Valoarea aceasta pentru :attribute există deja.",
	"image"                => "Câmpul :attribute trebuie să conțină o imagine.",
	"in"                   => "Valoare din câmpul :attribute nu este validă.",
	"integer"              => "Câmpul :attribute trebuie să fie un număr întreg.",
	"ip"                   => "Câmpul :attribute trebuie să fie o adresă IP validă.",
	"max"                  => [
		"numeric" => "Câmpul :attribute nu poate fi mai mare de :max.",
		"file"    => "Câmpul :attribute nu poate fi mai mare de :max kilobiți.",
		"string"  => "Câmpul :attribute nu poate fi mai mare de :max caractere.",
		"array"   => "Câmpul :attribute nu poate avea mai mult de :max intrări.",
	],
	"mimes"                => "Câmpul :attribute trebuie să aibă un fișier de tipul: :values.",
	"min"                  => [
		"numeric" => "Câmpul :attribute trebuie să fie mai mare de :min.",
		"file"    => "Câmpul :attribute trebuie să fie mai mare de :min kilobiți.",
		"string"  => "Câmpul :attribute trebuie să fie mai mare de :min caractere.",
		"array"   => "Câmpul :attribute trebuie să aibă cel puțin :min intrări.",
	],
	"not_in"               => "Valoarea aleasă pentru :attribute este incorectă.",
	"numeric"              => "Câmpul :attribute trebuie să fie un număr.",
	"regex"                => "Câmpul :attribute nu respectă formatul obligatoriu.",
	"required"             => "Câmpul :attribute este obligatoriu.",
	"required_if"          => "Câmpul :attribute este obligatoriu când :other este :value.",
	"required_with"        => "Câmpul :attribute este obligatoriu când :values este prezent.",
	"required_with_all"    => "Câmpul :attribute este obligatoriu când :values este prezent.",
	"required_without"     => "Câmpul :attribute este obligatoriu când :values nu este prezent.",
	"required_without_all" => "Câmpul :attribute este obligatoriu când nu există nicio valoare pentru :values.",
	"same"                 => "Câmpurile :attribute și :other trebuie să fie identice.",
	"size"                 => [
		"numeric" => "Câmpul :attribute trebuie să aibă fix :size.",
		"file"    => "Câmpul :attribute trebuie să aibă fix :size kilobiți.",
		"string"  => "Câmpul :attribute trebuie să aibă fix :size caractere.",
		"array"   => "Câmpul :attribute trebuie să conțină fix :size intrări.",
	],
	"unique"               => "Valoarea pentru câmpul :attribute este deja folosită.",
	"url"                  => "Câmpul :attribute nu este un URL valid.",
	"timezone"             => "Câmpul :attribute trebuie să fie un fus orar valid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];

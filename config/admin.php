<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Admin menu
	|--------------------------------------------------------------------------
	|
	| Define the menu for the admin panel.
	| For now, it supports two levels:
	|
	| Level 1. Links
	| 	[
	|		'label' => "Dashboard",
	|		'url' => url('admin/dashboard'),
	|		'icon' => 'fa fa-dashboard',
	|	],
	|
	| Level 2. Dropdowns
	|	[
	|		'label' => "CRUD",
	|		'url' => url(),
	|		'icon' => 'fa fa-table',
	|		'children' => [
	|						[
	|							'label' => "Articles",
	|							'url' => url('admin/article'),
	|							'icon' => 'fa fa-file',
	|						],
	|					]
	|	]
	|
	*/

	'menu' => [
		[
			'label' => "Dashboard",
			'url' => url('admin/dashboard'),
			'icon' => 'fa fa-dashboard',
		],

		[
			'label' => "CRUD",
			'url' => url(),
			'icon' => 'fa fa-table',
			'children' => [
							[
								'label' => "Articles",
								'url' => url('admin/article'),
								'icon' => 'fa fa-file',
							],
						]
		]
	],

];

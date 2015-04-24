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
	|		'route' => 'admin/dashboard', 	or 		'url' => "http://google.com"
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
			'route' => "admin/dashboard",
			// 'url' => null,
			'icon' => 'fa fa-dashboard',
		],

		[
			'label' => "CRUD",
			'route' => "",
			// 'url' => null,
			'icon' => 'fa fa-table',
			'children' => [
							[
								'label' => "Articles",
								'route' => 'admin/article',
								'icon' => 'fa fa-file',
							],
							[
								'label' => "Categories",
								'route' => 'admin/category',
								'icon' => 'fa fa-list',
							],
						]
		]
	],

];

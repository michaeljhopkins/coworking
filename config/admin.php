<?php

return [

	// PROJECT NAME
	//
	// Used in the menu & other places.
	// With this changed, there will be no trace of the word "Dick" in the admin interface.
	'project_name' => 'Dick',

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
			'route' => "admin",
			// 'url' => null,
			'icon' => 'fa fa-dashboard',
		],

		[
			'label' => "Authentication",
			'route' => "",
			// 'url' => null,
			'icon' => 'fa fa-group',
			'children' => [
							[
								'label' => "Users",
								'route' => 'admin/user',
								'icon' => 'fa fa-user',
							],
							[
								'label' => "Roles",
								'route' => 'admin/role',
								'icon' => 'fa fa-folder-open-o',
							],
							[
								'label' => "Permissions",
								'route' => 'admin/permission',
								'icon' => 'fa fa-key',
							]
						]
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
							[
								'label' => "Tags",
								'route' => 'admin/tag',
								'icon' => 'fa fa-tag',
							],
						]
		],

		[
			'label' => "Advanced",
			'route' => "",
			// 'url' => null,
			'icon' => 'fa fa-wrench',
			'children' => [
							[
								'label' => "File manager",
								'route' => 'admin/elfinder',
								'icon' => 'fa fa-files-o',
							],
							[
								'label' => "Backups",
								'route' => 'admin/backup',
								'icon' => 'fa fa-hdd-o',
							],
							[
								'label' => "Logs",
								'route' => 'admin/log',
								'icon' => 'fa fa-terminal',
							],
						]
		]
	],

];

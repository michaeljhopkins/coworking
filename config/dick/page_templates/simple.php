<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Dick\PageManager template
	|--------------------------------------------------------------------------
	|
	| All of these variables will be passed in the Controller to the $crud variable.
	|
	| Author: Cristian Tabacitu (hello@tabacitu.ro)
	|
	*/

	'template_name' => 'Simple page',

	// -------------------------------------------------------------------------

	// what's the namespace for your entity's model
    "model" => "App\Models\Page",
    // what name will show up on the buttons, in singural (ex: Add entity)
    "entity_name" => "page",
    // what name will show up on the buttons, in plural (ex: Delete 5 entities)
    "entity_name_plural" => "pages",
    // what route have you defined for your entity? used for links.
    "route" => "admin/page",

    // *****
    // COLUMNS
    // *****
    //
    // Define the columns for the table view as an array:
    //
    "columns" => [
                        [
                            'name' => 'name',
                            'label' => "Page name"
                        ],
                ],

    // *****
    // UPDATE FIELDS
    // *****
    //
    // Define the fields for the "Edit item" and "Add item" views as an array:
    //
    "fields" => [
                            [
                                'name' => 'name',
                                'label' => 'Name',
                                'type' => 'text'
                            ],
                            [
                                'name' => 'content',
                                'label' => 'Content',
                                'type' => 'wysiwyg',
                                'placeholder' => 'Your content here'
                            ],
                ],

];

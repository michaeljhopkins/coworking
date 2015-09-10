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

	'template_name' => 'Services',

	// -------------------------------------------------------------------------

    // *****
    // CREATE / UPDATE FIELDS
    // *****
    //
    // Define the fields for the "Edit item" and "Add item" views as an array:
    //
    "fields" => [

                    [
                        'name' => 'meta_title',
                        'label' => "Meta Title",
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'meta_description',
                        'label' => "Meta Description",
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'meta_keywords',
                        'label' => "Meta Keywords",
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
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
                    [
                        'name' => 'service_1_title',
                        'label' => "Service 1 title",
                        'type' => 'text',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_1_text',
                        'label' => "Service 1 text",
                        'type' => 'textarea',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_2_title',
                        'label' => "Service 2 title",
                        'type' => 'text',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_2_text',
                        'label' => "Service 2 text",
                        'type' => 'textarea',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_3_title',
                        'label' => "Service 3 title",
                        'type' => 'text',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_3_text',
                        'label' => "Service 3 text",
                        'type' => 'textarea',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_4_title',
                        'label' => "Service 4 title",
                        'type' => 'text',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],
                    [
                        'name' => 'service_4_text',
                        'label' => "Service 4 text",
                        'type' => 'textarea',
                        'fake' => true,
                        'store_in' => 'extras'
                    ],

                ],

];

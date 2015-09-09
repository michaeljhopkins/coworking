<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dick\CRUD\Http\Controllers\CrudController;
use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PageRequest as StoreRequest;
use App\Http\Requests\PageRequest as UpdateRequest;

class PageCrudController extends CrudController {

    public $crud = array(
                        // what's the namespace for your entity's model
                        "model" => "App\Models\Page",
                        // what name will show up on the buttons, in singural (ex: Add entity)
                        "entity_name" => "page",
                        // what name will show up on the buttons, in plural (ex: Delete 5 entities)
                        "entity_name_plural" => "pages",
                        // what route have you defined for your entity? used for links.
                        "route" => "admin/page",
                        "details_row" => true,

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
                                            [
                                                'name' => 'slug',
                                                'label' => "Slug"
                                            ],
                                    ],

                        // *****
                        // FIELDS
                        // *****
                        //
                        // Define the fields for the "Edit item" and "Add item" views as an array:
                        //
                        "fields" => [
                                                [
                                                    'name' => 'template',
                                                    'label' => "Template",
                                                    'type' => 'select_template',
                                                    'options' => [], // populated automatically in the useTemplate method
                                                    'allows_null' => false
                                                ],
                                                [
                                                    'name' => 'slug',
                                                    'label' => "Slug",
                                                    'type' => 'text',
                                                    // 'disabled' => 'disabled'
                                                ],
                                    ],

                        );


    // Overwrites the CrudController create() method to add template usage.
    public function create($template = false)
    {
        $this->useTemplate($template);

        return parent::create();
    }


    // Overwrites the CrudController store() method to add template usage.
    public function store(StoreRequest $request)
    {
        $this->useTemplate(\Request::input('template'));
        return parent::storeCrud();
    }


    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id, $template = false)
    {
        // use the template in the GET parameter if it exists
        if ($template) {
            $this->useTemplate($template);
        }
        // otherwise use the template value stored in the database
        else
        {
            $model = $this->crud['model'];
            $this->data['entry'] = $model::findOrFail($id);
            $this->useTemplate($this->data['entry']->template);
        }

        return parent::edit($id);
    }


    // Overwrites the CrudController update() method to add template usage.
    public function update(UpdateRequest $request)
    {
        $this->useTemplate(\Request::input('template'));
        return parent::updateCrud();
    }


    // -----------------------------------------------
    // Methods that are particular to the PageManager.
    // -----------------------------------------------


    private function getTemplates()
    {
        // get the files from config/dick/page_templates
        $template_files = \Storage::disk('config')->files('dick/page_templates');

        if (!count($template_files))
        {
            abort('403', 'Template files are missing.');
        }

        $templates = [];

        foreach ($template_files as $k => $template_file) {
            // get the file name
            $file_name = str_replace('.php', '', last(explode('/', $template_file)));
            // get the pretty template name
            $templates[$file_name] = config('dick.page_templates.'.$file_name.'.template_name');
        }

        return $templates;
    }

    private function useTemplate($file_name = false) {
        if (!$file_name) {
            $file_name = array_keys($this->getTemplates())[0];
        }

        // merge the fields defined above and the ones set in the template file
        $this->crud['fields'] = array_merge($this->crud['fields'], config('dick.page_templates.'.$file_name.'.fields'));

        // set the possible options for the "templates" field and select the default value
        foreach ($this->crud['fields'] as $key => $field) {
            if ($field['name'] == 'template') {
                $this->crud['fields'][$key]['value'] = $file_name;
                $this->crud['fields'][$key]['options'] = $this->getTemplates();
            }
        }
    }
}

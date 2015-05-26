<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\LangFiles;
use App\Models\Language;

use Illuminate\Http\Request;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LanguageRequest as StoreRequest;
use App\Http\Requests\LanguageRequest as UpdateRequest;

class LanguageCrudController extends CrudController {

	public $crud = array(
						"model" => "App\Models\Language",
						"entity_name" => "language",
						"entity_name_plural" => "languages",
						"route" => "admin/language",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'name',
												'label' => "Language name"
											],
											[
												'name' => 'active',
												'label' => "Active",
												'type' => "boolean"
											],
											[
												'name' => 'default',
												'label' => "Default",
												'type' => "boolean"
											]
									],
						"fields" => [
										[
											'name' => 'name',
											'label' => 'Language Name',
											'type' => 'text',
										],
										[
											'name' => 'abbr',
											'label' => 'Code (ISO 639-1)',
											'type' => 'text',
										],
										[
											'name' => 'flag',
											'label' => 'Flag image',
											'type' => 'browse'
										],
										[
											'name' => 'active',
											'label' => 'Active',
											'type' => 'checkbox',
										],
										[
											'name' => 'default',
											'label' => 'Default',
											'type' => 'checkbox',
										],
									],

						);

	public function store(StoreRequest $request)
	{
		return parent::store_crud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::update_crud();
	}

	public function showTexts(LangFiles $langfile, Language $languages, $lang = '', $file = 'log'){
		if($lang){
			$langfile->setLanguage($lang);
		}

		$langfile->setFile($file);

		$this->data['currentFile'] = $file;
		$this->data['currentLang'] = $lang ?: config('app.locale');
		$this->data['languages'] = $languages->orderBy('name')->get();
		$this->data['langFiles'] = $langfile->getlangFiles();
		$this->data['fileArray'] = $langfile->getFileContent();
		$this->data['langfile'] = $langfile;

		return view('crud.language.translations', $this->data);
	}

	public function updateTexts(LangFiles $langfile, Request $request, $lang = '', $file = 'site'){
		$message = trans('error.error_general');
		$status = false;

		if($lang){
			$langfile->setLanguage($lang);
		}

		$langfile->setFile($file);

		$fields = $langfile->testFields($request->all());
		if (empty($fields)) {
			if ($langfile->setFileContent($request->all())) {
				\Alert::success("Saved")->flash();
				$status = true;
			}
		} else {
			$message = trans('admin.language.fields_required');
			\Alert::error("Please fill all fields")->flash();
		}

		return redirect()->back();
	}
}

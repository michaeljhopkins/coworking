<!-- CKeditor -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <textarea
    	class="form-control ckeditor"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach

    	>{{ (isset($field['value']))?$field['value']:'' }}</textarea>
  </div>
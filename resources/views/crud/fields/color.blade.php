<!-- html5 color input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
    	type="color"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>
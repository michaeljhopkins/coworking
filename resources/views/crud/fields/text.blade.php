<!-- text input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
    	type="text"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>
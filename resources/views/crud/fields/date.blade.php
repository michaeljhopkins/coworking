<!-- html5 date input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
    	type="date"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>
<!-- html5 datetime input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
    	type="datetime-local"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>
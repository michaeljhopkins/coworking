<!-- text input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
    	type="email"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>
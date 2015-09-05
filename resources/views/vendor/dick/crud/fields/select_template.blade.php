<!-- Select template field. Used in Dick/PageManager to redirect to a form with different fields if the template changes. A fork of the select_from_array field with an extra ID and an extra javascript file. -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <select
    	class="form-control"
        id="select_template"

    	@foreach ($field as $attribute => $value)
            @if (!is_array($value))
    		{{ $attribute }}="{{ $value }}"
            @endif
    	@endforeach
    	>

        @if (isset($field['allows_null']) && $field['allows_null']==true)
            <option value="">-</option>
        @endif

	    	@if (count($field['options']))
	    		@foreach ($field['options'] as $key => $value)
	    			<option value="{{ $key }}"
						@if (isset($field['value']) && $key==$field['value'])
							 selected
						@endif
	    			>{{ $value }}</option>
	    		@endforeach
	    	@endif
	</select>
  </div>


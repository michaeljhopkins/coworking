<!-- enum -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <?php $entity_model = $crud['model']; ?>
    <select
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
    	<option value="">-</option>

	    	@if (!empty($entity_model::getPossibleEnumValues($field['name'])))
	    		@foreach ($entity_model::getPossibleEnumValues($field['name']) as $possible_value)
	    			<option value="{{ $possible_value }}"
						@if (isset($field['value']) && $field['value']==$possible_value)
							 selected
						@endif
	    			>{{ $possible_value }}</option>
	    		@endforeach
	    	@endif
	</select>
  </div>
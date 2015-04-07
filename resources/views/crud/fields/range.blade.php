<!-- html5 range input -->
  <div class="form-group">
    <label>{{ $field['title'] }}</label>
    <input
        type="range"
        class="form-control"

        @foreach ($field as $attribute => $value)
            {{ $attribute }}="{{ $value }}"
        @endforeach
        >
  </div>
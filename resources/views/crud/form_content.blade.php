<form role="form">
  @foreach ($crud['fields'] as $field)
    @include('crud.fields.'.$field['type'], array('field' => $field))
  @endforeach
</form>
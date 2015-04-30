@extends('app')

@section('head')
	<!-- DATA TABLES -->
    <link href="{{ asset('AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content-header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">{{ $crud['entity_name_plural'] }}</span>
	    <small>All <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span> in the database.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">List</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
		<a href="{{ url($crud['route'].'/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add <span class="text-lowercase">{{ $crud['entity_name'] }}</span></a>
    </div>
    <div class="box-body">

		<table id="crudTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        {{-- Table columns --}}
                        @foreach ($crud['columns'] as $column)
                          <th>{{ $column['title'] }}</th>
                        @endforeach

                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($entries as $k => $entry)
                      <tr>
                        @foreach ($crud['columns'] as $column)
                          @if (isset($column['relation']) && $column['relation']=='1-n')
                            {{-- 1-n relationship --}}
                            <td>{{ $entry->{$column['entity']}()->first()->{$column['attribute']} }}</td>
                          @else
                            {{-- regular object attribute --}}
                            <td>{{ str_limit(strip_tags($entry->$column['name']), 80, "[...]") }}</td>
                          @endif

                        @endforeach
                        <td>
                          <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> Preview</a>
                          <a href="{{ Request::url().'/'.$entry->id }}/edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        {{-- Table columns --}}
                        @foreach ($crud['columns'] as $column)
                          <th>{{ $column['title'] }}</th>
                        @endforeach

                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
@endsection

@section('scripts')
	<!-- DATA TABES SCRIPT -->
    <script src="{{ url('AdminLTE/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ url('AdminLTE/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
	  jQuery(document).ready(function($) {
	  	$("#crudTable").dataTable();

      $.ajaxPrefilter(function(options, originalOptions, xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-XSRF-TOKEN', token);
          }
    });

      // CRUD Delete
      // ask for confirmation before deleting an item
      $("[data-button-type=delete]").click(function(e) {
        e.preventDefault();
        var delete_button = $(this);
        var delete_url = $(this).attr('href');

        if (confirm("Are you sure you want to delete this item?") == true) {
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                success: function(result) {
                    // Show an alert with the result
                    new PNotify({
                        title: 'Item Deleted',
                        text: 'The item has been deleted successfully.',
                        type: 'success'
                    });
                    // delete the row from the table
                    delete_button.parentsUntil('tr').parent().remove();
                },
                error: function(result) {
                    // Show an alert with the result
                    new PNotify({
                        title: 'NOT deleted',
                        text: "There's been an error. Your item might not have been deleted.",
                        type: 'warning'
                    });
                }
            });
        } else {
            new PNotify({
                title: 'Not deleted',
                text: 'Nothing happened. Your item is safe.',
                type: 'info'
            });
        }
      });
	  });
	</script>
@endsection

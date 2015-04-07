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
	    <li><a href="{{ url('admin/article') }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">List</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
		<a href="{{ url('admin/article/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add <span class="text-lowercase">{{ $crud['entity_name'] }}</span></a>
    </div>
    <div class="box-body">

		<table id="example1" class="table table-bordered table-striped">
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
                          <td>{{ $entry->$column['name'] }}</td>
                        @endforeach
                        <td>
                          <a href="{{ Request::url().'/'.$entry->id }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> Preview</a>
                          <a href="{{ Request::url().'/'.$entry->id }}/edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{ Request::url().'/'.$entry->id }}/delete" class="btn btn-xs btn-default"><i class="fa fa-trash"></i> Delete</a>
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
	  	$("#example1").dataTable();
	  });
	</script>
@endsection

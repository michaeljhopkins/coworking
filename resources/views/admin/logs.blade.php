@extends('admin.layout')

@section('content-header')
	<section class="content-header">
	  <h1>
	    {{ trans('log.logs') }}
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li class="active">{{ trans('log.logs') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-body">
      <table class="table table-hover table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ trans('log.date') }}</th>
            <th>{{ trans('log.last_modified') }}</th>
            <th class="text-right">{{ trans('log.file_size') }}</th>
            <th>{{ trans('log.actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($logs as $k => $log)
          <tr>
            <th scope="row">{{ $k+1 }}</th>
            <td>{{ Carbon::createFromTimeStamp($log['last_modified'])->formatLocalized('%d %B %Y') }}</td>
            <td>{{ Carbon::createFromTimeStamp($log['last_modified'])->formatLocalized('%H:%M') }}</td>
            <td class="text-right">{{ round((int)$log['file_size']/1048576, 2).' MB' }}</td>
            <td>
              @if (\Entrust::can('preview-logs'))
                <a class="btn btn-xs btn-default" href="{{ url('admin/log/preview/'.$log['file_name']) }}"><i class="fa fa-eye"></i> {{ trans('log.preview') }}</a>
              @endif
              @if (\Entrust::can('download-logs'))
                <a class="btn btn-xs btn-default" href="{{ url('admin/log/download/'.$log['file_name']) }}"><i class="fa fa-cloud-download"></i> {{ trans('log.download') }}</a>
              @endif
              @if (\Entrust::can('delete-logs'))
                <a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ url('admin/log/delete/'.$log['file_name']) }}"><i class="fa fa-trash-o"></i> {{ trans('log.delete') }}</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@endsection

@section('scripts')
<script>
  jQuery(document).ready(function($) {

    // capture the delete button
    $("[data-button-type=delete]").click(function(e) {
        e.preventDefault();
        var delete_button = $(this);
        var delete_url = $(this).attr('href');

        if (confirm("{{ trans('log.delete_confirm') }}") == true) {
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                success: function(result) {
                    // Show an alert with the result
                    new PNotify({
                        title: "{{ trans('log.delete_confirmation_title') }}",
                        text: "{{ trans('log.delete_confirmation_message') }}",
                        type: "success"
                    });
                    // delete the row from the table
                    delete_button.parentsUntil('tr').parent().remove();
                },
                error: function(result) {
                    // Show an alert with the result
                    new PNotify({
                        title: "{{ trans('log.delete_error_title') }}",
                        text: "{{ trans('log.delete_error_message') }}",
                        type: "warning"
                    });
                }
            });
        } else {
            new PNotify({
                title: "{{ trans('log.delete_cancel_title') }}",
                text: "{{ trans('log.delete_cancel_message') }}",
                type: "info"
            });
        }
      });

  });
</script>
@endsection

@extends('admin.layout')

@section('content-header')
	<section class="content-header">
	  <h1>
	    {{ trans('log.logs') }}
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
      <li><a href="{{ url('admin/log') }}">{{ trans('log.logs') }}</a></li>
	    <li class="active">{{ trans('log.logs') }}</li>
	  </ol>
	</section>
@endsection

@section('content')

  <a href="{{ url('admin/log') }}"><i class="fa fa-angle-double-left"></i> {{ trans('log.back_to_all_logs') }}</a><br><br>
<!-- Default box -->
  <div class="box">
    <div class="box-body">
      <h3>{{ Carbon::createFromTimeStamp($log['last_modified'])->formatLocalized('%d %B %Y') }}:</h3>
      <pre>
        <code>
          {{ $log['content'] }}
        </code>
      </pre>

    </div><!-- /.box-body -->
  </div><!-- /.box -->

@endsection

@section('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection

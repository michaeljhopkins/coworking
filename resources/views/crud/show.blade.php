@extends('app')

@section('content-header')
	<section class="content-header">
	  <h1>
	    Preview
	    <small>an entry</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
	    <li><a href="#">Entity</a></li>
	    <li class="active">Preview</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Preview entry</h3>
    </div>
    <div class="box-body">
      [page content]
    </div><!-- /.box-body -->
    <div class="box-footer">
      Remeber to...
    </div><!-- /.box-footer-->
  </div><!-- /.box -->
@endsection

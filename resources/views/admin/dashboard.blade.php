@extends('app')

@section('content-header')
	<section class="content-header">
	  <h1>
	    Administrator dashboard
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li class="active">Dashboard</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edit site content</h3>
    </div>
    <div class="box-body">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus id velit autem sunt itaque iure, quod saepe commodi quis maiores modi, sed similique provident, totam eveniet. Nemo accusantium temporibus, saepe.
      <br>
      <br>
      For now, you can see a crud entity: <a href="{{ url('admin/article') }}" class="btn btn-primary">Articles</a>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
@endsection

@extends('app')

@section('content-header')
	<section class="content-header">
	  <h1>
	    Preview <span class="text-lowercase">{{ $crud['entity_name'] }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">Show</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Preview <span class="text-lowercase">{{ $crud['entity_name'] }}</h3>
    </div>
    <div class="box-body">
      {{ dump($entry) }}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
@endsection

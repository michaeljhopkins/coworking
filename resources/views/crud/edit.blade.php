@extends('admin.layout')

@section('content-header')
	<section class="content-header">
	  <h1>
	    {{ trans('crud.edit') }} <span class="text-lowercase">{{ $crud['entity_name'] }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">{{ trans('crud.edit') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
		<a href="{{ url($crud['route']) }}"><i class="fa fa-angle-double-left"></i> {{ trans('crud.back_to_all') }} <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span></a><br><br>

		  {!! Form::open(array('url' => $crud['route'].'/'.$entry->id, 'method' => 'put')) !!}
		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title">{{ trans('crud.edit') }}</h3>
		    </div>
		    <div class="box-body">
		      @include('crud/form_content')
		    </div><!-- /.box-body -->
		    <div class="box-footer">

			  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ trans('crud.save') }}</button>
		      <a href="{{ url($crud['route']) }}" class="btn btn-default">{{ trans('crud.cancel') }}</a>
		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  {!! Form::close() !!}
	</div>
</div>
@endsection

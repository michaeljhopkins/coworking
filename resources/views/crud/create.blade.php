@extends('app')

@section('content-header')
	<section class="content-header">
	  <h1>
	    Add <span class="text-lowercase">{{ $crud['entity_name'] }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url('admin/article') }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">Add</li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
			<a href="{{ url('admin/article') }}"><i class="fa fa-angle-double-left"></i> back to all <span class="text-lowercase">{{ $crud['entity_name_plural'] }}</span></a><br><br>

		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add a new {{ $crud['entity_name'] }}</h3>
		    </div>
		    <div class="box-body">
		      @include('crud/form_content')
		    </div><!-- /.box-body -->
		    <div class="box-footer">
		    	<div class="form-group">
		    	  <span>After saving:</span>
		          <div class="radio">
		            <label>
		              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
		              go to the table view
		            </label>
		          </div>
		          <div class="radio">
		            <label>
		              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
		              let me add another item
		            </label>
		          </div>
		          <div class="radio">
		            <label>
		              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
		              edit the new item
		            </label>
		          </div>
		        </div>

		      <a href="#" class="btn btn-success"><i class="fa fa-save"></i> Add</a>
		      <a href="#" class="btn btn-default">Cancel</a>
		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
	</div>
</div>

@endsection

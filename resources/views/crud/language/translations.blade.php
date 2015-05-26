@extends('admin.layout')

@section('content-header')
	<section class="content-header">
	  <h1>
	    {{ trans('crud.edit') }} <span class="text-lowercase">site texts</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('admin/dashboard') }}">Admin</a></li>
	    <li><a href="{{ url($crud['route']) }}" class="text-capitalize">{{ $crud['entity_name_plural'] }}</a></li>
	    <li class="active">{{ trans('crud.edit') }} texts</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-body">
    	<ul id="lang-nav" class="nav nav-tabs">
			@foreach ($languages as $lang)
			<li class="{{ $currentLang == $lang->abbr ? 'active' : ''}}">
				<a href='{{ url("admin/language/texts/{$lang->abbr}") }}'>{{{ $lang->name }}}</a>
			</li>
			@endforeach
		</ul>
		<br>
		<ul class="nav nav-pills pull-right">
			@foreach ($langFiles as $file)
			<li class="{{ $file['active'] ? 'active' : '' }}">
				<a href="{{ $file['url'] }}">{{{ $file['name'] }}}</a>
			</li>
			@endforeach
		</ul>
		<div class="clearfix"></div>
		<br>
		<section class="lang-inputs">
		<p><em>{!! trans('crud.rules_text') !!}</em></p>
		<br>
		@if (!empty($fileArray))
			{!! Form::open(array('url' => url("admin/language/texts/{$currentLang}/{$currentFile}"), 'method' => 'post', 'id' => 'lang-form', 'data-required' => trans('admin.language.fields_required'))) !!}
				{!! Form::button(trans('crud.save'), array('type' => 'submit', 'class' => 'btn btn-primary submit')) !!}
				<div class="clearfix"></div><br>
				{!! $langfile->displayInputs($fileArray) !!}
				<br>
				{!! Form::button(trans('crud.save'), array('type' => 'submit', 'class' => 'btn btn-primary submit')) !!}
			{!! Form::close() !!}
		@else
			<em>{{{ trans('crud.empty_file') }}}</em>
		@endif
	</section>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
@endsection

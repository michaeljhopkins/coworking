<!-- contact page template -->
@extends('layout')

@section('head')
	<title>{{ $page->meta_title or 'No page title' }}</title>
	<meta name="description" content="{{ $page->meta_description or 'No page description' }}">
	<meta name="keywords" content="{{ $page->meta_keywords or 'No page keywords' }}">
@endsection

@section('header')
	@include('inc/page_language_switcher', $page)
@endsection

@section('content')
	<h1>{{ $page->name or 'No page name' }}</h1>
	<div class="row">
		<div class="col-md-6">
			<p>
				<strong>Address: </strong>
				{{ $page->address or 'none defined' }}
				<br>

				<strong>Email: </strong>
				{{ $page->email or 'none defined' }}
				<br>

				<strong>Phone: </strong>
				{{ $page->phone or 'none defined' }}
				<br>

			</p>
		</div>
		<div class="col-md-6">
			[contact form]
		</div>
	</div>
    <p>{{ $page->content or "There is no contact body content." }}</p>
@endsection
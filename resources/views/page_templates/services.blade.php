<!-- services page template -->
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
    <p>{{ $page->content or "There is no services body content." }}</p>
@endsection
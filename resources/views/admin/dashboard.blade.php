@extends('admin.layout')

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

  @if (Entrust::can('view-account-permissions'))
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">About your account</h3>
    </div>
    <div class="box-body">
      Roles:
      <?php
        $roles = Auth::user()->roles;

        if ($roles) {
          foreach ($roles->lists('name', 'id') as $k => $role) {
            echo '<span class="label label-default">'.$role.'</span>';
          }
        }
       ?>
      <br>
      Permissions:
      <?php
        $permissions = Auth::user()->permissions;

        if ($permissions) {
          foreach ($permissions->lists('name', 'id') as $k => $permission) {
            echo '<span class="label label-default">'.$permission.'</span>';
          }
        }
       ?>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
  @endif

@endsection

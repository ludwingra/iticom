@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1>
        Page Header
        <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <h1>Dashboard</h1>

        <h3>Usuario autenticado: {{ Auth::user()->name }} </h3>
    
@endsection
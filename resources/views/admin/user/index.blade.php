@extends('admin.layout')

@section('header')
    <br>
    <h1>
        <i class="fa fa-user"></i> Usuarios
        <a href="{{ route('user.create') }}" class="btn btn-success" style="margin-left: 15px;">
            <i class="fa fa-user-plus"></i> Nuevo
        </a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Inicio</a></li>
		<li class="active">Usuarios</li>
	</ol>
    <br>
@endsection



@section('content')

    
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
        <!-- general form elements -->
            <div class="box box-primary">
                <!-- Start box-header -->
                {{-- <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div> --}}
                <!-- /.box-header -->
                
                <!-- Start box-body -->
                <div class="box-body">
                    <table id="users" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Creado en</th>
                                <th class="text-center">Avatar</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)    
                            <tr>
                                <td class="text-center">{{ $user->name}}</td>
                                <td class="text-center">{{ $user->email}}</td>
                                <td class="text-center">{{ $user->created_at}}</td>
                                <td class="text-center">
                                    @php
                                        $avatar = $user->avatar;
                                    @endphp
                                    <img src="{{ asset('admin/img/avatar/'.$avatar) }}" alt="Avatar: {{$user->name}}" class="img-circle" width="30%">
                                </td>
                                <td class="text-center">{{ $user->role_id}}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i> ver
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('user.delete', $user->id) }}" 
                                            method="POST"
                                            style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                                                <i class="fa fa-user-times"></i> Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->

        </div>

    </div>
    <!-- /.row -->
    
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#users').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'responsive'    : true
            })
        })
    
    </script>
@endpush
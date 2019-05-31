@extends('admin.layout')

@section('header')
    <br>
    <h1>
        <i class="fa fa-user-plus"></i> Crear Usuario
	</h1>
	<ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> Usuarios</a></li>
		<li class="active">Nuevo Usuario</li>
	</ol>
    <br>
@endsection



@section('content')
    
    <div class="row">
        <form role="form" method="POST" action="{{ route('user.edit', $user->id) }}" enctype="multipart/form-data">
            @method('PUT')
        @csrf
        <!-- column -->
            <div class="col-md-8">
                        
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Datos de usuario</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="Ingrese Nombre" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Ingrese email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Role predeterminado</label>
                            <select class="form-control role" name="role" style="width: 100%;">
                                <option value="1" selected="selected">Administrador</option>
                                <option value="2">Usuario normal</option>
                                <option value="3">Miembro</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
                <!-- /.box -->

            </div>

            <div class="col-md-4">
                        
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Avatar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <img id="img-upload" src="{{ asset('admin/img/avatar/'.$user->avatar) }}" name="img-upload" height="200px" width="200px" style="border: 1px solid lightgray;">
                        </div>
                        <div class="form-group">
                            {{-- <label for="exampleInputFile">File input</label> --}}
                            <input type="file" name="avatar" accept="image/png, image/jpeg, image/gif" onchange="readURL(this);">            
                        </div>

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

            </div>
        {{-- form     --}}
        
        </form>
    </div>
    <!-- /.row -->
    
@endsection

@push('styles')
    
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css')}}">

@endpush

@push('scripts')

    <!-- Select2 -->
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        
        //Initialize Select2 Elements
        $('.role').select2()

        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('#img-upload').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush
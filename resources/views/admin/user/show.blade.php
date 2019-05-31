@extends('admin.layout')

@section('header')
    <br>
    <h1>
        <i class="fa fa-user"></i> Ver Usuario
	</h1>
	<ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> Usuarios</a></li>
		<li class="active">Ver Usuario</li>
	</ol>
    <br>
@endsection



@section('content')

    {{-- <h1>{{ $user->name }}</h1> --}}
    <div class="row">

        <!-- column -->
            <div class="col-md-12">
                        
                <div class="info-box">
        
                    <div class="info-box-content" style="padding-top: 20px;">
                        <span class="info-box-number">Nombre </span>
                        <span class="">{{ $user->name }}</span>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-box-content" style="padding-top: 20px;">
                        <span class="info-box-number">Email </span>
                        <span class="">{{ $user->email }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="info-box">
                    <div class="info-box-content" style="padding-top: 20px;">
                        <span class="info-box-number">Creado en </span>
                        <span class="">{{ $user->created_at }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="info-box">
                    <div class="info-box-content" style="padding-top: 20px;">
                        <span class="info-box-number">Avatar </span>
                        <img src="{{ asset('admin/img/avatar/'.$user->avatar) }}" alt="Avatar: {{$user->name}}" class="img-circle" width="200px">
                        
                    </div>
                    <!-- /.info-box-content -->
                </div>


                <div class="info-box">
                    <div class="info-box-content" style="padding-top: 20px;">
                        <span class="info-box-number">Role </span>
                        @if ($user->role_id == 1)
                            <span class="">Administrador</span>
                        @elseif($user->role_id == 2)
                            <span class="">Usuario normal</span>
                        @elseif($user->role_id == 3)
                            <span class="">Miembro</span>
                        @endif
                    </div>
                    <!-- /.info-box-content -->
                </div>


            </div>

    </div>
    <!-- /.row -->

    {{-- Usuario normal
    Miembro --}}
@endsection

@push('styles')
    

@endpush

@push('scripts')


@endpush
@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Perfil
@endsection

@section('contentheader')
<section class="content-header">
  <h1>
    Perfil de Usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Perfiles</li>
  </ol>
</section>
@endsection('contentheader')



@section('main-content')



      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Gravatar::get($user->email) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">Nombre Organización</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>correo</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Fono</b> <a class="pull-right">+56 9 1234 5678</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Inicio</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.col -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Configuración</a></li>
            </ul>
            <div class="tab-content">
              <div class=" active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="input" class="form-control" id="inputName" placeholder="{{ Auth::user()->name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label disabled">Email</label>

                    <div class="col-sm-10">
                      <input type="email" disabled class="form-control" id="inputEmail" placeholder="{{ Auth::user()->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Acepto <a href="#">terminos y condiciones</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Envíar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>


@endsection

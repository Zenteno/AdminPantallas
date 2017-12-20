@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-8">
    <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Gestión Videos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-sm-6 sidenav">
        <h4>Videos Disponibles</h4>
        <span class="glyphicon glyphicon-plus fileinput-button" >
          <input id="fileupload" type="file" name="archivos[]" multiple>
        </span>
        &nbsp;

        <span class="glyphicon glyphicon-minus">

				</span>
        <ul class="nav nav-pills nav-stacked" id="totales">
          @foreach ($repo as $video)
            <li><a href="#" class="vT">{{ $video }}</a></li>
          @endforeach
        </ul>


        <br>
      </div>
      <div class="col-sm-6 sidenav">
        <h4>Videos Cargados</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Video</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="personal">
            @foreach ($personal as $video)
              <tr>
                <td>{{ $video }}</td>
                <td>
                  <span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;
                  <span class="glyphicon glyphicon-play .btn.btn-app"></span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div> <!-- /.row -->

    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Calendario de reproducción</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <h5>Sección en construccón</h5>

        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h4>Link Video Manual</h4>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" aria-label="..." id="boolVideo">
            </span>
            <input placeholder="Pegue aqui su link de trasmicion streaming (m3u8)"type="text" class="form-control" aria-label="..." id="linkManual">
          </div>
          <br>
          <button class="btn btn-primary button" id="streaming">Enviar Señal Streaming</button>

        </div>
        <!-- /.box-body -->
      </div>
    </div>

  </div>

  </div>
</div>

@endsection

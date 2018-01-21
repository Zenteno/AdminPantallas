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
                    <h3 class="box-title">
                        Gestión Videos
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-toggle="tooltip" data-widget="collapse" title="Collapse" type="button">
                            <i class="fa fa-minus">
                            </i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-sm-6 sidenav">
                        <h4>
                            Videos Disponibles
                        </h4>
                        <span class="glyphicon glyphicon-plus fileinput-button">
                            <a class="prueba" type="submit">
                                <input id="fileupload" multiple="" name="archivos[]" type="file"/>
                            </a>
                        </span>
                        <table class="table " id="totales">
                            <tbody>
                                <!-- tabla de los videos subisdos -->
                                    @foreach ($repo as $video)
                                    <tr>
                                        <td>
                                            {{ $video->vi_nombreViejo}}
                                        </td>
                                        <td>
                                            <a class="vT" href="{{ route('VideosController.destroy',$video -> id)}}">
                                                <span class="glyphicon glyphicon-minus">
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="videoEnviar" href="#" video="{{ $video->id }}" nombre="{{ $video->vi_nombreViejo}}">
                                                <span class="glyphicon glyphicon glyphicon-ok">
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <br>
                        </br>
                    </div>
                    <!-- fin de tabla  videos subisdos -->
                    <div class="col-sm-6 sidenav">
                        <h4>
                            Videos Cargados
                        </h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Video
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="personal">
                                @foreach ($personal as $video)
                                <tr>
                                    <td>
                                        {{ $video->vi_nombreViejo }}
                                    </td>
                                    <td video="{{ $video->id }}">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                        <span class="glyphicon glyphicon-play .btn.btn-app">
                                        </span>
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
        </div>
        <!-- /.row -->
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Calendario de reproducción
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-toggle="tooltip" data-widget="collapse" title="Collapse" type="button">
                            <i class="fa fa-minus">
                            </i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <h5>
                        Sección en construccón
                    </h5>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4>
                        Link Video Manual
                    </h4>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-toggle="tooltip" data-widget="collapse" title="Collapse" type="button">
                            <i class="fa fa-minus">
                            </i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input aria-label="..." id="boolVideo" type="checkbox">
                            </input>
                        </span>
                        <input aria-label="..." class="form-control" id="linkManual" placeholder="Pegue aqui su link de trasmicion streaming (m3u8)" type="text">
                        </input>
                    </div>
                    <br>
                        <button class="btn btn-primary button" id="streaming">
                            Enviar Señal Streaming
                        </button>
                    </br>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection

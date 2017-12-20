@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Gestión de videos</h3>
					</div>
					<div class="box-body">
						<div class="col-sm-6 sidenav">
					<h4>Videos Disponibles</h4>
					<span class="glyphicon glyphicon-plus fileinput-button" >
						<input id="fileupload" type="file" name="archivos[]" multiple>
					</span>
					&nbsp;

					<span class="glyphicon glyphicon-minus"></span>
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
										<span class="glyphicon glyphicon-play"></span>
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

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Gestión de Titulos y Streaming</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
					<h3>Titular Principal</h3>
					<div class="input-group">
						<span class="input-group-addon">
						<input type="checkbox" aria-label="..." id="boolGC">
						</span>
						<input placeholder="Ingrese texto a mostrar en seccion de titular Principal" type="text" class="form-control" aria-label="..." id="gcManual">
					</div>
					<h3>Link Video Manual</h3>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" aria-label="..." id="boolVideo">
						</span>
						<input placeholder="Pegue aqui su link de trasmicion streaming (m3u8)"type="text" class="form-control" aria-label="..."/ id="linkManual">
					</div>
					<br>
					<button class="btn button" id="config">Enviar Configuración</button>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Canales en Vivo</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
				  <br>

					<ul style="list-style-type: none;">
						<li><input type="radio" name="canal" id="canal1" value="canal1">
						<label for="canal9">CANAL 9</label></li>
						<li><input type="radio" name="canal" id="canal2" value="canal2">
				    <label for="tvu">TVU</label></li>
						<li><input type="radio" name="canal" id="canal3" value="canal3">
				    <label for="mega">MEGA</label></li>
						<li><input type="radio" name="canal" id="lista" value="lista">
				    <label for="lista">Volver a la Lista</label></li>
					</ul>
					<br>
					<div class="box-footer with-border">
								<button class="btn btn-success" id="enviar-canal">Enviar Canal</button>
					</div>
				  </div>
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

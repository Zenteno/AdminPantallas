@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Gestión de videos</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="col-sm-3 sidenav">
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
				<div class="col-sm-3 sidenav">
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
										<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;&nbsp;
										<span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;&nbsp;&nbsp;
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
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
					<h3>GC Manual</h3>
					<div class="input-group">
						<span class="input-group-addon">
						<input type="checkbox" aria-label="..." id="boolGC">
						</span>
						<input type="text" class="form-control" aria-label="..." id="gcManual">
					</div>
					<h3>Link Video Manual</h3>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" aria-label="..." id="boolVideo">
						</span>
						<input type="text" class="form-control" aria-label="..."/ id="linkManual">
					</div>
					<br>
					<button class="btn button" id="config">Enviar Configuración</button>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Canales</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
					<br>
					<button class="btn btn-info btn-canal" id="1">Canal 9</button>
					<button class="btn btn-info btn-canal" id="3">Canal mega</button>
					<button class="btn btn-info btn-canal" id="2">Canal tvu</button>



					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

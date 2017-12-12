@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')


		<div class="row">
			<div class="col-md-6">
			<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Gestión de Titular</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
					<h3>Titular Principal</h3>
					<div class="input-group">
						<span class="input-group-addon">
						<input type="checkbox" aria-label="..." id="boolTitulo">
          </span>
						<input placeholder="Ingrese texto a mostrar en seccion de titular Principal" type="text" class="form-control" aria-label="..." id="gcManual">
					</div>
					<br>
          <button class="btn btn-primary button" id="envtitulo">Enviar Titulo Principal</button>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Gestión de Titulos Secundarios</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
					<h5>Título izquierda</h5>
					<div class="input-group">
						<span class="input-group-addon">
						<input type="checkbox" aria-label="..." id="checkizquierda">
          </span>
						<input placeholder="Ingrese texto a mostrar en sección de titulo izquierda" type="text" class="form-control" aria-label="..." id="izquierda">
						<span class="input-group-btn">
							<button class="btn btn-primary btn-flat btn-sub" id="btnizq">enviar</button>
        		</span>
					</div>
					<h5>Título central</h5>
					<div class="input-group">
						<span class="input-group-addon">
						<input type="checkbox" aria-label="..." id="checkcentral">
          </span>
						<input placeholder="Ingrese texto a mostrar en sección de titulo central" type="text" class="form-control" aria-label="..." id="centro">
						<span class="input-group-btn">
							<button class="btn btn-primary btn-flat btn-sub" id="btncen">enviar</button>
        		</span>
					</div>
					<h5>Título derecha</h5>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" aria-label="..." id="checkderecha">
          	</span>
						<input placeholder="Ingrese texto a mostrar en sección de titulo derecha" type="text" class="form-control" aria-label="..." id="derecha">
						<span class="input-group-btn">
							<button class="btn btn-primary btn-flat btn-sub" id="btnder">enviar</button>
        		</span>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
	</div>
@endsection

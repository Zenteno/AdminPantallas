@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="col-md-6">
<div class="box box-success">
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
    <label for="tvn">TVN</label></li>
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
</div>

<div class="col-md-6">
	<div class="box box-success">
	  <div class="box-header with-border">
	    <h3 class="box-title">Vista de reproducción</h3>

	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	        <i class="fa fa-minus"></i></button>
	    </div>
	  </div>
	  <div class="box-body">
	  	<br>
	  </div>
	  <!-- /.box-body -->
	</div>
</div>
@endsection

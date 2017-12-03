@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')


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
  <button class="btn btn-primary btn-canal" id="1">Canal 9</button>
  <button class="btn btn-primary btn-canal" id="3">Canal mega</button>
  <button class="btn btn-primary btn-canal" id="2">Canal tvu</button>

  </div>
  <!-- /.box-body -->
</div>

@endsection

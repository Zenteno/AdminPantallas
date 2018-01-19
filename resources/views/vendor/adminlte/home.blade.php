@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<section class="inicioClienteDashboard">
    <div class="row mt-4 ">
        <div class="col-sm-6 col-md-3 mb-3  text-center text-center">
            <a href="{{url('videos')}}">
                <div class="flat1 p-3 hovCajitas ">
                    <div class="fullDiv mt-3">
                        <img src="{{ asset('img/video.svg') }}" width="150px">
                        </img>
                    </div>
                    <div class="fullDiv textoNegro p-3">
                        <span><strong>
                            Gestión de videos
                        </strong>
                        </span>
                    </div>
                </div>
            </a>
        </div>
         <div class="col-sm-6 col-md-3 mb-3 pt-4 text-center text-center">
            <a href="{{url('titulos')}}">
                <div class="flat1 p-3 hovCajitas">
                    <div class="fullDiv mt-3">
                        <img src="{{ asset('img/texto.svg') }}" width="150px">
                        </img>
                    </div>
                    <div class="fullDiv textoNegro p-3">
                        <span><strong>
                            Gestión de titulos
                        </strong>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3 mb-3 pt-4 text-center text-center">
            <a href="{{url('canales')}}">
                <div class="flat1 p-3 hovCajitas">
                    <div class="fullDiv mt-3">
                        <img src="{{ asset('img/tv.svg') }}" width="150px">
                        </img>
                    </div>
                    <div class="fullDiv textoNegro p-3">
                        <span><strong>
                            Canales en vivo
                            </strong>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

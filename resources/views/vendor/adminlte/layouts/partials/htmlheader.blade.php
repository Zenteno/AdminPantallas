<head>
    <meta charset="UTF-8">
    <title> GroupalNet - @yield('htmlheader_title', 'Pantallas Informativas') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

      <!-- REVISAR ESTO !! xD -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="js/jquery.fileupload.js"></script>
      <!-- --------------------- -->
    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>

    <style type="text/css">
    			.fileinput-button {
    				position: relative;
    				overflow: hidden;
    				display: inline-block;
    			}
    			.fileinput-button input {
    				position: absolute;
    				top: 0;
    				right: 0;
    				margin: 0;
    				opacity: 0;
    				-ms-filter: 'alpha(opacity=0)';
    				font-size: 200px !important;
    				direction: ltr;
    				cursor: pointer;
    			}
    		</style>
</head>

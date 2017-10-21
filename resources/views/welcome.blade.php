<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="js/jquery.fileupload.js"></script>
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
	<body>
		<div class="container-fluid">
			  <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        	</li>
        </ul>
			<div class="row content">
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
				<div class="col-sm-6">
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
			</div>
		</div>
		<script type="text/javascript">
			var ws;
			$(document).ready(function(){
			    ws = new WebSocket("ws://190.121.26.165:8000");
			});
			$(".vT").dblclick(dblclick);
			var url = '/archivos';
			$('#fileupload').fileupload({
				url: url,
				dataType: 'json',
				formData: {
					_token : "{{ csrf_token() }}"
				},
				done: function (e, data) {
					$("#totales").append('<li><a class="vT" href="#">'+data.result.nombre+'</a></li>');
					$(".vT").unbind("dblclick");
					$(".vT").dblclick(dblclick);
				}/*,
				progressall: function (e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
		            $('#progress .progress-bar').css(
		                'width',
		                progress + '%'
		            );
		        }*/
			}).prop('disabled', !$.support.fileInput)
		 	.parent().addClass($.support.fileInput ? undefined : 'disabled');
				function dblclick(e){
				$.post( "/copiar",
					{
						_token : "{{ csrf_token() }}",
						archivo: this.text
					},
					function( data ) {
						ws.send(JSON.stringify({
							comando : 1,
							archivo : data
						}));
						$("#personal").append(`<tr>
								<td>`+data+`</td>
								<td>
									<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;&nbsp;
									<span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;&nbsp;&nbsp;
									<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;
									<span class="glyphicon glyphicon-play"></span>
								</td>
							</tr>`);
						$(".glyphicon-play").unbind("click");
						$(".glyphicon-play").click(playManual);
						$(".glyphicon-remove").click(remover);	
					});
				}
			$("#config").click(function(){
				ws.send(JSON.stringify(
					{
						comando: 2,
						boolVideo: $("#boolVideo").is(':checked') ,
						boolGC: $("#boolGC").is(':checked') ,
						linkManual: $("#linkManual").val(),
						gcManual: $("#gcManual").val()				
					}
				));
			});
			function playManual(){
				var video = this.parentNode.previousElementSibling.firstChild.textContent;
				ws.send(JSON.stringify({
					comando: 3,
					archivo : video
				}));
			}
			function remover(){
				var video = this.parentNode.previousElementSibling.firstChild.textContent;
				ws.send(JSON.stringify({
					comando: 4,
					archivo : video
				}));
				$(this).html();
			}
			$(".glyphicon-play").click(playManual);
			$(".glyphicon-remove").click(remover);
				
		</script>
	</body>
</html>


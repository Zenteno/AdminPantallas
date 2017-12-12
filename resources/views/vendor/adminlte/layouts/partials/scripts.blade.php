<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

      <script type="text/javascript">
      			var ws;
      			$(document).ready(function(){
      			    ws = new WebSocket("ws://201.217.242.94:8080");
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
                console.log(data);
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
              console.log($("boolGC").is(':checked'));
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
            //envio de titulo principal vista: titulos.blade.php
            $("#envtitulo").click(function(){
              console.log($("#boolGC").is(':checked'));
              console.log( $("#gcManual").val());
      				ws.send(JSON.stringify(
      					{
      						comando: 2,
      						boolVideo: false,
      						boolGC: $("#boolGC").is(':checked') ,
      						linkManual: false,
      						gcManual: $("#gcManual").val()
      					}
      				));
      			});
            // Envio de señal streaming para canales
          $(".btn-canal").click(function(){
            console.log(this.id);
  				 var canal9 = "http://unlimited2-cl.dps.live/c9/c9.smil/playlist.m3u8";
  			   var mega= "http://mdstrm.com/live-stream-playlist/561430ae330428c223687e1e.m3u8";
  				 var tvu = "http://unlimited6-cl.dps.live/tvu/tvu.smil/playlist.m3u8";
           switch (this.id) {
             case 1:
              ws.send(JSON.stringify({
                comando: 5,
                boolVideo : true,
                linkCanal : canal9,
              }));
               break;
               case 2:
                ws.send(JSON.stringify({
                  comando: 5,
                  boolVideo : true,
                  linkCanal : tvu,
                }));
                 break;
                 case 3:
                  ws.send(JSON.stringify({
                   comando: 5,
                   boolVideo : true,
                   linkCanal : mega,
                  }));
                   break;
  		 	 });

         // botones de subitulos izq, centro y derecha.
         $(".btn-sub").click(function(){
           console.log(this.id);
           switch (this.id) {
             case "btnizq":
             ws.send(JSON.stringify(
               {
                 comando: 6,
                 boolGCsub: $('#checkizquierda').is(":checked"),
                 subtitulo: $("#izquierda").val(),
               }
             ));
               break;
            case "btncen":
            ws.send(JSON.stringify(
              {
                comando: 7,
                boolGCsub: $('#checkcentral').is(":checked"),
                subtitulo: $("#centro").val(),
              }
            ));
              break;
            case "btnder":
            ws.send(JSON.stringify(
              {
                comando: 8,
                boolGCsub: $('#checkderecha').is(":checked"),
                subtitulo: $("#derecha").val(),
              }
            ));
                break;
           }
         });

         //funciones de play
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

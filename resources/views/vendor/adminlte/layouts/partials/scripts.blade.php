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
      			    ws = new WebSocket("ws://190.121.26.164:8000");
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

          $(".btn-canal").click(function(){
  				      var canal9 = "http://unlimited2-cl.dps.live/c9/c9.smil/playlist.m3u8";
  				      var mega= "http://mdstrm.com/live-stream-playlist/561430ae330428c223687e1e.m3u8";
  				      var tvu = "http://unlimited6-cl.dps.live/tvu/tvu.smil/playlist.m3u8";
  				var canal;
  				if(this.id=="1"){
  				canal = canal9;
  				}
  				if(this.id=="3"){
  				canal = mega;
  				}
          if(this.id=="2"){
  				canal = tvu;
  				}
  				ws.send(JSON.stringify({
  				comando: 2,
  				boolVideo: ":checked",
  				boolGC: $("#boolGC").is("checked"),
  				linkManual : canal,
  				gcManual: $("#gcManual").val()
  				}));
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

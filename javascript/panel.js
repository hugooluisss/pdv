$(document).ready(function(){
	$f("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf", {
			autoPlay: true,
			fullscreen: false,
			clip: {
			provider: 'cloudfront',
			
			// combined streams are configured in the "streams" node as follows:
			streams: [
				{ url: 'livestream'},
			]
		},
		// our rtmp plugin is configured identically as in the first example
		plugins: {
			cloudfront: {
				url: "flowplayer.rtmp-3.2.13.swf",
				netConnectionUrl: 'rtmp://209.208.97.249:1936/live'
			},
			controls: {
				playlist: false,
				fullscreen: false,
				stop: false,
				time: false,
				play: false,
				scrubber: true
			}
		},
		onLoad: function() { // called when player has finished loading
			this.setVolume(1000); // set volume property
		},
		onError: function(){
			alert("Ocurrió un error");
		}
	});
	
	$("#btnMensaje").click(function(){
		var obj = new TMensaje;
		
		obj.enviar($("#txtMensaje").val());
	});
	
	$("#txtMensaje").keypress(function(e){
		if(e.which == 13) {
			var obj = new TMensaje;
		
			obj.enviar($("#txtMensaje").val());
		}
	});
	
	var obj = new TMensaje;
	obj.getMensajes();
	
	setInterval(function(){
		obj.getMensajes();
	}, 1000);
});
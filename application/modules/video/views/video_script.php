<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript">
 	var video = asset_url("user_upload/video/bapol.mov");
	$("#video").attr('src',video);
	$('#save').hide();

	$(document).ready(function(){
		var VideoSnapper = {
	        captureAsCanvas: function(video, options, handle) {
	            var callback = function() {
	                var canvas = $('<canvas />').attr({
	                    width: options.width,
	                    height: options.height
	                })[0];
	                canvas.getContext('2d').drawImage(video, 0, 0, options.width, options.height);
	                handle.call(this, canvas);    
	            }
	            return callback.apply(video);
	        }
		};
		$(function() { 
	        $('video').bind('video_really_ready', function() {
	            var video = this;
	            $('#capture').click(function() {
	                var canvases = $('canvas');
	                VideoSnapper.captureAsCanvas(video, { width: 160, height: 68 }, function(canvas) {
	                    $('#screen').html(canvas); 
	                    $('#save').show();                       
	                })
	            }); 
	        });
	    
	    });

	    $('#save').click(function(){
	    	var canvas = document.getElementById('canvas');
    		canvas.toDataURL("image/png");
	    })
	});


</script>

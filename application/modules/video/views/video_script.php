<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript">
 var video = asset_url("user_upload/video/bapol.mov");
$("#video").attr('src',video);
console.log(video)
load_asset("css/materialize.min.css");
load_asset("js/materialize.min.js");
	$(document).ready(function(){
      $('.materialboxed').materialbox();


    });
</script>
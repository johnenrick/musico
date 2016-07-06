<!-- <div class="container">
  <div class="row">
    <div align="center" class="embed-responsive embed-responsive-4by3">
      <video autoplay class="embed-responsive-item" controls style="width:400px;height:300px">
          <source id="video" src="" type="video/mp4">
      </video>
    </div>
  </div>
</div>
 -->
<!-- <div class="row">
	<div class="embed-responsive embed-responsive-4by3 col m5">
		<video id="video" type="video/mp4" style="width:400px;height:300px" controls>
		</video>
	</div>
	<div class="col m7">	
		<button onclick="capture()">Capture</button><br/>
		<canvas id="canvas"></canvas><br/>
	</div>
</div>
 -->

<div class="row">
	<div class="col m5">
		<video id="video" controls preload="none" style="width:400px;height:300px" poster="http://media.w3.org/2010/05/sintel/poster.png" onloadedmetadata="$(this).trigger('video_really_ready')">
		</video>
	</div>
	<div class="col m7">
		<button id="capture">Capture</button>
    	<div id="screen"></div>
    	<button id="save">Save</button>
	</div>
</div>
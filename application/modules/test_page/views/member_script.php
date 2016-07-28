<script>
load_asset("core/jquery.min.js");
load_asset("core/jquery-ui.min.js");
load_asset("core/jquery-ui.min.css");
load_asset("core/jquery-ui.theme.min.css");
$(document).ready(function(){
  //   $('input.autocomplete').autocomplete({
  //   data: {
  //     "Apple": null,
  //     "Microsoft": null,
  //     "Google": 'http://placehold.it/250x250'
  //   }
  // });

    $('select').material_select();
    //upload and preview file
    'use strict'
    var URL = window.URL || window.webkitURL
    var playSelectedFile = function (event) {
        var file = this.files[0]
        var type = file.type
        var videoNode = document.querySelector('video')
        var canPlay = videoNode.canPlayType(type)
        if (canPlay === '') canPlay = 'no'
        var message = 'Can play type "' + type + '": ' + canPlay
        var isError = canPlay === 'no'
        if (isError) {
          return
        }
        var fileURL = URL.createObjectURL(file)
        videoNode.src = fileURL
    }
    var inputNode = document.querySelector('#videoFile')
    inputNode.addEventListener('change', playSelectedFile, false);
    
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


    var video = $('#video').get(0);
    $('#capture').click(function() {
        var canvases = $('canvas');
        VideoSnapper.captureAsCanvas(video, { width: 160, height: 68 }, function(canvas) {
            $('#screen').html(canvas); 
            $('#save').show();                       
        })
    }); 

    $('#save').click(function(){
        var canvas = document.getElementById('canvas');
        canvas.toDataURL("image/png");
    })


    $('#Upload').click(function(){
        console.log($('#videoFile').get(0));
        $.post("<?=api_url("C_user_video/createUserVideo")?>",{
            title: $('#title').val(),
            details: $('#description').val(),
            video_category_ID: 1
        }, function(data){
            var response = JSON.parse(data);
        });
    }); 

});

    // function localFileVideoPlayer() {
    //     'use strict'
    //   var URL = window.URL || window.webkitURL
    //   var displayMessage = function (message, isError) {
    //     var element = document.querySelector('#message')
    //     element.innerHTML = message
    //     element.className = isError ? 'error' : 'info'
    //   }
    //   var playSelectedFile = function (event) {
    //     var file = this.files[0]
    //     var type = file.type
    //     var videoNode = document.querySelector('video')
    //     var canPlay = videoNode.canPlayType(type)
    //     if (canPlay === '') canPlay = 'no'
    //     var message = 'Can play type "' + type + '": ' + canPlay
    //     var isError = canPlay === 'no'
    //     displayMessage(message, isError)

    //     if (isError) {
    //       return
    //     }

    //     var fileURL = URL.createObjectURL(file)
    //     videoNode.src = fileURL
    //   }
    //   var inputNode = document.querySelector('input')
    //   inputNode.addEventListener('change', playSelectedFile, false)
    // }


    // var VideoSnapper = {
    //     captureAsCanvas: function(video, options, handle) {
    //         var callback = function() {
    //             var canvas = $('<canvas />').attr({
    //                 width: options.width,
    //                 height: options.height
    //             })[0];
    //             canvas.getContext('2d').drawImage(video, 0, 0, options.width, options.height);
    //             handle.call(this, canvas);    
    //         }
    //         return callback.apply(video);
    //     }
    // };
    // $(function() { 
    //     $('#video').bind('video_really_ready', function() {
    //         var video = this;
    //         $('#capture').click(function() {
    //             alert('vidoe');
    //             var canvases = $('canvas');
    //             VideoSnapper.captureAsCanvas(video, { width: 160, height: 68 }, function(canvas) {
    //                 $('#screen').html(canvas); 
    //                 $('#save').show();                       
    //             })
    //         }); 
    //     });
    
    // });

    // $('#save').click(function(){
    //     var canvas = document.getElementById('canvas');
    //     canvas.toDataURL("image/png");
    // })
</script>
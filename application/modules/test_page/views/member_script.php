<script>
load_asset("jquery.form.min.js");
load_asset("core/jquery.min.js");
load_asset("core/jquery-ui.min.js");
load_asset("core/jquery-ui.min.css");
load_asset("core/jquery-ui.theme.min.css");
$(document).ready(function(){


    $.post(api_url("C_user_video/retrieveUserVideo"), {id:user_id()}, function(data){
        var response = JSON.parse(data);
            console.log(response);
            // asset_url("user_video/"+user_id()+"/"+file_name)
            if(!response["error"].length){
                $.each( response.data, function( i, val ) {
                //   $( "#" + val ).text( "Mine is " + val + "." );
                    var url = asset_url("user_upload/"+user_id()+"/"+val.file_uploaded_description
)
                    var video = $('#videos .dummy').clone().removeClass('hide');
                    video.removeClass('dummy');
                    video.attr('user_video_id',val.ID);
                    video.find('#title').text(val.title);
                    video.find('#description').text(val.details);
                    video.find('img').attr('src',url);
                    $('#videoContainer').append(video);
                });
            }else{
                $("#success-module").hide();
                console.log(response['error']);
            }
    });

    $("#upload").attr("opacity",1);
    $("#uploadForm").attr('action',api_url("C_user_video/createUserVideo"));
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


$("#uploadForm").ajaxForm({
            beforeSubmit: function(data,$form,options){
                console.log(data);

            },
            success : function(data){
                var response = JSON.parse(data);
                if(!response["error"].length){
                    $(".hide-module:not(#success-module)").hide();
                    $("#title").val('');
                    $("#details").val('');
                    uploadThumbnail(response.data);
                    // $('#registrationModal').closeModal();
                }else{
                    $("#success-module").hide();
                    console.log(response['error']);
                    // show_error($("#registrationForm"), response["error"]);
                }
            }
        });
    
    function uploadThumbnail(id){
        var canvas = document.getElementById('canvas');
        canvas.toDataURL("image/png");
        console.log(canvas);
        $.post(api_url("createUserVideoThumbnail"), {user_video_ID:id}, function(data){
        var response = JSON.parse(data);
            console.log(response);

            if(!response["error"].length){

            }else{
                $("#success-module").hide();
                console.log(response['error']);
            }
        });
    }
});

</script>
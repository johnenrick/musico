<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.nowPlaying = function(){
        var nowPlaying = this;//instance of the module
        var moduleBody = nowPlaying.body = $("#nowPlaying");
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".nowPlayingSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".nowPlayingSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".nowPlayingSampleComponent"));
        });
        
        
    };
    $(document).ready(function(){
        var nowPlaying = new systemApplication.module.nowPlaying();
    });
</script>
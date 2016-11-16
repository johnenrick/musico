<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    var EventPage  = function(){
        var eventPage = this;//instance of the module
        var moduleBody = eventPage.body = $("#eventPage");
        /*Initiation*/
        /*Event*/
        
        eventPage.ready = function(){//function to run if the module is already been loaded or reloaded
            
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.eventPage = new EventPage();
    });
</script>
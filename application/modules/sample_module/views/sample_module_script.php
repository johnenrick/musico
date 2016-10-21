<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    var SampleModule  = function(){
        var sampleModule = this;//instance of the module
        var moduleBody = sampleModule.body = $("#sampleModule");
        /*Initiation*/
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".sampleModuleSampleComponent"));
        });
        /*Event*/
        
        sampleModule.ready = function(){//function to run if the module is already been loaded or reloaded
            
        }
    };
        
    $(document).ready(function(){
        if(typeof systemApplication.module.portalPage === "undefined"){
            systemApplication.module.sampleModule = new SampleModule();
        }else{
            //TODO refresh function if the module is revisited
            
        }
    });
</script>
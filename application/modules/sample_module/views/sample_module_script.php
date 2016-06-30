<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.sampleModule = function(){
        var sampleModule = this;//instance of the module
        var moduleBody = sampleModule.body = $("#sampleModule");
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".sampleModuleSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".sampleModuleSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".sampleModuleSampleComponent"));
        });
        
        
    };
        
    $(document).ready(function(){
        var sampleModule = new systemApplication.module.sampleModule();
    });
</script>
<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.userManagement = function(){
        var sampleModule = this;//instance of the module
        var moduleBody = sampleModule.body = $("#userManagement");
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".userManagementSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".userManagementSampleComponent"));
        });
        load_component("sample_component", function(){
           new SampleComponent(moduleBody.find(".userManagementSampleComponent"));
        });
        
        
    };
        
    $(document).ready(function(){
        var userManagement = new systemApplication.module.userManagement();
    });
</script>
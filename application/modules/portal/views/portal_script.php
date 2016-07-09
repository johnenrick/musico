<script>
    /*global systemApplication, systemUtility  */
    systemApplication.module.portalPage = function(){
        var portalPage = this;//instance of the module
        var moduleBody = portalPage.body = $("#portalPage");
        load_component("grid_list", function(){
           new GridList(moduleBody.find(".videoList"));
        });
        
    };
        
    $(document).ready(function(){
        var portalPage = new systemApplication.module.portalPage();
    });
</script>
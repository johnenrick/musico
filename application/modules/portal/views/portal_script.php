<script>
    /*global systemApplication, systemUtility  */
     var Portal = function(){
        var portalPage = this;//instance of the module
        var moduleBody = portalPage.body = $("#portalPage");
        load_component("grid_list", function(){
           portalPage.featuredVideoList = new GridList(moduleBody.find(".videoList"));
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
        });
        portalPage.reload = function(){
            console.log("reload");
        }
    };
        
    $(document).ready(function(){
        if(typeof systemApplication.module.portalPage === "undefined"){
            systemApplication.module.portalPage = new Portal();
        }else{
            //TODO refresh
            alert();
        }
    });
</script>
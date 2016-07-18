<script>
    /*global systemApplication, systemUtility  */
    systemApplication.module.portalPage = function(){
        var portalPage = this;//instance of the module
        var moduleBody = portalPage.body = $("#portalPage");
        load_component("grid_list", function(){
           portalPage.featuredVideoList = new GridList(moduleBody.find(".videoList"));
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (2).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (3).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (4).jpg"), "Running in the morning", "Runner's Club", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (4).jpg"), "Running in the morning", "Runner's Club", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (2).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (3).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (4).jpg"), "Running in the morning", "Runner's Club", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (4).jpg"), "Running in the morning", "Runner's Club", 1462767575, 10);
        });
        
    };
        
    $(document).ready(function(){
        var portalPage = new systemApplication.module.portalPage();
    });
</script>
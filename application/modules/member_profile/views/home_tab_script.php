<script>
    load_asset("module/member_profile_home_tab.css");
    var MemberProfileHomeTab = function(moduleBody){
        var memberProfileHomeTab = this;
        var subModuleBody = moduleBody.find("#memberProfileHomeTab");
        $('ul.tabs').tabs();
        load_component("video_list_banner", function(){
           memberProfileHomeTab.featuredVideoList = new VideoListBanner(subModuleBody.find(".latestVideo"));
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s1.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10, true);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s1.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
       });
       load_component("grid_list", function(){
           memberProfileHomeTab.featuredVideoList = new GridList(moduleBody.find(".albumVideoList"));
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s1.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s2.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s3.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s4.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s5.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           memberProfileHomeTab.featuredVideoList.addItem(1, asset_url("sample_image/s6.jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
        });
    };
</script>
<script>
    /*global systemApplication, systemUtility  */
    load_asset("core/custom/button.css");
     var Portal = function(){
        var portalPage = this;//instance of the module
        var moduleBody = portalPage.body = $("#portalPage");
        /*Featured Video*/
        load_component("grid_list", function(){
           portalPage.featuredVideoList = new GridList(moduleBody.find(".videoList"));
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
        });
        /*5 Random Video*/
        load_component("video_list_banner", function(){
           portalPage.featuredVideoList = new VideoListBanner(moduleBody.find(".randomVideo"));
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10, true);
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
//           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
//           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
//           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           
        });
        if(user_id()){
            moduleBody.find(".signUpButton").hide();
        }
        moduleBody.find(".signUpButton").click(function(){
            $(".headerAuthentication").trigger("click");
        });
        moduleBody.find(".uploadVideo").click(function(){
            if(user_id()){
                load_module("member_profile/index/"+user_id()+"#memberProfileVideoTab", "MemberProfile");
            }else{
                $(".headerLogin").trigger("click");
            }
        });
        portalPage.ready = function(){
            console.log("reload");
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.portalPage = new Portal();
    });
</script>
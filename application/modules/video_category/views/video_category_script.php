<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.videoCategory = function(){
        var videoCategory = this;//instance of the module
        var moduleBody = moduleBody = $("#videoCategory");
        
        
        load_component("table_component", function(){
            var columnConfiguration = [{
                description : "Description",
                table_column : "video_category__description",
                default_sort : 1
            },{
                description : "Parent Category",
                table_column : "parent_video_category__description",
                default_sort : 1
            },{
                description : "Action"
            }];
            var filterConfiguration = [{
                    description : "Description",
                    table_column : "like__video_category__description",
                    type : "text"
            }];
            var resultConfiguration = {
                result_link : api_url("C_video_category/retrieveVideoCategory"),
                success : listCategory,
                limit : 5
            };
            videoCategory.tableCategory = new TableComponent(moduleBody.find('.videoCategoryTable'), resultConfiguration, columnConfiguration, filterConfiguration);
           
        });
        
        
        function listCategory(data){
            for(var x = 0; x < data.length; x++){
                var newEntry = moduleBody.find(".prototype .videoCategoryEntry").clone();
                newEntry.find(".description").text(data[x]["description"]);
                newEntry.find(".parentCategory").text((data[x]["parent_ID"]*1) ? data[x]["parent_description"] : "N/A");
                videoCategory.tableCategory.addEntry(newEntry);
            }
        };
        
    };
    
    $(document).ready(function(){
        var videoCategory = new systemApplication.module.videoCategory();
        
    });
</script>
<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.videoCategory = function(){
        var videoCategory = this;//instance of the module
        var moduleBody = videoCategory.moduleBody = $("#videoCategory");
        
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
        
        videoCategory.categoryDetailForm = commonFormHandler(moduleBody.find("#videoCategoryDetail form"), "c_video_category/createVideoCategory", "c_video_category/updateVideoCategory", "c_video_category/deleteVideoCategory");
        videoCategory.categoryDetailForm.reset();
        moduleBody.find(".videoCategoryTable").on("click", ".viewCategoryDetail", function(){
            var categoryID = $(this).parent().parent().attr("category_ID");
            var parentCategoryRequest = listParentCategory();
            parentCategoryRequest.done(function(){
                
                viewCategoryDetail(categoryID);
            })
        });
        /*Events*/
        videoCategory.categoryDetailForm.submitCreateSuccess = function(response){
            if(!response["error"].length){
                moduleBody.find("#videoCategoryDetail").hide();
                moduleBody.find("#createVideoCategory").parent().parent().show();
                videoCategory.tableCategory.retrieveEntry();
            }
        };
        videoCategory.categoryDetailForm.submitUpdateSuccess = function(response){
            if(!response["error"].length){
                videoCategory.tableCategory.retrieveEntry();
            }
        };
        videoCategory.categoryDetailForm.submitDeleteSuccess = function(){
            moduleBody.find("#videoCategoryDetail").hide();
                moduleBody.find("#createVideoCategory").parent().parent().show();
            videoCategory.tableCategory.retrieveEntry();
        };
        moduleBody.find("#createVideoCategory").click(function(){
            $(this).parent().parent().hide();
            moduleBody.find("#videoCategoryDetail").show();
            videoCategory.categoryDetailForm.createForm();
            
            listParentCategory();
        });
        moduleBody.find("#videoCategoryDetail .formActionButton").on("click", "button", function(){
            switch($(this).attr("action")){
                case "cancel" : 
                    moduleBody.find("#videoCategoryDetail").hide();
                    moduleBody.find("#createVideoCategory").parent().parent().show();
                    break;
            }
        });
        /*Function*/
        function listParentCategory(){
            moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").material_select('destroy');
            moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").empty();
            moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").append("<option value='"+0+"' >"+"No Parent"+"</option>");
            var request = api_request("C_video_category/retrieveVideoCategory", {}, function(response){
                if(!response["error"].length){
                    for(var x = 0; x < response["data"].length; x++){
                        moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").append("<option value='"+response["data"][x]["ID"]+"' >"+response["data"][x]["description"]+"</option>");
                    }
                }   
                moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").material_select();
            });
            return request;
        }
        function viewCategoryDetail(ID){
            videoCategory.categoryDetailForm.updateForm();
            var request = api_request("C_video_category/retrieveVideoCategory", {ID : ID}, function(response){
                if(!response["error"].length){
                    moduleBody.find("#videoCategoryDetail form input[name=ID]").val(response["data"]["ID"]);
                    moduleBody.find("#videoCategoryDetail form input[field_name=description]").val(response["data"]["description"]);
                    moduleBody.find("#videoCategoryDetail form select[field_name=parent_ID]").val(response["data"]["parent_ID"]);
                    moduleBody.find("#createVideoCategory").parent().parent().hide();
                    moduleBody.find("#videoCategoryDetail").show();
                    moduleBody.find("#videoCategoryDetail select[field_name=parent_ID]").material_select();
                }
                
            });
            
            return request;
        }
        function listCategory(data){
            for(var x = 0; x < data.length; x++){
                var newEntry = moduleBody.find(".prototype .videoCategoryEntry").clone();
                newEntry.attr("category_ID", data[x]["ID"]);
                newEntry.find(".description").text(data[x]["description"]);
                newEntry.find(".parentCategory").text((data[x]["parent_ID"]*1) ? data[x]["parent_description"] : "N/A");
                videoCategory.tableCategory.addEntry(newEntry);
            }
        };
        $('select').material_select();
    };
    
    $(document).ready(function(){
        var videoCategory = new systemApplication.module.videoCategory();
        
    });
</script>
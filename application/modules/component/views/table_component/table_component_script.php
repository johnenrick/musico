<script>
    /*Adding an asset*/
    load_asset("jquery.form.min.js");
    load_asset("jquery.matchHeight-min.js");
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var TableComponent = function (componentContainer, resultConfiguration, columnConfiguration, filterConfiguration) {
        var tableComponent = this;
        tableComponent.body = $("#pageComponentContainer .tableComponent").clone();//The HTML instance of the component. 
        tableComponent.body.prototype = tableComponent.body.find(".prototype");
        tableComponent.table = tableComponent.body.find(".tableEntry");
        componentContainer.append(tableComponent.body);
        //COLUMN
        if(typeof columnConfiguration !== "undefined"){
            var columnRow = document.createElement("TR");
            for(var ctr = 0; ctr < columnConfiguration.length; ctr++){
                var tableHead = tableComponent.body.prototype.find(".tableHead").clone();
                tableHead.find(".columnDescription").text(columnConfiguration[ctr]["description"]);
                if(typeof columnConfiguration[ctr]["table_column"] !== "undefined"){
                    tableHead.attr("table_column", columnConfiguration[ctr]["table_column"]);
                }else{
                    tableHead.attr("sort", "off");
                    tableHead.find(".fa-sort").hide();
                }
                //TODO default sort
//                if(typeof columnConfiguration[ctr]["default_sort"] !== "undefined"){
//                    tableHead.attr("sort", columnConfiguration[ctr]["default_sort"]);
//                }
                $(columnRow).append(tableHead);
                
            }
            
            tableComponent.body.find("table thead").append(columnRow);
        }
        var sortList = [];
        tableComponent.table.find(".tableHead").click(function(){
            var currentColumn = $(this);
            switch($(this).attr("sort")){
                case "none":
                    currentColumn.attr("sort", "asc");
                    currentColumn.find(".fa-sort").hide();
                    currentColumn.find(".fa-sort-asc").show();
                    if(sortList.indexOf(currentColumn.attr("table_column")) === -1){
                        sortList.push(currentColumn.attr("table_column"));
                    }
                    break;
                case "asc":
                    currentColumn.attr("sort", "desc");
                    currentColumn.find(".fa-sort-asc").hide();
                    currentColumn.find(".fa-sort-desc").show();
                    if(sortList.indexOf(currentColumn.attr("table_column")) === -1){
                        sortList.push(currentColumn.attr("table_column"));
                    }
                    break;
                case "desc":
                    currentColumn.attr("sort", "none");
                    currentColumn.find(".fa-sort-desc").hide();
                    currentColumn.find(".fa-sort").show();
                    sortList.splice(sortList.indexOf(currentColumn.attr("table_column")), 1);
                    break;
            }
            tableComponent.retrieveEntry();
        });
        /*Result*/
        if(typeof resultConfiguration.limit !== "undefined"){
            tableComponent.body.find(".filterResultForm input[name=result_limit]").val(resultConfiguration.limit);
        }
        tableComponent.body.find(".filterResultForm").attr("action", resultConfiguration.result_link);
        tableComponent.body.find(".filterResultForm").ajaxForm({
            beforeSubmit : function(data, $form, options){
                for(var x = 0; x < sortList.length;x++ ){
                    data.push({
                        name : "sort["+sortList[x]+"]",
                        required : false,
                        type : "text",
                        value : tableComponent.table.find(".tableHead[table_column="+sortList[x]+"]").attr("sort")
                    });
                }
            },
            success : function(data){
                var response = JSON.parse(data);
                tableComponent.table.find("tbody").empty();
                if(!response["error"].length){
                    if(typeof resultConfiguration.success !== "undefined"){
                        tableComponent.table.find(".resultCount").text((typeof response["result_count"] !== "undefined") ? response["result_count"]*1 : response["data"].length);
                        resultConfiguration.success(response["data"]);
                        
                    }else{
                        console.log("No Result Callback");
                    }
                }else{
                    for(var x = 0; x < response["error"].length; x++){
                        if(response["error"][x]["status"]*1 === 2){
                            tableComponent.table.find("tbody").append("<tr><td colspan='"+columnConfiguration.length+"'>No Result</td></tr>")
                        }
                    }
                }
            }
        });
        tableComponent.addEntry = function(newEntry){
            tableComponent.table.find("tbody").append(newEntry);
        };
        tableComponent.retrieveEntry = function(){
            tableComponent.body.find(".filterResultForm").trigger("submit");
        };
        tableComponent.retrieveEntry();
        
        /*Filter*/
        if(typeof filterConfiguration !== "undefined"){
            //offset
            var offsetClass = "";
            switch(filterConfiguration.length){
                case 1 :
                    offsetClass = "offset-m8 offset-l8";
                    break;
                case 2 :
                    offsetClass = "offset-m4 offset-l4";
                    break;
            }
            for(var x = filterConfiguration.length-1; x >=0;x--){
                var newFilter = tableComponent.body.find(".formFilterInput").clone();
                if(x===0){
                    newFilter.addClass(offsetClass);
                }
                if(filterConfiguration[x]["type"] === "hidden"){
                    newFilter.hide();
                }
                newFilter.find("input").attr("name", "condition["+filterConfiguration[x]["table_column"]+"]");
                newFilter.find("label").attr("for", filterConfiguration[x]["table_column"]);
                newFilter.find("label").text(filterConfiguration[x]["description"]);
                tableComponent.body.find(".filterResultFormInput").prepend(newFilter)
            }
        }
        $(".sameHeight").matchHeight();
    };
</script>
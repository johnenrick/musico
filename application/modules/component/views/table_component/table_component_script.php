<script>
    /*Adding an asset*/
    load_asset("jquery.form.min.js");
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var TableComponent = function (componentContainer, resultConfiguration, columnConfiguration) {
        var tableComponent = this;
        tableComponent.body = $("#pageComponentContainer .tableComponent").clone();//The HTML instance of the component. 
        tableComponent.body.prototype = tableComponent.body.find(".prototype");
        tableComponent.table = tableComponent.body.find("table");
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
                console.log(columnRow)
                
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
                    sortList.push(currentColumn.attr("table_column"));
                    break;
                case "asc":
                    currentColumn.attr("sort", "desc");
                    currentColumn.find(".fa-sort-asc").hide();
                    currentColumn.find(".fa-sort-desc").show();
                    sortList.push(currentColumn.attr("table_column"));
                    break;
                case "desc":
                    currentColumn.attr("sort", "none");
                    currentColumn.find(".fa-sort-desc").hide();
                    currentColumn.find(".fa-sort").show();
                    sortList.push(currentColumn.attr("table_column"));
                    break;
            }
        });
        /*Result*/
        tableComponent.body.find(".filterResultForm").attr("action", resultConfiguration.result_link);
        tableComponent.body.find(".filterResultForm").ajaxForm({
            beforeSubmit : function(){
            },
            success : function(data){
                var response = JSON.parse(data);
                tableComponent.table.find("tbody").empty();
                if(!response["error"].length){
                    if(typeof resultConfiguration.success !== "undefined"){
                        tableComponent.table.find(".resultCount").text(response["result_count"]*1);
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
        }
        tableComponent.retrieveEntry = function(){
            tableComponent.body.find(".filterResultForm").trigger("submit");
        };
        tableComponent.retrieveEntry();
        /*Filter*/
        tableComponent.body.find(".openFilter").click(function(){
            $(this).hide();
            tableComponent.body.find(".filterResultForm").show("slide", { direction: "up" }, 500);
            tableComponent.body.find(".closeFilter").show();
            
        });
        tableComponent.body.find(".closeFilter").click(function(){
            $(this).hide();
            tableComponent.body.find(".filterResultForm").hide("slide", { direction: "up" }, 500);
            tableComponent.body.find(".openFilter").show();
            
        });
    };
</script>
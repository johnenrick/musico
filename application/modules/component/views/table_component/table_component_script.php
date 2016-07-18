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
                var tableHead = tableComponent.body.prototype.find(".tableHead");
                tableHead.find(".columnDescription").text(columnConfiguration[ctr]["description"]);
                if(typeof columnConfiguration[ctr]["table_column"] !== "undefined"){
                    tableHead.attr("table_column", columnConfiguration[ctr]["table_column"]);
                }
                if(typeof columnConfiguration[ctr]["default_sort"] !== "undefined"){
                    tableHead.attr("sort", columnConfiguration[ctr]["default_sort"]);
                }
                $(columnRow).append(tableHead);
            }
            tableComponent.body.find("table").append(columnRow);
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
            }
        });
    };
</script>
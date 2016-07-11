<script>
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var TableComponent = function (componentContainer,columnList[]) {
        var tableComponent = this;
        tableComponent.body = $("#pageComponentContainer .tableComponent").clone();//The HTML instance of the component. 
        componentContainer.append(tableComponent.body);
    };
</script>
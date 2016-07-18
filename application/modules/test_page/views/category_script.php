<script>
$(document).ready(function(){
    load_component('Table_component',function(){
        var tableHeader = [{
                description : "Column1"
        }]
        var tableCategory = new TableComponent($('.categoryListTable'), tableHeader);
    });
});


</script>
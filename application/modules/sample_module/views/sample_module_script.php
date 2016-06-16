<script>
    /*Global Variable for this module. This is also the moduleName*/
    var sampleModule = function(){
        sampleModule = this;
        function testing(){
            $.confirm({
                title: 'Confirm!',
                content: 'Simple confirm!'
            });
        }
    };
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    $(document).ready(function(){
        var test = new sampleModule();
    });
</script>
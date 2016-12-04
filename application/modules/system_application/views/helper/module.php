<script>
    var Module = function(moduleBody) {
        var module = this;
        module.body = moduleBody;
        module.readyFlagValue = 0;
        module.readyFlag = 0;
        module.isReady = function(){
            module.readyFlag++;
            if(module.readyFlag >= module.readyFlagValue){
                module.ready();
            }
        }
        moduleBody.find("[id]").each(function(){
            module[$(this).attr("id")] = $(this);
        });
       
        return module;
    };
    var init_sub_module = function(subModule, parentModule, subModuleBody){
        var subModuleInstant = new Module(subModuleBody);
        jQuery.extend(subModule, subModuleInstant);
        subModule.parentModule = parentModule;
        subModule.isReady = 0;
        subModule.isReady = function(){
            subModule.readyFlag++;
            if(subModule.readyFlag >= subModule.readyFlagValue){
                setTimeout(function(){
                    parentModule.isReady();
                },10);
                
                
            }
        };
        
    };
</script>
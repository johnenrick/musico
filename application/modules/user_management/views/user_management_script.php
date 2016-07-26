<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    systemApplication.module.userManagement = function(){
        var userManagement = this;//instance of the module
        var moduleBody = userManagement.body = $("#userManagement");
        load_component("table_component", function(){
            var columnConfiguration = [{
                description : "Username",
                table_column : "account__username",
                default_sort : 1
            },{
                description : "Firstname",
                table_column : "account_information__first_name",
                default_sort : 1
            },{
                description : "Middlename",
                table_column : "account_information__middle_name",
                default_sort : 0
            },{
                description : "Lastname",
                table_column : "account_information__last_name",
                default_sort : 2
            },{
                description : "Action"
            }];
            var filterConfiguration = [{
                    description : "Search",
                    table_column : "like__account_information__first_name",
                    type : "text"
            }];
            var resultConfiguration = {
                result_link : api_url("C_account/retrieveAccount"),
                success : listCategory,
                limit : 5
            };
            userManagement.tableCategory = new TableComponent(moduleBody.find('.userManagementTable'), resultConfiguration, columnConfiguration, filterConfiguration);
        });
       
        function listCategory(data){
            for(var x = 0; x < data.length; x++){
                var newEntry = moduleBody.find(".prototype .userManagementEntry").clone();
                newEntry.find(".username").text(data[x]["username"]);
                newEntry.find(".firstname").text(data[x]["first_name"]);
                newEntry.find(".middlename").text(data[x]["middle_name"]);
                newEntry.find(".lastname").text(data[x]["last_name"]);
                newEntry.find('.edit-btn').click(function(){
                    $('#createBtn').hide();
                    $('#modal1').openModal();
                });
                        
                userManagement.tableCategory.addEntry(newEntry);
            }
        }      
        moduleBody.find('.adduser-btn').click(function(){
            $('#updateBtn').hide();
            $('#modal1').openModal();
        });
        moduleBody.find('.edit-btn').click(function(){
            changeFieldName('update', moduleBody.find('#informationForm'));
            moduleBody.find('#informationForm').attr("action","api_url(C_account/updateAccount)");
        });
        moduleBody.find('.adduser-btn').click(function(){
            console.log(moduleBody.find('#informationForm'));
            changeFieldName('create', moduleBody.find('#informationForm'));
            moduleBody.find('#informationForm').attr("action","api_url(C_account/createAccount)");
        });    
    };
      
    $(document).ready(function(){
        var userManagement = new systemApplication.module.userManagement();
    });
</script>

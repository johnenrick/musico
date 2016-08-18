<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Module Object*/
    var MemberProfile  = function(){
        var memberProfile = this;//instance of the module
        var moduleBody = memberProfile.body = $("#memberProfile");
        
        /*Load Tabs*/
        load_sub_module("member_profile/homeTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileHomeTab(moduleBody);
            moduleBody.find('ul.tabs').tabs('select_tab', 'memberProfileHomeTab');
        });
        load_sub_module("member_profile/aboutTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileAboutTab(moduleBody);
        });
        load_sub_module("member_profile/videoTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileVideoTab(moduleBody);
        });
        
        memberProfile.reload = function(){//function to run if the module is already been loaded
            
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.memberProfile = new MemberProfile();
    });
</script>
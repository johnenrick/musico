<script>
    load_asset("module/member_profile_home_tab.css");
    var MemberProfileVideoTab = function(memberProfile){
        var memberProfileVideoTab = this;
        var moduleBody = memberProfile.body;
        var subModuleBody = moduleBody.find("#memberProfileVideoTab");
        $('ul.tabs').tabs();
        //TODO Place video uploading code here
    };
</script>
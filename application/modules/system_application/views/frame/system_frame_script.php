<script>
    /*global system_data*/
    function setSystemFrameCredential(){
        if(system_data.account_information.user_ID){//Log In
            $(".headerLogin").hide();//Header Log In button
            $(".headerAuthentication").hide();//Header Join button
            $(".sidebarAuthentication").hide();//Sidebar athentication
            $(".playlistSidebar").show();//Playlist sidebar
            
        }else{//Log Out
            $(".headerLogin").show();//Header Log In button
            $(".headerAuthentication").show();//Header Join button
            $(".sidebarAuthentication").show();//Sidebar athentication
            $(".playlistSidebar").hide();//Playlist sidebar
        }
    }
    $(document).ready(function(){
    });
</script>
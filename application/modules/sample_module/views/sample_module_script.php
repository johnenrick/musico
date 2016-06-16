<script>
//load_asset("jquery-confirm.js");
$(document).ready(function(){
    $.confirm({
        title: 'Confirm!',
        content: 'Simple confirm!',
        confirm: function(){
            $.alert('Confirmed!');
        },
        cancel: function(){
            $.alert('Canceled!')
        }
    });
});
</script>
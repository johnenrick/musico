<div id="userManagement">
    <div class="row"></div>
    <div class="col ">
        <div class="row">
            <button class="modal-trigger adduser-btn btn red darken-3" style="margin-left:auto; margin-right:auto; padding-left:10px; padding-right:10px;"><i class="fa fa-plus" aria-hidden="true"></i> Add User</button>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l12">
            <div class="userManagementTable">
            </div>
        </div>
    </div>
    <div class="prototype">
        <table>
            <tr class="userManagementEntry">
                <td class="username"></td>
                <td class="firstname"></td>
                <td class="middlename"></td>
                <td class="lastname"></td>
                <td><button class="modal-trigger edit-btn btn blue darken-1" style="margin-left:auto; margin-right:auto; padding-left:10px; padding-right:10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
            </tr>
        </table>
    </div>
    <!--Modal Structure-->
    <div id="modal1" class="modal modal-fixed-footer">
        <form  method="POST" action="" id="informationForm">    
            <input field_name="userInfoAccountType" value="" type="hidden" class="validate">
            <input field_name="userInfoStatus" value="" type="hidden" class="validate">
            <div class="modal-content">
                <h5 class="modal-title">User Information</h5>
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoUsername" value="" type="text" class="validate" data-error=".errorTxt7">
                    <label for="userInfoUsername" class="">Username</label>
                </div>
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoPassword" value="" type="password" class="validate" data-error=".errorTxt7">
                    <label for="userInfoPassword" class="">Password</label>
                </div>
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoFirstname" value="" type="text" class="validate">
                    <label for="userInfoFirstname" class="">Firstname</label>
                </div>
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoMiddlename" value="" type="text" class="validate">
                    <label for="userInfoMiddlename" class="">Middlename</label>
                </div>
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoLastname" value="" type="text" class="validate">
                    <label for="userInfoLastname" class="">Lastname</label>
                </div>  
                <div class="input-field col s12 m6 l6">              
                    <input field_name="userInfoEmail" value="" type="email" class="validate">
                    <label for="userInfoEmail" class="">E-mail</label>  
                </div> 
            </div>
            <div class="modal-footer">
                <button href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
                <button href="#!" class="modal-action waves-effect waves-green btn-flat" id="createBtn">Create</button>
                <button href="#!" class=" modal-action waves-effect waves-green btn-flat" id="updateBtn">Update</button>
            </div>
        </form>
    </div>
</div>
<div id="memberProfileAboutTab" >
        <div class="row profileView white padding-20 no-display">
            <div class="col s12">
                <div class="row valign-wrapper">
                    <div class="col m2 offset-m4">
                        <img src="<?= asset_url("image/profpic.jpg") ?>" alt="" class="circle responsive-img pull-right" style="max-height:160px"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col m6" >
                        <span class="red-text flow-text text-darken-1 profileFullName"> Jane Doe </span><br>
                        <span class="grey-text small text-darken-1 profileEmail"> JaneDoe@gmail.com</span><br>
                        <span class="grey-text small text-darken-1 profileCountry">Philippines</span>

                    </div>
                </div>
            
                <div class="row">
                    <div class="col l10 offset-l1 profileBiography center-justified">
                        Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.
                    </div>
                </div>
                </div>
        </div>
    
    <div class="row profileSetting no-display white">
        <form class="profileSettingForm" method="POST">
            <input  name="ID" type="hidden">
            <div class="col s12 m12 l6 ">
                <div class="section">
                    <h5 class="red-text text-darken-1"><i class="fa fa-user" aria-hidden="true"></i> Personal Information </h5>
                    <div class="row ">
                        <div class="input-field col s12 m4">
                            <input  field_name="first_name" type="text" class="validate">
                            <label class="active" data-error="Invalid Data">First Name</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input  field_name="middle_name" type="text" class="validate">
                            <label class="active">Middle Name</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input  field_name="last_name" type="text" class="validate">
                            <label class="active">Last Name</label>
                        </div>
                        
                    </div>
                    <div class="row ">
                        <div class="input-field col s12 m4">
                            <input  field_name="country" type="text" class="validate">
                            <label class="active">Country</label>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col s12 m12 l6  ">
                <h5 class="red-text text-darken-1" ><i class="material-icons dp48">subject</i> About Yourself</h5>
                <div class="row ">
                    <div class="input-field col s12">
                        <input  name="condition[account_biography__ID]" type="hidden">
                        <textarea field_name="account_biography__detail" class="materialize-textarea"></textarea>
                        <label class="active">Say something about yourself...</label>
                    </div>
                </div>
            </div>
            
            <div class="col s12 m12 l12  white ">
                <div class="row ">
                    <div class="col s12 align-right right-align">
                        <label class="formLabelIndicator label-danger right-align no-display">Failed !</label>
                        <label class="formLabelIndicator label-success right-align no-display">Success !</label>
                        <button type="submit" class="btn waves-effect waves-light green darken-1 "><i class="fa fa-save" aria-hidden="true"></i> Save </button>
                        <button type="reset" class="btn waves-effect waves-light red darken-1 "><i class="fa fa-remove" aria-hidden="true"></i> Discard </button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <div class="row profileSetting no-display">
        <div class="col s12 m6 l6  white ">
            <div class="section">
                <h5 class="red-text text-darken-1" ><i class="fa fa-lock" aria-hidden="true"></i> Log In Credential</h5>
                <div class="row ">
                    <div class="input-field col s12">
                        <input  field_name="email_address" type="text" class="validate">
                        <label class="active">Email</label>
                    </div>
                    <div class="input-field col s12 no-display">
                        <input  field_name="account__password" type="text" class="validate">
                        <label class="active">Password</label>

                    </div>
                    <div class="col s12 align-center">
                        <button type="button" class="btn-sm waves-effect waves-light yellow darken-2 yellow"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
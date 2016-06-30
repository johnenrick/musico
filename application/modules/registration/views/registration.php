<style>
.ui-autocomplete {
    z-index: 5000;
}
</style>
<div class="section white">
    <div class="row">
    	<button data-target="registrationModal" id="modal" class="btn modal-trigger waves-effect waves-light red darken-1 right" type="button" name="action">JOIN US
	  	</button>
    </div>
 </div>
<!--  modal -->
<div id="registrationModal" class="modal custom">
	<div class="modal-content white">
		<div class="row">
			<div class="col l6 m12 s12">
				<h5 class="center-align">Become a member</h5>
				<p class="grey-text center-align"><small>Be part of the largest video sharing website ever </small></p>
			    <form class="col m12 s12" method="POST" action="" id="registrationForm">
			        <div class="input-field col l6 m12 s12">
			          <input id="username" type="text" class="validate hide" name="username">
			          <input id="firstName" type="text" class="validate" name="first_name">
			          <label for="firstName">First Name</label>
			        </div>
			        <div class="input-field col l6 m12 s12">
			          <input id="middleName" type="tel" class="validate" name="middle_name">
			          <label for="middleName">Middle Name</label>
			        </div>
			        <div class="input-field col l6 m12 s12">
			          <input id="lastName" type="text" class="validate" name="last_name">
			          <label for="lastName">Last Name</label>
			        </div>
			        <div class="input-field col l6 m12 s12">
			          <input id="email" type="email" class="validate" name="email_address">
			          <label for="email">Email Address</label>
			        </div>
			        <div class="input-field col l6 m12 s12">
			          <input id="password" type="password" class="validate" name="password">
			          <label for="password">Password</label>
			        </div>
			        <div class="input-field col l6 m12 s12 country">
			        	<input id="country" type="text" class="validate" name="country">
			        	<label for="country">Country</label>
			        </div>
			        <input id="account_type_ID" type="text" class="validate hide" name="account_type_ID" value="3">
			        <input id="status" type="text" class="validate hide" name="status" value="2">
<!-- 			        <div class="col m12">
			        	<div class="g-recaptcha" data-sitekey="6LdvvSMTAAAAABPTLBegLzB_ZcJGHBDOzv6fK3DX"></div>
			        </div> -->
			        <div class="col m12 s12">
			        <button class="btn waves-effect waves-light red darken-1">REGISTER</button>
			        </div>
			    </form>
				<!-- <div class="card-panel "><a class="btn-flat"><small>BUTTON</small></a></div>
			    <div class="card-panel "><a class="btn-flat"><small>SIGN UP USING FACEBOOK</small></a></div>
			    <div class="card-panel "><a class="btn-flat"><small>SIGN UP USING TWITTER</a></small></div> -->
			</div>
			<div class="image-wrapper hide-on-med-and-down" class="col l5">
				<img src="<?=asset_url("image/side.png")?>"><img>
			</div>
		</div>
	</div>
</div>
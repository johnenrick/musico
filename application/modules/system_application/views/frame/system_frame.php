<!DOCTYPE html>
<html>

<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import Google Icon Font-->
    <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/system_frame.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/positioning.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/helper.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/jquery-ui.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/materialize_icon.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/positioning.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/text_style.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/button.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/label.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/modal.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/collection.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/input.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/card.css" media="screen,projection" />

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?=asset_url()?>js/core/jquery.min.js"></script>
    <script type="text/javascript" src="<?=asset_url()?>js/core/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=asset_url()?>js/core/materialize.min.js"></script>
    
    <!--Import customized style-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/common.css" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/font-awesome.min.css" media="screen,projection" />
</head>

<body>


    <div id="profile-popup" class="no-line-height dropdown-content grey-text text-darken-3">
        <div class="row valign-wrapper no-margin-bot">
            <div class="col s4">
                <img class="profilePhoto" src="<?=  asset_url()?>image/profpic.jpg" alt="" class="circle responsive-img pull-left" style="max-height:160px"> <!-- notice the "circle" class -->
            </div>
            <div class="col s8 valign red-text text-darken-1 ">
                <h6 class="userFullName">TEST LANG</h6>
            </div>
            
        </div>
        <div class="row no-margin-bot center-align">
            <div class="col s12">
                <hr class="red-outline">
            </div>
        </div>
        <div class="row center-align no-line-height margin-bottom-10">
            <div class="col s6">
                <button id="viewProfile" class="waves-effect waves-light btn btn-sm red-outline white darken-4"><span> Profile</span></button>
            </div>
            <div class="col s6">
                <button class="logout waves-effect waves-light btn btn-sm grey-outline white darken-4"><span> Log Out</span></button>
            </div>
        </div>
    </div>
    <!-- Navbar goes here -->
    <nav id="page-header">
        <div class="nav-wrapper red darken-3">
            <a class="brand-logo">Logo</a>
            <a data-activates="mobile-nav" class="button-collapse">&nbsp; <i class="fa fa-align-justify" aria-hidden="true"></i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="headerLogin">Log in</a></li>
                <li><a class="waves-effect waves-dark btn white grey-text text-darken-2 headerAuthentication">Join</a></li>
                <li><a><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></li>
                <li id="profile-btn">
                    <a class="dropdown-button" href="#!" data-activates="profile-popup"><img class="profilePhoto" src="<?=asset_url()?>image/profpic.png" /></a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-nav">
                <li><a class="moduleLink" moduleLink="portal" module_name="Portal">Home</a></li>
                <li><a>Profile</a></li>
                <li><a>Featured</a></li>
                <li><a>Events</a></li>
                <li class="contactPageLink"><a>Contact Us</a></li>
            </ul>
        </div>
    </nav>


    <!-- Page Layout here -->
    <div id="content-container" class="row">

        <div id="side-nav-large-container" class="col l2 hide-on-med-and-down">
            <ul id="side-nav-large">
                <li><a class="moduleLink" module_link="portal" module_name="Portal Page" href="#" class="valign-wrapper"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li><a href="#" class="valign-wrapper"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Featured</a></li>
                <li><a href="#" class="valign-wrapper"><i class="fa fa-calendar-o" aria-hidden="true"></i>Events</a></li>
                <li><a href="#" class="contactPageLink valign-wrapper"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a></li>
            </ul>
            <hr class="playlistSidebar">
            <ul id="side-nav-large" class="playlistSidebar" style="display:none">
                <li><span class="white-text">PLAYLIST</span></li>
                <li><a href="#" class="valign-wrapper"><i class="fa fa-indent" aria-hidden="true"></i>My Playlist</a></li>
                <li><a href="#" class="valign-wrapper"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Liked Videos</a></li>
                <li><a href="#" class="valign-wrapper"><i class="fa fa-star-o" aria-hidden="true"></i>Saved Artists</a></li>
            </ul>
            <hr class="adminSidebar">
            <ul id="side-nav-large" class="adminSidebar" style="display:none">
                <li><span class="white-text">ADMIN</span></li>
                <li><a class="moduleLink" module_link="user_management" module_name="User Management" href="#" class="valign-wrapper"><i class="fa fa-users" aria-hidden="true"></i>Admin User</a></li>
                <li><a class="moduleLink" module_link="video_category" module_name="Video Category" href="#" class="valign-wrapper"><i class="fa fa-th-list" aria-hidden="true"></i>Video Category</a></li>
            </ul>

            <ul class="sidebarAuthentication no-padding " style="display:none">
                <li><a class="headerAuthentication waves-effect waves-light btn red darken-4">Sign Up</a></li>
                <li><p class="center white-text">or</p></li>
                <li><a class="headerLogin waves-effect waves-dark btn white grey-text text-darken-2">Login</a></li>
            </ul>
            
            
            
        </div>

        <div id="page-content-container" class="col m12 l10">

            <div id="mainContent">

            </div>
            <footer class="page-footer footer-copyright white">
                <div class="container ">
                    <div class="row">
                        <div class="col l12 s12">
                            <h5>Logo</h5>
                            <ul class="links">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Term of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>


        </div>

    </div>
    <script type="text/javascript" src="<?=asset_url()?>js/global.js"></script>
</body>

</html>

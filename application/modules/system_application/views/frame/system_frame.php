<!DOCTYPE html>
<html>

<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/system_frame.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/positioning.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/custom/helper.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/jquery-ui.min.css" media="screen,projection" />
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?=asset_url()?>js/core/jquery.min.js"></script>
    <script type="text/javascript" src="<?=asset_url()?>js/core/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=asset_url()?>js/core/materialize.min.js"></script>
    
    <!--Import customized style-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/common.css" />
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/core/font-awesome.min.css" media="screen,projection" />
</head>

<body>


    <div id="profile-popup" class="dropdown-content grey-text text-darken-3">
        <h4>Profile</h4>
        <p>sdasdasdasdasd</p>
    </div>
    <!-- Navbar goes here -->
    <nav id="page-header">
        <div class="nav-wrapper red darken-3">
            <a class="brand-logo">Logo</a>
            <a data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="headerLogin">Log in</a></li>
                <li><a class="waves-effect waves-dark btn white grey-text text-darken-2 headerAuthentication">Join</a></li>
                <li><a>Upload</a></li>
                <li id="profile-btn">
                    <a class="dropdown-button" href="#!" data-activates="profile-popup"><img src="<?=asset_url()?>image/profpic.png" /></a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-nav">
                <li><a>Home</a></li>
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
                <li><a href="#" class="valign-wrapper"><i class="material-icons">home</i>Home</a></li>
                <li><a href="#" class="valign-wrapper"><i class="material-icons">featured_play_list</i>Featured</a></li>
                <li><a href="#" class="valign-wrapper"><i class="material-icons">event</i>Events</a></li>
                <li><a href="#" class="contactPageLink valign-wrapper"><i class="material-icons">phone</i>Contact Us</a></li>
            </ul>
            <hr>
            <ul id="side-nav-large" class="playlistSidebar">
                <li><span class="white-text">PLAYLIST</span></li>
                <li><a href="#" class="valign-wrapper"><i class="material-icons">queue_music</i>My Playlist</a></li>
                <li><a href="#" class="valign-wrapper"><i class="material-icons">favorite_border</i>Liked Videos</a></li>
                <li><a href="#" class="valign-wrapper"><i class="material-icons">star_border</i>Saved Artists</a></li>
            </ul>

            <ul class="sidebarAuthentication no-padding ">
                <li><a class="headerAuthentication waves-effect waves-light btn red darken-4">Sign Up</a></li>
                <li><p class="center white-text">or</p></li>
                <li><a class="headerLogin waves-effect waves-dark btn white grey-text text-darken-2">Login</a></li>
            </ul>
            
            
            
        </div>

        <div id="page-content-container" class="col m12 l10">

            <div id="mainContent" class="row">

            </div>
            <footer class="page-footer">
                <div class="container">
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

<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element')
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="https://img.icons8.com/plasticine/50/000000/home.png"/>OWNER AREA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
		
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $name;?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="view_owner.php"><i class="fa fa-fw fa-user"></i> Profile</a>
						<a class="dropdown-item" href="change_pw.php"><i class="fa fa-key"></i> Change Password</a>
                        <a class="dropdown-item" href="setting.php"><i class="fa fa-fw fa-lock"></i> Security Question</a>
						
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;" onClick="javascript:logout();"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </div>
                </li>
            </ul>
			  	<div id="google_translate_element">
					<div class="skiptranslate goog-te-gadget" dir="ltr">
						<div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;">
						<span style="vertical-align: middle; margin:left"></span>
						</div>
					</div>
				</div>
        </nav>

<!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
-->
	  <script>
	  function logout(){
		document.location = "owner_logout.php";
	}
		
	</script>	
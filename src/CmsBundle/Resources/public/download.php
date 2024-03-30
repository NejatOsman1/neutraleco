<?php
session_start();

if(!empty($_POST['_username']) && !empty($_POST['_password'])){
	if($_POST['_username'] === 'tjongerschans' && $_POST['_password'] === 'zorg'){
		$_SESSION['login'] = 1;
	}else{
		die('Ongeldige login');
	}
}

$uri = str_replace('/secure/', '', $_SERVER['REQUEST_URI']);
if(preg_match('/^(.*?)\/(.*?)\/(.*?)$/', $uri, $m)){
	if(!empty($_SESSION['login'])){
		$path = '/secure/' . $m[1] . '/' . $m[2] . '/' . $m[3];
		
		$file = str_replace('/src/CmsBundle/Resources/public', '', __DIR__) . $path;

		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file) . "\""); 
		readfile($file);
		exit;
	}else{
		?>
		<!-- <div style="position: absolute;     top: 44%;     left: 50%;     width: 160px;     text-align: center;     margin-left: -100px;     background: #eee; padding:20px;     border-radius: 10px;">
			<form method="post" style="margin: 0;padding:0;">
				<div>
					<input type="text" name="usr" placeholder="Gebruikersnaam" style="width:100%;" />
				</div>
				<div style="margin-top: 20px;">
					<input type="password" name="pwd" placeholder="Wachtwoord" style="width:100%;" />
				</div>
				<div style="margin-top: 20px;">
					<button type="submit" style="width:100%;">Inloggen</button>
				</div>
			</form>
		</div> -->
		<link href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
		<link href="//use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="/pweb/stylesheets/style.css">

		<section class="login-container">
		  <div class="d-flex align-items-center h-100">
		    <div class="card login-form">
		      <div class="card-body">
		        <form method="post">
		          <div class="title">
		            <h1>Pweb.</h1>
		            <h4>Tjongerschans</h4>
		          </div>

		          
		          
		          <div class="form-group">
		            <div class="field-wrapper">
		              <i class="fa fa-user"></i>
		              <input placeholder="Gebruikersnaam" autocomplete="off" type="text" class="form-control" id="_username" name="_username" value="">
		            </div>
		          </div>

		          <div class="form-group">
		            <div class="field-wrapper">
		              <i class="fa fa-lock"></i>
		              <input placeholder="Wachtwoord" autocomplete="off" type="password" class="form-control" id="_password" name="_password">
		            </div>
		          </div>

		          
		          <button type="submit" name="login" class="btn btn-primary">
		            Inloggen
		            <i class="fa fa-lock"></i>
		          </button>
		        </form></div>

		        <input type="hidden" name="_target_path" value="homepage">
		        <input type="hidden" name="_failure_path" value="homepage">
		      
		    </div>
		  </div>
		</section>
		<?php
	}
}else{
	die('invalid');
}
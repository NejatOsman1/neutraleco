<?php
// Clear opcache (PHP cache)
opcache_reset();

// Redirect back to requested URL
if(!empty($_GET['url'])){
	header('Location: ' . $_GET['url']);
	exit;
}

// Notify about cleared cache
?>
<div style="margin-top: 30px;text-align:center;">
	<i class="material-icons" style="font-size: 100px;     margin-bottom: 20px;     color: #1d88e5;">check_circle_outline</i>
	<h4>De cache is gewist.</h4>
</div>

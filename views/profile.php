<h1>Hello, <?php echo $name; ?></h1>
<tt><?php echo sd_base_url(); ?></tt>
<?php
	var_dump($GLOBALS['db_connection']);
	echo sd_hash('213');
	sd_redirect(sd_base_url('home/username/khizer'));
?>	

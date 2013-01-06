<html>
<head>
	<title><?="Error $AA_STATUS_CODE - $AA_REASON_PHRASE";?></title>
	<meta name="robots" content="NOINDEX,NOFOLLOW" />
	<?if(SHOW_CONTACT):?>
	<meta name="author" content="<?=ADMIN_NAME?>" />
	<meta name="contact" content="<?=ADMIN_EMAIL?>" />
	<?endif;?>

	<style>
		* { margin: 0; padding: 0; }
		article {
			width: 600px;
			margin: 3em auto;
			border-radius: 2em 0;
			color: black;
			background-color: #FFDFDF;
			border: 1px dashed red;
		}
		header, section, footer {
			padding: 1.5em;
		}
		header {
			text-align: center;
			padding-bottom: 0;
			border-bottom: 2px solid red;
		}
		section {
			padding-bottom: 0;
		}
		p, br {
			margin-bottom: 1em;
		}
		.errorMessage {}
		.adminEmail {
			text-align: left;
		}
		footer {
			border-top: 2px solid red;
			text-align: right;
		}
	</style>
</head>
<body>
<article>
	<header>
		<h1><?="Error $AA_STATUS_CODE - $AA_REASON_PHRASE";?></h1>
	</header>
	<section>
		<p class="errorMessage">
			<?=$AA_MESSAGE;?>
		</p>
		<p class="requested">
			You requested: <a href="<?=($TO_RECORD['https'])?'https':'http'?>://<?=$TO_RECORD['http_host'] . $TO_RECORD['uri']?>"><?=($TO_RECORD['https'])?'https':'http'?>://<?=$TO_RECORD['http_host'] . $TO_RECORD['uri']?></a>
		</p>
		
	</section>
	<footer>
		<p class="adminEmail">
			We logged the error and our server adminstrator will have a look at it. For now you can go back to the <a href="<?=HOMEPAGE?>">home page</a> or try again.<br /><br />
			<?if(SHOW_CONTACT):?>If this situation persists, please <a href="mailto:<?=ADMIN_EMAIL;?>">contact us</a>.<?endif;?>
		</p>
		<a href="<?=HOMEPAGE?>">Home Page</a>
	</footer>
</article>
</body>
</html>
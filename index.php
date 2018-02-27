<?php
// You can put PHP here and it will execute!
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js no-svg">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gutenberg Plugin Compatibility</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css" />
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
	<style>
		.container {
			margin-left: auto;
			margin-right: auto;
			max-width: 860px;
		}
		.page-header,
		.page-footer {
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.kn-container.kn-scene {
			padding-left: 0;
			padding-right: 0;
		}
		.kn-container .kn-label {
			color: white;
		}
		.kn-container .filters-list select:not(empty)::after,
		.kn-container .kn-select:not(empty)::after {
			display: none;
		}
	</style>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49623239-2"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-49623239-2');
	</script>

</head>
<body>

	<div class="container">
		<header class="page-header">
			<h1><a href="/">Gutenberg Plugin Compatibility</a></h1>
		</header>

		<div class="page-content">
			<p>Help us test Gutenberg plugin compatibility!</p>

			<p><strong><em>How do I know whether a plugin is compatible with Gutenberg?</em></strong></p>

			<p>For our purposes, a plugin is compatible with Gutenberg when:</p>
			<ol>
				<li>A WordPress user can perform the same functional task with Gutenberg active. For instance, the "Add Media" button doesn't exist in Gutenberg, but a WordPress user can add media with the inserter. Feature-parity, essentially.</li>
				<li>There are no (obvious) errors when the WordPress plugin is active alongside Gutenberg.</li>
			</ol>

			<p><strong><em>Why are you doing this?</em></strong></p>

			<p>We want to make sure everyone can use Gutenberg but <em>plugin incompatibility</em> is a likely reason they won't be able to. Having this compatibility data will help us strategize the WordPress 5.0 release process.</p>

			<p><strong><em>This sounds important. What do I need to do?</em></strong></p>

			<p>Simply launch an environment, test the installed plugin, and record your results. If you have questions, please <a href="https://github.com/danielbachhuber/gutenberg-plugin-compatibility/issues">open an issue</a> and we'll do our best to clarify.</p>

			<div class="callout warning" id="requires-login" style="display:none;">
				<p>Plugin testing requires signing in. Please register for an account, and sign in once your account is approved.</p>
			</div>

			<div class="button-group">
				<a id="register-login" href="#account-details" class="button" disabled="disabled" style="display:none;">Register / Login</a>
				<button id="launch-test-button" class="button" disabled="disabled">Launch Test Environment</button>
			</div>

			<div id="knack-dist_2">Loading plugin database over the internet...</div>
			<script type="text/javascript">app_id="5a7a319707b4fd4dcd5ab1a5";distribution_key="dist_2";</script><script type="text/javascript" src="https://loader.knack.com/5a7a319707b4fd4dcd5ab1a5/dist_2/knack.js"></script>

		</div>

		<footer class="text-center page-footer">
			<small>Foo bar &bull; <a target="_blank" href="https://github.com/danielbachhuber/gutenberg-plugin-compatibility/">Hack this site</a></small>
		</footer>

	</div>

	<a target="_blank" href="https://github.com/danielbachhuber/gutenberg-plugin-compatibility"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/82b228a3648bf44fc1163ef44c62fcc60081495e/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png"></a>

</body>
</html>

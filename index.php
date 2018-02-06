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
	<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
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
	</style>
</head>
<body>

	<div class="container">
		<header class="page-header">
			<h1>Gutenberg Plugin Compatibility</h1>
		</header>

		<div class="page-content">
			<p><strong>Hello world!</strong> You might be wondering... what is this page doing on the internet? Read on, curious one, read on &mdash; and if you're still confused, please <a href="https://github.com/danielbachhuber/gutenberg-plugin-compatibility/issues">open an issue</a>.</p>
			<h3 id="overview">Overview</h3>
			<p><a href="https://wordpress.org/gutenberg/">Gutenberg</a> is WordPress' next-generation editor. It's pretty shiny and awesome. We want to make sure everyone can use it when WordPress 5.0 is released.</p>
			<p>"But how do we know whether sites are compatible?" you might ask.</p>
			<p>Great question! Most WordPress installations have a dozen or more active plugins, so <em>plugin incompatibility</em> is the most likely reason someone can't use Gutenberg on day one. It sure would be helpful if we had a way to capture this data!</p>

			<h3 id="plugin-testing">Plugin Testing</h3>
			<p>We're building a giant ol' database of Gutenberg plugin compatibility, and we'd love to have your help.</p>
			<p>For our purposes, compatibility is defined as:</p>
			<ol>
				<li>A WordPress user can perform the same functional task with Gutenberg active.</li>
				<li>There are no (obvious) errors when the WordPress plugin is active alongside Gutenberg.</li>
			</ol>

			<p>Want to help us test? Simply launch a test environment and then record your results.</p>

			<h3>Our Results</h3>

			<div id="knack-dist_2">Loading results over the internet...</div>
			<script type="text/javascript">app_id="5a7a319707b4fd4dcd5ab1a5";distribution_key="dist_2";</script><script type="text/javascript" src="https://loader.knack.com/5a7a319707b4fd4dcd5ab1a5/dist_2/knack.js"></script>

		</div>

		<footer class="text-center page-footer">
			<small>Foo bar</small>
		</footer>

	</div>

	<a href="https://github.com/danielbachhuber/gutenberg-plugin-compatibility"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/82b228a3648bf44fc1163ef44c62fcc60081495e/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png"></a>

</body>
</html>

Gutenberg Plugin Compatibility
==============================

## Overview

This project's goal is to produce a database documenting whether or not WordPress plugins are compatible with [Gutenberg](https://wordpress.org/gutenberg/).

**_How do I know whether a plugin is compatible with Gutenberg?_**

For our purposes, a plugin is compatible with Gutenberg when:

* A WordPress user can perform the same functional task with Gutenberg active. For instance, the "Add Media" button doesn't exist in Gutenberg, but a WordPress user can add media with the inserter. Feature-parity, essentially.
* There are no (obvious) errors when the WordPress plugin is active alongside Gutenberg.

**_Why are you doing this?_**

We want to make sure everyone can use Gutenberg when WordPress 5.0 is released. Plugin incompatibility is statistically one of the most likely reasons they won't be able to. Having this compatibility data will help us strategize the release process.

**_This sounds important. What do I need to do?_**

Once you've registered an account, simply launch an environment, test the installed plugin, and record your results. See [Testing](#testing) for more details.

## Testing


## Meta

This repository is a bunch of files that power the Gutenberg Plugin Compatibility database:

1. [plugin-stats.php](plugin-stats.php) downloads key plugin data from the WordPress.org REST API.
2. [Knack](https://www.knack.com/) is used to host our database and make it editable.
3. [index.php](index.php) renders the webpage with the Knack database application.
4. [knack.js](knack.js) powers our logic to launch a new environment and bring you to the edit plugin view.

Everything in the repository is set up to auto-deploy to the server that hosts [plugincompat.danielbachhuber.com](https://plugincompat.danielbachhuber.com).

If you have a question, [please open an issue](https://github.com/danielbachhuber/gutenberg-plugin-compatibility/issues) and we'll do our best to help out. Thanks!

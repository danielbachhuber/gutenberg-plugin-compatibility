Gutenberg Plugin Compatibility
==============================

## Overview

This project's goal is to produce a database documenting whether or not WordPress plugins are compatible with [Gutenberg](https://wordpress.org/gutenberg/).

For any questions beyond what's covered in this document, [please open an issue](https://github.com/danielbachhuber/gutenberg-plugin-compatibility/issues) and we'll do our best to help out.

**_How do I know whether a plugin is compatible with Gutenberg?_**

For our purposes, a plugin is compatible with Gutenberg when:

* A WordPress user can perform the same functional task with Gutenberg active. For instance, the "Add Media" button doesn't exist in Gutenberg, but a WordPress user can add media with the inserter. Feature-parity, essentially.
* There are no (obvious) errors when the WordPress plugin is active alongside Gutenberg.

Some plugins are pre-classified as 'likely_yes' or 'likely_no' based on reasonable assumptions (e.g. a caching plugin probably doesn't expose editor-specific functionality).

**_Why are you doing this?_**

We want to make sure everyone can use Gutenberg when WordPress 5.0 is released. Plugin incompatibility is statistically one of the most likely reasons they won't be able to. Having this compatibility data will help us strategize the release process.

**_This sounds important. What do I need to do?_**

See [Testing](#testing) for more details.

Once you've registered an account, simply launch an environment, test the installed plugin, and record your results.

## Testing

Before you begin, you'll need to [register for an account](https://plugincompat.danielbachhuber.com/#account-details/) if you haven't done so already. Being logged in gives us a revision log for plugin result modification.

Once you're logged in, hit the "Launch Test Environment" button to create a fresh WordPress installation with both Gutenberg and a randomly-selected plugin with `is_compatible=unknown`. In this process, `is_compatible` is set to `testing`.

Look at the Classic Editor to see if the plugin exposes any editor-specific functionality (e.g. a meta box, TinyMCE button, etc.):

1. **If it does**, open the Gutenberg Editor to see if the user can perform the same functional task. Yes means compatible, no means incompatible.
2. **If it doesn't**, the plugin is likely compatible with Gutenberg. But, use your best judgement; a plugin may require some configuration before it exposes editor-specific functionality.

When you feel confident with your assessment, log your results in the database:

* Mark `is_compatible=yes` or `is_compatible=no` based on your judgement.
* Use the open-ended text field to clarify your response with sufficient detail for the next person who reviews.
* "Tested version" is the plugin version, not the Gutenberg version. If you use the interactive tool, the plugin version will be automatically populated.
* If you can find some official conversation about Gutenberg compatibility for the plugin, please include that link as well.

Hit "Submit" to save your results.

## Meta

This repository is a bunch of files that power the Gutenberg Plugin Compatibility database:

1. [plugin-stats.php](plugin-stats.php) downloads key plugin data from the WordPress.org REST API.
2. [Knack](https://www.knack.com/) is used to host our database and make it editable.
3. [index.php](index.php) renders the webpage with the Knack database application.
4. [knack.js](knack.js) powers our logic to launch a new environment and bring you to the edit plugin view.

Everything in the repository is set up to auto-deploy to the server that hosts [plugincompat.danielbachhuber.com](https://plugincompat.danielbachhuber.com).

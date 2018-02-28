Gutenberg Plugin Compatibility
==============================

## Overview

This project's goal is to produce a [database](https://plugincompat.danielbachhuber.com/) documenting whether or not WordPress plugins are compatible with [Gutenberg](https://wordpress.org/gutenberg/). For any questions beyond what's covered in this document, [please open an issue](https://github.com/danielbachhuber/gutenberg-plugin-compatibility/issues) and we'll do our best to help out. The complete backstory is covered in [wordpress/gutenberg#4072](https://github.com/WordPress/gutenberg/issues/4072).

**_How do I know whether a plugin is compatible with Gutenberg?_**

For our purposes, a plugin is compatible with Gutenberg when:

* A WordPress user can perform the same functional task with Gutenberg active. For instance, if the plugin includes an "Add Media" button, it's considered Gutenberg-compatible when it has a block registered for the Gutenberg inserter. Feature-parity, essentially.
* There are no (obvious) errors when the WordPress plugin is active alongside Gutenberg.

Once a plugin is manually reviewed in a test environment, it's either marked `is_compatible=yes` or `is_compatible=no` in the database. Some plugins are pre-classified as `is_compatible=likely_yes` or `is_compatible=likely_no` based on reasonable assumptions (e.g. a caching plugin probably doesn't expose editor-specific functionality).

**_Why are you doing this?_**

We want to make sure everyone can use Gutenberg when WordPress 5.0 is released. Plugin incompatibility is statistically one of the most likely reasons they won't be able to. Having this compatibility data will help us strategize the release process.

The WordPress.org Plugins Directory has an incredibly long tail distribution of `active_installs`. The 5000 plugins listed in the Gutenberg Compatibility Database [represent >90% of the total](https://danielbachhuber.com/2018/01/04/brief-wordpress-org-plugin-directory-data-analysis/) `active_installs` count.

**_This sounds important. What can I do to help?_**

See [Testing](#testing) for more details.

## Testing

Before you begin, you'll need to [register for an account](https://plugincompat.danielbachhuber.com/#account-details/) if you haven't done so already. Our ideal testers are people who have time to test dozens of plugins.

![image](https://user-images.githubusercontent.com/36432/36801021-ca3a27ea-1c65-11e8-956c-02d460ba07e8.png)

Once you've logged in, click the "Create Test Environment" button to create a fresh WordPress sandbox with both Gutenberg and a randomly-selected plugin with `is_compatible=unknown`. In this process, `is_compatible` is set to `testing` for the plugin. It can take several seconds for the sandbox to spin up.

![image](https://user-images.githubusercontent.com/36432/36801215-4ed987d4-1c66-11e8-9815-7a5b4316eb9f.png)

After the sandbox is created, you'll be taken to the randomly-selected plugin's reporting form. Click the "Open Editor" button to access the Manage Posts screen in the WordPress admin.

![image](https://user-images.githubusercontent.com/36432/36801289-8bd15d7e-1c66-11e8-8be4-8e0b71d9ef27.png)

In the WordPress backend, first look at the Classic Editor to see if the plugin exposes any editor-specific functionality (e.g. a meta box, TinyMCE button, etc.). Use your best judgement in the process; plugin may require some configuration before it exposes editor-specific functionality.

**If the plugin does expose functionality in the Classic Editor**, open the Gutenberg Editor to see if the user can perform the same functional task. Everything should work 100% as expected for the plugin to be considered completely compatible. Even little bugs should be considered incompatibilities; this is valuable data to document.

**If the plugin doesn't expose editor UI**, then it's likely compatible with Gutenberg. But again, use your best judgement and assess the plugin's description, etc.

![image](https://user-images.githubusercontent.com/36432/36801649-87a50114-1c67-11e8-9d99-5a92b63550aa.png)

When you feel confident with your assessment, log your findings in the database:

* Mark `is_compatible=yes` or `is_compatible=no` based on your judgement.
* Categorize the compatibility details based on one or more of the available options.
* Use the open-ended text field to clarify your response with sufficient detail for the next person who reads it.
* "Tested version" is the plugin version, not the Gutenberg version. This should be automatically populated when the sandbox is created.
* If you can find some official conversation about Gutenberg compatibility for the plugin, please include that link as well.

Hit "Submit" to save your results, and then click "Create New Test Environment" to launch an environment with a different plugin.

## Meta

This repository is a bunch of files that power the Gutenberg Plugin Compatibility database:

1. [plugin-stats.php](plugin-stats.php) downloads key plugin data from the WordPress.org REST API.
2. [Knack](https://www.knack.com/) is used to host our database and make it editable.
3. [index.php](index.php) renders the webpage with the Knack database application.
4. [knack.js](knack.js) powers our logic to launch a new environment and bring you to the edit plugin view.

Everything in the repository is set up to auto-deploy to the server that hosts [plugincompat.danielbachhuber.com](https://plugincompat.danielbachhuber.com).

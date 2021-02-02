# Discourse SSO

This app is designed to allow Discourse instances (discourse.org) to authenticate via a nextcloud instance. 

## Installation

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make
    
## Configuration

* To configure Discourse to use SSO please see https://meta.discourse.org/t/official-single-sign-on-for-discourse-sso/13045
* To configure this app go to the security section of the nextcloud settings page and put in the client secret and the discourss URL. 

### Replace whitespaces in user names and group names (optional)

As discourse does not allow for whitespaces in user names and group IDs you can configure nextcloud to replace whitespaces with a given character in the field "Replace Whitespaces". 

For example:

If you put in "\_", "Alex Smith" will be replaced with "Alex_Smith".

### Extract discourse title from display name (optional)

As there is no "title" field in Nextcloud, you can configure this plugin to extract a title out of the user's display name by putting in a regular expresion in the "Extract title" field. The plugin will then remove the expression if found from the display name and put the expression within the parenthesis "()" of the regular expresion into the title field in Discourse.

For example: /\\(([^\\)]\*)\\)/

If your nextcloud display name would be "Alex (Admin)", your Discourse user name would be "Alex" and your Discourse title would be "Admin".

## Known Issues

### Issue with URL decode in Nextcloud 18 and below

There is a bug in nextcloud versions 18 and below that prevents this app from working, please see https://github.com/nextcloud/server/issues/6822

In order to fix this you need to patch the function generateRedirect in the file core/controller/LoginController.php file of the nextcloud server and change the line

```php
$location = $this->urlGenerator->getAbsoluteURL(urldecode($redirectUrl));
```

to

```php
$location = $this->urlGenerator->getAbsoluteURL($redirectUrl);
```

### Discourse does not allow to be included in iframe

If you want to display discourse within the nextcloud site with the external sites plugin (https://apps.nextcloud.com/apps/external) you would need to set it to open in a separate tab. 

Workaround: There is an outdated Discourse plugin to change this, but it may not work with modern browsers: https://github.com/TheBunyip/discourse-allow-same-origin. Feel free to update it and let me know.
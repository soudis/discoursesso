# Discourse SSO

This app is designed to allow Discourse instances (discourse.org) to authenticate via a nextcloud instance. 

## Installation

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make
    
## Configuration

* To configure Discourse to use SSO please see https://meta.discourse.org/t/official-single-sign-on-for-discourse-sso/13045
* To configure this app go to the security section of the nextcloud settings page and put in the client secret and the discourss URL. Also you can optionally specifiy a string to replace whitepaces in user names and group names.

## Issue with URL decode in nextcloud

There is a bug in nextcloud that prevents this app from working, please see https://github.com/nextcloud/server/issues/6822

In order to fix this you need to patch the function generateRedirect in the file core/controller/LoginController.php file of the nextcloud server and change the line

```php
$location = $this->urlGenerator->getAbsoluteURL(urldecode($redirectUrl));
```

to

```php
$location = $this->urlGenerator->getAbsoluteURL($redirectUrl);
```

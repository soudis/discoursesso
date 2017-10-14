# Discourse SSO

This app is designed to allow Discourse instances (discourse.org) to authenticate via a nextcloud instance. 

## Installation

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make
    
## Configuration

* To configure Discourse to use SSO please see https://meta.discourse.org/t/official-single-sign-on-for-discourse-sso/13045
* To configure this app go to the security section of the nextcloud settings page and put in the client secret and the discourss URL    


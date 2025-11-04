# Extension-HelloWorld

An HelloWorld extension for [FreshRSS](https://github.com/FreshRSS/FreshRSS).

It is a bit described in the documentation: https://freshrss.github.io/FreshRSS/en/developers/03_Backend/05_Extensions.html#write-an-extension-for-freshrss

## Warning

It is not recommended to install this extension on your production server. This extension manipulates the important “About” page.

## How to install

To install this extension, download the extension archive first and extract it on your PC. Then, upload this on your server. Extensions must be in the `./extensions` directory of your FreshRSS installation.

## What it does

This extension is a little showcase and boilerplate for a FreshRSS extension.

As showcase it will manipulate some little things:
- the “About” page content will be overwritten
- the “Save” button titles will be changed
- the normal view article list will be changed
- it loads a CSS and a JavaScript file

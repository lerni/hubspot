# HubSpot Tracking Code for SilverStripe
A SilverStripe module to add HubSpot Tracking Code and manage per SiteConfig (CMS) & Page extension

## Requirements
* SilverStripe ~3.2, SiteConfig

## Installation
The easiest way is to use [composer](https://getcomposer.org/):

	`composer require lerni/hubspot`
or download and place it in a folder called "hubspot" in your project root.

## Config
You need to set the extensions in your config.

    SiteConfig:
      extensions:
        - HubSpotRequestExtender
    Page:
      extensions:
        - HubSpotConfigExtender

Run `dev/build` either way.

## How to use
Set the ID (~7 digits) in yoursite.tld/admin/settings and you're set.

## Hint
* Trackingcode 'll only be shown in live-mode.
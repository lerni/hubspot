# HubSpot for SilverStripe
A Silverstripe module to add HubSpot Tracking Code and manage per SiteConfig (CMS) & Page extension.

## Requirements
* Silverstripe ^4, SiteConfig

## Installation
	`composer require lerni/hubspot`

## Config
You need to set the extensions in your config.

	SilverStripe\SiteConfig\SiteConfig:
	  extensions:
		- Kraftausdruck\Extensions\HubSpotConfigExtender
	SilverStripe\CMS\Model\SiteTree:
	  extensions:
		- Kraftausdruck\Extensions\HubSpotRequestExtender

Run `dev/build` either way.

## How to use
Set the ID (~7 digits) in yoursite.tld/admin/settings and you're set.

## Hint
* Trackingcode 'll only be shown in live-mode.

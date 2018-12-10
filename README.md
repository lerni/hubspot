# HubSpot for SilverStripe
A SilverStripe module to add HubSpot Tracking Code and manage per SiteConfig (CMS) & Page extension and you als can add Forms per ShortCode like:

	[HSForm, formId="8ec3ba11-g65d-783g-7a75-683398gof574"]

## Requirements
* SilverStripe ^4, SiteConfig

## Installation
The easiest way is to use [composer](https://getcomposer.org/):

	`composer require lerni/hubspot`
or download and place it in a folder called "hubspot" in your project root.

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
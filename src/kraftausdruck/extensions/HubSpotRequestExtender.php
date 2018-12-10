<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;
use SilverStripe\SiteConfig\SiteConfig;


class HubSpotRequestExtender extends DataExtension {

	private static $casting = [
		'HSFormShortCodeHandler' => 'HTMLText'
	];

	public static function HSFormShortCodeHandler($arguments, $content = null, $parser = null, $tagName) {
		if (empty($arguments["portalId"])) {
			$accountId = SiteConfig::current_site_config()->HubSpotAccountID;
			$portalId = $accountId;
		} else  {
			if(isset($arguments["portalId"]) && is_numeric($arguments["portalId"])) {
				$portalId = ($arguments["portalId"]);
			} else {
				return;
			}
		}
		if (empty($arguments["formId"])) {
			return;
		} else {
			$formId = $arguments["formId"];
		}

		// id shouldn't start numeric - so we prefixing it with HubSpotForm -> hsf
		$formHashId = 'hsf' . substr(sha1($formId), 0, 8);
		$customise['formHashId'] = $formHashId;
		$template = new SSViewer("HSFormShortCode");

		// explicit use of https see:
		// http://stackoverflow.com/questions/4831741/can-i-change-all-my-http-links-to-just/27999789#27999789
		Requirements::javascript("https://js.hsforms.net/forms/v2.js");
		Requirements::customScript(
			"hbspt.forms.create({
				portalId: '". $portalId ."',
				formId: '". $formId ."',
				target: '#". $formHashId ."'
			});"
		);

		return $template->process(new ArrayData($customise));
	}

	public function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->HubSpotAccountID;
		if(isset($accountId) && is_numeric($accountId)) {
			Requirements::insertHeadTags(sprintf(
				'<script type=\'text/javascript\' id=\'hs-script-loader\' async defer src=\'https://js.hs-scripts.com/%s.js\'></script>',
				$accountId
			));
		}
	}
}

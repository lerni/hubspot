<?php
class HubSpotRequestExtender extends DataExtension {

	public static function HSFormShortCodeHandler($arguments,$caption = null,$parser = null) {
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
		$customise['portalId'] = $portalId;
		$customise['formId'] = $formId;
		$template = new SSViewer("HSFormShortCode");
		return $template->process(new ArrayData($customise));
	}

	function contentControllerInit($controller) {
		$accountId = $this->owner->SiteConfig->HubSpotAccountID;
		if(isset($accountId) && is_numeric($accountId)) {
			Requirements::insertHeadTags(sprintf(
				'<script type=\'text/javascript\' id=\'hs-script-loader\' async defer src=\'//js.hs-scripts.com/%s.js\'></script>',
				$accountId
			));
		}
	}
}

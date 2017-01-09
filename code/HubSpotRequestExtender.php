<?php
class HubSpotRequestExtender extends DataExtension {
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
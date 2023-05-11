<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\SiteConfig\SiteConfig;


class HubSpotRequestExtender extends Extension
{

    public function contentControllerInit($controller)
    {
        $accountId = $this->owner->SiteConfig->HubSpotAccountID;
        $cookieActive = $this->owner->SiteConfig->CookieIsActive;
        if (isset($accountId) && is_numeric($accountId)) {
            if ($cookieActive) {
                Requirements::insertHeadTags(sprintf(
                    '<script id=\'hs-script-loader\' async defer type=\'text/plain\' data-type=\'text/javascript\' data-name=\'hubspot\' data-src=\'https://js.hs-scripts.com/%s.js\'></script>',
                    $accountId
                ));
            } else {
                Requirements::insertHeadTags(sprintf(
                    '<script type=\'text/javascript\' id=\'hs-script-loader\' async defer src=\'https://js.hs-scripts.com/%s.js\'></script>',
                    $accountId
                ));
            }
        }
    }
}

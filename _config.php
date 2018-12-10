<?php

SilverStripe\View\Parsers\ShortcodeParser::get()->register('HSForm',array('Kraftausdruck\Extensions\HubSpotRequestExtender','HSFormShortCodeHandler'));
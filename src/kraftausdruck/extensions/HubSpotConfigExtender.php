<?php

namespace Kraftausdruck\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class HubSpotConfigExtender extends DataExtension {
	private static $db = [
		'HubSpotAccountID' => 'Varchar(16)'
	];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->addFieldToTab('Root.Main', HeaderField::create('HubSpot', 'HubSpot'));
		$fields->addFieldToTab('Root.Main', TextField::create('HubSpotAccountID', 'HubSpot Tracking-ID (~7 digits)', '', 7));
	}
}

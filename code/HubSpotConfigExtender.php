<?php
class HubSpotConfigExtender extends DataExtension {
	private static $db = array(
		'HubSpotAccountID' => 'Varchar(16)'
	);
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root.Main", new HeaderField('HubSpot'));
		$fields->addFieldToTab('Root.Main', new TextField('HubSpotAccountID', 'HubSpot Tracking-ID (~7 digits)', '', 7));
	}
}
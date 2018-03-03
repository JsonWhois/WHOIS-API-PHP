<?php

require "autoload.php";

use JsonWhois\Adapter\Browser\Screenshot as BrowserScreenshot;

# set key for demo
define('JSONWHOISIO_PRIV_KEY', 'REPLACE WITH YOUR KEY HERE');

# set to true to ignore TLS errors (use only for testing)
define('JSONWHOISIO_IGNORE_CA', true);

# domain for which to make a screenshot
$domain = 'google.com';

# Create a new instance of BrowserScreenshot
# This is not required with each call, only the first
$BrowserScreenshot = new BrowserScreenshot(JSONWHOISIO_PRIV_KEY);

$width = 1200;
$height = 900;
# set the domain for the query
$BrowserScreenshot->setPayload($domain, $width, $height);

# Perform the query and store the resulting object 
$Result = $BrowserScreenshot->run();

# check for successful execution
if (!$Result->isSuccessful()) {
	# query failed, print the reason
	echo 'Lookup failed (' . $Result->getStatusCode() . '): ' . $Result->getStatusMessage();
} else {
	# get the result of the successful query as an array (default) 
	$dataArray = $Result->getDataArray();
	
	echo '<img src="' . $dataArray['prefix'] . $dataArray['base64'] . '" />';
}
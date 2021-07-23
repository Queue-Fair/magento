<?php
require_once "queue-fair-adapter-library.php";

class QueueFairConfig {
	//Your Account Secret is shown on the Your Account page of
	//the Queue-Fair Portal.  If you change it there, you must 
	//change it here too.
	public $accountSecret="DELETE THIS TEXT AND PUT IN YOUR ACCOUNT SECRET";
	
	//The System Name of your account
	public $account ="DELETE THIS TEXT AND PUT IN YOUR ACCOUNT SYSTEM NAME";
	
	//Leave this set as is
	public $filesServer="files.queue-fair.net";
	
	//Time limit for Passed Strings to be considered valid,
	//before and after the current time
	public $queryTimeLimitSeconds=30;
	
	//Valid values are true, false, or an "IP_address".	
	public $debug=true;

	//How long to wait in seconds for network reads of config 
	//or Adapter Server (safe mode only)
	public $readTimeout=5;

	//You must set this to a folder that has write permission for your web server
	//If it's not saving as expected turn on debugging above and look for messages in
	//your apache error_log.  You should change this to somewhere outside your
	//web root for maximum security.  On Unix use chmod -R 777 FOLDER_NAME
	//on the desired folder to enable Adapter writes, reads and access to folder contents.
	public $settingsFileCacheLocation="./settings";

	//How long a cached copy of your Queue-Fair settings will be kept before downloading
	//a fresh copy.  Set this to 0 if you are updating your settings in the 
	//Queue-Fair Portal and want to test your changes quickly, but remember 
	//to set it back again when you are finished to reduce load on your server.
	//Set to -1 to disable downloading entirely.
	public $settingsFileCacheLifetimeMinutes=5;

	//Whether or not to strip the Passed String from the URL
	//that the Visitor sees on return from the Queue or Adapter servers
	//(simple mode) - when set to true causes one additinal HTTP request
	//to your site but only on the first matching visit from a particular
	//visitor. The recommended value is true.
	public $stripPassedString=true;

	//Whether to send the visitor to the Adapter server for counting (simple mode),
	//or consult the Adapter server (safe mode).  The recommended value is "safe".
	public $adapterMode = "safe";

	//A list of common bots for filtering.
	public $bots = array("duckduckbot","duckduckgo","dotbot","linkedinbot","slurp","applebot","yandexbot","yandeximages","bingbot","bingpreview","sogou spider","seznambot","slackbot","nimbostratus","testbot","googlebot","googlebot","mauibot","semrushbot","ahrefsbot","adsbot","petalbot","aspiegelbot","grapeshot","mj12bot","adsbot-google","barkrowler","intelx.io_bot","bot@linkfluence.com","ltx71","adbeat_bot","facebookexternalhit","the knowledge ai","pandalytics","blexbot","hubspot","bytespider","go-http-client");

	//For MAXIMUM SECUIRTY disable bot exclusion by commenting out the above line and uncommenting the below line.
// public $bots = array();	

	//Leave this as-is.
	public function __toString() {
		return "Config";
	}
}

$queueFairConfig = new QueueFairConfig();
$queueFair = new QueueFair($queueFairConfig);
$queueFair->go();

//Clean up.
unset($queueFair);
unset($queueFairConfig);

?>
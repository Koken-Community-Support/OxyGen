<?php
/*
 * Checking for updates on https://github.com/Koken-Community-Support/OxyGen
 * Update function created by Christopher (@Hard-One) Bayer
 * https://github.com/Hard-One
 */
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/repos/Koken-Community-Support/OxyGen/releases/latest',
    CURLOPT_USERAGENT => 'OxyGen cURL Request'
));
$resp = json_decode(curl_exec($ch));
curl_close($ch);
$latest = $resp->tag_name;
$client = Koken::$site['theme']['version']; // fetching current version
$downloadLink = "https://kokensupport.com/viewtopic.php?f=16&t=32"; //Link to the OxyGen forum for manual downloads
$updateLink = "#"; // Link to automatic update (placeholder for the future)
$themePath = Koken::$location['theme_path']; // get path to themes root directory
if (strcmp($latest, $client)) {
	print "<div class='update-notifier'>
		<div class='update-logo'>
			<img src='$themePath/inc/components/img/update-oxygen-logo.png' width='50' alt='OxyGen $latest'>
		</div>
		<div class='update-text'>
			<h1>OxyGen Update available!</h1>
			<p>Your current Version is <strong>$client</strong> and <strong>$latest</strong> is the latest version.</p>
		</div>
		<div class='action-button'>
			<div class='update-download'>
			<a href='$downloadLink' title='Download OxyGen $latest'>Download</a>
			</div>
			<!--<div class='update-install'>
				<a href='$updateLink' title='Install OxyGen $latest'>Install</a>
			</div>
			<div class='dismiss-update'>
				<a href='#' title='Dismiss for now'>Dismiss</a>
			</div>-->
		</div>
</div>";
}
?>

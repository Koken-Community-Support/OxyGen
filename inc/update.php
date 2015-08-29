<?php
/*
 * Checking for updates on https://github.com/Koken-Community-Support/OxyGen
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
$client = "2.1"; //in the future we should fetch the version automatically instead of hard-coding
$clientlink = "http://kokensupport.varoystrand.se/viewtopic.php?f=16&t=32"; //Link to the OxyGen forum for manual downloads
if (strcmp($latest, $client, $clientlink)) { 
	print "<div class='update-notifier'>
		<div class='update-logo'>
			<img src='http://varoystrand.se/update-oxygen-logo.png' width='50'>
		</div>
		<div class='update-text'>
			<h1>OxyGen Update available!</h1>
			<p>Your current Version is <strong>$client</strong> and <strong>$latest</strong> is the latest version.</p>
		</div>
		<div class='update-button'>
			<div class='update-download'>
			<a href='$clientlink' title='Download $latest'>Download</a>
			</div>
			<div class='update-install'>
				<a href='#' title=''>Install</a>
			</div>
		</div>
</div>";
// No message if no update available (K.I.S.S)
//} else {
//	print "<p>No Update available.</p>";
}
?>
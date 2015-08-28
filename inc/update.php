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
if (strcmp($latest, $client)) { 
	print "<p>Update available! Your current Version is $client and $latest is the latest version. <a href='#'>Click here</a> to see the download page. </p>";
} else {
	print "<p>No Update available.</p>";
}
?>
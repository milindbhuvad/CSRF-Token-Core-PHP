<?php
$owner = "milindbhuvad";
$repo = "CSRF-Token-Core-PHP";

$url = "https://api.github.com/repos/{$owner}/{$repo}/pulls?state=open";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/vnd.github+json",
    "User-Agent: PHP-GitHub-Client"
]);

$response = curl_exec($ch);

if ($response === false) {
    die("cURL Error: " . curl_error($ch));
}

curl_close($ch);

$pullRequests = json_decode($response, true);

if (isset($pullRequests['message'])) {
    die("GitHub Error: " . $pullRequests['message']);
}

foreach ($pullRequests as $pr) {
    echo "PR #{$pr['number']}<br>";
    echo "Title: {$pr['title']}<br>";
    echo "Author: {$pr['user']['login']}<br>";
    echo "Status: {$pr['state']}<br>";
    echo "URL: <a href='{$pr['html_url']}' target='_blank'>{$pr['html_url']}</a><br>";
    echo "--------------------------------<br>";
}
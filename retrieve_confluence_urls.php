<?php
$spaceName = 'DEVELOPER';
$url = 'https://doc.ez.no/';
$start = 0;
$limit = 1000;
//////////////////////////////////////////
/// Get the list of URLS for a Confluence Space
//
// 1- connect to API in REST and get list of pages
$response = file_get_contents($url . 'rest/api/content?type=page&spaceKey=' . $spaceName. '&limit='.$limit.'&start='.$start);
$allPages = json_decode($response, true);

// 2- get url of pages
$list = array();
foreach ($allPages['results'] as $page) {
        $pageURL = $page['_links']['webui'];
        $list[] = $url . $pageURL;
}
file_put_contents($spaceName.'_list_url.txt', join("\n", $list));
print "There is ". count($list). "lines written in the ".$spaceName ."_list_url.txt file. \n";

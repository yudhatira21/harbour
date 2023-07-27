<?php  
include 'curl.php';
error_reporting(0);

while (true) {
	$date = date('Y-md');
	$tgl = explode('-', $date);
	$fake_name = curl('https://fakenametool.net/generator/random/id_ID/indonesia', null, null, false);
	preg_match_all('/<td>(.*?)<\/td>/s', $fake_name, $result);
	$name = $result[1][0];
	$secmail = curl('https://www.1secmail.com/api/v1/?action=getDomainList', null, null, false);
	$domain = json_decode($secmail);
	$rand = array_rand($domain);
	$email = str_replace(' ', '', strtolower($name)).'@gmail.com';


	$headers = array();
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Accept-Language: en-US,en;q=0.5';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Origin: https://www.harbour.fi';
	$headers[] = 'Connection: keep-alive';
	$headers[] = 'Sec-Fetch-Dest: empty';
	$headers[] = 'Sec-Fetch-Mode: no-cors';
	$headers[] = 'Sec-Fetch-Site: cross-site';
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Referer: https://www.harbour.fi/';
	$headers[] = 'Pragma: no-cache';
	$headers[] = 'Cache-Control: no-cache';

	$reff = '2X92AC';

	$waitlist = curl('https://leads.kickofflabs.com/lead/172442', '{"first_name":"'.$name.'","email":"'.$email.'","country":"The Bahamas","__form_name":"Default Form","__rid":"'.random(9).'-d2f9-49c6-bfae-b6a247319434","__uid":"'.random(8).'-54b9-4226-8409-527bfe8c6b64","__sid":"'.random(8).'-e685-47d2-8df5-a7a85ef593ec","__kid":"'.$reff.'","__url":"https://www.harbour.fi/?kid='.$reff.'","__lid":"172442","__language":"en-US","__custom":{},"__source":"cbe","__mm":114,"__kd":0}', $headers, false);
	$json = json_decode($waitlist, true);

	$profil = curl('https://leads.kickofflabs.com/lead/172442/'.$reff, null, null, false);
	$json_profil = json_decode($profil, true);

	if ($json['id'] != "") {
		echo "Success | ".$json_profil['id']." | ".$json_profil['contest_score']."\n";
	} else {
		echo $waitlist;
	}

	
}



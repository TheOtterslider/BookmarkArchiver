<?php

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}

$html=get_url_contents("https://www.maxsons.org");
print($html);

$dom = new domDocument; 
$dom->loadHTML($html); 
$dom->preserveWhiteSpace = false; 

$fp = fopen("example_htmlpage.html", "w");
fwrite($fp, $dom->saveXML());
fclose($fp);
?>
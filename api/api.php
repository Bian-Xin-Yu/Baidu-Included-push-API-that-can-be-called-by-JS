<?php
$UrlKey = $_SERVER["QUERY_STRING"];

$pattrn1 = '/url=(.*)&/isU';
preg_match_all($pattrn1,$UrlKey,$Url);

$pattrn2 = '/&key=(.*$)/isU';
preg_match_all($pattrn2,$UrlKey,$Key);

$pattrn3 = '/url=(.*\/\/.*)\//isU';
preg_match_all($pattrn3,$UrlKey,$Http);

$urls[0] = $Url[1][0];

$api = 'http://data.zz.baidu.com/urls?site='.$Http[1][0].'&token='.$Key[1][0];
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);

if (stripos($result,'success') != false){
	if (substr($result,(stripos($result,'success')+9),1) == '1'){//截取success后第9位查看是否为1
	    successImg();
	}else{
	    failImg();
	}
}else{
    failImg();
}
function failImg(){
    header('Content-type:image/jpeg');
    $image1 = imagecreatefrompng('./XinSui.png');
    imagepng($image1);
}

function successImg(){
    header('Content-type:image/jpeg');
    $image1 = imagecreatefrompng('./Xin.png');
    imagepng($image1);
}
?>

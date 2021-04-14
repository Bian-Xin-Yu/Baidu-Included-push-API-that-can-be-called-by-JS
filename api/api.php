<?php
require_once './api-database.php';

$UrlKey = $_SERVER["QUERY_STRING"];

$pattrn1 = '/url=(.*)&/isU';
preg_match_all($pattrn1,$UrlKey,$Url);

$pattrn2 = '/&key=(.*$)/isU';
preg_match_all($pattrn2,$UrlKey,$Key);

$pattrn3 = '/url=(.*\/\/.*)\//isU';
preg_match_all($pattrn3,$UrlKey,$Http);

if ($Url[1][0] == null || $Key[1][0] == null || $Http[1][0] == null){
	exit('参数不合法');
}

$In_out = Initialization_Table();
if ($In_out != null){
	exit($In_out);
}

$Qu_out = Query_Url_in_url($Url[1][0]);
if ($Qu_out != true && $Qu_out != false){
	exit($Qu_out);
}

if ($Qu_out == true){
	successImg();
}else if($Qu_out == false){
	$result = BaiduPush($Url[1][0],$Key[1][0],$Http[1][0]);
	$If_out = If_Push_Result($result);
	if ($If_out == true){
		$Add_url_out = Add_url_to_Url($Url[1][0]);
		if ($Add_url_out != null){
			exit($Add_url_out);
		}
		$Add_count_out = Add_count_of_the_site_to_the_Site($Http[1][0]);
		if ($Add_count_out != null){
			exit($Add_count_out);
		}
		successImg();
	}else if ($If_out == false){
		failImg();
	}
}
function If_Push_Result($result){
        if (stripos($result,'success') != false){
                if (substr($result,(stripos($result,'success')+9),1) == '1'){//截取success后第9位查看是否为1
                        return true;
                }else{
                        return false;
                }
        }else{
                return false;
        }
}
function BaiduPush($Url,$Key,$Http){
        $urls[0] = $Url; 
        $api = 'http://data.zz.baidu.com/urls?site='.$Http.'&token='.$Key;
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
	return $result;
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

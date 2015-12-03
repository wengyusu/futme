<?php
ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去

for($i=55555;$i<66666;$i++){
$url = 'http://wxc0f52282af70a9e4.m.weimob.com/activity/ScratchCard?id=101789&bid=56483667&wechatid=11111&v=95cde49cc9e9c3f317c4bff0e5ede86a';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (iPhone\; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Mobile/10B329 MicroMessenger/5.0.1');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
$result=$output;
curl_close($ch); 

//$output='<div id="prize">red</div>';

/*$html = str_get_html($output);
$ret = $html->find('#prize',0)->plaintext;
$ret=iconv("UTF-8", "GBK", $ret) */
if(strstr($output, 'var zjl =true'))
{
	$time=time();
$myfile = fopen("$time.txt", "wb");
fwrite($myfile, $url);
fclose($myfile);
}
else{

}
}
?>
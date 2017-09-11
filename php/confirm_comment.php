<?php
$thread=htmlspecialchars($_GET["thread"],ENT_QUOTES);
$name=htmlspecialchars($_GET["name"],ENT_QUOTES);
$body=htmlspecialchars($_GET["body"],ENT_QUOTES);
if(strpos($body,'ttp:'))
{
echo "コメントにURLが含まれていませんか？\n戻るボタンを押すとコメントを書き込む直前の状態へ戻ります。";
}else{	
$body=str_replace(array("\r\n", "\r", "\n"),"<br>",$body);
$timestamp=time();
$date=date("Y/m/d H:i:s",$timestamp);

$filepath="../csv/comment/comment".$thread.".csv";
if(!file_exists($filepath)){
	touch($filepath);
	echo "a";
}
$myfile=fopen($filepath,'a');
fwrite($myfile,"$name,");
fwrite($myfile,"$date,");
fwrite($myfile,"$body,");
fwrite($myfile,"\n");

fclose($myfile);

header("Location:../html/$thread.html");
}

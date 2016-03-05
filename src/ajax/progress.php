<?php
$req_id = \H::i("id", "", "POST");
if($req_id !== ""){
  $callback_function_name = "jQuery". preg_replace("/\D/", "", (float) '1.11.2' + (float) rand(0.00000000000000000, 0.10000000000000000)) . "_" . time() - 1;
  $convert = \Requests::request("https://d.yt-downloader.org/progress.php", array(
    "User-Agent" => "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.23 Safari/537.36",
    "Host" => "d.yt-downloader.org",
    "Referer" => "https://www.youtube2mp3.cc/api/",
    "Connection" => "keep-alive",
    "Pragma" => "no-cache",
    "Cache-Control" => "no-cache"
  ), array(
    "callback" => $callback_function_name,
    "id" => $req_id,
    "_" => time()
  ))->body;
  
  if(preg_match("/progress/", $convert)){
    $response = preg_replace("/$callback_function_name\((.*?)/", "$1", $convert);
    $response = substr($response, 0, strlen($response) - 1);
    $response = json_decode($response, true);
  }
  
  echo is_array($response) ? json_encode($response) : '';
}
?>

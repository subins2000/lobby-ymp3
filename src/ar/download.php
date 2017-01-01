<?php
if(isset($_GET['hash']) && $_GET['s']){
  $servers = json_decode(<<<JSON
{"1":"fzaqn","2":"agobe","3":"topsa","4":"hcqwb","5":"gdasz","6":"iooab","7":"idvmg","8":"bjtpp","9":"sbist","10":"gxgkr","11":"njmvd","12":"trciw","13":"sjjec","14":"puust","15":"ocnuq","16":"qxqnh","17":"jureo","18":"obdzo","19":"wavgy","20":"qlmqh","21":"avatv","22":"upajk","23":"tvqmt","24":"xqqqh","25":"xrmrw","26":"fjhlv","27":"ejtbn","28":"urynq","29":"tjljs","30":"ywjkg"}
JSON
  , true);
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Keep-Alive: timeout=1200, max=4100');
  $url = "http://". $servers[$_GET['s']] .".yt-downloader.org/download.php?id=" . $_GET['hash'];
  $redirect = $url;
}
?>
<html>
  <head>
    <script>
      function load() {
        var postdata = '<form id="dynForm" method="POST" action="<?php echo $redirect;?>">' +'</form>';
        window.frames[0].document.body.innerHTML = postdata;
        window.frames[0].document.getElementById('dynForm').submit();
      }
    </script>
  </head>
  <body onload="load()">
    <iframe src="about:blank" id="noreferer" style="display:none;"></iframe>
  </body>
</html>

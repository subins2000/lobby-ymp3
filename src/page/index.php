<?php
$this->addScript("main.js");
$this->addStyle("main.css");
?>
<div class="contents">
   <h2>Convert Video</h2>
   <input type="text" id="videoURL" placeholder="YouTube Video URL"/><br/>
   <a class="btn orange" id="convertVideo">Convert Video</a>
   <div class="message">Paste the YouTube Video URL in the input field and click <strong>Convert Video</strong></div>
   <div class="footnote">
      <p>Service Provided By :</p>
      <a href="https://www.youtube2mp3.cc/" target="_blank">
       <img src="<?php echo $this->srcURL . "/src/image/service-logo.png";?>"/>
      </a>
   </div>
</div>

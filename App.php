<?php
namespace Lobby\App;

class ymp3 extends \Lobby\App{
  
  public function page($page){
    return "auto";
  }
  
  public function indexPage(){
    $this->addStyle("cdn/main.css");
    $this->addScript("cdn/main.js");
    
    return array($this->dir . "/page-index.php");
  }
}
?>

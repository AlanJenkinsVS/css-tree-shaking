<?php
require_once 'classes/tailwind.php';
require_once 'classes/config.php';
require_once 'classes/parser.php';

class Page {
  public function __construct($page)
  {
    $this->page = $page;
  }

  public function render()
  {
    $config = new TailwindConfig();
    $parser = new CssParser();
  
    $tailwind = new Tailwind($config->config());
    // $tailwind->setFormat($tailwind->crunched);
  
    // define the path and name of cached file
    $cachefile = 'cached-files/'.date('M-d-Y').'-'.$this->page;
    // define how long we want to keep the file in seconds. I set mine to 5 hours.
    $cachetime = 18000;
    $cachetime = 0;
    // Check if the cached file is still fresh. If it is, serve it up and exit.
    if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
      include($cachefile);
        exit;
    }
  
    // if there is either no file OR the file to too old, render the page and capture the HTML.
    ob_start();
  
    $content = file_get_contents('views/'.$this->page);
  
    // generate a white list of css classes used
    $parser->generateWhitelist('class', $content);
  
    // Compile all tailwind styles
    $style = $tailwind->compile();

    // Parse for whitelisted classes only
    $style = $parser->stripUnusedCss($style);
  
    // replace style content
    $content = str_replace('<%=tailwind%>', $style, $content);
  
    echo $content;
  
    // We're done! Save the cached content to a file
    $fp = fopen($cachefile, 'w');
    fwrite($fp, ob_get_contents());
    fclose($fp);
    // finally send browser output
    ob_end_flush();
  }
}
  
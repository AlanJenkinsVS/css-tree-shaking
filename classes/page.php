<?php
require_once 'classes/tailwind.php';
require_once 'classes/config.php';
require_once 'classes/parser.php';

class Page {
  private $cachetime = 18000;

  public function __construct($page)
  {
    $this->page = $page;
  }

  public function disableCache()
  {
    $this->cachetime = 0;
  }

  public function render()
  {
    $config = new TailwindConfig();
    $parser = new CssParser();
  
    $tailwind = new Tailwind($config->config());
    $tailwind->setFormat($tailwind->crunched);
  
    // define the path and name of cached file
    $cachefile = 'cached-files/'.date('M-d-Y').'-'.$this->page;

    // Check if the cached file is still fresh. If it is, serve it up and exit.
    if (file_exists($cachefile) && time() - $this->cachetime < filemtime($cachefile)) {
      include($cachefile);
        exit;
    }
  
    // if there is either no file OR the file to too old, render the page and capture the HTML.
    ob_start();
  
    $content = file_get_contents('views/'.$this->page);
  
    // generate a white list of css classes used
    $parser->generateWhitelist('class', $content);
  
    // Compile all tailwind styles
    // @todo we only want to do this once - or at least only when the css config file is changed
    // create a static css file based on the config file then import that for stripping and compressing
    // on a page by page basis.
    $style = $tailwind->compile();

    // Parse for whitelisted classes only
    $style = $parser->stripUnusedCss($style);

    // Compress css
    $style = $tailwind->compress($style);
  
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
  
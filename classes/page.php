<?php
require_once 'classes/tailwind.php';
require_once 'classes/config.php';
require_once 'classes/parser.php';

class Page {
  private $cachetime = 18000;

  public function __construct($page)
  {
    $this->page = $page;

    // define the path and name of cached file
    $this->cachefile = 'cached-files/'.date('M-d-Y').'-'.$this->page;

    $config = new TailwindConfig();
    $this->tailwind = new Tailwind($config->config());
    $this->tailwind->setFormat($this->tailwind->crunched);
  }

  public function disableCache()
  {
    $this->cachetime = 0;
  }

  public function render()
  {
    // Check if the cached file is still fresh. If it is, serve it up and exit.
    if (file_exists($this->cachefile) && time() - $this->cachetime < filemtime($this->cachefile)) {
      include($this->cachefile);
      exit;
    }

    // This would actually occur only after CSS changes are made in config/database
    // This generates CSS from Tailwind plugins for the entire site
    $this->tailwind->buildSiteCss();

    // if there is either no file OR the file is too old, render the page and capture the HTML.
    $this->renderPage();
  }

  private function renderPage()
  {
    // Create a fresh view for this page
    $content = file_get_contents('views/'.$this->page);

    // Get our static site CSS file
    $scss = $this->tailwind->getFile();

    // Strip out unused CSS
    $style = $this->stripCss($content, $scss);

    // replace style block contents
    $content = str_replace('<%=tailwind%>', $style, $content);

    // generate and render the cache file
    $this->renderToCacheFile($content);
  }

  private function stripCss($content, $scss)
  {
    $parser = new CssParser();

    // generate a white list of css classes used
    $parser->generateWhitelist('class', $content);

    // Parse for whitelisted classes only
    $style = $parser->stripUnusedCss($scss);

    // Compress css
    return $this->tailwind->compress($style);
  }

  private function renderToCacheFile(string $content)
  {
    ob_start();

    echo $content;

    // Save the cached content to a file
    $fp = fopen($this->cachefile, 'w');
    fwrite($fp, ob_get_contents());
    fclose($fp);    

    // Send browser output
    ob_end_flush();
  }
}
  
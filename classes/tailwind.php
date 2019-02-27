<?php
  require_once 'vendor/autoload.php';
  require_once 'classes/plugins.php';
  use Leafo\ScssPhp\Compiler;

  class Tailwind
  {
    private $cssfile = 'css/tailwind.css';

    // constructor
    public function __construct($config)
    {
      $this->scss = new Compiler();
      $this->config = $config;
      $this->registerPlugins();
    }

    private function registerPlugins()
    {
      $plugins = new Plugins($this->config);

      foreach($plugins->list as $plugin)
      {
        $this->plugins[] = $plugin;
      }
    }

    // Formatter Types
    public $expanded = "Leafo\ScssPhp\Formatter\Expanded"; // Standard hierarchy
    public $nested = "Leafo\ScssPhp\Formatter\Nested"; // (default) Child selectors are inndented in hierarchy
    public $compact = "Leafo\ScssPhp\Formatter\Compact"; // Single line properties
    public $compressed = "Leafo\ScssPhp\Formatter\Compressed"; // Single line, no white-space
    public $crunched = "Leafo\ScssPhp\Formatter\Crunched"; // Single line, no white-space, no comments

    public function buildSiteCss()
    {
      // @todo - Temp code. Just fakes a css site rebuild when you pass a rebuild url param
      // Real world this would only occur when brand settings are updated
      if (!isset($_GET['rebuild']) && $this->cssFileExists()) {
        return;
      }

      $str = '';

      if (isset($this->plugins)) {
        foreach ($this->plugins as $plugin)
        {
          $str .= $plugin->compile();
        }
      }

      $this->saveToFile($this->scss->compile($str));
    }

    public function cssFileExists()
    {
      return file_exists($this->cssfile);
    }

    public function getFile()
    {
      if (!$this->cssFileExists()) return;
      return file_get_contents($this->cssfile);
    }

    public function compress($style)
    {
      if (isset($this->formatter))
      {
        $this->scss->setFormatter($this->formatter);
        return $this->scss->compile($style);
      }

      return $style;
    }

    public function setFormat($format)
    {
      $this->formatter = $format;
    }

    private function saveToFile($style)
    {
      $fp = fopen($this->cssfile, 'w');
      fwrite($fp, $style);
      fclose($fp);
    }

    private function getPlugins() {
      $str = '';
      foreach ($this->plugins as $plugin)
      {
        $str .= $plugin->compile();
      }
    }
  }
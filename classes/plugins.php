<?php
class Plugins
{
  private $list = [];

  function __construct($config)
  {
    spl_autoload_register([$this, 'loader']);

    $this->config = $config;
    $this->registerPlugins();
  }

  public function __get($propertyName)
  {
    return $this->$propertyName;
  }

  private function registerPlugins()
  {
    foreach($this->filterPlugins() as $plugin) {
      $this->list[] = new $plugin($this->config);
    }
  }

  private function filterPlugins()
  {
    $dir = 'plugins';
    $needle = '.class.php';
    $cdir = scandir($dir);

    foreach ($cdir as $key => $value) 
    {
      if (strpos($value, $needle))
      {
        $plugins[] = str_replace('.class.php', '', $value);
      }
    }

    return $plugins;
  }

  private function loader()
  {
    spl_autoload_register(function ($class_name) {
      include 'plugins/'.$class_name . '.class.php';
    });
  }
}

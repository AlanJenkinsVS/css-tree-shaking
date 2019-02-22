<?php
  require_once('IPlugin.php');

  class PluginBorderStyle implements IPlugin
  {
    private $prop = 'borderStyle';

    public function __construct($config)
    {
      if($this->isValid($config))
      {
        $this->borderStyle = $config[$this->prop];
      }
    }

    private function isValid($config)
    {
      return isset($config[$this->prop]);
    }

    public function compile()
    {
      $str= '';
      foreach ($this->borderStyle as $key => $value) {
        $str .= '
.border-'.$key.' { border-style: '.$value.'; }';
      }

      return $str;
    }
  }

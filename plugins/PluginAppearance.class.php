<?php
  require_once('IPlugin.php');

  class PluginAppearance implements IPlugin
  {
    private $prop = 'appearance';

    public function __construct($config)
    {
      if($this->isValid($config)) {
        $this->colours = $config[$this->prop];
      }
    }

    private function isValid($config)
    {
      return isset($config[$this->prop]);
    }

    function compile()
    {
      $str= '';

      if (isset($this->colours)) {
        foreach ($this->colours as $key => $value) {
          // set lighten/darken settings in config setting outside of this class.
          $str .= '
.appearance-'.$key.' { appearance: '.$value.'; }';
        }
      }

      return $str;
      
    }
  }
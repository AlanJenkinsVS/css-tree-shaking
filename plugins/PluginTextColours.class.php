<?php
  require_once('IPlugin.php');

  class PluginTextColours implements IPlugin
  {
    private $prop = 'colours';

    public function __construct($config)
    {
      if ($this->isValid($config)) {
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
          $color: '.$value.';
            .text-'.$key.'-lightest { color: lighten($color, 30%) };
            .text-'.$key.'-lighter { color: lighten($color, 20%) };
            .text-'.$key.'-light { color: lighten($color, 10%) };
            .text-'.$key.' { color: darken($color, 50%) };
            .text-'.$key.'-dark { color: darken($color, 10%) };
            .text-'.$key.'-darker { color: darken($color, 20%) };
            .text-'.$key.'-darkest { color: darken($color, 30%) };
          ';
        }
      }

      return $str;
    }
  }

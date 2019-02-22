<?php
  require_once('IPlugin.php');

  class PluginBorderColours implements IPlugin
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
            .border-'.$key.'-lightest { border-color: lighten($color, 30%) };
            .border-'.$key.'-lighter { border-color: lighten($color, 20%) };
            .border-'.$key.'-light { border-color: lighten($color, 10%) };
            .border-'.$key.' { border-color: $color };
            .border-'.$key.'-dark { border-color: darken($color, 10%) };
            .border-'.$key.'-darker { border-color: darken($color, 20%) };
            .border-'.$key.'-darkest { border-color: darken($color, 30%) };
          ';
        }
      }

      return $str;
    }
  }

<?php
  require_once('IPlugin.php');

  class PluginBackgroundColours implements IPlugin
  {
    private $prop = 'colours';

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
            $color: '.$value.';
            .bg-'.$key.'-lightest { background-color: lighten($color, 30%) };
            .bg-'.$key.'-lighter { background-color: lighten($color, 20%) };
            .bg-'.$key.'-light { background-color: lighten($color, 10%) };
            .bg-'.$key.' { background-color: $color };
            .bg-'.$key.'-dark { background-color: darken($color, 10%) };
            .bg-'.$key.'-darker { background-color: darken($color, 20%) };
            .bg-'.$key.'-darkest { background-color: darken($color, 30%) };
          ';
        }
      }

      return $str;
      
    }
  }
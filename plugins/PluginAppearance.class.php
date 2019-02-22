<?php
  require_once('Plugin.php');

  class PluginAppearance extends Plugin
  {
    protected $prop = 'appearance';

    public function compile()
    {
      $this->generators = [
'.appearance-$key { appearance: $value; }'
      ];

      return $this->runGenerators();
    }
  }
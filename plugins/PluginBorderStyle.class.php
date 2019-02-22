<?php
  require_once('Plugin.php');

  class PluginBorderStyle extends Plugin
  {
    protected $prop = 'borderStyle';

    public function compile()
    {
      $this->generators = [
'.border-$key { border-style: $value; }',
      ];

      return $this->runGenerators();
    }
  }

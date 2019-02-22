<?php
  require_once('Plugin.php');

  class PluginMargin extends Plugin
  {
    protected $prop = 'margin';

    public function compile()
    {
      $this->generators = [
        '.m-$key { margin: $value; }',
        '.my-$key { margin-top: $value; margin-bottom: $value; }',
        '.mx-$key { margin-left: $value; margin-right: $value; }',
        '.mt-$key { margin-top: $value; }',
        '.mr-$key { margin-right: $value; }',
        '.mb-$key { margin-bottom: $value; }',
        '.ml-$key { margin-left: $value; }'
      ];

      return $this->runGenerators();
    }
  }
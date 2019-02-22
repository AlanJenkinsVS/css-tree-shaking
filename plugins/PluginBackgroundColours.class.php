<?php
  require_once('Plugin.php');

  class PluginBackgroundColours extends Plugin
  {
    protected $prop = 'colours';

    public function compile()
    {
      $this->generators = [
'.bg-$key-lightest { background-color: lighten($value, 30%); }',
'.bg-$key-lighter { background-color: lighten($value, 20%); }',
'.bg-$key-light { background-color: lighten($value, 10%); }',
'.bg-$key { background-color: $value; }',
'.bg-$key-dark { background-color: darken($value, 10%); }',
'.bg-$key-darker { background-color: darken($value, 20%); }',
'.bg-$key-darkest { background-color: darken($value, 30%); }'
      ];

      return $this->runGenerators();
    }
  }
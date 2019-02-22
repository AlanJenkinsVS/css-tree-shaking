<?php
  require_once('Plugin.php');

  class PluginBorderColours extends Plugin
  {
    protected $prop = 'colours';

    public function compile()
    {
      $this->generators = [
'.border-$key-lightest { border-color: lighten($value, 30%); }',
'.border-$key-lighter { border-color: lighten($value, 20%); }',
'.border-$key-light { border-color: lighten($value, 10%); }',
'.border-$key { border-color: $value; }',
'.border-$key-dark { border-color: darken($value, 10%); }',
'.border-$key-darker { border-color: darken($value, 20%); }',
'.border-$key-darkest { border-color: darken($value, 30%); }'
      ];

      return $this->runGenerators();
    }
  }

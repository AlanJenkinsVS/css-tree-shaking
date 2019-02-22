<?php
  require_once('Plugin.php');

  class PluginTextColours extends Plugin
  {
    protected $prop = 'colours';

    public function compile()
    {
      $this->generators = [
'.text-$key-lightest { color: lighten($value, 30%); }',
'.text-$key-lighter { color: lighten($value, 20%); }',
'.text-$key-light { color: lighten($value, 10%); }',
'.text-$key { color: $value; }',
'.text-$key-dark { color: darken($value, 10%); }',
'.text-$key-darker { color: darken($value, 20%); }',
'.text-$key-darkest { color: darken($value, 30%); }'
      ];

      return $this->runGenerators();
    }
  }

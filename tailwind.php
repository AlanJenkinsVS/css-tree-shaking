<?php
  require_once 'vendor/autoload.php';
  use Leafo\ScssPhp\Compiler;

  class Tailwind
  {
    // constructor
    public function __construct($config)
    {
      $this->config = $config;
    }

    // Formatters
    public $expanded = "Leafo\ScssPhp\Formatter\Expanded";
    public $nested = "Leafo\ScssPhp\Formatter\Nested";
    public $compressed = "Leafo\ScssPhp\Formatter\Compressed";
    public $compact = "Leafo\ScssPhp\Formatter\Compact";
    public $crunched = "Leafo\ScssPhp\Formatter\Crunched";

    public function setFormat($format)
    {
      $this->formatter = $format;
    }

    public function compile()
    {
      $scss = new Compiler();
      if (isset($this->formatter))
      {
        $scss->setFormatter($this->formatter);
      }

      // separate each formatter into a separate class and register it separately
      // then iterate over each formatter
      $str = $this->backgroundColours();
      $str .= $this->borderColours();
      $str .= $this->borderStyle();

      return $scss->compile($str);
    }

    function backgroundColours()
    {
      $str= '';
      foreach ($this->config['colours'] as $key => $value) {
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

      return $str;
    }

    function borderColours()
    {
      $str= '';
      foreach ($this->config['colours'] as $key => $value) {
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

      return $str;
    }

    function borderStyle()
    {
      $str= '';

      foreach ($this->config['borderStyle'] as $key => $value) {
        $str .= '.border-'.$key.' {
  border-style: '.$value.';
}';
      }

      return $str;
    }
  }
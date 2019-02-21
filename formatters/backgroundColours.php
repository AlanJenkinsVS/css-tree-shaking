<?php
  class FormatterBackgroundColours
  {
    public function __construct($colours)
    {
      $this->colours = $colours;
    }

    function compile()
    {
      $str= '';
      foreach ($this->colours as $key => $value) {
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
  }
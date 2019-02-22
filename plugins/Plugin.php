<?php
  class Plugin
  {
    public $generators = [];

    public function __construct($config)
    {
      $this->config = $config;
      $this->setSelectors();
    }

    private function setSelectors()
    {
      if (isset($this->prop) && isset($this->config[$this->prop]))
      {
        $selectors = $this->config[$this->prop];
      }

      $this->selectors = isset($selectors) ? $selectors : null;
    }

    public function runGenerators()
    {
      $str = '';

      if (isset($this->generators)) {
        foreach($this->generators as $generator) {
          $str .= $this->generator($generator);
        }
      }

      return $str;
    }

    public function generator(string $template)
    {
      $str = '';

      if (isset($this->selectors)) {
        foreach ($this->selectors as $key => $value) {
          $str .= strtr($template, [ '$key' => $key, '$value' => $value]);
        }
      }

      return $str;
    }

  }

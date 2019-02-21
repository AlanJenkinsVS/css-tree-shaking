<?php
  // Config file for setting SCSS vars based on Tailwind
 
  class TailwindConfig
  {
    private $config;

    public function __construct()
    {
      $this->defaults();
    }

    public function config()
    {
      return $this->config;
    }

    public function defaults ()
    {
       // SCSS Format types
      $this->config['colours'] = [
        'blue' => '#007ACE',
        'purple' => '#9C6ADE',
        'indigo' => '#5C6AC4'
      ];

      $this->config['borderStyle'] = [
        'solid' => 'solid',
        'dashed' => 'dashed',
        'dotted' => 'dotted',
        'none' => 'none'
      ];
    }
  }
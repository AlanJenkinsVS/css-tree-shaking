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
      // appearance
      $this->config['appearance'] = [
        'none' => 'none'
      ];

      // Colours
      $this->config['colours'] = [
        'grey' => 'HSL(210,16%,76%)',
        'primary' => 'HSL(189,73%,40%)',
        'secondary' => 'HSL(195,7%,23%)',
        'tertiary' => 'HSL(210,3%,60%)'
      ];

      // @todo implement this in plugins
      $this->config['colourVariants'] = [
        'lightest' => ['lighten', '30%'],
        'lighter' => ['lighten', '20%'],
        'light' => ['lighten', '10%'],
        'dark' => ['darken', '10%'],
        'darker' => ['darken', '20%'],
        'darkest' => ['darken', '30%'],
      ];

      $this->config['borderStyle'] = [
        'solid' => 'solid',
        'dashed' => 'dashed',
        'dotted' => 'dotted',
        'none' => 'none'
      ];

      $this->config['margin'] = [
        'auto' => 'auto',
        'px' => '1px',
        '0' => '0',
        '1' => '0.25rem',
        '2' => '0.5rem',
        '3' => '0.75rem',
        '4' => '1rem',
        '5' => '1.25rem',
        '6' => '1.5rem',
        '8' => '2rem',
        '10' => '2.5rem',
        '12' => '3rem',
        '16' => '4rem',
        '20' => '5rem',
        '24' => '6rem',
        '32' => '8rem',
        '64' => '16rem'
      ];

  // screens: {
  //   sm: '576px',
  //   md: '768px',
  //   lg: '992px',
  //   xl: '1200px'
  // },

  // Fonts
  // fonts: {
  //   sans: [
  //     'product_sansregular',
  //     'system-ui',
  //     'BlinkMacSystemFont',
  //     '-apple-system',
  //     'Segoe UI',
  //     'Roboto',
  //     'Oxygen',
  //     'Ubuntu',
  //     'Cantarell',
  //     'Fira Sans',
  //     'Droid Sans',
  //     'Helvetica Neue',
  //     'sans-serif'
  //   ],
  //   serif: [
  //     'Constantia',
  //     'Lucida Bright',
  //     'Lucidabright',
  //     'Lucida Serif',
  //     'Lucida',
  //     'DejaVu Serif',
  //     'Bitstream Vera Serif',
  //     'Liberation Serif',
  //     'Georgia',
  //     'serif'
  //   ],
  //   mono: [
  //     'Menlo',
  //     'Monaco',
  //     'Consolas',
  //     'Liberation Mono',
  //     'Courier New',
  //     'monospace'
  //   ]
  // },
    }
  }
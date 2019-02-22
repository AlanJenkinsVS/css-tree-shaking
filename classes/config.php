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
        'grey' => '#B8C2CC',
        'primary' => '#1B99B0',
        'secondary' => '#373D3F',
        'tertiary' => '#979A9D'
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

      // Screens

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
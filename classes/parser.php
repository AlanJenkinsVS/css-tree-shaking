<?php
  class CssParser
  {
  protected $whitelist;

    public function __construct()
    {
      //
      // $this->whitelist = ['.bg-primary'];
    }

    protected function isAllowedRule($rule)
    {
        foreach ($this->whitelist as $allowedRule) {
            if (strpos($rule, $allowedRule) !== false) {
                return true;
            }
        }
        return false;
    }

    function stripUnusedCss($style)
    {
      $parsed = '';
      $oCssParser = new Sabberworm\CSS\Parser($style);
      $parser = $oCssParser->parse();

      foreach($parser->getAllDeclarationBlocks() as $block) {
        foreach($block->getSelectors() as $selector) {
          $allowRule = false;

          foreach($this->whitelist as $whiteListSelector) {
            if ($whiteListSelector == $selector) {
              $allowRule = true;
            }
          }

          if(!$allowRule) {
            $parser->removeDeclarationBlockBySelector( $block );
          }
        }
      }
      return $parser->render();
    }

    function generateWhitelist(string $attr, string $content)
    {
      $dom = new DOMDocument();
      $dom->loadHTML($content);

      $attrData = []; 

      // Loop through each tag in the dom and add it's attribute data to the array 
      foreach($dom->getElementsByTagName('*') as $tag) {
        if(empty($tag->getAttribute($attr)) === false) {
          $classes = explode(' ', $tag->getAttribute($attr));
          foreach($classes as $class) {
            if(!in_array($class, $attrData, true)){
              array_push($attrData, '.'.$class);
            }
          }
        }
      }

      $this->whitelist = array_unique($attrData);
    }
  }
<?php
  require_once 'classes/page.php';

  $page = new Page('homepage.php');
  $page->disableCache();
  $page->render();
?>
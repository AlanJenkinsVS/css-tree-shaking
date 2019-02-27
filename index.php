<?php
  require_once 'classes/page.php';

  $start = microtime(true);

  $page = new Page('homepage.php');
  $cacheDisabled = isset($_GET['cache']) && $_GET['cache'] == 'disabled';

  if ($cacheDisabled) {
    $page->disableCache();
  }

  $page->render();

  $end = microtime(true);
  $creationtime = ($end - $start);
  printf("Page created in %.6f seconds.", $creationtime);
?>
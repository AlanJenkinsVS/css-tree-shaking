<?php
  require_once 'tailwind.php';
  require_once 'config.php';

  $config = new TailwindConfig();

  $tailwind = new Tailwind($config->config());
  // $tailwind->setFormat($tailwind->crunched);

  // echo $tailwind->compile();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tailwind</title>
  <style>
  <?=$tailwind->compile()?>
  </style>
</head>
<body>
  <div class="bg-indigo-lightest">Lightest</div>
  <div class="bg-indigo-lighter">Lighter</div>
  <div class="bg-indigo-light">Light</div>
  <div class="bg-indigo">Indigo </div>
  <div class="bg-indigo-dark">Dark</div>
  <div class="bg-indigo-darker">Darker</div>
  <div class="bg-indigo-darkest">Darkest</div>
  
</body>
</html>
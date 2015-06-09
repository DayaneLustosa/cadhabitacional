<?php
function __autoload($className) {
  $require = null;

  $explodePath = explode('_', $className);
  $i = 1;
  $size = count($explodePath);
  foreach ($explodePath as $path) {
    if( $i != $size ){
      $require .= '/' . strtolower($path);
    } else {
      $require .= '/' . $path;
    }
    $i++;
  }

  $file = '..' . $require . '.php';
  $fileApp = BASE_PATH .  $require . '.php';

  try {
    if (file_exists($file)){
      require_once($file);
    } elseif (file_exists($fileApp)) {
      require_once($fileApp);
    } else {
      throw new Exception("Arquivo " . $require . ".php não existe!");
    }
  } catch (Exception $e) {
    new Library_Error($e);
  }
}
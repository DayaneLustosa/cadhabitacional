<?php

class Library_Init
{
  protected $view;
  protected $menu;
  protected $content;
  protected $layout;
  private $flashMessages;
  protected $disableView = false;

  function __construct() {
    $this->content = $this->__loadContent();
    $this->__loadLayout();
  }

  private function __verifySession($url) {
    // 0 = todos; 1 = administrador; 2 = cadastrador; 3 = assist. social; 4 = secretario;
    $permissoes = [
    0 => [ '/', '/index', '/index/login', '/index?erro=1', '/contato' ],
    1 => [ '/', '/index', '/index/login', '/index?erro=1', '/contato', '/index/logout', '/cadastro', '/ajax/verificacpf', '/cadastro/salvar', 
    '/cadastrousuario', '/cadastrousuario/salvar', '/relatorio', '/relatorio/index', '/relatorio/contemplados'],
    ];

    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
      $atribuicao = 0;
    } else {
      $atribuicao = $_SESSION['user']['atribuicao'];
    }

    $url = explode('?', $url);
    $url = $url[0];
    if ( !in_array($url, $permissoes[$atribuicao]) ) {
      header('Location: ' . BASE_URL . 'index?erro=1');
    }
  }

  private function __loadContent() {
    try {
      ob_start();
      // URL Amigável 
      if(strstr('localhost', $_SERVER['SERVER_NAME'])) {  // gamb local
        $url_site = 'cadhabitacional/public/';
      }
      $url_digitada = $_SERVER['REQUEST_URI'];
      $url_digitada = str_replace($url_site, '', $url_digitada);
      $url_digitada = str_replace('/?', '?', $url_digitada);
      $url_array = explode("?", $url_digitada);
      $url_array = explode("/", $url_array[0]);
      if(empty($url_array[1]) || $url_array[1] == ""){ 
        $p = 'index';
      // controller e/ou página
      } 
      else{ $p = trim($url_array[1]); }
      if(!empty($url_array[2]) && $url_array[2] != ""){ 
        $a = $url_array['2']; 
      // action
      } // end URL Amigável

      $this->__verifySession($url_digitada);

      // class
      $classe = ucfirst($p);
      require_once(BASE_PATH . '/controllers/' . $classe . '.php' );
      $_p = "Controllers_" . $classe;
      $loadedClass = new $_p($this);

      // action
      if ( isset($a) ) {
        $aAction = $a . 'Action';
        if (method_exists($loadedClass, $aAction)) {
          $this->view = $loadedClass->$aAction();
        } else {
          throw new Exception("Ação <b>" . $a . "</b> não existe!");
        }
      } else {
        $a = 'index';
        if (method_exists($loadedClass, 'indexAction')) {
          $this->view = $loadedClass->indexAction();
        } else {
          throw new Exception("Ação <b>index</b> não existe!");
        }
      }

      // view
      $filename = $p . '/' . $a . '.phtml';

      if ( file_exists(BASE_PATH . '/views/' . $filename) ) {
        require_once(BASE_PATH . '/views/' . $filename);
      } elseif ($this->disableView === false) {
        throw new Exception("Visão <b>" . BASE_PATH . '/views/' . $filename . "</b> não existe!");
      }
      $contents = ob_get_contents();
      ob_end_clean();
      return $contents;
    } catch (Exception $e) {
      new Library_Error($e);
    }
  }

  protected function __loadLayout() {
    if(!isset($this->layout)){
      $this->layout = "default";
    }
    require_once(BASE_PATH . "/views/layouts/" . $this->layout . ".phtml");
  }
}
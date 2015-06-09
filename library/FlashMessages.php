<?php
class Library_FlashMessages {

  public function setMessage($type, $message){
    $_SESSION['messages'][][$type] = $message;
  }

  public function getMessage(){
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $key => $message) {
        foreach ($message as $type => $value) { 
          ?>
          <div class="alert alert-<?php echo $type?>">
            <?php echo $value ?>
          </div>
          <?php
        }
      }
      unset($_SESSION['messages']);
    }
  }
}
?>
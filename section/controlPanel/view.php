<?php if(!$_ENGIINE_KEY_ACCESS) exit(); ?>


<div class="content_block">


  <?php if($CONTROLLER_PAGE): include $_SERVER[DOCUMENT_ROOT].'/section/controlPanel/section/'.$CONTROLLER_PAGE.'.php'; endif;  ?>

  <?php if(!$CONTROLLER_PAGE): include $_SERVER[DOCUMENT_ROOT].'/section/controlPanel/section/main.php'; endif;  ?>

</div>






























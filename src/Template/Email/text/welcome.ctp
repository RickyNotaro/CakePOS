<?php 
    $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "staffs/confirm/" .  $uuid;
?>
Active ton compte : <?= $confirmation_link ?>
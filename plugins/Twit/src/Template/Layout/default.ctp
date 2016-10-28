<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePOS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CakePOS</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Staff</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
$loguser = $this->request->session()->read('Auth.User');
if ($loguser) {
$staffEmail = $loguser['email'];
echo '<li>' . $this->Html->link($loguser['username'] . '  (' . $loguser['role'] . ')' , ['controller' => 'Staffs', 'action' => 'view',  $loguser['id'] ]) . '</li>' ;
echo '<li>' . $this->Html->link(__('Logout'), ['controller' => 'Staffs', 'action' => 'logout']) . '</li>' ;
} else {
echo '<li>' . $this->Html->link( __('Login') , ['controller' => 'Staffs', 'action' => 'login']) . '</li>' ;
echo '<li>' . $this->Html->link( __('Register') , ['controller' => 'Staffs', 'action' => 'add']) . '</li>' ;
}
?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <div class="container">
      <?= $this->Flash->render(); ?>

      <?= $this->fetch('content'); ?>
  </div>
</body>
</html>

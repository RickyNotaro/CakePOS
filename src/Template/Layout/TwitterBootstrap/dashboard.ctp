<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <?= '<li>' . $this->Html->link( __('Staff') , ['controller' => 'Staffs']) . '</li>'?>
                <?= '<li>' . $this->Html->link( __('Products') , ['controller' => 'Products']) . '</li>'?>
                <?= '<li>' . $this->Html->link( __('Payment Methods') , ['controller' => 'PaymentMethods']) . '</li>'?>
                <?= '<li>' . $this->Html->link( __('Payments') , ['controller' => 'Payments']) . '</li>'?>
                <?= '<li>' . $this->Html->link( __('Products') , ['controller' => 'Products']) . '</li>'?>
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
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?= $this->request->controller; ?></h1>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->start('tb_body_end');
$this->fetch('script');
echo '<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>';
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');

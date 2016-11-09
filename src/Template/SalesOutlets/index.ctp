<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Sales Outlet'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<?php $this->Html->script('app', ['block' => true]); ?>

<div class="col-md-4 col-md-offset-4">
  <form action="sales-outlets/add.json" class="form-inline" role="form" id="add-to-do">
    <div class="form-group">
      <div class="input-append" id="task-input">
        <input class="form-control input" name="sales_outlet_name" type="text" id="inputLarge" placeholder="Enter an outlet name...">
        <button type="submit" class="btn btn-primary ">Add</button>
        </div>
      </div>
  </form>
  <div class="task-container" id="outlets">
    <form action="/outlets/finish.json" class="form-inline" role="form" id="finish-to-do">
      <div id="incomplete-label"><h5>Outlets:</h5></div>
      <div class="form-group" id="incomplete-outlets"></div>
    </form>
  </div>
</div>

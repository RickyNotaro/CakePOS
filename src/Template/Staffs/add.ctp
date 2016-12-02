<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($staff); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Staff']) ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->input('notes');
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    // IF SOMEONE IS LOOKING AT MY CODE, I KNOW THAT'S WRONG.
    echo $this->Form->input('role', ['options' => ['gestionnaire' => __('Gestionnaire'), 'employe' => __('Employe')]]);
    echo "</br>";
    echo $this->Recaptcha->display();
    ?>
</fieldset>
</br>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

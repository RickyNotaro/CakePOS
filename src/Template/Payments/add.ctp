<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($payment); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Payment']) ?></legend>
    <?php
    echo $this->Form->input('payment_method_id', ['options' => $paymentMethods]);
    echo $this->Form->input('sales_transaction_id', ['options' => $transactions]);
    echo $this->Form->input('payment_amount');
    echo $this->Form->input('other_details');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Sales Outlets'), ['controller' => 'SalesOutlets', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Sales Outlet'), ['controller' => 'SalesOutlets', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Sales Outlets'), ['controller' => 'SalesOutlets', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Sales Outlet'), ['controller' => 'SalesOutlets', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($transaction); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Transaction']) ?></legend>
    <?php
    echo $this->Form->input('customer_id', ['options' => $customers]);
    echo $this->Form->input('sales_outlet_id', ['options' => $salesOutlets]);
    echo $this->Form->input('staff_id', ['options' => $staffs]);
    echo $this->Form->input('transaction_date_time');
    echo $this->Form->input('transaction_retail_price');
    echo $this->Form->input('other_details');
    echo $this->Form->input('products._ids', ['options' => $products]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

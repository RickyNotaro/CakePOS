<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $transaction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]
    )
    ?>
    </li>
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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $transaction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]
    )
    ?>
    </li>
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
    <legend><?= __('Edit {0}', ['Transaction']) ?></legend>
    <?php
    echo $this->Form->input('customer_id', ['options' => $customers]);
    echo $this->Form->input('sales_outlet_id', ['options' => $salesOutlets]);
    echo $this->Form->input('staff_id', ['options' => $staffs]);
    echo $this->Form->input('transaction_date_time');
    echo $this->Form->input('transaction_retail_price');
    echo $this->Form->input('other_details');
    ?>
</fieldset>
<?= $this->Form->button(__("Edit")); ?>
<?= $this->Form->end() ?>

<?= $this->Form->create($productstransactions); ?>
</br>
<fieldset>
    <legend><?= __('Add products') ?></legend>
    <?php
    echo $this->Form->input('theproduct_id', ['options' => $products, 'multiple' =>false]);
    echo $this->Form->input('quantity');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

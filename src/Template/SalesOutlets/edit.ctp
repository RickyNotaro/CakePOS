<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $salesOutlet->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $salesOutlet->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Sales Outlets'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $salesOutlet->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $salesOutlet->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Sales Outlets'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($salesOutlet); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Sales Outlet']) ?></legend>
    <?php
    echo $this->Form->input('sales_outlet_name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

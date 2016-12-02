<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List SalesOutlets'), ['controller' => 'SalesOutlets', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Sales Outlet'), ['controller' => 'SalesOutlets', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('customer_id'); ?></th>
            <th><?= $this->Paginator->sort('sales_outlet_id'); ?></th>
            <th><?= $this->Paginator->sort('staff_id'); ?></th>
            <th><?= $this->Paginator->sort('transaction_date_time'); ?></th>
            <th><?= $this->Paginator->sort('transaction_retail_price'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= $this->Number->format($transaction->id) ?></td>
            <td>
                <?= $transaction->has('customer') ? $this->Html->link($transaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id]) : '' ?>
            </td>
            <td>
                <?= $transaction->has('sales_outlet') ? $this->Html->link($transaction->sales_outlet->id, ['controller' => 'SalesOutlets', 'action' => 'view', $transaction->sales_outlet->id]) : '' ?>
            </td>
            <td>
                <?= $transaction->has('staff') ? $this->Html->link($transaction->staff->id, ['controller' => 'Staffs', 'action' => 'view', $transaction->staff->id]) : '' ?>
            </td>
            <td><?= h($transaction->transaction_date_time) ?></td>
            <td><?= $this->Number->format($transaction->transaction_retail_price) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $transaction->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $transaction->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

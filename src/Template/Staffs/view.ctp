<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?> </li>
<li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?> </li>
<li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($staff->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($staff->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($staff->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h($staff->password) ?></td>
        </tr>
        <tr>
            <td><?= __('First Name') ?></td>
            <td><?= h($staff->first_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Name') ?></td>
            <td><?= h($staff->last_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= h($staff->role) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($staff->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Notes') ?></td>
            <td><?= $this->Text->autoParagraph(h($staff->notes)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Transactions') ?></h3>
    </div>
    <?php if (!empty($staff->transactions)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Sales Outlet Id') ?></th>
                <th><?= __('Staff Id') ?></th>
                <th><?= __('Transaction Date Time') ?></th>
                <th><?= __('Transaction Retail Price') ?></th>
                <th><?= __('Other Details') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($staff->transactions as $transactions): ?>
                <tr>
                    <td><?= h($transactions->id) ?></td>
                    <td><?= h($transactions->customer_id) ?></td>
                    <td><?= h($transactions->sales_outlet_id) ?></td>
                    <td><?= h($transactions->staff_id) ?></td>
                    <td><?= h($transactions->transaction_date_time) ?></td>
                    <td><?= h($transactions->transaction_retail_price) ?></td>
                    <td><?= h($transactions->other_details) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Transactions', 'action' => 'view', $transactions->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Transactions', 'action' => 'edit', $transactions->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Transactions</p>
    <?php endif; ?>
</div>

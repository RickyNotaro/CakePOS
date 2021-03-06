<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($product->product_name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Retail Price') ?></td>
            <td><?= $this->Number->currency($product->product_retail_price) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($product->product_description)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Transactions') ?></h3>
    </div>
    <?php if (!empty($product->transactions)): ?>
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
            <?php foreach ($product->transactions as $transactions): ?>
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
        <p class="panel-body"><?= __('No related Transactions') ?></p>
    <?php endif; ?>
</div>

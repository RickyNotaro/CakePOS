<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
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
<li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Transaction #') . h($transaction->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Outlet') ?></td>
            <td><?= $transaction->has('sales_outlet') ? $this->Html->link($transaction->sales_outlet->id, ['controller' => 'SalesOutlets', 'action' => 'view', $transaction->sales_outlet->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Staff') ?></td>
            <td><?= $transaction->has('staff') ? $this->Html->link($transaction->staff->id, ['controller' => 'Staffs', 'action' => 'view', $transaction->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Transaction Retail Price') ?></td>
            <td><?= $this->Number->currency($transaction->transaction_retail_price) ?></td>
        </tr>
        <tr>
            <td><?= __('Transaction Date Time') ?></td>
            <td><?= h($transaction->transaction_date_time) ?></td>
        </tr>
        <tr>
            <td><?= __('Other Details') ?></td>
            <td><?= $this->Text->autoParagraph(h($transaction->other_details)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Products') ?></h3>
    </div>
    <?php if (!empty($transaction->products)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Product Name') ?></th>
                <th><?= __('Product Description') ?></th>
                <th><?= __('Product Retail Price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($transaction->products as $products): ?>
                <tr>
                    <td><?= h($products->product_name) ?></td>
                    <td><?= h($products->product_description) ?></td>
                    <td><?= $this->Number->currency(h($products->product_retail_price)) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Products', 'action' => 'view', $products->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Products', 'action' => 'edit', $products->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Products</p>
    <?php endif; ?>
</div>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Products Transaction'), ['action' => 'edit', $productsTransaction->product_id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Products Transaction'), ['action' => 'delete', $productsTransaction->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransaction->product_id)]) ?> </li>
<li><?= $this->Html->link(__('List Products Transactions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Products Transaction'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Products Transaction'), ['action' => 'edit', $productsTransaction->product_id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Products Transaction'), ['action' => 'delete', $productsTransaction->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransaction->product_id)]) ?> </li>
<li><?= $this->Html->link(__('List Products Transactions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Products Transaction'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($productsTransaction->product_id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Product') ?></td>
            <td><?= $productsTransaction->has('product') ? $this->Html->link($productsTransaction->product->id, ['controller' => 'Products', 'action' => 'view', $productsTransaction->product->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Transaction') ?></td>
            <td><?= $productsTransaction->has('transaction') ? $this->Html->link($productsTransaction->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $productsTransaction->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($productsTransaction->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($productsTransaction->quantity) ?></td>
        </tr>
    </table>
</div>


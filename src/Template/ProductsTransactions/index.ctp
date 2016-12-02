<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Products Transaction'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('product_id'); ?></th>
            <th><?= $this->Paginator->sort('transaction_id'); ?></th>
            <th><?= $this->Paginator->sort('quantity'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productsTransactions as $productsTransaction): ?>
        <tr>
            <td><?= $this->Number->format($productsTransaction->id) ?></td>
            <td>
                <?= $productsTransaction->has('product') ? $this->Html->link($productsTransaction->product->id, ['controller' => 'Products', 'action' => 'view', $productsTransaction->product->id]) : '' ?>
            </td>
            <td>
                <?= $productsTransaction->has('transaction') ? $this->Html->link($productsTransaction->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $productsTransaction->transaction->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($productsTransaction->quantity) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $productsTransaction->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $productsTransaction->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $productsTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransaction->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

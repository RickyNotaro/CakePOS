<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List PaymentMethods'), ['controller' => 'PaymentMethods', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('payment_method_id'); ?></th>
            <th><?= $this->Paginator->sort('sales_transaction_id'); ?></th>
            <th><?= $this->Paginator->sort('payment_amount'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($payments as $payment): ?>
        <tr>
            <td><?= $this->Number->format($payment->id) ?></td>
            <td>
                <?= $payment->has('payment_method') ? $this->Html->link($payment->payment_method->id, ['controller' => 'PaymentMethods', 'action' => 'view', $payment->payment_method->id]) : '' ?>
            </td>
            <td>
                <?= $payment->has('transaction') ? $this->Html->link($payment->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $payment->transaction->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($payment->payment_amount) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $payment->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $payment->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($payment->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Payment Method') ?></td>
            <td><?= $payment->has('payment_method') ? $this->Html->link($payment->payment_method->id, ['controller' => 'PaymentMethods', 'action' => 'view', $payment->payment_method->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Transaction') ?></td>
            <td><?= $payment->has('transaction') ? $this->Html->link($payment->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $payment->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Payment Amount') ?></td>
            <td><?= $this->Number->format($payment->payment_amount) ?></td>
        </tr>
        <tr>
            <td><?= __('Other Details') ?></td>
            <td><?= $this->Text->autoParagraph(h($payment->other_details)); ?></td>
        </tr>
    </table>
</div>


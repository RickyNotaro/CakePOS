<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Payment Method'), ['action' => 'edit', $paymentMethod->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Payment Method'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]) ?> </li>
<li><?= $this->Html->link(__('List Payment Methods'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment Method'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Payment Method'), ['action' => 'edit', $paymentMethod->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Payment Method'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]) ?> </li>
<li><?= $this->Html->link(__('List Payment Methods'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment Method'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($paymentMethod->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Payment Method Code') ?></td>
            <td><?= h($paymentMethod->payment_method_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Payment Method Name') ?></td>
            <td><?= h($paymentMethod->payment_method_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($paymentMethod->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Payment Method Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($paymentMethod->payment_method_description)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Payments') ?></h3>
    </div>
    <?php if (!empty($paymentMethod->payments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Payment Method Id') ?></th>
                <th><?= __('Sales Transaction Id') ?></th>
                <th><?= __('Payment Amount') ?></th>
                <th><?= __('Other Details') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($paymentMethod->payments as $payments): ?>
                <tr>
                    <td><?= h($payments->id) ?></td>
                    <td><?= h($payments->payment_method_id) ?></td>
                    <td><?= h($payments->sales_transaction_id) ?></td>
                    <td><?= h($payments->payment_amount) ?></td>
                    <td><?= h($payments->other_details) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'view', $payments->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'edit', $payments->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Payments</p>
    <?php endif; ?>
</div>

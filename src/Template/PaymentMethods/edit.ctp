<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $paymentMethod->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Payment Methods'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $paymentMethod->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Payment Methods'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($paymentMethod); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Payment Method']) ?></legend>
    <?php
    echo $this->Form->input('payment_method_code');
    echo $this->Form->input('payment_method_name');
    echo $this->Form->input('payment_method_description');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

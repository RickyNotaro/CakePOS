<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $refPaymentMethod->payment_method_code],
                ['confirm' => __('Are you sure you want to delete # {0}?', $refPaymentMethod->payment_method_code)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ref Payment Methods'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="refPaymentMethods form large-9 medium-8 columns content">
    <?= $this->Form->create($refPaymentMethod) ?>
    <fieldset>
        <legend><?= __('Edit Ref Payment Method') ?></legend>
        <?php
            echo $this->Form->input('payment_method_name');
            echo $this->Form->input('payment_method_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

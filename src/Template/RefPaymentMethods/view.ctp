<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Payment Method'), ['action' => 'edit', $refPaymentMethod->payment_method_code]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Payment Method'), ['action' => 'delete', $refPaymentMethod->payment_method_code], ['confirm' => __('Are you sure you want to delete # {0}?', $refPaymentMethod->payment_method_code)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Payment Methods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Payment Method'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refPaymentMethods view large-9 medium-8 columns content">
    <h3><?= h($refPaymentMethod->payment_method_code) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment Method Name') ?></th>
            <td><?= h($refPaymentMethod->payment_method_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method Code') ?></th>
            <td><?= $this->Number->format($refPaymentMethod->payment_method_code) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Payment Method Description') ?></h4>
        <?= $this->Text->autoParagraph(h($refPaymentMethod->payment_method_description)); ?>
    </div>
</div>

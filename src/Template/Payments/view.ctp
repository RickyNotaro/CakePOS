<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?= h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment #') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method Code') ?></th>
            <td><?= $payment->has('ref_payment_method') ? $this->Html->link($payment->ref_payment_method->payment_method_name, ['controller' => 'RefPaymentMethods', 'action' => 'view', $payment->ref_payment_method->payment_method_code]) : __('N/A') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Transaction Id') ?></th>
            <td><?= $this->Number->format($payment->sales_transaction_id) ?></td>
            <td><?=$this->Html->link($payment->sales_transaction_id, ['controller' => 'SalesTransactions', 'action' => 'view', $payment->sales_transaction_id]) ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Amount') ?></th>
            <td><?= $this->Number->format($payment->payment_amount) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($payment->other_details)); ?>
    </div>
</div>

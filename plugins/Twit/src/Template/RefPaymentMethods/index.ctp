<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Payment Method'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refPaymentMethods index large-9 medium-8 columns content">
    <h3><?= __('Ref Payment Methods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('payment_method_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_method_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refPaymentMethods as $refPaymentMethod): ?>
            <tr>
                <td><?= $this->Number->format($refPaymentMethod->payment_method_code) ?></td>
                <td><?= h($refPaymentMethod->payment_method_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refPaymentMethod->payment_method_code]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refPaymentMethod->payment_method_code]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refPaymentMethod->payment_method_code], ['confirm' => __('Are you sure you want to delete # {0}?', $refPaymentMethod->payment_method_code)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

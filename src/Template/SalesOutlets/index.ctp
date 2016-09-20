<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sales Outlet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salesOutlets index large-9 medium-8 columns content">
    <h3><?= __('Sales Outlets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sales_outlet_detail') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesOutlets as $salesOutlet): ?>
            <tr>
                <td><?= $this->Number->format($salesOutlet->id) ?></td>
                <td><?= h($salesOutlet->sales_outlet_detail) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $salesOutlet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salesOutlet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salesOutlet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesOutlet->id)]) ?>
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

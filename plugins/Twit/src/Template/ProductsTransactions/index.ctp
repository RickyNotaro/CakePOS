<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsTransactions index large-9 medium-8 columns content">
    <h3><?= __('Products Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sales_transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsTransactions as $productsTransaction): ?>
            <tr>
                <td><?= $productsTransaction->has('product') ? $this->Html->link($productsTransaction->product->id, ['controller' => 'Products', 'action' => 'view', $productsTransaction->product->id]) : '' ?></td>
                <td><?= $productsTransaction->has('sales_transaction') ? $this->Html->link($productsTransaction->sales_transaction->id, ['controller' => 'SalesTransactions', 'action' => 'view', $productsTransaction->sales_transaction->id]) : '' ?></td>
                <td><?= $this->Number->format($productsTransaction->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsTransaction->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsTransaction->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsTransaction->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransaction->product_id)]) ?>
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

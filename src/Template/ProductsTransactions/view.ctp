<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Transaction'), ['action' => 'edit', $productsTransaction->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Transaction'), ['action' => 'delete', $productsTransaction->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransaction->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsTransactions view large-9 medium-8 columns content">
    <h3><?= h($productsTransaction->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsTransaction->has('product') ? $this->Html->link($productsTransaction->product->id, ['controller' => 'Products', 'action' => 'view', $productsTransaction->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Transaction') ?></th>
            <td><?= $productsTransaction->has('sales_transaction') ? $this->Html->link($productsTransaction->sales_transaction->id, ['controller' => 'SalesTransactions', 'action' => 'view', $productsTransaction->sales_transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($productsTransaction->quantity) ?></td>
        </tr>
    </table>
</div>

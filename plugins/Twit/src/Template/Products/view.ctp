<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products Transactions'), ['controller' => 'ProductsTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Transaction'), ['controller' => 'ProductsTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Wholesale Price') ?></th>
            <td><?= $this->Number->format($product->product_wholesale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Retail Price') ?></th>
            <td><?= $this->Number->format($product->product_retail_price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Product Details') ?></h4>
        <?= $this->Text->autoParagraph(h($product->product_details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products Transactions') ?></h4>
        <?php if (!empty($product->products_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Sales Transaction Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->products_transactions as $productsTransactions): ?>
            <tr>
                <td><?= h($productsTransactions->product_id) ?></td>
                <td><?= h($productsTransactions->sales_transaction_id) ?></td>
                <td><?= h($productsTransactions->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductsTransactions', 'action' => 'view', $productsTransactions->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductsTransactions', 'action' => 'edit', $productsTransactions->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductsTransactions', 'action' => 'delete', $productsTransactions->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsTransactions->product_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

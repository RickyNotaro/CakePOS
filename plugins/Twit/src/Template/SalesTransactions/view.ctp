<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('Edit Sales Transaction'), ['action' => 'edit', $salesTransaction->id]) ?> </li>
      <li><?= $this->Form->postLink(__('Delete Sales Transaction'), ['action' => 'delete', $salesTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesTransaction->id)]) ?> </li>
      <li><?= $this->Html->link(__('List Sales Transactions'), ['action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Sales Transaction'), ['action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('List Sales Outlets'), ['controller' => 'SalesOutlets', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Sales Outlet'), ['controller' => 'SalesOutlets', 'action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
      <li><?= $this->Html->link(__('List Products Transactions'), ['controller' => 'ProductsTransactions', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Products Transaction'), ['controller' => 'ProductsTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="col-md-10">
<div class="salesTransactions view col-md-10 columns content">
    <h3><?= h($salesTransaction->id) ?></h3>
    <table class="table table-hover text-right">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $salesTransaction->has('customer') ? $this->Html->link($salesTransaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $salesTransaction->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Outlet') ?></th>
            <td><?= $salesTransaction->has('sales_outlet') ? $this->Html->link($salesTransaction->sales_outlet->id, ['controller' => 'SalesOutlets', 'action' => 'view', $salesTransaction->sales_outlet->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $salesTransaction->has('staff') ? $this->Html->link($salesTransaction->staff->id, ['controller' => 'Staffs', 'action' => 'view', $salesTransaction->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($salesTransaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Wholesale Price') ?></th>
            <td><?= $this->Number->format($salesTransaction->transaction_wholesale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Retail Price') ?></th>
            <td><?= $this->Number->format($salesTransaction->transaction_retail_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date Time') ?></th>
            <td><?= h($salesTransaction->transaction_date_time) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($salesTransaction->other_details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($salesTransaction->payments)): ?>
        <table class="table table-bordered table-hover">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Payment Method Code') ?></th>
                <th scope="col"><?= __('Sales Transaction Id') ?></th>
                <th scope="col"><?= __('Payment Amount') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($salesTransaction->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->payment_method_code) ?></td>
                <td><?= h($payments->sales_transaction_id) ?></td>
                <td><?= h($payments->payment_amount) ?></td>
                <td><?= h($payments->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products Transactions') ?></h4>
        <?php if (!empty($salesTransaction->products_transactions)): ?>
        <table class="table table-bordered table-hover">
            <tr>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Sales Transaction Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($salesTransaction->products_transactions as $productsTransactions): ?>
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

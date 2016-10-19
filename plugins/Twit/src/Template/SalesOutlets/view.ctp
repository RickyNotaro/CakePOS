<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sales Outlet'), ['action' => 'edit', $salesOutlet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sales Outlet'), ['action' => 'delete', $salesOutlet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesOutlet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales Outlets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Outlet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salesOutlets view large-9 medium-8 columns content">
    <h3><?= h($salesOutlet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sales Outlet Detail') ?></th>
            <td><?= h($salesOutlet->sales_outlet_detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($salesOutlet->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sales Transactions') ?></h4>
        <?php if (!empty($salesOutlet->sales_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Sales Outlet Id') ?></th>
                <th scope="col"><?= __('Staff Id') ?></th>
                <th scope="col"><?= __('Transaction Date Time') ?></th>
                <th scope="col"><?= __('Transaction Wholesale Price') ?></th>
                <th scope="col"><?= __('Transaction Retail Price') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($salesOutlet->sales_transactions as $salesTransactions): ?>
            <tr>
                <td><?= h($salesTransactions->id) ?></td>
                <td><?= h($salesTransactions->customer_id) ?></td>
                <td><?= h($salesTransactions->sales_outlet_id) ?></td>
                <td><?= h($salesTransactions->staff_id) ?></td>
                <td><?= h($salesTransactions->transaction_date_time) ?></td>
                <td><?= h($salesTransactions->transaction_wholesale_price) ?></td>
                <td><?= h($salesTransactions->transaction_retail_price) ?></td>
                <td><?= h($salesTransactions->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SalesTransactions', 'action' => 'view', $salesTransactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SalesTransactions', 'action' => 'edit', $salesTransactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SalesTransactions', 'action' => 'delete', $salesTransactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesTransactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

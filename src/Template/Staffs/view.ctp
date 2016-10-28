<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staffs view large-9 medium-8 columns content">
    <h3><?= h($staff->first_name) . ' ' . h($staff->last_name)?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($staff->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($staff->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td>••••••••••••••••</td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($staff->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($staff->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($staff->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff #') ?></th>
            <td><?= $this->Number->format($staff->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($staff->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sales Transactions') ?></h4>
        <?php if (!empty($staff->sales_transactions)): ?>
        <table>
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
            <?php foreach ($staff->sales_transactions as $salesTransactions): ?>
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

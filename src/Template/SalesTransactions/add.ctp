<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales Outlets'), ['controller' => 'SalesOutlets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Outlet'), ['controller' => 'SalesOutlets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products Transactions'), ['controller' => 'ProductsTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Transaction'), ['controller' => 'ProductsTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salesTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($salesTransaction) ?>
    <fieldset>
        <legend><?= __('Add Sales Transaction') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('sales_outlet_id', ['options' => $salesOutlets]);
            echo $this->Form->input('staff_id', ['options' => $staffs]);
            echo $this->Form->input('transaction_date_time');
            echo $this->Form->input('transaction_wholesale_price');
            echo $this->Form->input('transaction_retail_price');
            echo $this->Form->input('other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

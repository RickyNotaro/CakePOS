<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $salesOutlet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $salesOutlet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sales Outlets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salesOutlets form large-9 medium-8 columns content">
    <?= $this->Form->create($salesOutlet) ?>
    <fieldset>
        <legend><?= __('Edit Sales Outlet') ?></legend>
        <?php
            echo $this->Form->input('sales_outlet_detail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="row">
<nav class="col-md-2" >
  <ul class="nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('New Sales Transaction'), ['action' => 'add']) ?></li>
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
<div class="salesTransactions index col-md-10 text-right content">
    <h3><?= __('Sales Transactions') ?></h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sales_outlet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('staff_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_date_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_wholesale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_retail_price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesTransactions as $salesTransaction): ?>
            <tr>
                <td><?= $this->Number->format($salesTransaction->id) ?></td>
                <td><?= $salesTransaction->has('customer') ? $this->Html->link($salesTransaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $salesTransaction->customer->id]) : '' ?></td>
                <td><?= $salesTransaction->has('sales_outlet') ? $this->Html->link($salesTransaction->sales_outlet->id, ['controller' => 'SalesOutlets', 'action' => 'view', $salesTransaction->sales_outlet->id]) : '' ?></td>
                <td><?= $salesTransaction->has('staff') ? $this->Html->link($salesTransaction->staff->id, ['controller' => 'Staffs', 'action' => 'view', $salesTransaction->staff->id]) : '' ?></td>
                <td><?= h($salesTransaction->transaction_date_time) ?></td>
                <td><?= $this->Number->format($salesTransaction->transaction_wholesale_price) ?></td>
                <td><?= $this->Number->format($salesTransaction->transaction_retail_price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $salesTransaction->id], ['class' => 'btn btn-sm btn-default']); ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salesTransaction->id], ['class' => 'btn btn-sm btn-default']); ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salesTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesTransaction->id), 'class' => 'btn btn-sm btn-danger' ]) ?>
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

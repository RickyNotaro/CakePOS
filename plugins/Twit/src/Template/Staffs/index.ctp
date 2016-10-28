<div class="row">
<nav class="col-md-2" >
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales Transactions'), ['controller' => 'SalesTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Transaction'), ['controller' => 'SalesTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="staffs index col-md-10 text-right content">
    <h3><?= __('Staffs') ?></h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staffs as $staff): ?>
            <tr>
                <td><?= h($staff->username) ?></td>
                <td><?= h($staff->email) ?></td>
                <td><?= h($staff->first_name) ?></td>
                <td><?= h($staff->last_name) ?></td>
                <td><?= h($staff->role) ?></td>
                <td class="actions">
                     <?= $this->Html->link(__('View'), ['action' => 'view', $staff->id], ['class' => 'btn btn-sm btn-default']); ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->id], ['class' => 'btn btn-sm btn-default']); ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->id],['confirm' => __('Are you sure you want to delete the user {0}?', $staff->username), 'class' => 'btn btn-sm btn-default' ]) ?>
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
</div>

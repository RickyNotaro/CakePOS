<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="staff index large-9 medium-8 columns content">
    <h3><?= __('Staff') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('staff_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('staff_details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff as $staff): ?>
            <tr>
                <td><?= $this->Number->format($staff->staff_id) ?></td>
                <td><?= $this->Number->format($staff->staff_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $staff->staff_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->staff_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->staff_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staff_id)]) ?>
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

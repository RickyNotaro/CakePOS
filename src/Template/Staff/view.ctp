<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->staff_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->staff_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staff_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staff view large-9 medium-8 columns content">
    <h3><?= h($staff->staff_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Staff Id') ?></th>
            <td><?= $this->Number->format($staff->staff_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff Details') ?></th>
            <td><?= $this->Number->format($staff->staff_details) ?></td>
        </tr>
    </table>
</div>

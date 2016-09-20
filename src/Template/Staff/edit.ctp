<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $staff->staff_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staff_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="staff form large-9 medium-8 columns content">
    <?= $this->Form->create($staff) ?>
    <fieldset>
        <legend><?= __('Edit Staff') ?></legend>
        <?php
            echo $this->Form->input('staff_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

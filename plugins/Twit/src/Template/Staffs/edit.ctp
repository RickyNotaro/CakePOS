<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav">
      <li class="heading"><?= __('Other Actions') ?></li>
      <li><?= $this->Html->link(__('Return to Staff list'), ['action' => 'index']) ?></li>
      <li><?= $this->Form->postLink(
              __('Delete') . " ". $staff->first_name . " " . $staff->last_name,
              ['action' => 'delete', $staff->id],
              ['confirm' => __('Are you sure you want to delete {0} from the system?', $staff->first_name)]
          )
      ?></li>
    </ul>
</nav>
<div class="text-center col-md-10" style="padding:50px 0">
	<h1><?=$staff->first_name. " " .  $staff->last_name . " " . __('Informations')?></h1>
		<?= $this->Form->create($staff, array('class' => 'text-left')) ?>
					<div class="form-group">
						<?= $this->Form->input('username',array('class'=>'form-control',)) ?>
					</div>
					<div class="form-group">
					  <?= $this->Form->input('password',array('class'=>'form-control',"placeholder"=> __('Password'))) ?>
					</div>
					<div class="form-group">
						<?= $this->Form->input('email',array('class'=>'form-control',"placeholder"=> __('you@exemple.com'))) ?>
					</div>
					<div class="form-group">
						<?= $this->Form->input('first_name',array('class'=>'form-control',"placeholder"=> __('First name'))) ?>
					</div>
          <div class="form-group">
            <?= $this->Form->input('last_name',array('class'=>'form-control',"placeholder"=> __('Last name'))) ?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('role',array('class'=>'form-control','options' => ['gestionnaire' => __('Manager'), 'employe' =>  __('Staff')])) ?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('notes',array('class'=>'form-control',"placeholder"=> __('Notes about this staff member'),"type"=>"textarea")) ?>
          </div>
      	<?= $this->Form->button('Edit',array('class'=>'btn btn-primary')) ?>
		<?= $this->Form->end() ?>
	<!-- end:Main Form -->
</div>
</div>

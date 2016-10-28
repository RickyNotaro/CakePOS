
<div class="row">
<nav class="col-md-2" id="actions-sidebar">
    <ul class="nav">
      <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Html->link(__('List Staffs'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="text-center col-md-10" style="padding:50px 0">
	<h1><?=__('Register A New Staff Member')?></h1>
	<div class="login-form-1">
		<?= $this->Form->create($staff, array('class' => 'text-left')) ?>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="reg_username" class="sr-only"><?=__('Username')?></label>
						<?= $this->form->input('username',array('class'=>'form-control',"placeholder"=> __('Username'))) ?>
					</div>
					<div class="form-group">
						<label for="reg_password" class="sr-only"><?=__('Password')?></label>
					  <?= $this->form->input('password',array('class'=>'form-control',"placeholder"=> __('Password'))) ?>
					</div>
					<div class="form-group">
						<label for="reg_email" class="sr-only"><?=__('Email')?></label>
						<?= $this->form->input('email',array('class'=>'form-control',"placeholder"=> __('you@exemple.com'))) ?>
					</div>
					<div class="form-group">
						<label for="reg_fullname" class="sr-only"><?=__('First Name')?></label>
						<?= $this->form->input('first_name',array('class'=>'form-control',"placeholder"=> __('First name'))) ?>
					</div>
          <div class="form-group">
            <label for="reg_fullname" class="sr-only"><?=__('Last Name')?></label>
            <?= $this->form->input('last_name',array('class'=>'form-control',"placeholder"=> __('Last name'))) ?>
          </div>
          <div class="form-group">
            <label for="reg_fullname" class="sr-only"><?=__('role?')?></label>
            <?= $this->form->input('role',array('class'=>'form-control','options' => ['gestionnaire' => 'Gestionnaire', 'employe' => 'Employe'])) ?>
          </div>
          <div class="form-group">
            <label for="reg_fullname" class="sr-only"><?=__('Notes')?></label>
            <?= $this->form->input('notes',array('class'=>'form-control',"placeholder"=> __('Notes about this staff member'),"type"=>"textarea")) ?>
          </div>
				</div>
      	<?= $this->Form->button('Register',array('class'=>'btn btn-primary')) ?>
			</div>
			<div class="etc-login-form">
      </br>
				<p><?=__('already have an account?')?><a href="/CakePOS/staffs/login"> <?=__('Login here')?></a></p>
			</div>
		<?= $this->Form->end() ?>
	</div>
	<!-- end:Main Form -->
</div>
</div>

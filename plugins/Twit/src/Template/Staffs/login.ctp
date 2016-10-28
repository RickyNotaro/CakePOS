<div class="text-center" style="padding:50px 0">
  <h1><?=__('Login')?></h1>
	<div class="login-form-1">
		<?= $this->Form->create('staffs', array('class' => 'text-left')) ?>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
            <?= $this->form->input('username',array('class'=>'form-control',"placeholder"=> __('Nom d\'utilisateur'))) ?>
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<?= $this->form->input('password',array('class'=>'form-control',"placeholder"=> __('Password'))) ?>
					</div>
				</div>
				<?= $this->Form->button('Login',array('class'=>'btn btn-primary')) ?>
			</div>
			<div class="etc-login-form">
      </br>
				<p><?=__('New user?')?><a href="/CakePOS/staffs/add"> <?=__('Create new account')?></a>
        </p>
			</div>
		<?= $this->Form->end() ?>
	</div>
	<!-- end:Main Form -->
</div>

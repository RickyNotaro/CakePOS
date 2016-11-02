<div class="row">
  <nav class="col-md-2" id="actions-sidebar">
    <ul class="nav">
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

<div class="salesTransactions form col-md-10 columns content">
    	<?= $this->Form->create($salesTransaction, array('class' => 'text-left')) ?>
    <fieldset>
        <legend><?= __('Add a Sales Transaction') ?></legend>
        <div class="form-group">
          <?= $this->Form->input('customer_id',array('class'=>'form-control','options' => $customers)) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('sales_outlet_id',array('class'=>'form-control', 'options' => $salesOutlets)) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('staff_id',array('class'=>'form-control', 'options' => $staffs)) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('staff_id',array('class'=>'form-control', 'options' => $staffs)) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('transaction_date_time',array('class'=>'form-control selectpicker')) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('transaction_wholesale_price',array('class'=>'form-control')) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('transaction_retail_price',array('class'=>'form-control')) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('other_details',array('class'=>'form-control')) ?>
        </div>
      	<?= $this->Form->button('Add',array('class'=>'btn btn-primary')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
</div>

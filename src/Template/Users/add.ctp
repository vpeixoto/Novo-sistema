<nav class="col-md-2 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('List {0}', 'Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List {0}', 'Setors'), ['controller' => 'Setors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New {0}', 'Setor'), ['controller' => 'Setors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form col-md-10 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= 'Add User' ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('setor_id', ['options' => $setors]);
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('obs');
            echo $this->Form->input('actived');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="users index large-12 medium-12 columns content">
  <h3> Editar usuário </h3>
  <?php 
    echo $this->Form->create($user);

    echo $this->Form->control('name');
    echo $this->Form->control('email');
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    
    echo $this->Form->button('Editar');

    echo $this->Form->end();
  ?>
</div>
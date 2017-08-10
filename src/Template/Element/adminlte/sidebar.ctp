
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <?php
            echo $this->Html->image(
                'user_icon.png',
                ['class'=>'img-circle',  "alt"=>"User Image"]
            );
        ?>
    </div>
    <div class="pull-left info">
      <p>
		<?php
            echo $user_name;
		?> 
	  </p>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">MENU</li>
    <!-- Optionally, you can add icons to the links -->
    <li><i class="fa fa-link"></i><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    <li><i class="fa fa-link"></i><?= $this->Html->link(__('List Setors'), ['controller' => 'Setors', 'action' => 'index']) ?></li>
    <li><i class="fa fa-link"></i><?= $this->Html->link(__('New Setor'), ['controller' => 'Setors', 'action' => 'add']) ?></li>
	
	<li><a href="#"><i class="fa fa-link"></i> <span>Relatórios</span></a></li>
    
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Recebimento</span> <i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
    </li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Qualidade</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Planejamento</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Expedição</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Estoque</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Oficina</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Financeiro</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Suporte Cliente</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Cotação</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#"><i class="fa fa-link"></i> <span>Cadastro</span><i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
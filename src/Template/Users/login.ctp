<style type="text/css">
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>

    <div class="container">
	<?= $this->Flash->render('auth') ?>
		<?= $this->Form->create() ?>
      <div class="form-signin form">
      	<h2 class="form-signin-heading">Faça o Login</h2>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <?= $this->Form->input('username') ?>
		        
        <label for="inputPassword" class="sr-only">Senha</label>
		<?= $this->Form->input('password') ?>

        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar me
          </label>
        </div>
        <?= $this->Form->button(__('Entrar')); ?>
      </form>
      <?= $this->Form->end() ?>

    </div> <!-- /container -->

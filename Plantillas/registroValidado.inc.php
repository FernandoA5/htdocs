
<div class="col-md-6">
  <div class="form-group text-center"><br>
      <label>Nombre de Usuario</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingresa un Nombre"<?php $validador ->showname(); ?>>
      <?php
      $validador ->showErrorName();
       ?>
       <br>
      <label>Email</label>
      <input type="email" class="form-control" name="email" placeholder="Ingresa tu Email"<?php $validador ->showemail(); ?>>
      <?php
      $validador ->showErrorEmail();
       ?>
    </div>
</div>
<div class="col-md-6">
  <div class="form-group text-center"><br>
    <label>Contraseña</label>
    <input type="password" class=form-control name="pass1" placeholder="Ingresa una contraseña">
    <?php $validador ->showErrorClave1(); ?>
    <br>
    <label>Repite la Contraseña</label>
    <input type="password" class=form-control name="pass2" placeholder="Repite la contraseña">
    <?php $validador ->showErrorClave2(); ?>
  </div>
</div>
  <div align="center">
    <button type="submit" class="btn btn-primary" name="send">Registrar</button>
  </div>

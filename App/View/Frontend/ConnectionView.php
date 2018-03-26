<!-- Body of the page | Login form -->

    <div class="bodyPage container mt-5 mb-5 col-md-8 col-sm-8">

      <div class="col-md-7 col-sm-12 d-flex flex-column align-items-center h-100">

        <div class="text-center mt-3 p-0 mt-xl-5">

          <img src="public/images/icons/page-connection.png" class="img-fluid imageConnection mb-4" alt="Icône espace membre">

          <h2 class="text-primary">Espace de connexion</h2>

        </div>

          <?php

           if(isset($error)) {

            echo '<div class="alert alert-danger mt-3 text-center" role="alert">
                    ' . $error . '
                  </div>';
           }

            $session = App\Model\Admin\Session::flash();

          ?>

        <form class="mt-4" method="POST">

          <div class="form-group">

            <?= $form->label('email', 'Votre adresse mail'); ?>

            <?= $form->input('email',  'email', 'Entrer votre email'); ?>

          </div>

          <div class="form-group">

            <?= $form->label('password', 'Votre mot de passe'); ?>

            <?= $form->input('password',  'password', 'Entrer votre mot de passe'); ?>

          </div>

          <input type="submit" name="formConnection" class="btn btn-primary" value="Valider"/>

        </form>

      </div>

    </div>

<!-- end -->
<div class="block_content" id="page_signup">
    <h2>Créer un compte</h2>

    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'add')));?>

            <div class="input text input-line">
                <input class="txt-field" name="data[User][username]" maxlength="255" type="text" id="UserUsername" placeholder="Nom d'utilisateur">
                <span class="caption">Nom d'utilisateur</span>
            </div>
            <div class="input email required input-line">
                <input class="txt-field" name="data[User][email]" maxlength="255" type="email" id="UserEmail" required="required" placeholder="Email">
                <span class="caption">Email</span>
            </div>
            <div class="input password required input-line">
                <input class="txt-field" name="data[User][password]" type="password" id="UserPassword" required="required" placeholder="Mot de passe">
                <span class="caption">Mot de passe</span>
            </div>
            <div class="input password required input-line">
                <input class="txt-field" name="data[User][re_password]" type="password" id="UserRePassword" required="required" placeholder="Confirmation du mot de passe">
                <span class="caption">Confirmez votre mot de passe</span>
            </div>
            <?php 
                // $this->Captcha->render($captchaSettings); 
            ?>

       <!--  <div class="input text required">
            <input class="txt-field" name="data[captcha]" autocomplete="off" type="text" id="UserCaptcha" required="required" placeholder="Contrôle de sécurité">
            <span class="caption">Entrez le code que vous voyez ci-dessus</span>
        </div> -->


    <?php echo $this->Form->submit(__("S'inscrire"),     array('class' => 'button')); ?>
    <?php echo $this->Form->end(); ?>
    </div>

</div>

<script type="text/javascript">
    
    $(function (){
        var inpParent = $('.input-line');

        if (!inpParent.length) return;

        inpParent.each(function (){
            var thisLine =  $(this),
                inpTxt =  thisLine.find('.txt-field'),
                inpCapt =  thisLine.find('.caption');

            function fIn() {
                inpTxt.parent().addClass('active');
            }
            function fOut() {
                if(inpTxt.val() != 0){

                }else{
                    inpTxt.parent().removeClass('active');
                }
            }

            inpTxt.focusin(fIn);
            inpTxt.focusout(fOut);
        })
    });

</script>
<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<section class="container main">
    <?=$render('sidebar', ['activeMenu'=>'settings']);?>

    <section class="feed mt-10">

    <div class="row">
            <div class="column pr-5">
  
            <h2>Alterar informações do Perfil</h2>

                <section class="container-main">
                    <form method="POST" action="<?=$base;?>/configuracoes">
                        <?php if(!empty($flash)): ?>
                        <div class="flash"><?php echo $flash; ?></div>
                        <?php endif; ?>

                        <label>Avatar: </label>
                        <input type="file" name="avatar"/>
                        <img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" class="mini"/><br/>
                        <label>Capa: </label>
                        <input type="file" name="cover"/>
                        <img src="<?=$base;?>/media/covers/<?=$userInfo->cover;?>" class="mini"/>


                        <hr class="config table"/>
                            <label> Nome Completo: <span>*</span><br/> 
                                <input placeholder="Nome completo" class="input" type="text" name="name" />
                            </label><br/>
                            <label>Email: <span>*</span><br/>
                                <input placeholder="Seu E-mail" class="input" type="email" name="email" />
                            </label><br/>
                            <label>Nova senha: <br/>
                                <input placeholder="Digite sua Senha" class="input" type="password" name="password" />
                            </label><br/>
                            <label>Confirmar nova senha:<br/> 
                                <input placeholder="Confirme sua Senha" class="input" type="password" name="passwordConfirm" />
                            </label><br/>
                            <label>Data de nascimento:<br/> 
                                <input placeholder="Alterar data de Nascimento" class="input" type="date" name="birthdate" id="birthdate" />
                            </label><br/>
                            <label>Cidade:<br/>
                                <input placeholder="Onde voce mora" class="input" type="text" name="city" />
                            </label><br/>
                            <label>Trabalho:<br/> 
                                <input placeholder="Digite onde trabalha" class="input" type="text" name="work" />
                            </label><br/>
                                <input class="button" type="submit" value="Salvar" name="save" />
                        </hr>
                    </form>
                </section>

            </div>
            <div class="column side pl-5">
                <?=$render('right-side');?>
            </div>
        </div>

        
    
    </section>


</section>

<?=$render('footer');?>

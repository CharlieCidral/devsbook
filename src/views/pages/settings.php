<?=$render('header', ['loggedUser'=>$loggedUser]);?>


<section class="container main">
    <?=$render('sidebar', ['activeMenu'=>'settings']);?>

    <section class="feed mt-10">

    <div class="row">
            <div class="column pr-5">
  
            <h2>Alterar informações do Perfil</h2>

                <section class="container-main">
                        <?php if(!empty($flash)): ?>
                        <div class="flash"><?php echo $flash; ?></div>
                        <?php endif; ?>

                    <form class="config-form" method="POST" enctype="multipart/form-data" action="<?=$base;?>/configuracoes">
                        

                        <label>Avatar: </label>
                        <input type="file" name="avatar"/>
                        <img src="<?=$base;?>/media/avatars/<?=$user->avatar; ?>" class="config-avatar"/><br/>
                        <label>Capa: </label>
                        <input type="file" name="cover"/>
                        <img src="<?=$base;?>/media/covers/<?=$user->cover; ?>" class="config-cover"/>


                        <hr class="config table"/>
                            <label> Nome Completo: <span>*</span><br/> 
                                <input placeholder="<?=$user->name;?>" class="input" type="text" name="name" />
                            </label><br/>
                            <label>Email: <span>*</span><br/>
                                <input placeholder="Alterar email" class="input" type="email" name="email" />
                            </label><br/>
                            <label>Nova senha: <br/>
                                <input placeholder="Digite sua Senha" class="input" type="password" name="password" />
                            </label><br/>
                            <label>Confirmar nova senha:<br/> 
                                <input placeholder="Confirme sua Senha" class="input" type="password" name="password_confirm" />
                            </label><br/>
                            <label>Data de nascimento:<br/> 
                                <input class="input" type="date" name="birthdate" id="birthdate" />
                            </label><br/>
                            <label>Cidade:<br/>
                                <input placeholder="<?= $user->city;?>" class="input" type="text" name="city" />
                            </label><br/>
                            <label>Trabalho:<br/> 
                                <input placeholder="<?= $user->work;?>" class="input" type="text" name="work" />
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

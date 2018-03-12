<?php
/**
 * template
 */
 $this->insert('layout/head',['title' => $title]);

?>

<body class="login">
<div>
    <?php
    $username = array(
        'name' => 'username',
        'placeholder' => 'Username',
        'type' => 'text',
        'class' => 'form-control has-feedback-left',
        'required' => 'required'
    );
    $password = array(
        'name' => 'password',
        'placeholder' => 'Password',
        'type' => 'password',
        'class' => 'form-control has-feedback-left',
        'required' => 'required'
    );
    ?>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>index.php/login/user_login">
                    <h1>CRM</h1>
                    <div>
                        <?php
                        if (isset($error)){ ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <?php echo $error; ?>
                            </div>
                        <?php }
                        ?>

                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3 form-group has-feedback">
                            <?= form_input($username) ?>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3 form-group has-feedback">
                            <?= form_input($password) ?>
                            <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div>
                        <button id="send" type="submit" class="btn btn-success">Login</button>
                        <a class="reset_pass" href="#">¿Perdio su contraseña?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <p>©2017 Palo Viejo S.A.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>





<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paloviejo - CRM</title>

    <!-- Bootstrap -->

    <link href="<?php echo base_url();?>ui/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     Font Awesome -->
    <link href="<?php echo base_url();?>ui/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>ui/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="<?php echo base_url();?>ui/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>ui/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>ui/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">

            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Registro</h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Registrar usuario</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

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
                                $email = array(
                                    'name' => 'email',
                                    'placeholder' => 'Email',
                                    'type' => 'email',
                                    'class' => 'form-control has-feedback-left',
                                    'required' => 'required'
                                );
                                $nombre = array(
                                    'name' => 'nombre',
                                    'placeholder' => 'Nombre',
                                    'type' => 'text',
                                    'class' => 'form-control has-feedback-left',
                                    'required' => 'required'
                                );
                                $cargo = array(
                                    'name' => 'cargo',
                                    'class' => 'form-control has-feedback-left',
                                    'required' => 'required'

                                );
                                $cargoOptions = array(
                                    'vendedor' => 'vendedor',
                                    'gerente' => 'gerente',
                                    'developer' => 'developer'
                                );


                                echo "<div class='error_msg'>";
                                echo validation_errors();
                                echo "</div>";

                                echo "<div class='error_msg'>";
                                if (isset($message_display)) {
                                    echo $message_display;
                                }
                                echo "</div>";
                                ?>

                                <br>
                                <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>index.php/login/register">
                                    <div class="form-group col-md-offset-3">
                                        <div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">
                                            <?= form_input($nombre) ?>
                                            <span class="fa fa-pencil-square-o form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-offset-3">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group has-feedback">
                                            <?= form_input($email) ?>
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-offset-3">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group has-feedback">
                                            <?= form_input($username) ?>
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-offset-3">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group has-feedback">
                                            <?= form_input($password) ?>
                                            <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-offset-3">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group has-feedback">
                                            <?= form_dropdown($cargo, $cargoOptions) ?>
                                            <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <!--<a href="dashboard" class="btn btn-success btn-lg"> Login</a>-->
                                            <button id="send" type="submit" class="btn btn-success">Login</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title2" name="title2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->

<!-- jQuery -->
<script src="<?php echo base_url();?>ui/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>ui/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ui/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url();?>ui/vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="<?php echo base_url();?>ui/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>ui/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url();?>ui/build/js/custom.min.js"></script>

</body>
</html>






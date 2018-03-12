<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>


            <?php

            if ($notificaciones) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">1</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <?php foreach ($notificaciones->result() as $notificacion) {?>
                            <li>
                            <a href="<?php echo $notificacion->url?>" class="notificacionA">
                                <input type="hidden" class="notificacionId" value="<?php echo $notificacion->id?>" name="notificacion_id_<?php $notificacion->id?>">
                                            <span>
                          <span><?php echo  $notificacion->titulo?></span>
                          <span class="time"><?php echo $notificacion->fecha;?></span>
                        </span>
                                <span class="message">
                          <?php echo $notificacion->contenido?>
                        </span>
                            </a>
                            </li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
            <?php } ?>


        </nav>
    </div>
</div>


<!-- /top navigation -->


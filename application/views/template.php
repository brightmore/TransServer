<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Voucher Client</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
        <!-- Animation library for notifications   -->
        <link href="<?php echo base_url('assets/css/animate.min.css') ?>" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css') ?>" rel="stylesheet"/>
        <!--     Fonts and icons     -->
        <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css') ?>" rel="stylesheet" />

    </head>
    <body> 

        <div class="wrapper">
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">V.I.P Smart Terminal</a>
                        </div>
                        <div class="collapse navbar-collapse">       
                            <!--                            <ul class="nav navbar-nav navbar-left">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-dashboard"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="">
                                                                    <i class="fa fa-search"></i>
                                                                </a>
                                                            </li> 
                                                        </ul>-->

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="<?php echo base_url('index.php/Dashboard/destination') ?>" title="Add Destination">
                                        <i class="pe-7s-plus"></i> 
                                    </a> 
                                </li>

                                <li>
                                    <a href="<?php echo base_url('index.php/Dashboard/users') ?>" title="Bookings">
                                        <i class="pe-7s-user"></i> 

                                    </a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url('index.php/Dashboard/history') ?>">
                                        <i class="pe-7s-note2"></i> 

                                    </a>        
                                </li>
                                <li>
                                    <a href="#" title="Sign Out">
                                        <i class="pe-7s-lock"></i> 
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">    
                        <?php echo $content ?>   
                    </div>    
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            Connectusgh @Copyright
                        </p>
                    </div>
                </footer>

            </div>   
        </div>
    </body>    
</html>
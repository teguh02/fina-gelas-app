<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Firna Gelas';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?> - 
        <?= $cakeDescription ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.7.8/angular-locale_id-id.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?= $this->Html->script('jquery.mask.min.js') ?>


    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        @media (min-width:992px) {.hide-lg {display: none !important}}
        @media (min-width: 768px) and (max-width: 992px) {.hide-md {display: none !important}}
        @media (max-width: 576px) {.hide-sm {display: none !important;}}

        .menu-item {
            height: 50px;
            align-items: center;
            justify-content: start;
            display: flex;
            text-decoration: none !important;
            color: white;
            width: 100%;
        }
        .menu-value {background-color: #22262a;}
        .menu-item:hover {color: white !important; background-color: #22262a !important;}
        .menu-item:focus {color: white !important; background-color: #22262a !important;}
        .hide_bullet {list-style-type: none;}
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-md bg-light border-bottom navbar-light">
        <!-- Brand -->
        <?php
            echo $this->Html->link(
                      $this->fetch('title'), 
                      array(
                          'controller' => 'Pages', 
                          'action' => 'home',
                      ), 
                      ['class' => 'navbar-brand'],
                  );
          ?>
          
  
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav ">
              <?php
              if($this->request->getsession()->read('Auth')) {
                  // user is logged in, show logout..user menu etc
                  echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'nav-link'));
              } else {
                  // the user is not logged in
                  echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'nav-link'));
              }
              ?>
          </li> 
          </ul>
        </div>
      </nav>
</header>
<body>
    <style>
        #navKiri {height: 100vh; position: fixed;}
    </style>
    
    <?= $this->Flash->render() ?>

    <div class="container-fluid">
            <div class="row">
                <div id="navKiri" class="col-lg-2 fixed-top px-0 col-sm-12 col-md-12 hide-md hide-sm bg-dark py-4">

                    <h4 class="px-3 text-light ">Firna Gelas</h4>
                    <br>
                    <?php
                    echo '<i class="fas fa-home mr-2 d-inline pl-3 text-light"></i>' . $this->Html->link(
                              'Beranda', 
                              array(
                                  'controller' => 'Pages', 
                                  'action' => 'home',
                              ), 
                              ['class' => 'menu-item d-inline'],
                          );
                  ?>
                    <br>

                    <a href="#Customers" class="menu-item mt-2 px-3" data-toggle="collapse" data-target="#Customers">
                        <i class="fas fa-users mr-2"></i>    Customers
                    </a>

                    <div id="Customers" class="collapse menu-value ">
                        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'text-light']) ?> </li>
                        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'text-light']) ?> </li>
                    </div>

                    <a href="#Invoices" class="menu-item px-3" data-toggle="collapse" data-target="#Invoices">
                        <i class="fas fa-scroll mr-2"></i>   Invoices
                    </a>

                    <div id="Invoices" class="collapse menu-value">
                        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index'], ['class' => 'text-light']) ?> </li>
                        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add'], ['class' => 'text-light']) ?> </li>
                    </div>

                    <a href="#Items" class="menu-item px-3" data-toggle="collapse" data-target="#Items">
                        <i class="fas fa-box mr-2"></i>   Items
                    </a>

                    <div id="Items" class="collapse menu-value">
                        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'text-light']) ?> </li>
                        <li><?= $this->Html->link(__('New Items'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'text-light']) ?> </li>                    
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12 hide-md hide-sm col-md-12"></div>

                <div class="col-lg-10 col-sm-12 col-md-12 py-3 konten">
                    <?= $this->fetch('content') ?>
                    <br>
                </div>
            </div>
    </div>

    <script>
        $('table').addClass('table table-hover table-striped');
        $('form').addClass('form-group');
        $('button').addClass('btn');
        $('a').css('textDecoration', 'none');
        $('button[type=submit]').addClass('btn btn-success mt-3');
        $('input[type=text]').addClass('form-control mb-2');
        $('input[type=email]').addClass('form-control mb-2');
        $('input[type=password]').addClass('form-control mb-2');
        $('input[type=number]').addClass('form-control mb-2');
        $('.menu-value').addClass('border-bottom px-3 text-light py-3');

        $('.first, .prev').addClass('float-left');
        $('.next, .last').addClass('float-right');
        $('.konten').addClass('hide_bullet');
    </script>
</body>
</html>

<?php
session_start();
include_once("autoload.php");
if (!isset($_SESSION['user'])) {
   header("Location: index.php");
} app::main();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="System Login">
    
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Cloud 8 AF">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content=".">
    <title>Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fonts/font-awesome.css">
    
    <link href="css/ip.grid.css" rel="stylesheet" />
    <script src="js/min.js"></script>
    <script src="js/utils.js"></script>
  </head>
  <body class="app sidebar-mini">
    <header class="app-header" style="background: white; !important; color: black;"><a class="app-header__logo" href="home.php" style="background: white; !important;color: black;"><img src="logo.png" class="img-responsive" style="height: 75px;"></a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      
      <ul class="app-nav">
        <!---<li class="app-search">
         <span id="loader" style="color: white;"> <i class="fa fa-wifi" ></i></span>
        </li>
        <li class="app-search">
          
          <form>
          <input class="app-search__input" type="search" placeholder="Search" name="q">
          <button class="app-search__button" type="submit"><i class="fa fa-search"></i></button></form>
        </li>
         -->

        
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar" style="color: black; !important;"></div>
    <aside class="app-sidebar">
      
      <ul class="app-menu">
        <li><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>

        

        <style type="text/css">
          #loader{display: none;}
        </style>
       

         <li  class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-plug"></i><span class="app-menu__label">Meters</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="meter-add.php" class="treeview-item"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Add New </a>
                                    </li>
                                    <li><a href="meter-list.php" class="treeview-item"><i class="fa fa-th"></i>&nbsp;&nbsp;&nbsp;View/update</a></li>
                                    
                                </ul>
                                
        </li>



        <li  class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">Coils</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="coil-add.php" class="treeview-item"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Add new</a>
                                    </li>
                                    <li><a href="coil-list.php" class="treeview-item"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;View/update</a></li>
                                    
                                </ul>
                                
        </li>



         <li  class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa  fa-stack-overflow"></i><span class="app-menu__label">Seals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="seal-add.php" class="treeview-item"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;New Seal</a>
                                    </li>
                                    <li><a href="seal-list.php" class="treeview-item"><i class="fa fa-table"></i>&nbsp;&nbsp;&nbsp;View/update</a></li>
                                    
                                </ul>
                                
        </li>


        <li><a class="app-menu__item" href="sale.php"><i class="app-menu__icon fa fa-table"></i><span class="app-menu__label">Assign Items</span></a></li>


          <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">Suppliers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="supplier_add.php" class="treeview-item"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New </a>
                                    </li>
                                    <li><a href="supplier-list.php" class="treeview-item"><i class="fa fa-truck"></i>&nbsp;&nbsp;&nbsp;All Supplier</a></li>
                                    
                                </ul>
                                
        </li>
        


        <li  class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Contractors</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="contractor-add.php" class="treeview-item"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;New Contractor</a>
                                    </li>
                                    <li><a href="contractor-list.php" class="treeview-item"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;All Contractor</a></li>
                                    
                                </ul>
                                
        </li>



      



<li  class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  

                                    <li>
                                        <a href="available.php" class="treeview-item"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;Available Items</a>
                                    </li>
                                    <li><a href="reports.php" class="treeview-item"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;Dispatched Items</a></li>

                                    <li><a href="received.php" class="treeview-item"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;Received Items</a></li>
                                    
                                </ul>
                                
        </li>




        <li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Log Out</span></a></li>
        <?php app::main(); ?>


        
       
      </ul>
    </aside>
    <main class="app-content">
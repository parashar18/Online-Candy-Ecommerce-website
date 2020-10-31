</head>


<body>
  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class="container clearfix">

        <div class="currency">
          <a class="currency__change" href="my_account.php?my_orders">
            <?php
            if(isset($_SESSION['admin_email'])){
              echo "Welcome : " . $_SESSION['admin_name'] . "";  
            }
            else if(!isset($_SESSION['customer_email'])){
              echo "Welcome :Guest";     
            }
            else
            { 
              echo "Welcome : " . $_SESSION['customer_fname'] . "";
            }
            ?>
          </a>
        </div>
        <?php 
        if(!isset($_SESSION['admin_email'])){

          ?>
          <div class="basket">
            <a href="cart.php" class="btn btn--basket">
              <i class="icon-basket"></i>
              <?php items(); ?> items
            </a>
          </div>
          <?php

        }
        ?>





        <ul class="login">

          <li class="login__item">
            <?php
            if(!isset($_SESSION['admin_email'])){

              if(!isset($_SESSION['customer_email'])){
                echo '<a href="customer_register.php" class="login__link">Register</a>';
              } 
            }  
            ?>  
          </li>


          <li class="login__item">
            <?php
            if(isset($_SESSION['admin_email'])){
              echo '<a href="logout.php" class="login__link">Log out</a>';
            }

            else if(!isset($_SESSION['customer_email'])){
              echo '<a href="login.php" class="login__link">Sign In</a>';
            } 
            else
            { 
              echo '<a href="logout.php" class="login__link">Log out</a>';
            }   
            ?>  

          </li>
        </ul>

      </div>
    </div>

    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/logo.png" alt="Candy Land logotype" width="237" height="19">
          </a>
        </div>

        <nav class="main-nav">
          <ul class="categories">

            <li class="categories__item">
              <a class="categories__link" href="shop.php">
                Shop
              </a>
            </li>

            <!-- <li class="categories__item">
              <a class="categories__link" href="localstore.php">
                Local Stores
              </a>
            </li> -->

            <?php 
              if(isset($_SESSION['admin_email'])){
                echo "<li class='categories__item'>
              <a class='categories__link' href=''>
                Manage Products
              </a>
              <div class='dropdown dropdown--lookbook'>
                <div class='clearfix'>
                  <div class='dropdown__half'>
                    <div class='dropdown__heading'>Categories</div>
                    <ul class='dropdown__items'>
                      <li class='dropdown__item'>
                        <a href='admin_insert_product.php' class='dropdown__link'>Insert Product</a>
                      </li>
                      <li class='dropdown__item'>
                        <a href='admin_insert_manufacturer.php' class='dropdown__link'>Insert Manufacturer</a>
                      </li>
                      <li class='dropdown__item'>
                        <a href='admin_view_manufacturers.php' class='dropdown__link'>View Manufacturer</a>
                      </li>
                      
                    </ul>
                  </div>
                  <div class='dropdown__half'>
                    <div class='dropdown__heading'>.</div>
                    <ul class='dropdown__items'>
                      <li class='dropdown__item'>
                        <a href='admin_insert_p_cat.php' class='dropdown__link'>Insert Product Category</a>
                      </li>
                      <li class='dropdown__item'>
                        <a href='admin_view_p_cats.php' class='dropdown__link'>View Product Category</a>
                      </li>
                      <li class='dropdown__item'>
                        <a href='admin_view_orders.php' class='dropdown__link'>View Orders</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>";
              }
            ?>

            <li class="categories__item">
              <?php
              if(isset($_SESSION['customer_email'])){
                echo '<a class="categories__link" href="my_account.php?my_orders">My Account</a>';
              } 
              ?>
            </li>


            

          </ul>
        </nav>
      </div>
    </div>
  </header>
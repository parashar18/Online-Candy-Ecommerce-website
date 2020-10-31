  <?php

  session_start();

  include("includes/db.php");
  include("includes/header.php");
  include("functions/functions.php");
  include("includes/main.php");

// if($_SERVER["REQUEST_METHOD"]=="POST"  ){
//   if(!empty($_POST['product_search'])){
//     $query = "SELECT * FROM products WHERE product_name LIKE '%".$_POST['product_search']."%' ";  
//   }
//   else{
//     $query="SELECT * FROM products";
//   }
//   $result = $mysqli->query($query);


  ?>
  <!-- MAIN -->


  
    <div id="content" ><!-- content Starts -->
      <div class="container" ><!-- container Starts -->

        <div class="row">
          <div class="panel-body"><!-- panel-body Starts -->

            <div class="input-group"><!-- input-group Starts -->
            <!-- <form action="shop.php" method="POST">
              <input type="text" class="form-control" id="product_search" name="product_search" data-action="filter" data-filters="#Products" placeholder="Filter Products">
            
              <button type="submit" id="submit"><a class="input-group-addon"> <i class="fa fa-search"></i> </a></button>
            </form> -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Products" class="form-control" />
              </div>
            </div>
            <br />
            </div><!-- input-group Ends -->

          </div><!-- panel-body Ends -->
        </div>

        <div class="row">
          <div class="col-md-12" ><!--- col-md-12 Starts -->



          </div><!--- col-md-12 Ends -->

          <div class="col-md-3"><!-- col-md-3 Starts -->

            <?php include("includes/sidebar.php"); ?>

          </div><!-- col-md-3 Ends -->

          <div class="col-md-9" id="Products">


            <?php getProducts(); ?>

          </div> 
        </div>
      <!-- <div class="col-md-9" id="Products">
       
      </div>
    --><center><!-- center Starts -->
    
    <ul class="pagination" ><!-- pagination Starts -->

      <?php getPaginator(); ?>

    </ul><!-- pagination Ends -->

  </center><!-- center Ends -->



  </div>


  </div> 


  </div><!-- container Ends -->
  </div><!-- content Ends -->
  



  <?php

  include("includes/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  <script>

  $(document).ready(function(){

  /// Hide And Show Code Starts ///

  $('#man_sidebar_hide').click(function(){

    $("#man_collapse").slideToggle(700,function(){

      if($(this).css('display')=='none'){

        $("#man_sidebar_hide").html('Show');

      }
      else{

        $("#man_sidebar_hide").html('Hide');

      }

    });

  });



  $('#product_sidebar_hide').click(function(){

    $("#product_collapse").slideToggle(700,function(){

      if($(this).css('display')=='none'){

        $("#product_sidebar_hide").html('Show');

      }
      else{

        $("#product_sidebar_hide  ").html('Hide');

      }

    });

  });

  /// Hide And Show Code Ends ///


  /// Search Filters code Starts ///

  $(function(){

    $.fn.extend({

      filterTable: function(){

        return this.each(function(){

          $(this).on('keyup', function(){

            var $this = $(this),

            search = $this.val().toLowerCase(),

            target = $this.attr('data-filters'),

            handle = $(target),

            rows = handle.find('li a');

            if(search == '') {

              rows.show();

            } 
            else 
            {

              rows.each(function(){

                var $this = $(this);

                $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

              });

            }

          });

        });

      }

    });

    $('[data-action="filter"][id="dev-table-filter"]').filterTable();

  });

    /// Search Filters code Ends ///

  });



  </script>


  <script>


  $(document).ready(function(){

    // getProducts Function Code Starts

    function getProducts(){

    // Manufacturers Code Starts

    var sPath = '';

    var aInputs = $('li').find('.get_manufacturer');

    var aKeys = Array();

    var aValues = Array();

    iKey = 0;

    $.each(aInputs,function(key,oInput){

      if(oInput.checked){

        aKeys[iKey] =  oInput.value

      };

      iKey++;

    });

    if(aKeys.length>0){

      var sPath = '';

      for(var i = 0; i < aKeys.length; i++){

        sPath = sPath + 'man[]=' + aKeys[i]+'&';

      }

    }

  // Manufacturers Code ENDS

  // Products Categories Code Starts

  var aInputs = Array();

  var aInputs = $('li').find('.get_p_cat');

  var aKeys = Array();

  var aValues = Array();

  iKey = 0;

  $.each(aInputs,function(key,oInput){

    if(oInput.checked){

      aKeys[iKey] =  oInput.value

    };

    iKey++;

  });

  if(aKeys.length>0){

    for(var i = 0; i < aKeys.length; i++){

      sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

    }

  }

  // Products Categories Code ENDS



  // Loader Code Starts

  $('#wait').html('<img src="images/load.gif">');

  // Loader Code ENDS

  // ajax Code Starts

  $.ajax({

    url:"load.php",

    method:"POST",

    data: sPath+'sAction=getProducts',

    success:function(data){
      $("#Products").empty();
      $('#Products').html('');

      $('#Products').html(data);

      $("#wait").empty();


    }

  });

  $.ajax({
    url:"load.php",
    method:"POST",
    data: sPath+'sAction=getPaginator',
    success:function(data){
      $('.pagination').html('');
      $('.pagination').html(data);
    }

  });

  // ajax Code Ends

  }

     // getProducts Function Code Ends

     $('.get_manufacturer').click(function(){

      getProducts();

    });


     $('.get_p_cat').click(function(){

      getProducts();

    });

    //  $('.get_cat').click(function(){

    //   getProducts();

    // });


  });



  </script>

  <script>
  $(document).ready(function(){
    load_data();
    function load_data(query)
    {
      $.ajax({
        url:"filter.php",
        method:"post",
        data:{query:query},
        success:function(data)
        {
          $("#Products").empty();
          $('#Products').html('');
          $('#Products').html(data);
        }
      });

    }

    $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
        load_data(search);
      }
      else
      {
        load_data();      
      }
    });
  });
  </script>



  </body>

  </html>

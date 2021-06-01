<?php
 include 'header.php';
 include 'sidebar.php';

if(isset($_POST['product_id']))
{
    $vid=array();
    $product_id=array();
    $title=array();
    $created_at=array();
    $updated_at=array();
    $calories=array();
    $image=$_POST['image'];
    $vid=$_POST['vid'];
    $product_id=$_POST['product_id'];
    $title=$_POST['title'];
    $created_at=$_POST['created_at'];
    $updated_at=$_POST['updated_at'];
    $calories=$_POST['$calories'];
                                               
}

?>

            
            <div id="products_menu">
                <h2>Menu List</h2>

                        <div class="row product tabcontent flex" id="menu">
                            <?php foreach($title as $val) {?>  
                                <div class="col s6 m6 l3 collections">
            
                                        <a href="https://dunkin.abstractagency.net/PWA2/public/collections.php">
                                           <img class="product-img responsive-img"  src="<?php  echo $image;?>">
                                        </a>
                                        <form action="product_details.php" method="post">
                                                <input type="hidden" name="image" value="<?php  echo $image;?>">
                                                <input type="hidden" name="product_name" value="<?php  echo $val;?>">
                                                <button type="submit" class="collecion_name"><?php  echo $val;?></button>
                                                </form>
                                </div>
                                
                            <?php } ?>
                                
                        </div>
            </div>
            <div class="col s6 m4 l1">
            
            </div>
        </div>
      </div>
    
    </div>
    <style>
               
    </style>

  <?php include 'footer.php';?>


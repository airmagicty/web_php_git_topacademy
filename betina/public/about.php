
<?php require_once './functions/connect.php';?>
<?php

$row = $pdo->prepare("SELECT * FROM about");
$row->execute();
$about = $row->fetch(PDO::FETCH_OBJ);
?>

<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="/admin/img/<?php echo $about-> filename?>" class="img-fluid">
          </div>
          <div class="col-md-6">
      
            <h3 style="color: black"><?php echo $about-> title?></h3>
            <p><?php echo $about-> description?></p>
       
          </div>
        </div>
      </div>
    </div>
    
    
    
</div>
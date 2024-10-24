
<?php require_once '../functions/connect.php';?>
<?php
$sql2 = $pdo->prepare("SELECT * FROM uslugi");
$sql2->execute();
$uslugi = $sql2->fetchAll(PDO::FETCH_OBJ);
?>


<div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
    
            <h3 style="color: black">Наши услуги</h3>
          </div>
        </div>
        <div class="row">
          
        <?php foreach($uslugi as $usluga):?>
        <div class="col-lg-3 col-md-6 mb-lg-0">
            <div class="person">
              <figure>
                <img src="/admin/img/<?php echo $usluga->filename?>" class="img-fluid">
               
              </figure>
              <div class="person-contents">
                <h3><?php echo $usluga->title?></h3>
                <span style="color: red;font-weight: bold"><?php echo $usluga->price?></span>
              </div>
            </div>
          </div>

<?php endforeach ?>
          

       
       
        </div>
      </div>
    </div>

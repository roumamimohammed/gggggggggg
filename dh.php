
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD APP</title>
    <!-- CSS only -->

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <script src="/bootstrap-5.2.2-dist/js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <div><a href="#"><img src="images/768px-Magicdelivery_gaming_logo.svg.png" alt=""></a></div>
        <div>
            <ul>
                <li><a href="#" style="color:#ffffffff ;text-decoration: none;">GESTIONNE PAGE</a></li>
            </ul>

        </div>
        <div class="divlog"><a style="color:#ffffffff ;text-decoration: none;" class="login" href="#">logout</a></div>
    </nav>
<div>
    <?php
     if (isset($_GET['msg'])) {
        $msg=$_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
   ?>
    <a href="add_new.php" class="btn btn-danger mb-3">ADD PRODUCT</a>
    
</div>
<table class="table table-dark table-striped table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">QUANTITE</th>
      <th scope="col">CATEGORY</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "connection.php";
   $sql="SELECT * FROM `produit`";
   $resultat = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($resultat)){
?>
<tr><td>
        <a href="edit.php? id-produit=<?php echo $row['id-produit'] ?>" class="link-danger"><i class="fa-solid fa-pen-to-square fs-6 me-3"></i></a>
      
        <a href="delete.php? id-produit=<?php echo $row['id-produit'] ?>" class="link-danger"><i class="fa-solid fa-trash fs-6 me-3"></i></a>
      </td>
      <td><?php echo $row['id-produit'] ?></td>
      <td><?php echo $row['libelle'] ?></td>
      <td><?php echo $row['prix'] ?></td>
        <td><?php echo $row['quantite'] ?></td>
       <td> <?php
                            $ret = mysqli_query($conn, "SELECT * FROM `categorie`");
                            foreach ($ret->fetch_all(MYSQLI_ASSOC) as $row) {
                            ?>
                                 <?php echo $row['libelle']; ?>
                            <?php } ?></td>
     
    
      
    </tr>
<?php
   }
?>
    
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2
.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php
require_once('db/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Submission 1 Dicoding</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <div class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
          <img src="https://sdtimes.com/wp-content/uploads/2018/01/bootstrap-stack-490x412.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Submission 1 Dicoding
      </a>
    </div>
  </div>

  <div class="container" style="margin-top: 30px">
    <h5>Silahkan masukan data pelanggan</h5>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="name">Nama Lengkap : </label>
        <input type="text" name="name" class="form-control" placeholder="Silahkan masukan nama lengkap anda" id="name">
      </div>
      <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" name="email" class="form-control" placeholder="Silahkan masukan email valid anda" id="email">
      </div>
      <div class="form-group">
        <label for="location">Alamat : </label>
        <textarea name="location" name="location" id="location" class="form-control" cols="30" rows="5" placeholder="Silahan masukan alamat anda">
        </textarea>
      </div>
      <input class="btn btn-info" name="clear" type="reset" value="Bersihkan input">
      <button class="btn btn-primary" name="save">Simpan</button>
    </form>
    
    <h5 style="margin-top: 30px;">Berikut adalah list data pelanggan anda</h5>
    <table class="table table-hover" style="margin-top: 30px; margin-bottom: 30px">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Lokasi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      try {

      
        if(isset($_POST['save'])){
          try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $location = $_POST['location'];

            $query_insert = "INSERT INTO customers(name, email, location) VALUES(?,?,?)";
            $stmt = $conn->prepare($query_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $location);
            $stmt->execute();
          } catch (\Throwable $th) {
            echo "Error : ".$th;
          }

          echo "<script>alert('berhasil tambah pelanggan')</script>";
        }

        $query_select = "SELECT * FROM customers";
        $i = 0;
        foreach ($conn->query($query_select) as $row){
          
      ?>

      <tr>
        <td><?php echo ++$i;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['location'];?></td>
      </tr>

      <?php
        }
      ?>

      <?php
          if($i == 0){
      ?>
            <tr>
              <td>Belum ada pelanggan saat ini.</td>
            </tr>
      <?php
          }
      } catch (\Throwable $th) {
        echo $th;
      }
        
      ?>
      </tbody>
    </table>
  </div>
  
  <div class="navbar fixed-bottom"  style="background-color: #f8f9fa;  padding: 10px">
    <div class="container">
      <p>&copy; Anggit Prayogo 2019</p>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
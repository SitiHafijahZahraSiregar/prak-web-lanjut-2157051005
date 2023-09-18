<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="<?=base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" >
  </head>
  <body>
    <div class="container">
    <form action="<?=base_url('/user/store')?>" method="POST">
  <div class="form-group">
    <br>
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
  </div>
  <div class="form-group">
    <label for="npm">NPM</label>
    <input type="text" class="form-control" name="npm" placeholder="Masukan NPM">
  </div>
  <div class="form-group">
    <label for="kelas">Kelas</label>
    <input type="text" class="form-control" name="kelas" placeholder="Masukan Kelas">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Masukan email">
  </div>
  <div class="form-group">
    <label for="no_hp">No HP</label>
    <input type="int" class="form-control" name="no_hp" placeholder="Masukan No HP">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="<?=base_url("assets/js/bootstrap.bundle.min.js")?>" ></script>
  </body>
</html>
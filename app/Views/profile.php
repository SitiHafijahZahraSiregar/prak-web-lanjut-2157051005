<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile User</title>
    <link href="<?=base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" >
    <link href="<?=base_url("assets/css/style.css")?>" rel="stylesheet" >
  </head>
  <body>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="<?=$user['foto'] ?? 'https://bootdey.com/img/Content/avatar/avatar7.png' ?>" class="img-thumbnail" width="300px" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0"><?=$user['nama']?></h3>
                                    <span class="text-primary">Mahasiswa</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">NPM:</span><?=$user['npm']?> </li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Kelas:</span><?=$user['nama_kelas']?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span><?=$user['email']?></li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span><?=$user['no_hp']?></li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<script src="<?=base_url("assets/js/bootstrap.bundle.min.js")?>" ></script>
  </body>
</html>
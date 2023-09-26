<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?=base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" >
  </head>
  <body>
    <div class="container">
<?= $this->renderSection('content') ?>
    </div>
    <script src="<?=base_url("assets/js/bootstrap.bundle.min.js")?>" ></script>
  </body>
</html>
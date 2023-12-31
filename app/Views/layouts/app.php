<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?= base_url("assets/css/mystyle.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="background-color: #FFEBCD;">
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">UTP WEBLANJUT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user') ?>">List User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/kelas') ?>">List Kelas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?= $this->renderSection('content') ?>
</div>
<script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            $(".delete-button").click(function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    var url = $(this).data("url");
                    $.ajax({
                        url: url,
                        type: "DELETE",
                        success: function(response) {
                            // Handle the success response here, for example, you can reload the page
                            // to reflect the changes.
                            location.reload();
                        },
                        error: function(error) {
                            // Handle errors, e.g., show an error message to the user.
                            console.error("Error:", error);
                        }
                    });
                }
            });
        });
    </script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#myAlert').fadeOut('slow');
        }, 3000);
    });
</script>
</body>
</html>

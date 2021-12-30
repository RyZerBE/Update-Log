<?php
error_reporting(-1);
include_once "./functions/functions.php";
$config = json_decode(file_get_contents("./config.json"), true);
$updates = json_decode(file_get_contents("./updates.json"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?= $config["page-title"]; ?></title>
    <link href="assets/style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png"
          sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32"
          type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16"
          type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg"
          color="#7952b3">
    <link rel="icon" href="<?= $config["page-icon"]; ?>">
    <meta name="theme-color" content="#7952b3">

    <style>
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="<?= $config["main-page-link"]; ?>" class="navbar-brand d-flex align-items-center">
                <strong><?= $config["page-name"]; ?></strong>
            </a>
        </div>
    </div>
</header>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Update changelog</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				<?php foreach ($updates as $_ => $obj): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $obj["image"] ?>" class="card-img-top" height="290" width="460"
                                 alt="Site by xxAROX">
                            <div class="card-body">
                                <p class="card-title"><?= $obj["name"] . " - v{$obj["version"]}" ?><small
                                            class="text-muted"> ~ <?= formatTime($obj["timestamp"], time()) ?></small>
                                </p>
                                <p class="card-text"><?= $obj["description"] ?></p>
                                <div class="card-header">Changes:</div>
                                <ul class="list-group list-group-flush">
									<?php foreach ($obj["changes"] as $change): ?>
										<?php if ($change[0] === "+"):$change = ltrim($change, $change[0]); ?>
                                            <li class="list-group-item" style="margin-left: 45px"><img
                                                    src="assets/IconAdd.png" height="19" width="19"
                                                    style="margin-right: 15px"><?= $change ?></li>
										<?php elseif ($change[0] === "-"):$change = ltrim($change, $change[0]); ?>
                                            <li class="list-group-item" style="margin-left: 45px"><img
                                                    src="assets/IconRemove.png" height="19" width="19"
                                                    style="margin-right: 15px"><?= $change ?></li>
										<?php else: ?>
                                            <li class="list-group-item" style="margin-left: 45px"><img
                                                    src="assets/IconFix.png" height="25" width="25"
                                                    style="margin-right: 15px"><?= $change ?></li><?php endif; ?>
									<?php endforeach; ?>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group"></div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">© Copyright xxAROX <?= date("Y", time()) ?></p>
    </div>
</footer>


<script src="assets/bootstrap.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>
</html>

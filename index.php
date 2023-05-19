<?php require_once "includes/route.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php include_once "includes/cssFiles.php";?>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
  <div class="container">
    <a class="navbar-brand" href="homepage">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="polling-unit-result">Polling Unit Result</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lga-announced-result">LGA Result</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store-election-result">Enter New Polling Unit Result</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Page content -->
    <?php include $page;?>

    <?php include_once "includes/jsFiles.php";?>
    <?php include_once "includes/script.php";?>
</body>
</html>
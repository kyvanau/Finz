<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinZ - Savings</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    .container{
    font-family:'Poppins',sans-serif;
    }
    .card{
    margin: 10px;
    }
    .user{
    padding-right: 10px;
    }
    </style>

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand">
            <img src="img/img.png" alt="" width="40" height="40">
          </a>
          <div class="d-flex">
            <p class="user">Hey, User!</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
          </div>
        </div>
    </nav>
    <!-- Total savings -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6"  style="width: 80rem;">
              <div class="card">
                <div class="card-body" style="align-items: center; justify-items: center; display: flex; display: grid;">
                  <h5 class="card-title">Total Savings</h5>
                 <p class="card-text" style="font-size: 26px;">Rp. <?= number_format($total['total'] ?? 0, 2, ',', '.') ?></p>
                </div>
              </div>
            </div>

            <!-- Month -->
           <?php foreach ($perBulan as $item): ?>
            <div class="col-sm-6" style="width: 80rem;">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Month : <?= htmlspecialchars($item['bulan']) ?></h5>
                </div>
                <div class="card">
                  <div class="card-body" style="align-items: center; justify-items: center; display: flex; display: grid;">
                    <h5 class="card-title">Total monthly savings</h5>
                    <p class="card-text" style="font-size: 26px;">Rp.<?= number_format($item['total'], 2, ',', '.') ?></p>
                    <a href="index.php?c=Save&m=form" class="btn btn-primary mt-2 w-100">Enter Balance!</a>
                  </div>
                </div>
                <div class="dropdown" style="margin: 10px;">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Status
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Success!</a></li>
                    <li><a class="dropdown-item" href="#">Failed!</a></li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
    </div>
</body>
</html>


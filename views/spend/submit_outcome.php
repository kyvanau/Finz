<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pengeluaran Harian</h5>
                <form action="index.php?c=Controller&m=submitOutcome" method="POST">
                    <p class="card-text mt-3">Kategori</p>
                    <input class="form-control" type="text" name="kategori" required>

                    <p class="card-text mt-3">Harga</p>
                    <input class="form-control" type="number" name="harga" required>

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="submit_outcome" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
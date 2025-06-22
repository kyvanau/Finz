<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinZ - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar px-3 py-2 d-flex justify-content-between align-items-center">
        <img src="img/img.png" alt="Logo" width="30" height="30">
        <div class="d-flex align-items-center gap-2">
            <p class="user">Hey, User!</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>
    </nav>

    <div class="container mt-4">
    <h4>Enter Income</h4>
    <form method="POST" action="index.php?c=Controller&m=submitIncome">
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</div>
</body>
</html>
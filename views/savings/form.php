<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FinZ - Put in savings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <div class="container py-4">
        <h4 class="mb-3 text-center">Put in savings</h4>
        <form method="post" action="index.php?c=save&m=add">
            <div class="mb-3">
                <label for="bulan" class="form-label mt-3">Bulan</label>
                <select name="bulan" id="bulan" class="form-control" required>
                    <option value="">-- Pilih Bulan --</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                <label for="amount" class="form-label">Savings money (Rp)</label>
                <input type="number" name="tabungan" id="tabungan" class="form-control" required>
            </div>
            <button type="submit" name="submit_income" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</body>
</html>

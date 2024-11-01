<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkOfTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Kelgan va ketgan vaqtni ro'yxatlash</h1>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Ism</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="arrived_at" class="form-label">Kelgan vaqti</label>
                <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at">
            </div>
            <div class="mb-3">
                <label for="leaved_at" class="form-label">Ketgan vaqti</label>
                <input type="datetime-local" class="form-control" id="leaved_at" name="leaved_at">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    $dsn = "mysql:host=127.0.0.1;dbname=work_of_tracker";
    $user = "root";
    $password = "qwert";
    $pdo = new PDO($dsn, $user, $password);

    if (isset($_POST["name"]) && isset($_POST["arrived_at"]) && isset($_POST["leaved_at"])) {
        $name = $_POST['name'];
        $arrived_at = $_POST['arrived_at'];
        $leaved_at = $_POST['leaved_at'];

        $query = "INSERT INTO work_times (name, arrived_at, leaved_at) VALUES (:name, :arrived_at, :leaved_at)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':arrived_at', $arrived_at);
        $stmt->bindParam(':leaved_at', $leaved_at);
        $stmt->execute();
    }

    // Yozuvlarni olish
    $query = "SELECT * FROM work_times";
    $stmt = $pdo->query($query);
    $yozuvlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (!empty($yozuvlar)): ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ismi</th>
                    <th>Kelgan Vaqti</th>
                    <th>Ketgan Vaqti</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($yozuvlar as $yozuv): ?>
                    <tr>
                        <td><?= isset($yozuv['id']) ? $yozuv['id'] : '' ?></td>
                        <td><?= isset($yozuv['name']) ? $yozuv['name'] : '' ?></td>
                        <td><?= isset($yozuv['arrived_at']) ? $yozuv['arrived_at'] : '' ?></td>
                        <td><?= isset($yozuv['leaved_at']) ? $yozuv['leaved_at'] : '' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="mt-4">Hech qanday yozuv topilmadi.</p>
    <?php endif; ?>
</body>
</html>

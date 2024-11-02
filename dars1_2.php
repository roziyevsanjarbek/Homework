<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkOfTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class = "container text-center" > <h1  class="text-primary">Kelgan va ketgan vaqtni ro'yxatlash</h1></div>
    <div class="container bg-light p-4 mt-4">
        <form method="post">
            <div class="mb-3">
            <label for="name" class="form-label text-danger">Ism</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="arrived_at" class="form-label text-danger">Kelgan vaqti</label>
                <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at">
            </div>
            <div class="mb-3">
                <label for="leaved_at" class="form-label text-danger">Ketgan vaqti</label>
                <input type="datetime-local" class="form-control" id="leaved_at" name="leaved_at">
            </div>
            <button type="submit"class="btn btn-primary btn-flash" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    $dsn = "mysql:host=127.0.0.1;dbname=work_of_tracker";
    $pdo = new PDO($dsn, "root", "qwert");

    if (isset($_POST["name"]) && !empty($_POST["arrived_at"]) && !empty($_POST["leaved_at"])) {
        $ism = $_POST["name"];
        $kelgan_vaqt = $_POST["arrived_at"];
        $ketgan_vaqt = $_POST["leaved_at"];

        $sql = "INSERT INTO work_times(name, arrived_at, leaved_at) VALUES (:name, :arrived_at, :leaved_at)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":name", $ism);
        $stmt->bindParam(":arrived_at", $kelgan_vaqt);
        $stmt->bindParam(":leaved_at", $ketgan_vaqt);
        $stmt->execute();  // Bu yerda nuqta-vergul qo'shildi.
    }

    $query = "SELECT * FROM work_times";
    $stmt = $pdo->query($query);
    $records = $stmt->fetchAll();
    ?>



<div class = "container mt-4">

<table class="table table-warning">
  <thead>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">Ism</th>
      <th scope="col">Kelgan vaqti</th>
      <th scope="col">Ketgan vaqti</th>
    </tr>
  </thead>
  <tbody>
    <?php
  foreach($records as $record)
  {  

    echo "<tr>
      <th scope='row'>{$record['id']}</th>
       <td>{$record['name']}</td>
      <td>{$record['arrived_at']}</td>
      <td>{$record['leaved_at']}</td>
    </tr>";

  }
    ?>

    
  </tbody>
</table>

</div>

</body>
</html>

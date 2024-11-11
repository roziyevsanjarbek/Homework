<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkOfTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <style>
        h1 {
            font-weight: bold;
            font-size: 3.0rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .form-label {
            font-weight: bold;
            font-size: 1.6rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            border-radius: 50px;
            padding: 12px 25px; 
            font-size: 1.2rem; 
        }
</style>

       <style>
        h1 {
            font-weight: bold;
            font-size: 3.0rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        .form-label {
            font-weight: bold;
            font-size: 1.6rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            border-radius: 50px;
        }

        th {
            font-weight: bold;
        }

        th:nth-child(1), td:nth-child(1) { color: red; }     
        th:nth-child(2), td:nth-child(2) { color: blue; }     
        th:nth-child(3), td:nth-child(3) { color: #ff00ff; }    
        th:nth-child(4), td:nth-child(4) { color: #32cd32; }   
        th:nth-child(5), td:nth-child(5) { color: orange; }   
    </style>
        <style>
        body {
            background-image: url('https://media.istockphoto.com/id/1305905498/vector/gray-and-white-diagonal-line-architecture-geometry-tech-abstract-subtle-background-vector.jpg?s=612x612&w=0&k=20&c=n_Dfoaoz9905EFEF91sW_FnKN1yOYD8AnL-AnXwIXoI='); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-position: center; 
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="text-primary">Kelgan va ketgan vaqtni ro'yxatlash</h1>
    </div>
    <div class="container mt-4">
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
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button form = "export" type="submit" class="btn btn-success custom-btn">Export</button>
        </form>
        <form action="" id = "export" method = "post">

        <input type="text" name = "export"  value = "true" hidden = "">

        </form>
    </div>

   
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Ism</th>
                    <th scope="col">Kelgan vaqti</th>
                    <th scope="col">Ketgan vaqti</th>
                    <th scope="col">Qarizdorlik vaqti</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($records as $record) {  
                    echo "<tr>
                        <td>{$record['id']}</td>
                        <td>{$record['name']}</td>
                        <td>{$record['arrived_at']}</td>
                        <td>{$record['leaved_at']}</td>
                        <td>" . gmdate('H:i', $record['required_of']) . "</td>
                        <td><a href = 'index.php?done=" . $record['id'] ."'>Done</a></td>


                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            global $workDay, $currentPage;
            $disabled = $currentPage == 1 ? "disabled" : "";

            ?>
            <li class="page-item <?=$disabled?>"><a class="page-link" href="#">Previous</a></li>
            <?php
            $pageCount = $workDay->calculatePageCount();
            for ($page = 1; $page <= $pageCount; $page++) {
                $active = $page == $currentPage ? "active" : "";
                echo "<li class='page-item $active''><a class='page-link'' href='index.php?page=" . $page . "''>" . $page . "</a></li>";
            }

            ?>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
    </div>
</body>
</html>
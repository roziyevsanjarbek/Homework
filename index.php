    <?php
   
    require 'DB.php';

    $db = new DB();
    $pdo = $db->pdo;
 
        require 'workDay.php';
        $workDay = new workDay();


    if (isset($_POST["name"]) && !empty($_POST["arrived_at"]) && !empty($_POST["leaved_at"])) {
      if (!empty($_POST['name']) && !empty($_POST['arrived_at']) && !empty($_POST['leaved_at'])) {

            $workDay->store($_POST['name'],$_POST['arrived_at'],$_POST['leaved_at']);
      }
    }
    $records = $workDay->getWorDayList();

    require 'view.php';

    ?>
   
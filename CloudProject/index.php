<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To-Do List</title>

  <link rel="stylesheet" href="main.css">
</head>
<body>

  <div class="container">
    <h1>To-Do List</h1>

    <form index="inputForm" action="/add.php" method="post">
      <input 
	  type="text" 
	  name="task" 
	  id="task" 
	  placeholder="Is there anything you need to do?.." >

      <button 
	  type="submit" 
	  name="sendTask" >Add Task</button>

    </form>

    <?php
      require 'configDB.php';

      echo '<ul>';
      $query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
      while($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '<li><b>'.$row->task.'</b><a href="/delete.php?id='.$row->id.'"><button>Delete</button></a></li>';
      }
      echo '</ul>';
    ?>

  </div>
</body>
</html>

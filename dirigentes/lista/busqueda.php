<?php
  require_once 'db_con.php';

  if (isset($_POST['query'])) {
    $insearch = $_POST['query'];
    $sql = 'SELECT dirigente  FROM empleados WHERE dirigente LIKE :dirigente';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['dirigente' => '%' . $insearch . '%']);
    $resultados = $stmt->fetchAll();

    if ($resultados) {
      foreach ($resultados as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['dirigente'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No hay resultados</p>';
    }
  }
?>
<?php
  require_once 'db_con.php';

  if (isset($_POST['query'])) {
    $insearch = $_POST['query'];
    $sql = 'SELECT dni  FROM votos WHERE dni LIKE :dni';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['dni' => '%' . $insearch . '%']);
    $resultados = $stmt->fetchAll();

    if ($resultados) {
      foreach ($resultados as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['dni'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No hay resultados</p>';
    }
  }
?>
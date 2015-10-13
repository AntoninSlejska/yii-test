<?php
echo "Detail item with title <b>$title</b><br><br>";

if ($itemFound != null) {
  echo "<table border='1'>";
  foreach ($itemFound as $key => $value) {
    echo "<tr>
    <th>$key</th>
    <th>$value</th>
    </tr>";
  }
  echo "</table><br>";
  echo "Url for this items is: " . yii\helpers\Url::to(['news/item-detail', 'title' => $title]);
} else {
  echo "<i>No item found</i>";
}


?>

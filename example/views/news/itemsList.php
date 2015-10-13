<?php
if ($year != null) echo "<b>List of year $year</b>";
if ($category != null) echo "<b>List of category $category</b>";
?>
<br>
<table border="1">
  <tr>
    <th>Date</th>
    <th>Category</th>
    <th>Title</th>
  </tr>
<?php
foreach ($filteredData as $fd) {
  echo "  <tr>
    <td> {$fd['date']} </td>
    <td> {$fd['category']} </td>
    <td> {$fd['title']} </td>
  </tr>
  ";
} ?>
</table>

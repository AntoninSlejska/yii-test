<?php
use yii\helpers\Url;
use yii\helpers\Html;

echo "<b>Filter data by year:</b>
<br>
<ul>";

$currentYear = date('Y');
for ($year=$currentYear; $year > ($currentYear-5) ; $year--) {
  echo "<li>" .
    Html::a('List items by year ' . $year, Url::to(['news/items-list', 'year' => $year]))
    . "</li>";
}
echo "</ul><br>
<b>Filter data by category:</b><br>
<ul>";

$categories = ['business', 'shopping'];
foreach ($categories as $category) {
  echo "<li>" .
    Html::a('List items by category ' . $category, Url::to(['news/items-list', 'category' => $category]))
    . "</li>";
}
echo "</ul><br>";
?>

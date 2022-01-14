<?php
/*
* @property string|null $title
* @property string|null $description
* @property string|null $start_at
* @property string|null $end_at
* @property string|null $image
* @property int|null $category
* @property int|null $status
 */

$this->title = $course->title;
$this->params['breadcrumbs'][] = $course->title;
?>

<h1><?=$course->title;?></h1>

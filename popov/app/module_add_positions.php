<?php
function addPositions($data) {
    $title = $data['title'];
    $salary = $data['salary'];

    $query = "INSERT INTO `positions` (`id`, `title`, `salary`) VALUES (NULL, '$title', '$salary');";
    db_query($query);
    return 'Positions added successfully';
}
?>

<?php
var_dump(mysqli_connect('localhost', 'root', '   '));
var_dump(mysqli_select_db(mysqli_connect('localhost', 'root', '   '), 'opentutorials'));
var_dump(mysqli_query(mysqli_connect('localhost', 'root', '   '), 'SELECT * FROM topic'));

?>
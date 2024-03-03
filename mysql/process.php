<?php
// MySQLi 연결
$mysqli = new mysqli('localhost', 'root', '', 'opentutorials');

// 연결 오류 체크
if ($mysqli->connect_error) {
    die("연결 실패: " . $mysqli->connect_error);
}

// SQL 인젝션 방지를 위한 준비된 문장 사용
switch($_GET['mode']){ // mode에 따라 다른 쿼리문 실행
    case 'insert':
        $stmt = $mysqli->prepare("INSERT INTO topic (title, description, created) VALUES (?, ?, now())");
        $stmt->bind_param("ss", $_POST['title'], $_POST['description']);
        $stmt->execute();
        header("Location: list.php"); 
        break;
    case 'delete':
        $stmt = $mysqli->prepare("DELETE FROM topic WHERE id = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        header("Location: list.php"); 
        break;
    case 'modify':
        $stmt = $mysqli->prepare("UPDATE topic SET title = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $_POST['title'], $_POST['description'], $_POST['id']);
        $stmt->execute();
        header("Location: list.php?id={$_POST['id']}");
        break;
}

// 연결 종료
$mysqli->close();
?>

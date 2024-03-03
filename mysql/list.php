<?php
// MySQLi 연결
$mysqli = new mysqli('localhost', 'root', '', 'opentutorials');

// 연결 오류 체크
if ($mysqli->connect_error) {
    die("연결 실패: " . $mysqli->connect_error);
}

// 데이터 불러오기를 위한 쿼리 실행
$list_result = $mysqli->query("SELECT id, title FROM topic");

// 선택된 항목 정보 불러오기
$topic = null;
if(isset($_GET['id'])) {
    $prepared = $mysqli->prepare("SELECT id, title, description FROM topic WHERE id = ?");
    $prepared->bind_param("i", $_GET['id']);
    $prepared->execute();
    $result = $prepared->get_result();
    $topic = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style type="text/css">
            /* CSS 생략 */
        </style>
    </head>
    <body id="body">
        <div>
            <nav>
                <ul>
                    <?php
                    while($row = $list_result->fetch_assoc()) {
                        echo "<li><a href=\"?id={$row['id']}\">".htmlspecialchars($row['title'])."</a></li>";                        
                    }
                    ?>
                </ul>
                <ul>
                    <li><a href="input.php">추가</a></li>
                </ul>
            </nav>
            <article>
                <?php
                if($topic !== null){
                ?>
                <h2><?=htmlspecialchars($topic['title'])?></h2>
                <div class="description">
                    <?=htmlspecialchars($topic['description'])?>
                </div>
                <div>
                    <a href="modify.php?id=<?=$topic['id']?>">수정</a>
                    <form method="POST" action="process.php?mode=delete">
                        <input type="hidden" name="id" value="<?=$topic['id']?>" />
                        <input type="submit" value="삭제" />
                    </form>
                </div>
                <?php
                }
                ?>
            </article>
        </div>
    </body>
</html>

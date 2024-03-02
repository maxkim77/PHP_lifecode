<?php
require_once 'greeting_ko_ns.php';
require_once 'greeting_en_ns.php';
echo language\ko\welcome();
echo language\en\welcome();
?>
<!-- 로드되는 파일의 초입에 키워드 namespace를 이용해서 네임스페이스를 만들었다. 그리고 네임스페이스를 사용할 때는 함수 앞에 네임스페이스의 이름을 붙여서 사용하면 된다. 이로서 동일한 이름의 함수를 하나의 php 에플리케이션 안에서 사용할 수 있게 되었다.

 -->
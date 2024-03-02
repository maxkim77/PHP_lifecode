<?php
function get_arguments($arg1, $arg2){
    return $arg1 + $arg2;
}
#함수안에서만 의미있는 변수들을 지역변수라고한다.
# 각 인자는 argument 라 한다.
echo get_arguments(10, 20).'<br />';
echo get_arguments(20, 30);
?>
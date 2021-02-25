<?php
    $mode = isset($mdix) ? $mdix: NULL;
    extract($_POST);
    switch ($mode) {
        case 'join':
            re([
                $userId,
                $userPwd,
                $userName,
                $permission,
            ]);
            $user = execute("insert into member set userId = ?, userPwd = ?, userName = ?, permission = ?"
            , array($userId, $userPwd, $userName, $permission));
            alert("회원가입이 완료 되었습니다.", "/");
    }
?>
<?php
    $mode = isset($midx) ? $midx: NULL;
    extract($_POST);
    switch ($mode) {
        // Join
        case 'join':
            re([
                $userId,
                $userPwd,
                $userName,
                $permission,
            ]);
            $user = execute("insert into member set userId = ?, userPwd = ?, userName = ?, permission = ?",
            array($userId, $userPwd, $userName, $permission));
            alert("회원가입이 완료 되었습니다.", "/");
        break;
        // Login
        case 'login':
            re([
                $userId,
                $userPwd,
            ]);
            $user = fetch("select * from member where userId = ? and userPwd = ?",
            array($userId, $userPwd));
            if($user){
                $_SESSION['member'] = $user;
                alert("Success", "/");
            }else{
                alert("error", "/");
            }
        break;    
        
        // logout
        case "logout":
            session_destroy();
            alert("Logout Success", "/");  
        break; 

        //Menu_POST
        case "postmenu":
            re([
                $mContent,
            ]);
            $menu = execute("insert into menu set mContent = ?, mIdx = ?", array($mContent, $_SESSION['member']->idx));
            alert("저장이 완료 되었습니다.", "/page/preferences");
        break;

        //Board_POST
        case "postboard":
            re([
                $bContent,
            ]);
            $board = execute("insert into board set bContent = ?", array($bContent, $_SESSION['member']->idx));
            // alert("저장이 완료 되었습니다.", "/page/preferences");
    }
?>
<?php

        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        echo 'vous avez été déconecter';
header( "refresh:2;url=../index.php" );

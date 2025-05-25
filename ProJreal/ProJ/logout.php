<?php

session_start();

// ล้างข้อมูล session ทั้งหมด
$_SESSION = [];

// ถ้ามีการใช้งาน cookie สำหรับ session, ให้ลบทิ้งด้วย
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ทำลาย session
session_destroy();

// ย้ายไปหน้า index
header("Location: index.php");
exit;

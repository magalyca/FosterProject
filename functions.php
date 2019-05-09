<?php
// sessions are like cookies but on servers

function session_start_safe()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

function currentUser()
{
    session_start_safe();
    if (!isset($_SESSION['id'])) {
        return null;
    }

    return \AdminQuery::create()->findOneById($_SESSION['id']);
}

function currentUser2()
{
    session_start_safe();
    if (!isset($_SESSION['id'])) {
        return null;
    }

    return \StaffQuery::create()->findOneByStaffId($_SESSION['id']);
}


function signUserIn($id)
{
    session_start_safe();
    $_SESSION['id'] = $id;
}

function signUserOut()
{
    session_start_safe();
    unset($_SESSION['id']);
}

// To get whole url and not just the path
function url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

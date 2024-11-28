<?php

global $connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");

if (isset($_POST["login"])) {
    $notification = login($_POST);
    if ($notification) {
        header("Location: /auth/login.php?notification=" . urlencode($notification));
        exit;
    }
}

if (isset($_POST["signup"])) {
    $notification = signup($_POST);
    if ($notification) {
        header("Location: /auth/login.php?notification=" . urlencode($notification));
        exit;
    }
}



if (isset($_GET['page']) AND ($_GET['page']) === 'logout') {
    logout();
}

function login($data)
{
    
    session_start();
    $fullname = strtolower($data["fullname"]);
    $username = strtolower($data["username"]);
    $email = strtolower($data["email"]);
    $password = $data["password"];


    $result = query("SELECT users.*, roles.name as role_name 
        FROM users 
        JOIN roles 
        ON users.role_id = roles.id
        WHERE username = '$username' AND email = '$email' AND fullname = '$fullname'
    ");

    // Check if user exists
    if (count($result) > 0) {


        // Verify password
        if (password_verify($password, $result[0]["password"])) {
            // Set session data
            $_SESSION["login"] = true;
            $_SESSION["fullname"] = $result[0]["fullname"];
            $_SESSION["user_id"] = $result[0]["id"];
            $_SESSION["username"] = $result[0]["username"];
            $_SESSION["role_name"] = $result[0]["role_name"];

            // Redirect to the admin page with a success notification
            return "<script>
                Swal.fire({
                    title: 'Success',
                    text: 'Login successful!',
                    icon: 'success'
                }).then((result) => {
                    window.location.href = '/index.php';
                });
            </script>";
        } else {
            // Incorrect password
            return "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Incorrect password',
                    icon: 'error'
                }).then((result) => {
                    window.location.href = '/auth/login.php';
                });
            </script>";
        }
    } else {
        // User not found
        return "<script>
            Swal.fire({
                title: 'Error',
                text: 'User not found',
                icon: 'error'
            }).then((result) => {
                window.location.href = '/auth/login.php';
            });
        </script>";
    }

    return null; // No error if login is successful
}



function signup($data)
{
    global $connection;

    $fullname = strtolower($data["fullname"]);
    $username = strtolower($data["username"]);
    $email = strtolower($data["email"]);
    $password = $data["password"];
    $password_confirm = $data["password_confirm"];

    

    $cekUsername = query("SELECT username from users where username = '$username'" );
    if(count($cekUsername)) {
        return "<script>
        Swal.fire({
            title: 'Error',
            text: 'Username already exists',
            icon: 'error'
        }).then((result) => {
            window.location.href = '/auth/signup.php';
        });
    </script>";
    }

    if($password !== $password_confirm) {
        return "<script>
        Swal.fire({
            title: 'Error',
            text: 'Password did not match',
            icon: 'error'
        }).then((result) => {
            window.location.href = '/auth/signup.php';
        });
    </script>";
    }
    
    $cekEmail = query("SELECT email from users where email =  '$email'");
    if(count($cekEmail)) {
        return "<script>
        Swal.fire({
            title: 'Error',
            text: 'Email already exists',
            icon: 'error'
        }).then((result) => {
            window.location.href = '/auth/signup.php';
        });
    </script>";
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (`fullname`, `username`, `email`, `password`, `role_id`) VALUES ('$fullname', '$username', '$email', '$hashed', 3)";

    mysqli_query($connection, $query);
    $result = mysqli_affected_rows($connection);

    // Check if user exists
    if ($result > 0) {
        return "<script>
        Swal.fire({
            title: 'Success',
            text: 'User added successfully',
            icon: 'success',
        }).then((result) => {
            window.location.href = '/auth/login.php';
        });
    </script>";
    } else {
        // User not found
        return "<script>
            Swal.fire({
                title: 'Error',
                text: 'User not found',
                icon: 'error'
            }).then((result) => {
                window.location.href = '/auth/login.php';
            });
        </script>";
    }

    

    return null; // No error if login is successful
}

function logout()
{
    // Clear session and cookies
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);

    // Redirect to login page
    header("Location: /auth/login.php");
    exit;
}

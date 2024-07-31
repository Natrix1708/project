<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
    </style>
</head>
<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #FAF3E0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: transparent;
        }

        header .logo {
            height: 50px;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        header nav ul li {
            margin-left: 20px;
        }

        header nav ul li a {
            color: #000;
            text-decoration: none;
            font-size: 16px;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 70%; /* Width of the grid container */
        }

        .grid-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease;
            width: calc(33.33% - 20px); /* Width of each grid item */
            margin-bottom: 20px; /* Space between rows */
        }

        .grid-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .grid-item a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5); /* Background for better readability */
        }

        .grid-item:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <button onclick="location.href='add_user.php'">Add USER</button>
        <button onclick="location.href='user_list.php'">USERS LIST</button>
        <button onclick="location.href='history.php'">HISTORY</button>
    </div>
</body>
</html>

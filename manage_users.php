<?php
// manage_user.php
session_start();
include 'db_config.php';

$sql = "SELECT * FROM manage_users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #FAF3E0;
            color: #fff;
        }

        .sidebar {
            width: 15%;
            background-color: #FAF3E0;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .sidebar .top, .sidebar .bottom {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar a {
            color: #000000;
            text-decoration: none;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }

        .sidebar a:hover {
            background-color: #F8A455;
        }

        .content {
            width: 85%;
            padding: 20px;
            overflow-y: auto;
            position: relative;
            margin-left: 10px;
            border-radius: 10px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        select, button {
            padding: 5px;
            font-size: 14px;
            color: #fff;
            background-color: #ff4c61;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #F8A455;
        }

        .divider {
            position: absolute;
            left: 15%;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #ff4c61;
        }

        .sidebar h1 {
            margin: 0;
            font-size: 24px;
            color: #ff4c61;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="top">
        <div class="logo">
            <img src="Logo1.1.png" alt="HRMS Logo">
            <br><br>
        </div>
        <a href="main.php">HOME</a>
        <a href="add_cv.php">ADD CV</a>
        <a href="list_cv.php">CVs LIST</a>
        <a href="archive.php">ARCHIVE</a>
        <a href="statistics.php">STATISTICS</a>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <div class="bottom">
        <a href="about.php">ABOUT</a>
        <a href="faq.php">FAQ</a>
        <a href="contacts.php">CONTACTS</a>
    </div>
</div>
<div class="divider"></div>
    <div class="content">
        <div class="container">
            <h1>Manage Users</h1>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Category</th>
                    <th>CV File</th>
                    <!-- <th>Status</th>
                    <th>Is Employed</th> -->
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="uploads/<?php echo $row['cv_file']; ?>" download><?php echo $row['cv_file']; ?></a></td>
                    <!-- <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['is_employed'] ? 'Yes' : 'No'; ?></td> -->
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>
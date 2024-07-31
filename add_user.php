<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit();
}
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['new_email'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (surname, name, email, password, role) VALUES ('$surname', '$name', '$email', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('Frame 16.png');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: left;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 18px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            font-size: 12.5px;
        }

        input, select, button {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            color: white;
            background-color: #d8a48f;
            cursor: pointer;
        }

        button:hover {
            background-color: #b88675;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form action="admin.php" method="post">
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="new_email">Email:</label>
            <input type="email" id="new_email" name="new_email" required>

            <label for="new_password">Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Add User</button>
        </form>
        <a href="user_list.php" class="back-link">View Users</a>
    </div>
</body>
</html>

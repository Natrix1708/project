<?php
// send_cv.php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $vacancy = $_POST['vacancy'];
    $comment = $_POST['comment'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cv_file"]["name"]);
    move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file);

    $cv_file = basename($_FILES["cv_file"]["name"]);

    $sql = "INSERT INTO resumes (first_name, last_name, phone_number, email, vacancy, comment, cv_file)
            VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$vacancy', '$comment', '$cv_file')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FAF3E0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: transparent;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #FAF3E0;
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

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #FFA45B;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        label {
            color: #fff;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #FF6F61;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #E55B50;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="HRMSLogo.png" alt="HRMS Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="about_us.php">ABOUT</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#contacts">CONTACTS</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Submit Your Resume</h1>
        <form action="send_cv.php" method="post" enctype="multipart/form-data">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="vacancy">Vacancy:</label>
            <input type="text" id="vacancy" name="vacancy" required>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment"></textarea>

            <label for="cv_file">Upload CV:</label>
            <input type="file" id="cv_file" name="cv_file" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

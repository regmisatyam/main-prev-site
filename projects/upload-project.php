<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Cards Upload | SATYAM</title>
    <link rel="icon" type="image/x-icon" href="https://satyamregmi.com.np/images/lion-logo.ico">
     <link rel="stylesheet" href="style.css">


     <style>
    body {
      background-color: #f2f2f2;
    }

    h2 {
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #1A91F0;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #1A91E9;
    }

    .error {
      color: red;
    }
    </style>
</head>
<body>

    <nav class = "navbar bg-white">
            <div class="container">
                <div class = "navbar-content">
                    <div class = "brand-and-toggler">
                        <a href = "/" class = "navbar-brand">
                            <span class = "navbar-brand-text">Projects by <span>SATYAM</span>
                        </a>
                        <button type = "button" class = "navbar-toggler-btn" onclick="toggleSlider()">
                            <div class = "bars">
                                <div class = "bar"></div>
                                <div class = "bar"></div>
                                <div class = "bar"></div>
                            </div>
                        </button>
                        <div class="slider" id="slider">
                            <button type="button" class="close-btn" onclick="toggleSlider()">&times;</button>
                            <a href="/">Home</a>
                            <a href="https://satyamregmi.com.np/projects/" target="_blank">Projects</a>
                            <a href="https://games.satyamregmi.com.np/" target="_blank">Games</a>
                            <a href="https://blogs.satyamregmi.com.np/" target="_blank">Blogs</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


<center>
<h2>Project Card Upload:</h2>
<center>
<form action="upload-project.php" method="post" enctype="multipart/form-data">
  <label for="image">Select Image:</label>
  <input type="file" name="image" id="image"><br><br>

  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required><br><br>

  <label for="description">Description:</label><br>
  <textarea name="description" id="description" rows="4" cols="50"></textarea><br><br>

  <label for="link">Link:</label>
  <input type="text" name="link" id="link" value="https://satyamregmi.com.np/projects/" required><br><br>

  <label for="category">Category</label>
    <select name="category" id="category" required>
    <option value="">SELECT CATEGORY</option>
    <option value="web-project">Web Projects</option>
    <option value="apps">Apps</option>
    <option value="games">Games</option>
    <option value="websites">Websites</option>
    </select><br><br>
  <input type="submit" value="Upload" name="submit">
</form>

<?php
// MySQL database connection
$servername = "sql101.infinityfree.com";
$username = "epiz_34259072";
$password = "7pYTVsKk9IKTzAN";
$database = "epiz_34259072_project_links";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if(isset($_POST["submit"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $link = $_POST['link'];
   

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','webp');

    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO projects (title, description, link, category, image) VALUES ('$title', '$description', '$link', '$category', '$fileName')";
            if(mysqli_query($conn, $sql)){
                echo "Project Card uploaded successfully.";
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            echo "Sorry, there was an error uploading your project card.";
        }
    }else{
        echo 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
}
// Close connection
$conn->close();
?>

</body>
 <script>
    function toggleSlider() {
    const slider = document.getElementById('slider');
    const sliderWidth = slider.offsetWidth;
    const currentRight = getComputedStyle(slider).right;

    if (currentRight === '0px' || currentRight === 'auto') {
        slider.style.right = `-${sliderWidth}px`;
    } else {
        slider.style.right = '0';
    }
}
    </script>
</html>

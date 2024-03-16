<?php
include 'credentials.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects | SATYAM</title>
  <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="https://satyamregmi.com.np/images/lion-logo.png">
  <style>
  
:root{
    --clr-blue: #1A91F0;
    --clr-blue-mid: #1170CD;
    --clr-blue-dark: #1A1C6A;
    --clr-white: #fff;
    --clr-bright: #EFF2F9;
    --clr-dark: #1e2532;
    --clr-black: #000;
    --clr-grey: #656e83;
    --clr-green: #1472ed;
    --font-poppins: 'Poppins', sans-serif;
    --font-manrope: 'Manrope', sans-serif;;
    --transition: all 300ms ease-in-out;
}
  .category{
      padding : 0px 20px 0px 20px;
  }
    .card {
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card img {
      width: 100%;
      border-radius: 5px;
      height: 200px;
    }

    .card .content {
      padding: 10px 0;
    }

    .card h2 {
      font-size: 18px;
      margin: 5px 0;
    }

    .card p {
      font-size: 14px;
      margin: 5px 0;
    }
    .link{
        color:var(--clr-blue);
    }
  </style>
</head>
<body>
<nav class = "navbar bg-white">
            <div class="container">
                <div class = "navbar-content">
                    <div class = "brand-and-toggler">
                        <a href = "/projects/" class = "navbar-brand">
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


<div class ="card-container-main">
 <span class="category">Web Projects:(HTML/CSS/JS)</span>
<div class="card-container">
    <?php
    // Retrieve data from the database for category 'Websites'
    $sql = "SELECT * FROM projects WHERE category = 'web-project'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<br>';
            echo '<div class="card">';
            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['title'] . '">';
            echo '<div class="content">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<a href="' . $row['link'] . '" class="link">Visit</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "All caught up!";
    }
   
    ?>
</div>
</div>

<div class ="card-container-main">
 <span class="category">Games</span>
<div class="card-container">
    <?php
    // Retrieve data from the database for category 'Games'
    $sql = "SELECT * FROM projects WHERE category = 'games'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<br>';
            echo '<div class="card">';
            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['title'] . '">';
            echo '<div class="content">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<a href="' . $row['link'] . '" class="link">Download</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "All caught up!";
    }

    ?>
</div>
</div>

<div class ="card-container-main">
 <span class="category">Websites</span>
<div class="card-container">
    <?php
    // Retrieve data from the database for category 'Websites'
    $sql = "SELECT * FROM projects WHERE category = 'websites'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<br>';
            echo '<div class="card">';
            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['title'] . '">';
            echo '<div class="content">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<a href="' . $row['link'] . '" class="link">Visit</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "All caught up!";
    }
   
    ?>
</div>
</div>

        <div class ="card-container-main">
 <span class="category">Apps</span>
<div class="card-container">
<?php
// Retrieve data from the database
$sql = "SELECT * FROM projects WHERE category = 'apps'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['title'] . '">';
        echo '<div class="content">';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<a href="' . $row['link'] . '" class="link">Visit</a>';
        echo '</div>';
        echo '</div>';

    }
} else {
    echo "Application Coming Soon";
}
 $conn->close();
?>
</div>
</div>

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


<?php
// Your PHP code to generate or retrieve the API key
define('MY_CONSTANT_API', '9b3611a3cfa910b8428fa677');

?>
<!DOCTYPE html>
<!-- Code By SATYAM -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Currency Converter | SATYAM</title>
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="nav-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="shortcut icon" href="https://satyamregmi.com.np/images/lion-logo.png" type="image/x-icon">
        <script src="assets/js/country-list.js"></script>
    <script src="assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>


  <body>

<nav class = "navbar bg-white">
            <div class="ccontainer">
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
                            <a href="https://satyamregmi.com.np/projects/">Projects</a>
                            <a href="https://games.satyamregmi.com.np/" target="_blank">Games</a>
                            <a href="https://blogs.satyamregmi.com.np/" target="_blank">Blogs</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

<center>
    <div class="wrapper">
      <header>Currency Converter</header>
      <form action="#">
        <div class="amount">
          <p>Enter Amount</p>
          <input type="text" value="1">
        </div>
        <div class="drop-list">
          <div class="from">
            <p>From</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/us.png" alt="flag">
              <select> <!-- Options are inserted from JavaScript --> </select>
            </div>
          </div>
          <div class="icon"><i class="fas fa-exchange-alt"></i></div>
          <div class="to">
            <p>To</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/np.png" alt="flag">
              <select> <!-- Options are inserted from JavaScript --> </select>
            </div>
          </div>
        </div>
        <div class="exchange-rate">Getting exchange rate...</div>

        <button>Convert</button>
      </form>
    </div>
</center>
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
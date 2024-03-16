function toggleNav() {
  let sidebar = document.getElementById("mySidenav");
  if (sidebar.style.display === "none" || sidebar.style.display === "") {
    sidebar.style.display = "block";
  } else {
    sidebar.style.display = "none";
  }
}
/*
function disableScroll() {
  // Get the current page scroll position 
  scrollTop =
    window.pageYOffset || document.documentElement.scrollTop;
  scrollLeft =
    window.pageXOffset || document.documentElement.scrollLeft,

    // if any scroll is attempted, 
    // set this to the previous value 
    window.onscroll = function () {
      window.scrollTo(scrollLeft, scrollTop);
    };
} */

function enableScroll() {
  window.onscroll = function () { };
}

function showModel() {
  document.querySelector('.overlayPopup').classList.add('showOverlayPopup');
  document.querySelector('.hireMe').classList.add('showHireMe');
}
function closeModel() {
  document.querySelector('.overlayPopup').classList.remove('showOverlayPopup');
  document.querySelector('.hireMe').classList.remove('showHireMe');
  enableScroll();
}

function validate(){
  let x = document.getElementById('fullName').value;
  let y = document.getElementById('senderEmail').value;
  var atpos = y.indexOf("@");
  var dotpos = y.lastIndexOf(".");
  let z = document.getElementById('hireFor').value;
  let t = document.getElementById('timeP').value;

  const error = document.getElementById('errorMsg');
  

    let eMessages = "Fill out all required fields"
    if (x === '' || x == null ){
      document.getElementById('fullName').focus();
      error.innerText = eMessages;
      error.style.color = 'red';
      return false;
    }
    else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length){
      document.getElementById('senderEmail').focus();
      error.innerText = "Enter a valid e-mail address";
      error.style.color = 'red';
      return false;
    }
    else if (z === '' || z == null ){
      document.getElementById('hireFor').focus();
      error.innerText = eMessages;
      error.style.color = 'red';
      return false;
    }
    else if (t === '' || t == null ){
      document.getElementById('timeP').focus();
      error.innerText = eMessages;
      error.style.color = 'red';
      return false;
    }
    else{
      error.innerText = "";
      error.style.color = 'white';
      return true;
    }
   

  }



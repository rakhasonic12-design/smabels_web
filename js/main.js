function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


 
 
function openNav() {
    document.getElementById("mySidepanel").style.height = "300px";
  }
  
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

window.onscroll = function() {navColor()};

function navColor() {
  if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
    
    document.getElementById("hero-text").style.display = "none";
    document.getElementById("header").style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2)";
  } else {
     
     document.getElementById("hero-text").style.display =  "grid";
     document.getElementById("header").style.boxShadow = "none";
     
}
}


function handleWindowResize() {
  const windowWidth = window.innerWidth;
  const windowHeight = window.innerHeight;
}

function openNav() {
   if (window.innerWidth < 600) {
    document.getElementById("mySidepanel").style.width = "100%";
   } else {
     document.getElementById("mySidepanel").style.width = "300px";
   }
  }

window.addEventListener('resize', handleWindowResize);

handleWindowResize();

 AOS.init({
      duration: 1000, 
      once: true, 
      offset: 200, 
    });
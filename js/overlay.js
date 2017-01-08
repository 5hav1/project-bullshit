/* Open when someone clicks on the span element */
function openNav1() {
    document.getElementById("myNav1").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav1() {
    document.getElementById("myNav1").style.width = "0%";
}

function openNav2() {
    document.getElementById("myNav2").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav2() {
    document.getElementById("myNav2").style.width = "0%";
}

function openNav3() {
    document.getElementById("myNav3").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav3() {
    document.getElementById("myNav3").style.width = "0%";
}



function openNav4() {
  var mq = window.matchMedia('all and (max-width: 992px)');
  if(mq.matches) {
      document.getElementById("myNav4").style.width = "100%";
  } else {
      document.getElementById("myNav4").style.width = "45%";
  }

}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav4() {
    document.getElementById("myNav4").style.width = "0%";
}

function openNav5() {
  var mq = window.matchMedia('all and (max-width: 992px)');
  if(mq.matches) {
      document.getElementById("myNav5").style.width = "100%";
  } else {
      document.getElementById("myNav5").style.width = "45%";
  }
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav5() {
    document.getElementById("myNav5").style.width = "0%";
}

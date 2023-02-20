
    function navDD() {
    document.getElementById("idnavuser").classList.toggle("show");
  }
  window.onclick = function(event) {
    if (!event.target.matches('.hrefdd')) {
      var navuserdds = document.getElementsByClassName("navuserddcon");
      var i;
      for (i = 0; i < navuserdds.length; i++) {
        var opennavuserdd = navuserdds[i];
        if (opennavuserdd.classList.contains('show')) {
          opennavuserdd.classList.remove('show');
        }
      }
    }
  }

  
  function checked(){
    if(document.getElementById('inpass').value == document.getElementById('inpass1').value){
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Passwords match';
      return true;
    }else{
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Password do not match!';
      return false;
    }
  }

 function loadImg() {
    var in_pass = document.getElementById("inpass");
    var img = document.getElementById('img');
    if (in_pass.type === "password") {
      in_pass.type = "text";
      img.src = "/defi/icon/on.PNG";
    } else {
      in_pass.type = "password";
      img.src = "/defi/icon/off.PNG";
    }
  }  

  function loadImge() {
    var in_pass1 = document.getElementById("inpass1");
    var imge = document.getElementById('imge');
    if (in_pass1.type === "password") {
      in_pass1.type = "text";
      imge.src = "/defi/icon/on.PNG";
    } else {
      in_pass1.type = "password";
      imge.src = "/defi/icon/off.PNG";
    }
  }

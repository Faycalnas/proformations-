
$(function () {
    // Display
    $("#signup").click(function () {
      $("#first").fadeOut("fast", function () {
        $("#second").fadeIn("fast");
      });
    });
  
    $("#signin,#signin-short").click(function () {
      $("#second").fadeOut("fast", function () {
        $("#first").fadeIn("fast");
      });
    });
  
    // Logout
    $('#logout').click(function () {
      let requestUrl = window.location.href;
      requestUrl = requestUrl.substr(0, requestUrl.indexOf('/Proform') + 6);
      console.log(requestUrl + 'app/logout.php');
      window.location.replace(requestUrl + 'app/logout.php');
  
    })
  
    document.getElementById('btn-submit').addEventListener('click', event => {
      event.preventDefault()
      
      // Get datas
      const datas = new FormData()
      datas.append('email', event.target.form.email.value)
      datas.append('password', event.target.form.password.value)
  
      // Fetch
      fetch('./views/Visiteur/login.view.php',
        {
          method: 'POST',
          body: datas
        })
        .then(response => response.json())
        .then(json => {
          // we've just 1 msg => [0]
          const message = json.messages[0]
          const successZone = document.querySelector('.success')
          successZone.innerHTML = message
          setTimeout(() => {
            // Hide popup => success message
            document.querySelector('.success').style.display = 'none'
            document.getElementById('email').value = ""
            document.getElementById('password').value = ""
          }, 4000);
  
          // Si besoin de redirection
          if (json.done) {
            let requestUrl = window.location.href;
            requestUrl = requestUrl.substr(0, requestUrl.indexOf('/') + 15);
            // if (!json.done) {
            window.location.replace(requestUrl);
          }
        })
    })
  })
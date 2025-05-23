<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css.css" >
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/sweetalert2.min.css"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/js.js"></script>
    <title>Home</title>
</head>
<style>
  .card-body{background-color: #424242;}
</style>
<body>
    <!-- <section class="vh-100" style="background-color: #9A616D;"> --> <!-- bg pink -->
    <section class="vh-100" style="background-color: #b76300;">
  <div class="container 5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 15px; overflow: hidden; box-shadow: 5px 10px 10px #1e1e1e;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block index-img">
              <img src="./assets/brand/indexpic.png" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex" style="background-color: #424242;">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>
                  <div class="logo-img d-flex align-items-center mb-3 pb-1">
                  <img src="./assets/brand/nwl-logo.png" alt="">
                    <span class="h3 fw-bold mb-0 text-white">NetWorklink.Co.Ltd,</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; color: white;">Sign into your account</h5>

                  <div class="inputGroup">
                    <input type="text" required="" autocomplete="off" class="form-control-lg" id="username">
                    <label for="username">Username</label>
                  </div>

                  <div class="inputGroup">
                    <input type="password" required="" autocomplete="off" class="form-control-lg" id="password">
                    <label for="password">Password</label>
                    <i class="togglepass-login toggle-password fa-regular fa-eye-slash" ></i>
                  </div>

                  <!-- <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div> -->

                  <div class="pt-1 mb-4">
                    <button style="width: 100%; color: white; box-shadow: 5px 4px 6px #1e1e1e;" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="button" onclick="login()">Login</button>
                  </div>

                  <a data-bs-toggle="modal" data-bs-target="#forgetpasswordmodal" class="small text-white" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2 text-white">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registermodal"
                      style="color: #89aadf;">Register here</a></p>
                  <a href="#!" class="small text-white">Terms of use.</a>
                  <a href="#!" class="small text-white">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Modal Start-->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#forgetpasswordmodal">
  Launch demo modal
</button> -->

<!-- Modal Forgetpass start -->
<div class="modal fade" id="forgetpasswordmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
    <div class="card text-center" style="width: 100%;">
    <div class="text-uppercase card-header h5 text-white  d-flex p-3" style="justify-content: center; align-items: center; background-color: #b76300;">
    <span style="flex: 1;">Reset Password</span>
    <button type="button" id="btn-close-forgetpassword" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 14px;"></button>
    </div>
    <div class="card-body px-5 py-5" style="padding-top: 1rem!important;">
        <p class="card-text py-2 text-white">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>
        <div data-mdb-input-init class="form-outline">
            <div class="inputGroup">
                        <input type="text" required="" autocomplete="off" class="form-control-lg" id="forgetusername">
                        <label for="forgetusername">Username</label>
                      </div>
   

            <div class="inputGroup">
                        <input type="password" required="" autocomplete="off" class="form-control-lg" id="forgetpassword">
                        <label for="forgetusername">Password</label>
                      </div>
         
            <div class="inputGroup" style="margin-bottom: 0;">
                        <input type="password" required="" autocomplete="off" class="form-control-lg" id="confirmpassword">
                        <label for="confirmpassword">Confirm password</label>
                        <i id="toggle-password" class="toggle-password fa-regular fa-eye-slash"></i>
                      </div>
            </div>
            <div class="match">
            <span id="match"></span>
            </div>
        <a href="#" id="resetpassword" data-mdb-ripple-init class="btn btn-success w-100">Reset password</a>
        <div class="d-flex justify-content-between mt-4 d-none">
            <a style="color: rgb(137, 170, 223);" class="" href="#">Login</a>
            <a style="color: rgb(137, 170, 223);" class="" href="#">Register</a>
        </div>
    </div>
</div>
    </div>
  </div>
</div>
<!--Modal Forgetpass End-->

<!-- Modal Register start -->
<div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="card text-center" style="width: 100%;">
    <div class="card-header h5 text-white d-flex p-3" style="justify-content: center; align-items: center; background-color: #b76300;">
    <span class="text-uppercase" style="flex: 1;">Create an account</span>
    <button type="button" id="btn-close-register" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 14px;"></button>
    </div>
    <div class="card-body px-5 py-5" style="padding-top: 1rem!important;">
        <p class="card-text py-2 text-white">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>
    
            
              <div class="inputGroup">
                    <input type="text" required="" autocomplete="off" class="form-control-lg" id="usernameregis">
                    <label for="username">Username</label>
                  </div>
                
            
                <div class="inputGroup">
                    <input type="password" required="" autocomplete="off" class="form-control-lg" id="passwordregis">
                    <label for="email">Password</label>
                    <i id="toggle-password2" class="toggle-password fa-regular fa-eye-slash"></i>
                  </div>
               

            
                <div class="inputGroup">
                    <input type="text" required="" autocomplete="off" class="form-control-lg" id="firstname">
                    <label for="email">Firstname</label>
                  </div>
                      
                <div class="inputGroup">
                        <input type="text" required="" autocomplete="off" class="form-control-lg" id="lastname">
                        <label for="lastname">Lastname</label>
                   </div>
            
                   <div class="inputGroup">
                        <input type="text" required="" autocomplete="off" class="form-control-lg" id="telephonenumber">
                        <label for="lastname">Telephonenumber</label>
                   </div>

              <a  onclick="register()" data-mdb-ripple-init class="btn btn-success w-100">Register</a>

        <div class="d-flex justify-content-between mt-4 d-none">
            <a style="color: rgb(137, 170, 223);" class="" href="#">Login</a>
            <a style="color: rgb(137, 170, 223);" class="" href="#">Register</a>
        </div>
    </div>
</div>
    </div>
  </div>
</div>
<!--Modal Register End-->
<!--Modal End-->

<script src="./js/ajax-jquery.min.js"></script>
<script src="./js/sweetalert2.all.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>

<script>

    $("#usernameregis").keypress((e)=>{

      if(e.key === "Enter"){
        register()
      }
    })

    $("#passwordregis").keypress((e)=>{

      if(e.key === "Enter"){
        register()
      }

    })

    $("#firstname").keypress((e)=>{

      if(e.key === "Enter"){
        register()
      }

      })

      $("#lastname").keypress((e)=>{

      if(e.key === "Enter"){
          register()
      }

      })

        
    $(".togglepass-login").click(()=>{
      let inputpass = $("#password");
      let icon = $(".togglepass-login");
      if(inputpass.attr("type") == "password"){
          inputpass.attr("type","text");
          icon.removeClass("fa-eye-slash").addClass("fa-eye");
      }else{
          inputpass.attr("type","password");
          icon.removeClass("fa-eye").addClass("fa-eye-slash");
      }
    })

    let inputusername = $("#username");
    let inputpassword = $("#password");

    inputpassword.keypress((enter)=>{
      if(enter.key === "Enter"){
          login()
      }
    })

    inputusername.keypress((enter)=>{
      if(enter.key === "Enter"){
          login()
      }
    })

    function login(){
    // $("#login").click(()=>{
    let username = $("#username").val();
    let password = $("#password").val();
    let datastr = 'username='+username+'&password='+password;

    if(username == "" || password == ""){
        Swal.fire({
        title: "No information?",
        text: "Please insert your information?",
        icon: "warning"
        });
    }else{
    $.ajax({
        url: 'loginfunction.php',
        type: 'POST',
        data: datastr,
        success:(result)=>{
            if(result == 1){
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Login Success",
                showConfirmButton: false,
                timer: 1500
                });
                setTimeout(()=>{
                    location.href="https://www.networklink.co.th/";
                }, 1800);
                }else if(result == 2){
                Swal.fire({
                position: "center",
                icon: "error",
                title: "Username is wrong!",
                showConfirmButton: false,
                timer: 1500
                });
              }else if(result == 0){
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Login Success",
                showConfirmButton: false,
                timer: 1500
                });
                setTimeout(()=>{
                    location.href="./mtworkorder/mttaskmain.php";
                }, 1800);
            }else if(result == 3){
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Password is wrong!",
                showConfirmButton: false,
                timer: 1500
                });
        }
    }
  })
  
}
}

function register(){
// $("#register").click(()=>{
  let username = $("#usernameregis").val();
  let password = $("#passwordregis").val();
  let firstname = $("#firstname").val();
  let lastname = $("#lastname").val();
  let telephonenumber = $("#telephonenumber").val();
  let datastr = 'username='+username+'&password='+password+'&firstname='+firstname+'&lastname='+lastname+'&telephonenumber='+telephonenumber;

  if(username == '' && password == '' && firstname == '' && lastname == ''){
    $("#registermodal").modal('hide');
  }else{
  if(username == '' || password == '' || firstname == '' || lastname == ''){
    Swal.fire({
      title: "Please insert all information!",
      text: "",
      icon: "warning"
    });
  }else{
  $.ajax({
    url: "registerfunction.php",
    type: "POST",
    data: datastr,
    success: (result) => {
                if(result == 1){
                    Swal.fire({
                    icon: "error",
                    title: "Error..",
                    text: "Username is already use!",
                    footer: ''
                    });
                }else if(result == 2){
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Register success",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    setTimeout(()=>{
                        // location.href="index.php";
                        $("#registermodal").modal('hide');
                        $("#usernameregis").val('');
                        $("#passwordregis").val('');
                        $("#firstname").val('');
                        $("#lastname").val('');
                    },1600);
                }else if(result == 3){
                    Swal.fire({
                    icon: "error",
                    title: "Error..",
                    text: "Register not success!",
                    footer: '<a href="#">contact you admin!</a>'
                    });
                }else if(result == 0){
                    Swal.fire({
                    icon: "error",
                    title: "Error..",
                    text: "Username already in use!",
                    });
                }
            }
  })
}
}
}

$("#resetpassword").click(()=>{
  let username = $("#forgetusername").val();
  let password = $("#forgetpassword").val();
  let passwordcf = $("#confirmpassword").val();
  let datastr = 'username='+username+'&password='+password+'&passwordcf='+passwordcf;

  if(username == "" && password == "" && passwordcf == ""){
        $("#forgetpasswordmodal").modal("hide");
  }else{
  if(username == "" || password == "" || passwordcf == ""){
    Swal.fire({
      title: "Please insert all information!",
      text: "",
      icon: "warning"
    });
  }else if(password != passwordcf){
    Swal.fire({
      title: "Your password is not match!",
      text: "",
      icon: "warning"
    });
  }else{
    $.ajax({
      url: "forgotpassword.php",
      type: "POST",
      data: datastr,
      success:(result)=>{
          if(result == 1){
            Swal.fire({
            title: "Username is wrong!",
            text: "",
            icon: "warning"
          });
          }else if(result == 2){
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Reset password success",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    setTimeout(()=>{
                    $("#forgetpasswordmodal").modal("hide");
                    $("#match").text('');
                    $("#forgetusername").val("");
                    $("#forgetpassword").val("");
                    $("#confirmpassword").val("");
                    }, 1500);
          }
      }
    })
  }
}
})
</script>


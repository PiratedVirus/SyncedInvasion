$(document).ready(function(){$("#inputName").keyup(function(){$username=$("#inputName").val(),1==/^[a-zA-Z ]+$/.test($username)?(""!=$username?($("#e-name").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-name").text("This field is required"),$("#submit-btn").attr("disabled","disabled")),$username.length>"4"?($("#e-name").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-name").text("Please enter your full name."),$("#submit-btn").attr("disabled","disabled"))):($("#e-name").text("Please enter valid name."),$("#submit-btn").attr("disabled","disabled"))}),$("#inputMail").keyup(function(){function e(e){return/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e)}$usermail=$("#inputMail").val(),console.log($usermail),console.log(e($usermail)),e($usermail)&&(console.log("INto the ifs"),$("#e-mail").load("mail-verify.php",{usermail:$usermail,textval:"textval"}))}),$("#inputPass").keyup(function(){$userpass=$("#inputPass").val(),""!=$userpass?($("#e-pass").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-pass").text("This field is required"),$("#submit-btn").attr("disabled","disabled")),$userpass.length>"5"?($("#e-pass").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-pass").text("Please enter at least six characters."),$("#submit-btn").attr("disabled","disabled"))}),$("#cnfPass").keyup(function(){$userpass=$("#inputPass").val(),$cnfpass=$("#cnfPass").val(),$cnfpass==$userpass?($("#e-cnf-pass").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-cnf-pass").text("Password not matched"),$("#submit-btn").attr("disabled","disabled"))}),$("#inputMobile").keyup(function(){$usermobile=$("#inputMobile").val(),"10"==$usermobile.length?($("#e-mobile").text(""),$("#submit-btn").removeAttr("disabled")):($("#e-mobile").text("Enter valid mobile number"),$("#submit-btn").attr("disabled","disabled"))})});
 <?php
include "views/enter/block/header.php";
include "views/enter/block/navigation_top.php";

        
////////////////////////////////////////////////////////////////////////////////

//  CONTENT AREA


?>
<div style="height: 70px; width: 100%;">
</div>

<div id="contentBlock">
 <div class="login-page">
  <div class="form" style="padding-top: 15px;">
    <form class="register-form" action="/user/registration" method="post" autocomplete="off">

      <input type="text" name="name" placeholder="имя" />
      <input type="text" name="lastname" placeholder="фамилия"/>
      <input type="text" name="tel" placeholder="телефон"/>
      <input type="password" name="pass" placeholder="пароль"/>
      <input type="text" name = "mail" placeholder="эл. почта"/>

      <button>Регистрация профиля</button><hr class="style-two"><hr class="style-two">
      <p class="message">Вы уже зарегистрированы?  <br><a href="#">Авторизация в системе</a></p>
      </form>
    <form class="login-form" action="/user/authorisation" method="post" autocomplete="on">
      <input type="text" name = "mail" placeholder="эл. почта"/>
      <input type="password" name="pass" placeholder="пароль"/>
      <button>ВОЙТИ</button><hr class="style-two"><hr class="style-two">
      <p class="message"> Вы еще не зарегистрированы?  <br><a href="#">Регистрация профиля</a></p><hr class="style-two"><hr class="style-two">
      <p> <a href="/administration"> войти как администратор </a></p> 
    </form>
  </div>
</div>
<br><br><br><br><br>

<script>
   $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
   });
</script>
 

</div>

<?PHP
////////////////////////////////////////////////////////////////////////////////
include "views/enter/block/footer.php";
?>
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
<p style='color: grey; font-size: 18px; font-weight: bold;'>  администратор </p>
    <form class="login-form" action="/admin/authorisation" method="post" autocomplete="on">
      <input type="text" name = "mail" placeholder="никнейм"/>
      <input type="password" name="pass" placeholder="пароль"/>
      <button>ВОЙТИ</button><hr class="style-two"><hr class="style-two">
     <hr class="style-two"><hr class="style-two">
           
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
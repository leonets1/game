<div id="topMenu">
<div style="margin: auto; width: 1250px;">   
<img src="/template/img/logo.png">

<?PHP
if(!empty($_SESSION['UID'])){
echo "<a href='/exit'> <div class='topButtExit grey'> Выход <i class='fa fa-sign-out fa-lg' style='font-size: 14px;'> </i> </div> </a>"; 
}
else{
echo "<a href='/exit'> <div class='topButtExit'> Вход <i class='fa fa-sign-out fa-lg' style='font-size: 14px;'> </i> </div> </a>";    
}
?>
 

</div>   
</div>


<?php
include "views/user/block/header.php";
include "views/user/block/navigation_top.php";
        
////////////////////////////////////////////////////////////////////////////////

//  CONTENT AREA

?>

<div style="height: 70px; width: 100%;">
</div>

<div id="contentBlock" style="background: none;">

<!--// 1 //////////////////////////////////////////////////////////-->
    
<div class="tabs_block current" id="tabs-1" style="margin-bottom: 70px; min-height:1200px; width: 1200px !important; box-shadow: 0px 0px 2px grey; margin-top: -3px;">
<center>
<?PHP
if(!empty($INFO_GAME->UID)){
echo "<h1 style='color:grey;'>Дорогой $INFO_USER->Name  Вы уже выиграли свои приз!  </h1>"; ?>
<?PHP
if($INFO_GAME->pr_name == 'pr_money'){
echo "<div class='circle' style='background: #f7664c; margin-left: 0px !important;'><i class='fa fa-money'></i> 
    <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px; '> $INFO_PRIZE->name руб.</p></div>";  
if($INFO_GAME->moderate == 0){
echo "<br><br><hr class='style-two'><hr class='style-two'><p>
<span style= 'color:green;'> до того как произойдет модерация вы можете обменять свой приз на $INFO_PRIZE->bonus_equivalent бонусов </span><br>
<a href='/start/bonus' style='color:whitesmoke;'><div class='pulse'> обменять на бонусы </div></a></p>";
}
}

if($INFO_GAME->pr_name == 'pr_things'){
echo "<div class='circle' style='background: #f39c12; margin-left: 0px !important;'><i class='fa fa-gift'></i> 
    <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px; '> $INFO_PRIZE->name </p></div>";

if($INFO_GAME->moderate == 0){
echo "<br><br><hr class='style-two'><hr class='style-two'><p>
<span style='color:green;'> до того как произойдет модерация вы можете обменять свой приз на $INFO_PRIZE->bonus_equivalent бонусов </span><br>
<a href='/start/bonus' style='color:whitesmoke;'><div class='pulse'> обменять на бонусы </div></a></p>";
}
}

if($INFO_GAME->pr_name == 'pr_bonus'){
echo "<div class='circle' style='background: #4e69a2; margin-left: 0px !important;'><i class='fa fa-cubes'></i> 
    <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px; '> $INFO_PRIZE->name балл. </p></div>";   
}
?>

    
<?PHP }else{
    echo "<h1 style='color:green;'>Дорогой $INFO_USER->Name  Выиграйте свои приз!   </h1>"; ?>

<div class="circle" style='background: #f7664c; margin-left: 0px !important;'><i class="fa fa-money"></i> <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px; '> денежный приз </p></div>    
<div class="circle" style='background: #f39c12;'><i class="fa fa-gift"></i><p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px;'> физический предмет </p></div>    
<div class="circle" style='background: #4e69a2;'><i class="fa fa-cubes"></i> <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px;'> бонусные баллы </p></div>    
<br><br> <hr class="style-two"><hr class="style-two">
<p> <a href='/start/game' style='color:whitesmoke;'><div class='pulse'> выиграть приз </div></a></p>
<?PHP } ?>
   
</center>
</div>



     
</div>


<?PHP
////////////////////////////////////////////////////////////////////////////////
include "views/user/block/footer.php";
?>




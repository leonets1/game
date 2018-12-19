<?php
include "views/admin/block/header.php";
include "views/admin/block/navigation_top.php";
        
////////////////////////////////////////////////////////////////////////////////

//  CONTENT AREA

$CP1 = ''; $CP2 = ''; $CP3 = ''; 

if($CURR_PAGE == 0){$CP1 = 'current'; }
if($CURR_PAGE == 1){$CP2 = 'current'; }
if($CURR_PAGE == 2){$CP3 = 'current'; }


?>

<div style="height: 70px; width: 100%;">
</div>

<div id="contentBlock" style="background: none;">

<div class="mainButtBlock">
        <div class="tab_1 <?PHP echo $CP1; ?>" data-tab="tabs-1"> необработанные выигрыши </div>
        <div class="tab_1 <?PHP echo $CP2; ?>" data-tab="tabs-2"> обработанные выигрыши </div>
        <div class="tab_1 <?PHP echo $CP3; ?>" data-tab="tabs-3"> параметры  </div>

</div>

<!--// 1 //////////////////////////////////////////////////////////-->
    
<div class="tabs_block <?PHP echo $CP1; ?>" id="tabs-1" style="margin-bottom: 70px; min-height:1200px; width: 1200px !important; box-shadow: 0px 0px 2px grey; margin-top: -3px;">
<center>
<h1 style='color:green;'> Выиграйте один из трех призов! </h1>
<div class="circle" style='background: #f7664c; margin-left: 0px !important;'><i class="fa fa-money"></i> <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px; '> денежный приз </p></div>    
<div class="circle" style='background: #f39c12;'><i class="fa fa-gift"></i><p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px;'> физический предмет </p></div>    
<div class="circle" style='background: #4e69a2;'><i class="fa fa-cubes"></i> <p style='color: whitesmoke; font-size: 12px; line-height: 0px; margin-top: -60px;'> бонусные баллы </p></div>    
<br><br> <hr class="style-two"><hr class="style-two">
<p> <div class='pulse'> выиграть приз </div></p>
</center>
</div>


<!--// 2 //////////////////////////////////////////////////////////-->

<div class="tabs_block <?PHP echo $CP2; ?>" id="tabs-2" style="margin-bottom: 70px; min-height:1200px; width: 1200px !important; box-shadow: 0px 0px 2px grey; margin-top: -3px;">


</div>


<!--// 3 //////////////////////////////////////////////////////////-->


<div class="tabs_block <?PHP echo $CP3; ?>" id="tabs-3" style="margin-bottom: 70px; min-height:1200px; width: 1200px !important; box-shadow: 0px 0px 2px grey; margin-top: -3px;">


</div>

 


     
     
     
     
</div>


<?PHP
////////////////////////////////////////////////////////////////////////////////
include "views/user/block/footer.php";
?>

<script>
	$(document).ready(function(){
	$('.tab_1').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.tabs_block').removeClass('current');
		$('.tab_1').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
});

</script>



<?php
include "views/promo/block/header.php";
include "views/promo/block/navigation_top.php";
//include "views/promo/block/navigation_left.php";

echo "<div id='contentBlock'>";

////////////////////////////////////////////////////////////////////////////////

if(isset($RT)){$reportMsg = $RT['reportMsg']; $ANSWERS = $RT['UACount'];}

//  CONTENT AREA



if($reportMsg == 12)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px; display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='green'>თქვენ წარმატებით გაიარეთ რეგისტრაცია!</font></h2><hr>";
echo "<li> უკვე შეგიძლიათ შეხვიდეთ სისტემაში. </li> ";
echo "<li> დააჭირეთ ღილაკს სისტემაში შესვლა და მიუთითეთ რეგისტრაციის დროს შეყვანილი მონაცემები.</li> ";
echo " <br><font size='4'><a href = '/authorisation' class = 'topButtExit left blue' style = 'color:white; width:200px;'> სისტემაში შესვლა</a></font><br> ";
echo "</div>";
}

if($reportMsg == 13)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px; display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='red'>ასეთი ელ. ფოსტა უკვე დარეგისტრირებულია სისტემაში!</font></h2><hr>";
echo "<li> მიუთითეთ სხვა ელ. ფოსტა </li> ";
echo "<li> თუ ხართ რეგისტრირებული სისტემაში მაგრამ არ გახსოვთ პაროლი, გადადით პაროლის აღდგენის გვერდზე</li> ";
echo " <br><font size='4'><a href = '/recall' class = 'topButtExit left' style = 'color:white;'> პაროლის აღდგენა </a></font> &nbsp;&nbsp;";
echo " <font size='4'><a href = '/exit/1' class = 'topButtExit left' style = 'color:white;'> ახალი ელ. ფოსტით რეგისტრაცია </a></font><br>";
echo "</div>";
}

if($reportMsg == 14)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px;  display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='red'>ყურადღებით შეავსეთ მოცემული ველები!</font></h2><hr>";
echo "<li> შესავსებია ყველა ველი </li> ";
echo "<li> ველებში უნდა შეიყვანოთ მხოლოდ დაშვებული სიმბოლოები </li> ";
echo " <br><font size='4'><a href = '/registration' class = 'topButtExit left blue' style = 'color:white;'> რეგისტრაციაზე დაბრუნება </a></font><br>";
echo "</div>";
}


if($reportMsg == 16)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px;  display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='red'>ყურადღებით შეავსეთ მოცემული ველები!</font></h2><hr>";
echo "<li>მითითებულია არასწორი მონაცემები მომხმარებლის ან პაროლის ველში </li> ";
echo "<li> თუ დაგავიწყდათ პაროლი  გადადით პაროლის აღდგენის გვერდზე </li> ";
echo " <br><font size='4'><a href = '/recall' class = 'topButtExit left' style = 'color:white;'> პაროლის აღდგენა </a></font> &nbsp;&nbsp;";
echo " <font size='4'><a href = '/authorisation' class = 'topButtExit left' style = 'color:white;'> ავტორიზაციაზე დაბრუნება </a></font>";
echo "</div>";
}

if($reportMsg == 17)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px;  display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='green'>პაროლი გამოგზავნილია ელ. ფოსტაზე</font></h2><hr>";
echo "<li> შეამოწმეთ ელ. ფოსტა </li> ";
echo "<li> სისტემაში შესასვლელად გადადით ავტორიზაციის გვერდზე </li> ";
echo " <br><font size='4'><a href = '/authorisation' class = 'topButtExit left blue' style = 'color:white;'> ავტორიზაციაზე დაბრუნება </a></font><br>";
echo "</div>";
}

if($reportMsg == 18)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px; display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<h2><font color='red'>ასეთი ელ. ფოსტა მონაცემთა ბაზაში არ მოიძებნა!</font></h2><hr>";
echo "<li> ყურადღებით შეავსეთ მოცემული ველი! </li> ";
echo "<li> დაარეგისტრირეთ ახალი პროფილი. </li> ";
echo " <br><font size='4'><a href = '/registration' class = 'topButtExit left blue' style = 'color:white;'> რეგისტრაციაზე დაბრუნება </a></font><br>";
echo "</div>";
}

if($reportMsg == 19)
{
echo "<div class='tabs_block current' id='tabs-1' style='background: #e2efda; margin-bottom: 10px; margin-top: 70px; display:block; padding-top: 10px; font-size: 13px; color:  #333; font-weight: bold;'>";
echo "<div style='font-size: 12px; margin-top: 10px; color: #3b5998; '>
UGROUP.GE ყველა მსურველს აძლევს ფულის გამომუშავების შესაძლებლობას FACEBOOK-ში სარეკლამო მასალის გამოქვეყნებით.<br>
<hr class='style-two'><hr class='style-two'>
პრინციპი მარტივია:
<ul>
   <li> დარეგისტრირდი </li>
   <li> მიუთითე რესურსი რომელშიც უნდა გააშეარო სარეკლამო მასალა </li>
   <li> გააშეარე სარეკლამო მასალა </li>
   <li> დააგროვე ჩვენებები და გამოიმუშავე ფული </li>
</ul>
ასევე მიიღე ჩვენს რეფერალურ სისტემაში მონაწილეობა:
<ul>
   <li> მოიწვიე მეგობრები რომლებიც იმუშავებენ ჩვენს სისტემაში </li>
   <li> რაც უდრის მათი გამომუშავებული თანხის ჯამის 10% - ს შენს ანგარიშზე </li>
</ul>
სამომხმარებლო შეთანხმება <br>
სარეკლამო მასალის გამოქვეყნება შესაძლებელია მხოლოდ:
<ol>
    <li>  FACEBOOK ფან-გვერდებზე </li>
    <li>  FACEBOOK გრუპებში </li>
    <li>  FACEBOOK-ის პირად პროფილში </li>
</ol>
სარეკლამო მასალის გამოქვეყნება იკრძალება:<br>
<ol>
    <li>  FACEBOOK-ის გარდა სხვადასხვა რესურსებში </li>
    <li>  FACEBOOK-ის კომენტარებში </li>
    <li>  სხვის მფლობელობაში არსებულ: ფან-გვერდებზე, გრუპებში, პროფილებში </li>
    <li>  ისეთ რესურსებში რომელიც შეიცავს +18 ან შეურაცმყობ კონტენტს </li>
</ol>
ასევე აკრძალულია:
<ol>
   <li> ჩვენებების გაყალბება </li>
   <li> ყველა ქმედება რომელიც იქნება აღთქმული როგორც სპამი </li>
   <li> საკუთარ რეფერალურ ბმულზე რეგისტრაცია </li>
   <li> სარეკლამო მასალაში ნებისმიერი ცვლილების შეტანა </li>
   <li> ყოველგვარი მაქინაციური ქმედებები </li>
   <li> უბიძგო მომხმარებელს სარეკლამო მასალაზე გადმოსვლა ცრუ ან არასწორი ინფორმაციის მიწოდებით </li>
</ol>

<hr class='style-two'><hr class='style-two'>

<p style='color:tomato;'>გაეცანით!</p> 
<p style='font-size: 11px; color:grey;'>
<i class='fa fa-info-circle' style='color: #3b5998;'></i> შეთანხმების დარღვევის შემთხვევაში UGROUP.GE-ს ადმინისტრაცია იტოვებს უფლებას მოგცეთ გაფრთხილება
ან გაფრთხილების გარეშე დაბლოკოს თქვენი სამუშაო პროფილი და გაანულოს არსებული ბალანსი. <br> <br>
<i class='fa fa-info-circle'  style='color: #3b5998;'></i> იყავით ყურადღებით რადგან UGROUP.GE-ს გუნდი მოახდენს მითითებული რესურსების გადამოწმებას და დააკვირდება მუშაობის პროცესს სხვადასხვა მეთოდებით. <br> <br>
<i class='fa fa-info-circle'  style='color: #3b5998;'></i> მიმდინარე ჩამონათვალი არ არის სრული. ადმინისტრაცია იტოვებს უფლებას შეთანხმებაში თავისი შეხედულების მიხედვით შეიტანოს ცვლილებები ნებისმიერ დროს გაფრთხილების ან შეტყობინების გარეშე.
</p> <p style='float: right; color: #605ca8; margin-right: 20px;'> <i> UGROUP.GE-ს ადმინისტრაცია. </i>
</div> ";

echo "</div>";
    
}








////////////////////////////////////////////////////////////////////////////////
include 'views/promo/block/footer.php';
?>


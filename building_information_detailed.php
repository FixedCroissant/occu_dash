<?php
/**
 * User: jjwill10
 * Date: 9/14/2015
 * Time: 9:51 AM
 * Description:
 */
//Retrieve the buildingOccupancydetail Class.
include('classes/buildingOccupancydetail.php');

//Create new buildingOccupancy object.
//Sets an initial classification of student based on the classification entered...

//Load information from the link.
$campus = $_GET['campus'];
$area= $_GET['area'];
$complexArea = $_GET['complex'];
$pulledBuilding=$_GET['building'];

$myBuildingOccupancydetail = new buildingOccupancydetail($campus,"","M","fr",15);
//Working Object called $myBuildingOccupancydetail...
//$myBuildingOccupancydetail = new buildingOccupancydetail("East","","M","fr",15);


//Get genders
$male= $myBuildingOccupancydetail->getMale();
$female=$myBuildingOccupancydetail->getFemale();

//Set classifications
$myBuildingOccupancydetail->setClassification("NFR",19);
$myBuildingOccupancydetail->setClassification("SO",10);
$myBuildingOccupancydetail->setClassification("JR",20);
$myBuildingOccupancydetail->setClassification("SR",30);
$myBuildingOccupancydetail->setClassification("A1",5);
$myBuildingOccupancydetail->setClassification("A2",3);
$myBuildingOccupancydetail->setClassification("GR",2);
$myBuildingOccupancydetail->setClassification("NGR",4);
$myBuildingOccupancydetail->setClassification("NTR",10);
$myBuildingOccupancydetail->setClassification("P1",8);
$myBuildingOccupancydetail->setClassification("SP",7);
$myBuildingOccupancydetail->setClassification("UN",6);


//Get the classifications
$fr=$myBuildingOccupancydetail->getClassifications("fr");
$nfr=$myBuildingOccupancydetail->getClassifications("nfr");
$so=$myBuildingOccupancydetail->getClassifications("so");
$jr=$myBuildingOccupancydetail->getClassifications("jr");
$sr=$myBuildingOccupancydetail->getClassifications("sr");
$a1=$myBuildingOccupancydetail->getClassifications("a1");
$a2=$myBuildingOccupancydetail->getClassifications("a2");
$gr=$myBuildingOccupancydetail->getClassifications("gr");
$ngr=$myBuildingOccupancydetail->getClassifications("ngr");
$ntr=$myBuildingOccupancydetail->getClassifications("ntr");
$p1=$myBuildingOccupancydetail->getClassifications("p1");
$sp=$myBuildingOccupancydetail->getClassifications("sp");
$un=$myBuildingOccupancydetail->getClassifications("un");

//Create an Array and add the classifications to the array.
$classifications = array("fr"=>$fr,"nfr"=>$nfr,"so"=>$so,"jr"=>$jr,"sr"=>$sr,"a1"=>$a1,"a2"=>$a2,"gr"=>$gr,"ngr"=>$ngr,"ntr"=>$ntr,"p1"=>$p1,"sp"=>$sp,"un"=>$un);

//Create an Array and add the genders to the array.
$genders = array("male"=>$male,"female"=>$female);
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Detailed Student Information
    </title>
    <!--Internal Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/detailed_student_information.css">
    <!--load the necessary google charts API-->
    <!--Google Charts API-->
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <!--Google Chart Separate File-->
    <script type='text/javascript' src='scripts/drawChart.js'></script>
    </head>
<div id="container">
    <?php
    //Write the necessary JavaScript to provide the bar chart
    echo "<script type='text/javascript'>\n";
    //encode information into json as javascript
    //echo  "var stuff=json_encode($classifications)";
    echo "var ar=". json_encode($classifications).";";
    echo "</script>\n";
    ?>


    <a href='' class='small' onclick='window.close();' >Close Window </a><img src="images/close_window.png"/>
    <br/>
    <br/>

    <table id ="selected_building_overview_information" name="selected_building_overview_information" border="1" width="700px">
        <thead>
        <th>
            Campus
        </th>
        <th>
            Area (if any)
        </th>
        <th>
            Complex (if any)
        </th>
        <th>
            Building
        </th>

        </thead>
        <tbody>
        <?php
        echo "<tr>";
        echo "<td>";
        echo $campus;
        echo "</td>";
        echo "<td>";
        echo "$area";
        echo "</td>";
        echo "<td>";
        echo "$complexArea";
        echo "</td>";
        echo "<td>";
        echo $pulledBuilding;
        echo "</td>";
        echo "</tr>";

        ?>
        </tbody>
</table>


    <table id="gender_student_information" name="gender_student_information" border="1" width="700px;" class="display-details">
        <thead>
        <th>
            Gender
        </th>
        <th>
            Num.
        </th>
        </thead>
        <tbody>

        <?php
        //end adding the classifications to the array.
        foreach($genders as $key=> $studentsGenders){
            echo "<tr>";
            echo "<td>";
            //Grab the key from the array & display it in a table.
            $mykey = $key;
            echo $mykey;
            echo "</td>";

            echo "<td>";
            echo $studentsGenders;
            echo "</td>";

            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <table id="classification_student_information" name="classification_student_information" border="1" width="700px;" class="display-details">
        <thead>
        <th style="width:390px;">
            Classification
        </th>
        <th>
            Num.
        </th>
        </thead>
        <tbody>

            <?php
                    //end adding the classifications to the array.
                    foreach($classifications as $key=> $studentsCLASSIFICATIONS){
                        echo "<tr>";
                        echo "<td>";
                            //Grab the key from the array & display it in a table.
                            $mykey = $key;
                            echo $mykey;
                        echo "</td>";

                        echo "<td>";
                        echo $studentsCLASSIFICATIONS;
                        echo "</td>";

                        echo "</tr>";
                    }





            ?>



        </tbody>

    </table>


    <!--Chart-->
    <div id="chart">

    </div>

</div>
</html>

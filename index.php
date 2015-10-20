<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 8/31/2015
 * Time: 10:10 AM
 */

//Retrieve the buildingOccupancy Class.
include('classes/buildingOccupancy.php');
//Retrieve the buildingOccupancyDetail class.
include('classes/buildingOccupancydetail.php');

//Create new buildingOccupancy object.
$myBuildingOccupancy = new buildingOccupancy();

//Create new buildingOccupnacyDetailed object.
$myBuildingOccupancyDetailedItem = new buildingOccupancydetail();

//Create an array of buildingObjects....
$totalHousingPicture = array();


//What is in buildingOccupancy by default.

//var_dump($myBuildingOccupancy);

//create a new object.

//Create an Array that will be my collection of buildingOccupancy objects.

$universityHousingBuildings = array("AFC_A" => "", "AFC_B" => "", "AFC_E" => "", "AFC_F" => "");

//read Database  Data
include('index_READ_DATA.php');


//Avent Ferry
/*
$universityHousingBuildings['AFC_A'] = new buildingOccupancy("AFC - A", "Southeast", 98, 108, "", "3", 111);
$universityHousingBuildings['AFC_B'] = new buildingOccupancy("AFC - B", "Southeast", 112, 114, "", "3", 117);
$universityHousingBuildings['AFC_E'] = new buildingOccupancy("AFC - E", "Southeast", 198, 216, "", "6", 222);
$universityHousingBuildings['AFC_F'] = new buildingOccupancy("AFC - F", "Southeast", 115, 150, "", "5", 155);

//Wood Residence Hall
$universityHousingBuildings['Wood_A'] = new buildingOccupancy("Wood - A", "Southeast", 207, 280, "", "7", 287);
$universityHousingBuildings['Wood_B'] = new buildingOccupancy("Wood - B", "Southeast", 67, 177, "", "6", 183);


//Northeast
//Quad
//Bagwell
$universityHousingBuildings['Bagwell'] = new buildingOccupancy("Bagwell", "Northeast", 150, 157, "", "6", 163);
//Becton
$universityHousingBuildings['Becton'] = new buildingOccupancy("Becton", "Northeast", 191, 202, "", "7", 209);
//Berry
$universityHousingBuildings['Berry'] = new buildingOccupancy("Berry", "Northeast", 48, 57, "", "3", 60);


//Triad
//Gold
$universityHousingBuildings['Gold'] = new buildingOccupancy("Gold", "Northeast", 47, 56, "", "2", 58);
//Welch
$universityHousingBuildings['Welch'] = new buildingOccupancy("Welch", "Northeast", 44, 56, "", "2", 58);
//Syme
$universityHousingBuildings['Syme'] = new buildingOccupancy("Syme", "Northeast", 182, 206, "", "7", 213);
//Nortauga
$universityHousingBuildings['Watauga'] = new buildingOccupancy("Watauga", "Northeast", 89, 94, "", "4", 98);
$universityHousingBuildings['North'] = new buildingOccupancy("North", "Northeast", 214, 231, "", "11", 242);
//End of Northeast



//Start of Central
//TriTowers
$universityHousingBuildings['Bowen'] = new buildingOccupancy("Bowen", "Central", 295, 304, " ", "8", 312);
$universityHousingBuildings['Carroll'] = new buildingOccupancy("Carroll", "Central", 331, 342, "", "9", 351);
$universityHousingBuildings['Metcalf'] = new buildingOccupancy("Metcalf", "Central", 383, 396, "", "12", 408);
//End of TriTowers
//Start of TOTA
$universityHousingBuildings['Tucker'] = new buildingOccupancy("Tucker", "Central", 315, 348, "", "10", 358);
$universityHousingBuildings['Owen'] = new buildingOccupancy("Owen", "Central", 348, 366, "", "10", 376);
$universityHousingBuildings['Turlington'] = new buildingOccupancy("Turlington", "Central", 144, 156, "", "5", 161);
$universityHousingBuildings['Alexander'] = new buildingOccupancy("Alexander", "Central", 157, 160, "", "5", 165);
//End of TOTA



//End of Central
//Start of West Campus
$universityHousingBuildings['Lee'] = new buildingOccupancy("Lee", "West", 681, 731, "", "18", 749);
$universityHousingBuildings['Sullivan'] = new buildingOccupancy("Sullivan", "West", 639, 690, "", "23", 713);
$universityHousingBuildings['Bragaw'] = new buildingOccupancy("Bragaw", "West", 700, 740, "", "21", 761);
//End West Campus

//Start Apartments
//Wolf Ridge Apartments
$universityHousingBuildings['WR_Grove'] = new buildingOccupancy("WR Grove", "West", 85, 140, "", "3", 143);
$universityHousingBuildings['WR_Innovat'] = new buildingOccupancy("WR Innovat", "Wolf Ridge", 85, 202, "", "3", 205);
$universityHousingBuildings['WR_Lakevw'] = new buildingOccupancy("WR Lakeview", "Wolf Ridge", 99, 145, "", "3", 148);
$universityHousingBuildings['WR_Plaza'] = new buildingOccupancy("WR Plaza", "Wolf Ridge", 156, 220, "", "3", 223);
$universityHousingBuildings['WR_Tower'] = new buildingOccupancy("WR Tower", "Wolf Ridge", 181, 236, "", "8", 244);
$universityHousingBuildings['WR_Valley'] = new buildingOccupancy("WR Valley", "Wolf Ridge", 1, 202, "", "3", 205);
//End Wolf Ridge Apartments

//Start Wolf Village Apartments
$universityHousingBuildings['Wolf Vlg A'] = new buildingOccupancy("Wolf Vlg A", "Wolf Village", 139, 160, "", "2", 162);
$universityHousingBuildings['Wolf Vlg B'] = new buildingOccupancy("Wolf Vlg B", "Wolf Village", 144, 160, "", "2", 162);
$universityHousingBuildings['Wolf Vlg C'] = new buildingOccupancy("Wolf Vlg C", "Wolf Village", 134, 144, "", "2", 146);
$universityHousingBuildings['Wolf Vlg D'] = new buildingOccupancy("Wolf Vlg D", "Wolf Village", 134, 144, "", "2", 146);
$universityHousingBuildings['Wolf Vlg E'] = new buildingOccupancy("Wolf Vlg E", "Wolf Village", 147, 160, "", "2", 162);
$universityHousingBuildings['Wolf Vlg F'] = new buildingOccupancy("Wolf Vlg F", "Wolf Village", 138, 160, "", "2", 162);
$universityHousingBuildings['Wolf Vlg G'] = new buildingOccupancy("Wolf Vlg G", "Wolf Village", 53, 124, "", "6", 130);
$universityHousingBuildings['Wolf Vlg H'] = new buildingOccupancy("Wolf Vlg H", "Wolf Village", 117, 144, "", "2", 146);
*/

//End Wolf Village Apartments


//End Apartments



//var_dump ($universityHousingBuildings);

?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>NC State Housing-Assignments & Occupancy Outlook</title>
    <!--Internal Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--Using new PURE CSS for this project-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <!--Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Javascript Imports-->
    <script src="scripts/autoHide.js"></script>
    <script src="scripts/jQueryRotate.js"></script>
    <!--StickyHeader Import-->
    <script src="scripts/jquery.stickytableheaders.min.js"></script>

    <!--JavaScript needs to do the pop-up windows for the gender and classification break downs.-->
    <script src="scripts/popUpForDetailedList.js"></script>
    <!--End Javascript Imports-->
    <!--Favorite Icon-->
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <!--Start Google Fonts import-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <!--End Google Fonts Import-->
</head>
<script type="text/javascript">
    $(document).ready(function () {
        //Allow for column headers to consistently stay at the top of the webpage.
        $("#mainTABLE").stickyTableHeaders();
    });

</script>


<!--Main Container-->
<div id="container">
    <!--Instructions-->
    <div id="instructions">
        <img src="images/university_housing_logo.png" alt="University Housing"/>
    <p>

    </p>
    </div>
    <!--Main inside the over arching container-->
    <div id="main">
        <div id="controls">
            <script>
                function ShowAll() {
                    // A $( document ).ready() block.
                    $( document ).ready(function() {
                        $(".auto-hide").show(600);

                        //Add darker color to the row
                        $(".expand_SUBROW").addClass("light-grey");
                    });
                }
                function HideAll() {
                    // A $( document ).ready() block.
                    $( document ).ready(function() {
                        $(".auto-hide").hide(600);

                        //Remove the darker color and bolding to the row.
                        $(".expand_SUBROW").removeClass("light-grey");
                    });
                }
            </script>
            <p>
                <!--Add controls to show everything that is current hidden-->
                <img src="images/plus.png " title="Expand All"/> <a href ="#" onclick="ShowAll();">Expand All</a>
                <img src="images/minus.jpg" title="Collpase All"/> <a href ="#" onclick="HideAll();">Collapse All</a><br/>

            </p>
        </div>
        <table id="mainTABLE" class="pure-table pure-table-horizontal" width="100%;">
            <thead>
            <th>
                Campus
            </th>
            <th>
                Area
            </th>
            <th>
                Complex
            </th>
            <th>
                Building
            </th>
            <th>
                Students Assigned
            </th>
            <th>
                Total Possible Resident Occupancy
            </th>
            <th>
                Resident Occupancy %
            </th>
            <th>
                Staff Capacity
            </th>
            <th>
                Total Bldg Capacity
            </th>
            <th>
                Total Bldg Capacity %
            </th>
            </thead>
            <tbody>
            <!--First Building and Data Elements -->
            <?php
            //Set boolean to state whether or not the area sub-category has already printed.
            $area_NotAlreadyPrinted = true;



            //test
            //var_dump($universityHousingBuildings);

            //end test






            foreach ($universityHousingBuildings as $listRead) {
                //First Building and Data Elements//
                //Information here....
                $pulledBuilding = $listRead->getBuildingName();

                //Set the campus based on the building we retrieve out of the array.
                $listRead->setCampusAreaBasedonBuilding($pulledBuilding);

                //Set the area based on the building we retrieve out of the array.
                $listRead->setBuildingAreaBasedonBuilding($pulledBuilding);

                $campus = $listRead->getMainCampusArea();

                $area = $listRead->getLocalizedBuildingArea();

                //Campus TOTALS
                $SE_TOTAL_ASSIGNED='';


                /******************************************
                 * TOTALS       (USED ON THE VERY BOTTOM ROW)
                 ******************************************/
                //Function getBuildingStudentsAssigned() provides the total number of everything.

                $totalStudentsAssigned = $listRead->totalStudentsAssigned($universityHousingBuildings);
                $totalPossibleResidents = $listRead->totalStudentsPossibleResidents($universityHousingBuildings);
                $totalResidencyPossiblePercentage = $listRead->createPercentage($totalStudentsAssigned, $totalPossibleResidents, 2);
                $completeTotalStaffAssigned = $listRead->totalStaffAssigned($universityHousingBuildings);
                $totalBuildingCapacity= $listRead->totalBuildingCapacity($universityHousingBuildings);

                /***********************************************
                 * END TOTALS       (USED ON BOTTOM ROW)
                 **********************************************/


                //HeaderRow for EAST
                if ($campus != " ") {
                    //New Row
                    echo "<tr class='expand_SUBROW'>\n";
                    //Campus
                    echo "<td style=''>";
                    //Add Arrow
                    echo "<img src='images/arrow.png' style='margin-left:-70px;' class='initialArrow' id='arrowFirst-east_Group'/> ";
                    //End Add Arrow

                    echo $campus;               //East
                    echo "&nbsp;";            //If I don't specify the campus area, at the very least leave a blank space.
                    //close datacell
                    echo "</td>\n";

                    //Create an area for under "Area", it is stated SE & NE
                    echo "<td>";
                    echo "SE & NE";
                    echo "</td>\n";
                    //End Create an area for under "Area" it is stated SE & NE.

                    //Create an area for under "Complex", it is stated AFC & QUAD.
                    echo "<td>";
                    echo "AFC & QUAD";
                    echo "</td>\n";
                    //End Create an area for under "Area" it is stated AFC& QUAD.

                    //Create an area for under "Building", it will be a " " [space]
                    echo "<td>";
                    echo "";
                    echo "</td>\n";
                    //End Create an area for under "Building", it will be a " " [space]

                    //Create an area for under "Students Assigned", it will be the total number of Southeast & Northeast
                    echo "<td>";
                    $studentsAssigned_ByCampus_EAST=$listRead->getStudentsAssignedByCampus($universityHousingBuildings,$campus);
                    echo $studentsAssigned_ByCampus_EAST;
                    echo "</td>\n";
                    //End Create an area for under "Students Assigned", it will be the total number of Southeast & Northeast.

                    //Create an area for under "Total Possible Resident Occupancy", it will be the total number of Southeast & Northeast for total possible Residents.
                    echo "<td>";
                    $totalPossibleResidentOccupancy_ByCampus_EAST=$listRead->getTotalPossibleResidentsByCampus($universityHousingBuildings,$campus);
                    echo $totalPossibleResidentOccupancy_ByCampus_EAST;
                    echo "</td>\n";
                    //End Create an area for under "Total Possible Resident Occupancy"...

                    //Create a percentage for Resident Occupancy for the East Campus
                    echo "<td>";
                    $ResidentOccupancyPercentage_EAST_CAMPUS= $listRead->createPercentage($studentsAssigned_ByCampus_EAST,$totalPossibleResidentOccupancy_ByCampus_EAST,2);
                    echo $ResidentOccupancyPercentage_EAST_CAMPUS;
                    echo "</td>\n";
                    //End creating a percentage for Resident Occupancy.

                    //Create a percentage for Resident Occupancy for the East Campus
                    echo "<td>";
                    $staffCapacity_EAST_CAMPUS=$listRead->totalStaffCapacityByCampus($universityHousingBuildings,"East");

                    echo $staffCapacity_EAST_CAMPUS;

                    echo "</td>\n";
                    //End creating a percentage for Resident Occupancy.

                    //Total Building Capacity for East Campus...
                    echo "<td>";
                    //$totalBuildingCapacity_EAST_CAMPUS=$listRead->totalStaffCapacityByCampus($universityHousingBuildings,"East");

                    //(totalBuildingCapacityByArea) must be South East & East
                    $totalBuildingCapacity_SE=$listRead->totalBuildingCapacityByArea($universityHousingBuildings,"Southeast");
                    $totalBuildingCapacity_NE=$listRead->totalBuildingCapacityByArea($universityHousingBuildings,"Northeast");

                    //Create a summation of Southeast & Northeast.
                    $totalBuildingCapacity_EAST_CAMPUS = ($totalBuildingCapacity_SE+$totalBuildingCapacity_NE);
                    echo $totalBuildingCapacity_EAST_CAMPUS;
                    echo "</td>";
                    //End total building capacity for East Campus...


                    echo "<td>";
                    $eastCampusTotalBuildingPercentage = $listRead->createPercentage($studentsAssigned_ByCampus_EAST,$totalBuildingCapacity_EAST_CAMPUS, 2);

                    echo $eastCampusTotalBuildingPercentage;

                    echo "</td>";
                    //create 1 new table blanks for a new row.
                    //for ($x = 0; $x < 1; $x++) {
                    //    echo "<td>";
                    //    echo "&nbsp;";
                    //    echo "</td>\n";
                   // }
                    //drop down the row...
                    echo "</tr>\n";

                    //Create new row
                    //This row shows the Southeast ROW
                    echo "<tr class='auto-hide building-elements-EastGroup'> \n";

                    //Add two more blank rows.
                    //create 1 new table blanks
                    for ($x = 0; $x < 1; $x++) {
                        echo "<td>&nbsp;</td>\n";
                    }
                }


                /**
                 * PRINT AREA SUB TOTALS
                 */

//Southeast
                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "AFC - A") {


                    //Check area...
                    echo "<td> \n";

                    //Add Arrow
                    echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-southeast_Group'/> ";
                    //End Add Arrow

                    //Check Area
                    //South east area....

                    // No link.
                    //echo $area;


                    $pulledBuilding;

                    //If the person clicks the area link, we're not going to worry about specific building being displayed.
                    //Below is causing problems with the data.


                    if($area!=''){
                        $complexArea='Area Filter Applied';
                        $pulledBuildingforDetailedLink='Area Filter Applied';

                    }

                    //Make sure the Southeast Region is properly showing "Avent Ferry Complex".
                    else if($area="Southeast"){
                        //$complexArea="Avent Ferry Complex";
                    }
                    else{
                        $pulledBuilding=$pulledBuilding;
                    }


                    //Link available...
                    //Use GET variables for the time being.
                    //echo "<a href='building_information_detailed.php?campus=$campus&area=$area&complex=$complexArea&building=$pulledBuilding' target='blank' onclick="window.open('print.html', 'newwindow', 'width=300, height=250'); return false;">";

                    //Add Link to pull detailed report about Gender & Classification Information

                    //echo "<script style='text/javascript'>";
                    //echo "function openforSoutheast(){
                    //            var myWindow = window.open('building_information_detailed.php?campus=$campus&area=$area&complex=$complexArea&building=$pulledBuildingforDetailedLink', '_blank','resizable=no, menubar=no,toolbar=yes,width=715, height=900');
                    //        }
                    //</script>";

                    ?>

                    <script style='text/javascript'>
                        var pulledCampus;
                        var pulledArea;
                        var pulledComplex;
                        var pulledBuilding;
                        pulledCampus ="<?php echo $campus?>";
                        pulledArea="<?php echo $area?>";
                        pulledComplex="<?php echo $complexArea?>";
                        pulledBuilding="<?php echo $pulledBuilding?>";
                    </script>

                    <!--Need to create a function that tallies up numbers for Southeast Area-->
                    <!--Commented out on 10 14 2015-->
                    <!--<a href='#' target='blank' onclick='return openforBuildingInformation(pulledCampus,pulledArea,pulledComplex,pulledBuilding);'>-->

                        <?php
                    //temporarily comment out.
                    echo $area;

                    //Temporarily comment out...
                    //echo "</a>";


                    //Setboolean to false
                    $area_NotAlreadyPrinted = false;

                    //close datacell
                    echo "</td> \n";

                    //Skip next two columns
                    for ($x = 0; $x <= 1; $x++) {
                        echo "<td> \n";
                        echo "&nbsp;";
                        echo "</td> \n";

                    }
                    //End skip columns

                    //Provide total students assigned for the Area
                    echo "<td class='subHeadersPerArea'> \n";
                    //new
                    $studentsAssigned = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, $area);
                    echo $studentsAssigned;
                    //end new


                    echo "</td> \n";
                    //End provide Students Assigned for the Area
                    //Provide Total Possible Resident Occupancy
                    echo "<td class='subHeadersPerArea'> \n";

                    //Provide a Total Number of those staying in SouthEast, NorthEast, etc.
                    $totalPossibleResidentOccupancyByArea = $listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, $area);
                    echo $totalPossibleResidentOccupancyByArea;
                    //new
                    echo "</td> \n";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'> \n";
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleResidentOccupancyByArea, 2);
                    echo "</td> \n";
                    //End Total Resident Occupancy %

                    //Read Staff Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    $totalStaffPerSegment = $listRead->totalStaffCapacityByArea($universityHousingBuildings,$area);
                    echo $totalStaffPerSegment;
                    echo "</td> \n";
                    //End Staff Capacity

                    //Total Building Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    // echo "total bldg capacity";
                    //getting everything in array
                    //$totalPossibleBuildingOccupancy = $listRead->totalBuildingCapacity($universityHousingBuildings, $area);
                    //echo "hi".$totalPossibleBuildingOccupancy;

                    //new
                    $totalPossibleBuildingOccupancyBasedOnArea = $listRead->totalBuildingCapacityByArea($universityHousingBuildings, $area);
                    echo $totalPossibleBuildingOccupancyBasedOnArea;
                    //end new

                    echo "</td> \n";
                    //End Total Building Capacity

                    //Total Bldg Capacity Percentage
                    echo "<td class='subHeadersPerArea'> \n";
                    //Below is a percentage of the total building capacity.
                    //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
                    //be in a particular building.

                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleBuildingOccupancyBasedOnArea, 2);

                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                     echo "</tr>\n";
                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "Southeast, etc"

//Northeast


                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "Bagwell") {

                    //Add new row
                    //Start of the "Northeast" area of campus.
                    //This shows the complex area of campus.
                    echo "<tr class='auto-hide building-elements-EastGroup'> \n";



                    //Set Campus set to Blank
                    echo "<td>";
                    echo "";
                    echo "</td>";


                    //Check area...
                    echo "<td> \n";

                    //Add Arrow
                    echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-northeast_Group'/> ";
                    //End Add Arrow


                    //Check Area
                    echo $area;     //Northeast

                    //Setboolean to false
                    $area_NotAlreadyPrinted = false;

                    //close datacell
                    echo "</td> \n";

                    //Skip next two columns
                    for ($x = 0; $x <= 1; $x++) {
                        echo "<td> \n";
                        echo "&nbsp;";
                        echo "</td> \n";

                    }
                    //End skip columns


                    //Provide total students assigned for the Area
                    echo "<td class='subHeadersPerArea'>";
                    $studentsAssigned = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, $area);
                    echo $studentsAssigned;
                    echo "</td>";
                    //End provide Students Assigned for the Area
                    //Provide Total Possible Resident Occupancy
                    echo "<td class='subHeadersPerArea'>";
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, $area);
                    echo $totalPossibleResidentOccupancyByBuilding;
                    echo "</td>";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'>";
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleResidentOccupancyByBuilding, 2);
                    echo "</td>";
                    //End Total Resident Occupancy %

                    //Staff Capacity
                    echo "<td class='subHeadersPerArea'>";
                    //Northeast Staff
                    $totalStaffPerSegment = $listRead->totalStaffCapacityByArea($universityHousingBuildings,$area);
                    echo $totalStaffPerSegment;
                    echo "</td>";
                    //End Staff Capacity

                    //Total Building Capacity
                    echo "<td class='subHeadersPerArea'>";

                    $totalPossibleBuildingOccupancyBasedOnArea = $listRead->totalBuildingCapacityByArea($universityHousingBuildings, $area);

                    echo $totalPossibleBuildingOccupancyBasedOnArea;
                    echo "\n </td>";
                    //End Total Building Capacity

                    //Total Bldg Capacity Percentage
                    echo "<td class='subHeadersPerArea'>";
                    //Below is a percentage of the total building capacity.
                    //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
                    //be in a particular building.
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleBuildingOccupancyBasedOnArea, 2);
                    echo "</td>";
                    //End total Bldg Capacity Percentage

                    //drop down the row...
                    echo "</tr>";
                }//end printing of the area "Northeast, etc"

//TriTowers & TOTA Grouped Together
              if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "Bowen") {

                  echo "<tr class='expand_SUBROW'>";

                    //Check campus
                    echo "<td>";
                    //Add Arrow
                    echo "<img src='images/arrow.png'  title='click to expand and collapse data' style='margin-left: -58px;' class='initialArrow' id='arrowFirst-central_Group'/> ";
                    //End Add Arrow
                    echo "Central";
                    echo "</td>";

                    //Check area...
                    echo "<td> \n";

                    //Check Area
                    //echo $area;           //Don't need to repeat
                    echo " ";
                    //Setboolean to false
                    $area_NotAlreadyPrinted = false;

                    //close datacell
                    echo "</td> \n";


                    //Information displayed for the "COMPLEX" Area.

                    echo "<td>";
                            echo "Tri-Towers & TOTA";
                    echo "</td>";

                    //Skip next 1 columns
                    //This is where the BUILDING HEADER is located, UNDER CENTRAL CAMPUS.
                    for ($x = 0; $x < 1; $x++) {
                        echo "<td> \n";
                        echo " ";
                        echo "</td> \n";

                    }
                    //End skip columns

                    //Provide total students assigned for the Area
                    echo "<td class='subHeadersPerArea'> \n";
                        $studentsAssigned = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, $area);
                        echo $studentsAssigned;
                    echo "</td> \n";

                    //End provide Students Assigned for the Area
                    //Provide Total Possible Resident Occupancy
                    echo "<td class='subHeadersPerArea'> \n";
                            $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, $area);
                            echo $totalPossibleResidentOccupancyByBuilding;
                    echo "</td> \n";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'> \n";
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleResidentOccupancyByBuilding, 2);
                    echo "</td> \n";
                    //End Total Resident Occupancy %

                    //Staff Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    //Tri-Towers & TOTA grouped together
                    $totalStaffPerSegment = $listRead->totalStaffCapacityByArea($universityHousingBuildings,$area);
                    echo $totalStaffPerSegment;
                    echo "</td> \n";
                    //End Staff Capacity

                    //Total Building Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    // echo "total bldg capacity";
                    //getting everything in array
                    //$totalPossibleBuildingOccupancy = $listRead->totalBuildingCapacity($universityHousingBuildings, $area);
                    //echo "hi".$totalPossibleBuildingOccupancy;

                    //new
                    $totalPossibleBuildingOccupancyBasedOnArea = $listRead->totalBuildingCapacityByArea($universityHousingBuildings, $area);
                    echo $totalPossibleBuildingOccupancyBasedOnArea;
                    //end new

                    echo "</td> \n";
                    //End Total Building Capacity

                    //Total Bldg Capacity Percentage
                    echo "<td class='subHeadersPerArea'> \n";
                    //Below is a percentage of the total building capacity.
                    //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
                    //be in a particular building.
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleBuildingOccupancyBasedOnArea, 2);
                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>\n";

                    //Add new row
                    //This shows the complex area of campus.
                    echo "<tr> \n";

                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "Southeast, etc"


//West Campus
                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "Lee") {
                    echo "<tr class='expand_SUBROW'>";
                    //Check campus
                    echo "<td>";
                    //Add Arrow
                    echo "<img src='images/arrow.png' style='margin-left:-68px;' class='initialArrow' id='arrowFirst-west_Group'/> ";
                    //End Add Arrow

                    echo "West";      //Specifically State "West" Campus & the area will be "West as well
                    echo "</td>";

                    //Check area...
                    echo "<td> \n";

                    //Check Area
                    //echo $area;           //Removing Area, as the Excel Spreadsheet did not list an area for Lee,Sullivan & Bragaw.

                    //Setboolean to false
                    $area_NotAlreadyPrinted = false;

                    //close datacell
                    echo "</td> \n";

                    //Skip next two columns
                    for ($x = 0; $x <= 1; $x++) {
                        echo "<td> \n";
                        echo "&nbsp;";
                        echo "</td> \n";

                    }
                    //End skip columns

                    //Provide total students assigned for the Area
                    echo "<td class='subHeadersPerArea'> \n";
                    $studentsAssigned = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, $area);
                    echo $studentsAssigned;
                    echo "</td> \n";
                    //End provide Students Assigned for the Area
                    //Provide Total Possible Resident Occupancy
                    echo "<td class='subHeadersPerArea'> \n";
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, $area);
                    echo $totalPossibleResidentOccupancyByBuilding;
                    echo "</td> \n";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'> \n";
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleResidentOccupancyByBuilding, 2);
                    echo "</td> \n";
                    //End Total Resident Occupancy %

                    //Staff Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    //West Campus
                        $totalStaffPerSegment = $listRead->totalStaffCapacityByArea($universityHousingBuildings,$area);
                        echo $totalStaffPerSegment;
                    echo "</td> \n";
                    //End Staff Capacity

                    //Total Building Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    // echo "total bldg capacity";
                    //getting everything in array
                    //$totalPossibleBuildingOccupancy = $listRead->totalBuildingCapacity($universityHousingBuildings, $area);
                    //echo "hi".$totalPossibleBuildingOccupancy;

                    //new
                    $totalPossibleBuildingOccupancyBasedOnArea = $listRead->totalBuildingCapacityByArea($universityHousingBuildings, $area);
                    echo $totalPossibleBuildingOccupancyBasedOnArea;
                    //end new

                    echo "</td> \n";
                    //End Total Building Capacity

                    //Total Bldg Capacity Percentage
                    echo "<td class='subHeadersPerArea'> \n";
                    //Below is a percentage of the total building capacity.
                    //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
                    //be in a particular building.
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleBuildingOccupancyBasedOnArea, 2);
                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>\n";

                    //Add new row
                    //This shows the complex area of campus.
                    echo "<tr> \n";

                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "West, etc"

//End Residence Halls
//Start Apartments
//Wolf Ridge Apartments

                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "WR Grove") {
                    echo "<tr class='expand_SUBROW'>";
                    //Check campus
                    echo "<td>";
                    //Add Arrow
                    echo "<img src='images/arrow.png' style='margin-left:-30px;' class='initialArrow' id='arrowFirst-apartments'/> ";
                    //End Add Arrow
                    echo "Apartments";

                    echo "</td>";

                    //Check area...
                    echo "<td> \n";

                    //Check Area
                    //echo $area;           //Removing Area, as the Excel Spreadsheet did not list an area for Lee,Sullivan & Bragaw.

                    //Setboolean to false
                    $area_NotAlreadyPrinted = false;

                    //close datacell
                    echo "</td> \n";


                    echo "<td>";
                    echo "Wolf Ridge & Wolf Village";
                    echo "</td>";


                    //Skip next 1 columns
                    for ($x = 0; $x < 1; $x++) {
                        echo "<td> \n";
                        echo "&nbsp;";
                        echo "</td> \n";

                    }
                    //End skip columns

                    //Provide total students assigned for the Area
                    echo "<td class='subHeadersPerArea'> \n";

                    //Provides "Wolf Ridge" As the Area specified is "Wolf Ridge"...
                    $studentsAssigned_WolfRidge = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, $area);

                    //Provides "Wolf Village" as the area we are now specifically stating that we need is Wolf Village.
                    $studentsAssigned_WolfVillage = $listRead->getStudentsAssignedByBuilding($universityHousingBuildings, "Wolf Village");

                    //Combined Apartments Assigned value
                    $studentsAssigned_ALL_APARTMENTS = ($studentsAssigned_WolfRidge+$studentsAssigned_WolfVillage);


                    //Print out what is in students Assigned in Wolf Ridge.
                    //Comment out ...
                    //echo $studentsAssigned_WolfRidge;

                    //Comment out ...
                    //echo $studentsAssigned_WolfVillage;

                    //Print out total assignments for ALL apartments (Wolf Ridge & Wolf Village).
                    echo $studentsAssigned_ALL_APARTMENTS;

                    //Close students assigned table cell.
                    echo "</td> \n";
                    //End provide Students Assigned for the Area
                    //Provide Total Possible Resident Occupancy
                    echo "<td class='subHeadersPerArea'> \n";

                    //Total for Wolf Ridge:
                    $totalPossibleResidentOccupancyByBuilding_WolfRidge = $listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, $area);

                    //Total for Wolf Village:
                    $totalPossibleResidentOccupancyByBuilding_WolfVillage=$listRead->getTotalPossibleResidentOccupancyByArea($universityHousingBuildings, "Wolf Village");

                    //Summation of WolfRidge & WolfVillage for Total Possible Resident Occupancy.
                    $totalPossibleResidentOccupancy_ApartmentsWR_WV=($totalPossibleResidentOccupancyByBuilding_WolfRidge+$totalPossibleResidentOccupancyByBuilding_WolfVillage);


                    echo $totalPossibleResidentOccupancy_ApartmentsWR_WV;

                    //Remember to remove this item ... 09 21 2015 ...
                    //Commented out on 09 21 2015 @ 11:34am.
                    //echo "Total Possible Resident Occ";

                    echo "</td> \n";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'> \n";

                    //Total Percentage of the Resident Occupancy for Wolf Ridge and Wolf Village Apartments
                    $percentageResidentOccupancy_Wolf_Ridge_And_Wolf_Village = ($listRead->createPercentage($studentsAssigned_ALL_APARTMENTS,  $totalPossibleResidentOccupancy_ApartmentsWR_WV, 2));

                    //Check if 100%, and re-format the value.
                        if($percentageResidentOccupancy_Wolf_Ridge_And_Wolf_Village="1.00%"){
                            //Shorten the string to just "1".
                            $newPERCENTAGE_WOLF_RIDGE_WOLF_VILLAGE_RESIDENT_OCCUPANCY = (substr($percentageResidentOccupancy_Wolf_Ridge_And_Wolf_Village,0,1)."00%");

                            echo $newPERCENTAGE_WOLF_RIDGE_WOLF_VILLAGE_RESIDENT_OCCUPANCY;

                        }else{
                            echo $percentageResidentOccupancy_Wolf_Ridge_And_Wolf_Village;

                        }





                    echo "</td> \n";
                    //End Total Resident Occupancy %

                    //Staff Capacity
                    echo "<td class='subHeadersPerArea'> \n";

                   //Wolf Ridge Apartments
                    $totalStaff_WolfRidge_Apartments = $listRead->totalStaffCapacityByArea($universityHousingBuildings,$area);
                    $totalStaff_WolfVillage_Apartments = $listRead->totalStaffCapacityByArea($universityHousingBuildings,"Wolf Village");

                    $totalStaff_For_WolfRidge_And_Wolf_Village = ($totalStaff_WolfRidge_Apartments+$totalStaff_WolfVillage_Apartments);

                    //Display the Total Staff Assigned for the Wolf Ridge & Wolf Village Apartments.
                    echo $totalStaff_For_WolfRidge_And_Wolf_Village;


                    echo "</td> \n";
                    //End Staff Capacity

                    //Total Building Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    //The Total Building Capacity for both Wolf Ridge
                    //and Wolf Village Apartments.

                    $totalPossibleBuildingOccupancyBasedOnArea = $listRead->totalBuildingCapacityByArea($universityHousingBuildings, $area);
                    $totalPossibleBuildingOccupancyBasedOnArea_WV= $listRead->totalBuildingCapacityByArea($universityHousingBuildings, "Wolf Village");

                    $totalPossibleBuildingOccupancy_WolfRidge_WolfVillageTogether = ($totalPossibleBuildingOccupancyBasedOnArea+$totalPossibleBuildingOccupancyBasedOnArea_WV);

                    echo $totalPossibleBuildingOccupancy_WolfRidge_WolfVillageTogether;
                    //end new

                    echo "</td> \n";
                    //End Total Building Capacity

                    //Total Bldg Capacity Percentage
                    echo "<td class='subHeadersPerArea'> \n";
                    //Below is a percentage of the total building capacity.
                    //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
                    //be in a particular building.
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleBuildingOccupancyBasedOnArea, 2);
                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>\n";

                    //Add new row
                    //This shows the complex area of campus.
                    echo "<tr> \n";

                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "Wolf Ridge Apartments, etc"
                // Above code is for the subtotal of Wolf Ridge & Wolf Village apartments.


                //Check complexes
                $listRead->setComplexBasedonBuilding($pulledBuilding);      //Get correct value based on the building.

                //Provide the "complex" information....
                $complexArea = $listRead->getComplexBasedonBuilding();

                //This also provides the collapsible arrow to hide and expand information for the particular sections.
                $buildingListed = $listRead->getComplexBasedonBuilding();


                //The below IF statement specifies which complexes are shown under the
                //"complex" column of the dash board.
                //Complexes are listed as
                //Avent Ferry Complex, Wood, Quad, Tri Towers, West (Not true complex), Wolf Ridge & Wolf Village
                if ($buildingListed == "Avent Ferry Complex" || $buildingListed == "Wood" || $buildingListed == "Quad" || $buildingListed == "Tri Towers" || $buildingListed == "TOTA" || $buildingListed == "West"|| $buildingListed == "Wolf Ridge"|| $buildingListed == "Wolf Village") {

                    //Create new row element
                    //Displays the COMPLEX
                    //Important ROW...

                    //Check Areas.... & Complexes and Hide them initially based on which row is being displayed.

                    //Check Southeast Area
                    if ($area == "Southeast") {
                        echo "<tr class='auto-hide building-elements-SoutheastGroup'>";
                    } //Check Northeast Area
                    else if ($area == "Northeast") {
                        echo "<tr class='auto-hide building-elements-NortheastGroup'>";
                    }

                    //For the Central Area
                            //Add ID for Tri-Towers
                            else if ($buildingListed == "Tri Towers") {
                                echo "<tr class='auto-hide building-elements-CentralGroup'>";
                            }
                            //Add ID for TOTA
                            else if ($buildingListed == "TOTA") {
                                echo "<tr class='auto-hide building-elements-CentralGroup'>";
                            }
                    //For the "West" Area
                            //Lee Residence Hall
                            //Sullivan Residence Hall
                            //Bragaw Residence Hall
                            else if ($buildingListed == "West") {
                                echo "<tr class='auto-hide building-elements-West'>";
                            }

                     //For the Wolf Ridge & Wolf Village Apartments
                     //Wolf Ridge Segment
                     else if ($buildingListed=="Wolf Ridge"){
                         echo "<tr class='auto-hide building-elements-apartment_WolfRidge'>";
                     }
                     //Wolf Village Segment
                     else if ($buildingListed=="Wolf Village"){
                         echo "<tr class='auto-hide building-elements-WolfVillage'>";

                     }
                     //End adding classes to teh "West" side of campus.

                    else {
                        echo "<tr> \n";
                    }
                    //Add two more blank rows data.
                    //create 2 new table blanks for a new row.
                    for ($x = 0; $x < 2; $x++) {
                        echo "<td> \n";
                        echo "&nbsp;";
                        echo "</td> \n";
                    }

                    $area_NotAlreadyPrinted = true;


                    //Complex
                    echo "<td style='text-align:left;'> \n";

                    //Start specific tagging based on the Complex.
                    if ($complexArea == "Avent Ferry Complex") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-afc'/> ";
                    } else if ($complexArea == "Wood") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-wood'/> ";
                    } else if ($complexArea == "Quad") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-quad'/> ";
                    } else if ($complexArea == "Tri Towers") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-tritowers'/> ";
                    } else if ($complexArea == "TOTA") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-tota'/> ";
                    } else if ($complexArea == "West") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-west'/> ";
                    }
                    //Check Wolf Ridge
                    else if ($complexArea == "Wolf Ridge") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-wolf_ridge'/> ";
                    }
                    //Check Wolf Village
                    else if ($complexArea == "Wolf Village") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-wolf_village'/> ";
                    }

                    //If no Complexes are listed....(West,Tri-Towers, AFC, etc.)
                    else {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst'/> ";
                    }
                    //
                    echo $complexArea;     //Retrieve the correct complex
                    //End Complexes
                    echo "\n</td>\n";

                    /*Subtotals for TRI-Towers, TOTA & WEST AREAS OF CAMPUS*/

                    //BUILDING
                    //Add blank for Building Sub Header
                    echo "<td>";
                    echo "&nbsp; ";
                    echo "</td>";

                    //Students Assigned
                    echo "<td>";
                            //Subtotals for the complexes....
                            //Complexes being AFC/QUAD/Tri-Towers/WR or WV

                            //The array name is universityHousingBuildings...
                            //Get the students assigned based on the complex they reside in... (i.e. student assignments for Tri-Towers, TOTA & West Campus
                            $studentsAssigned_ByComplex = $listRead->getStudentsAssignedByComplexName($universityHousingBuildings,$complexArea);
                            echo $studentsAssigned_ByComplex;
                    echo "</td>";


                    echo "<td>";
                    //Total possible resident occupancy for complexes
                    $totalPossibleResidentOccupancyByComplex = $listRead->getTotalPossibleResidentOccupancyByComplex($universityHousingBuildings, $complexArea);
                    echo $totalPossibleResidentOccupancyByComplex;
                    echo "</td>";
                    //End total possible resident occupancy for complexes


                    //Resident Occupancy Percentage for complex (Avent Ferry Complex, Wood, etc).
                    echo "<td>";
                    //Below function creates a percentage....
                    echo $listRead->createPercentage($studentsAssigned_ByComplex, $totalPossibleResidentOccupancyByComplex, 2);
                    echo "</td>";

                    //Staff Capacity for individual complexes
                    echo "<td>";
                    //Staff
                    $totalStaffPerComplex = $listRead->totalStaffCapacityByComplex($universityHousingBuildings,$complexArea);
                    echo $totalStaffPerComplex;
                    echo "</td>";
                    //End Staff Capacity for individual complexes

                    //Total Building Capacity for individual complexes

                    echo "<td>";
                    $totalPossibleBuildingOccupancyBasedOnComplex = $listRead->totalBuildingCapacityByComplex($universityHousingBuildings,$complexArea);
                    echo $totalPossibleBuildingOccupancyBasedOnComplex;
                    echo "</td>";
                    //End total building capacity for individual complexes


                    //Total Building Percentage for complex (e.g. AFC, Wood, TOTA, etc.)
                    echo "<td>";
                    //echo "total building percentage...";
                    //echo "<br/>";
                    echo $listRead->createPercentage($studentsAssigned_ByComplex, $totalPossibleBuildingOccupancyBasedOnComplex, 2);
                    echo "</td>";
                    //End Total Building Percentage for Buildings

                    echo "</tr>";
                }//Close IF statement that specifically looks for the top Row that indicates the correct building to show


//Close Complex Block.

                //Pull Buildings (AFC - B, AFC - E, AFC - F)
                if ($listRead->getComplexBasedonBuilding() == " ") {
                    //Add two new blanks
                    for ($x = 0; $x < 1; $x++) {
                        echo "<td>";
                        echo "&nbsp;";
                        echo "</td>";
                    }
                    //Building
                    echo "<td> \n";
                    echo $pulledBuilding;
                    echo "</td> \n";
                    //Students Assigned
                    echo "<td> \n";
                    echo $listRead->getBuildingStudentsAssigned();
                    echo "</td> \n";
                    //Total Possible Resident Occupancy
                    echo "<td> \n";
                    echo $listRead->getBuildingTotalOccupancy_Resident();
                    echo "</td> \n";
                    //Resident Occupancy %
                    echo "<td> \n";
                    //Set to Two Decimal Places
                    echo $listRead->createPercentage($listRead->getBuildingStudentsAssigned(), $listRead->getBuildingTotalOccupancy_Resident(), 2);
                    echo "</td> \n";
                    //Staff Capacity
                    echo "<td> \n";
                    echo $listRead->getStaffCapacity();
                    echo "</td> \n";
                    //Total Building Capacity
                    echo "<td> \n";
                    echo $listRead->getBuildingTotalCapacity();
                    echo "</td> \n";
                    //Total Building Capacity Percent (%)
                    echo "<td> \n";
                    //Set to Two Decimal Places
                    echo $listRead->createPercentage($listRead->getBuildingStudentsAssigned(), $listRead->getBuildingTotalCapacity(), 2);

                    echo "</td> \n";
                    //Close new row.
                    echo "</tr> \n";
                } //Start of sub-totaling the "Complex" #s, (i.e. Avent Ferry Complex, Wood, etc.)
                else {


                    //Then create the new data.
                    //New Row
                    //This row starts the beginning of the building items, (i.e. AFC - A, Wood -A)...
                    //But only the first row, i.e AFC - A, Wood - A, Bagwell


                    //start
                    //Special IDs for AFC
                    if ($listRead->getBuildingName() == "AFC - A" || $listRead->getBuildingName() == "AFC - B" || $listRead->getBuildingName() == "AFC - E" || $listRead->getBuildingName() == "AFC - F") {
                        echo "<tr class='auto-hide building-elements-afc'>";
                    } //Special IDs for Wood
                    elseif ($listRead->getBuildingName() == "Wood - A" || $listRead->getBuildingName() == "Wood - B") {
                        echo "<tr class='auto-hide building-elements-wood'>";
                    } //Special IDs for QUAD
                    elseif ($listRead->getBuildingName() == "Bagwell" || $listRead->getBuildingName() == "Becton" || $listRead->getBuildingName() == "Berry" || $listRead->getBuildingName() == "Gold" || $listRead->getBuildingName() == "Welch" || $listRead->getBuildingName() == "Syme" || $listRead->getBuildingName() == "Watauga" || $listRead->getBuildingName() == "North") {
                        echo "<tr class='auto-hide building-elements-quad'>";
                    } //Special IDs for TRI-TOWERS
                    elseif ($listRead->getBuildingName() == "Bowen" || $listRead->getBuildingName() == "Carroll" || $listRead->getBuildingName() == "Metcalf") {
                        echo "<tr class='auto-hide building-elements-tritowers'>";
                    } //Special IDs for TOTA
                    elseif ($listRead->getBuildingName() == "Tucker" || $listRead->getBuildingName() == "Owen" || $listRead->getBuildingName() == "Turlington" || $listRead->getBuildingName() == "Alexander") {
                        echo "<tr class='auto-hide building-elements-tota'>";
                    } //Special IDs for West Campus
                    elseif ($listRead->getBuildingName() == "Lee" || $listRead->getBuildingName() == "Sullivan" || $listRead->getBuildingName() == "Bragaw") {
                        echo "<tr class='auto-hide building-elements-west'>";
                    }
                    //Special IDs for Wolf Ridge Apartments
                    elseif ($listRead->getBuildingName() == "WR Grove" || $listRead->getBuildingName() == "WR Innovat" || $listRead->getBuildingName() == "WR Lakeview"|| $listRead->getBuildingName() == "WR Plaza"|| $listRead->getBuildingName() == "WR Tower"|| $listRead->getBuildingName() == "WR Valley") {
                        echo "<tr class='auto-hide building-elements-apartment_wolf_ridge'>";
                    }

                    //img#arrowFirst-wolf_ridge

                    //Special IDs for Wolf Village Apartments
                    elseif ($listRead->getBuildingName() == "Wolf Vlg A" || $listRead->getBuildingName() == "Wolf Vlg B" || $listRead->getBuildingName() == "Wolf Vlg C"|| $listRead->getBuildingName() == "Wolf Vlg D"|| $listRead->getBuildingName() == "Wolf Vlg E"|| $listRead->getBuildingName() == "Wolf Vlg F"|| $listRead->getBuildingName() == "Wolf Vlg G"|| $listRead->getBuildingName() == "Wolf Vlg H") {
                        echo "<tr class='auto-hide building-elements-apartment_wolf_village'>";
                    }

                    else {
                        echo "<tr id='building-elements' class=''>";

                    }
                    //end


                    //Campus
                    echo "\n<td>\n";
                    echo "&nbsp;";
                    echo "\n</td>\n";

                    //Area
                    echo "\n<td>\n";
                    echo "&nbsp;";
                    echo "\n</td>\n";

                    //Complex
                    echo "\n<td>\n";
                    //Check complexes
                    //Already completed...
                    echo "&nbsp;";

                    //End Complexes
                    echo "\n</td>\n";



                    //Building
                    echo "<td>\n";
                    //echo 'testtesttest'.$pulledBuilding;

                    //test

                    //Temporary comment out ..
                    //echo "test test test";
                    //Add the clickable link for detailed information about the building..
                        //Add necessary Javascript Below



                        //Add Pop-Up file---10-20-2015

                        include('includes/pop-up-test.php');

                        //End Pop-Up file -- 10-20-2015

                        ?>

                <!--Temporarily Comment out 10-20-2015-->
                        <script style='text/javascript'>
                        /*    var pulledCampustemp;
                            var pulledCampustemp ='<?php // echo $campus?>';
                            //for testing and debugging
                            //console.log(pulledCampusTest);
                            var pulledBuildingtemp;
                            var pulledBuildingtemp = '<?php // echo $pulledBuilding?>';

                            var TEMP_TEMP;
                            var lengthOFBUILDING_ARRAY  = pulledBuildingArray.length;

                            //Set the campus area....
                            setCampus(pulledCampustemp);

                            //Set the building pulled
                            setBuilding(pulledBuildingtemp);

                            //Get the building in the JS Array.
                            TEMP_TEMP=getBuilding(pulledBuildingtemp);

                            //Find out the current size of the array.

                            //Temporarily comment out as it is moved online.
                            //console.log(pulledBuildingtemp);
                            //console.log(lengthOFBUILDING_ARRAY);
                        */
                        </script>
                <!--End Temporarily Commenting out the above Javascript-->
                    <?php

                    //Use this separate file to provide the correct building needed in the link popup.
                        include('includes/detailedBuilding_pulledBuilding.php');
                    //end separate file

                    //Display the Pulled Building in the link.
                        echo $pulledBuilding;
                        echo "test test";

                    //End adding the clickable link....


                    echo "\n</td>\n";
                    //Students Assigned
                    echo "<td>\n";
                    echo $listRead->getBuildingStudentsAssigned();
                    echo "\n</td>\n";
                    //Total Possible Resident Occupancy
                    echo "<td>\n";
                    echo $listRead->getBuildingTotalOccupancy_Resident();
                    echo "\n</td>\n";
                    //Resident Occupancy %
                    echo "<td>\n";
                    //Set to Two Decimal Places
                    echo $listRead->createPercentage($listRead->getBuildingStudentsAssigned(), $listRead->getBuildingTotalOccupancy_Resident(), 2);
                    echo "\n</td>\n";
                    //Staff Capacity
                    echo "<td>\n";
                    echo $listRead->getStaffCapacity();
                    echo "\n</td>\n";
                    //Total Building Capacity
                    echo "<td>\n";
                    echo $listRead->getBuildingTotalCapacity();
                    echo "\n</td>\n";
                    //Total Building Capacity Percent (%)
                    echo "<td>\n";
                    //Set to Two Decimal Places
                    echo $listRead->createPercentage($listRead->getBuildingStudentsAssigned(), $listRead->getBuildingTotalCapacity(), 2);
                    echo "\n</td>\n";
                    //Close new row.
                    echo "</tr>\n";
                }//close else statement
            }//close foreach


            /**
             *  TOTALS
             */
            //New foreach


                //Get  complete totals for west central and east
                //New Row
                echo "<tr class='complete-totals'>";

                echo "<td>";
                echo "TOTAL";
                echo "</td>";

                //Skip 3 Columns (Area,Complex & Building)
                for ($x = 0; $x <= 2; $x++) {
                    echo "<td>";
                    echo "&nbsp;";
                    echo "</td>";
                }

                //Students Assigned Total
                echo "<td>";
                    echo $totalStudentsAssigned;
                echo "</td>";
                //End Students Assigned

                //Total of TOTAL Possible Resident Occupancy
                echo "<td>";
                    echo $totalPossibleResidents;
                echo "</td>";
                //End Total of TOTAL Possible Residents Occupancy

                //Resident Percentage TOTAL
                echo "<td>";
                echo $totalResidencyPossiblePercentage;
                echo "</td>";
                //End Resident Percentage Total

                //Staff Capacity Total
                echo "<td>";
                //Overall totals
                echo $completeTotalStaffAssigned;
                echo "</td>";
                //End Staff Capacity Total

                //Total of Total Building Capacity
                echo "<td>";
                echo $totalBuildingCapacity;
                echo "</td>";
                //End Total of Total Building Capacity

                //Total BUILDING CAPACITY UTILIZED (%)
                echo "<td>";
            //Below is a percentage of the total building capacity.
            //This takes the total ASSIGNED STUDENTS and DIVIDES the TOTAL MAXIMUM POSSIBLE people can
            //be in a particular building.
            echo $listRead->createPercentage($totalStudentsAssigned, $totalBuildingCapacity, 2);
                echo "</td>";
                //End Total BUILDING CAPACITY UTILIZED (%)

            echo "</tr>";//End New Row
            //End Get Totals

            ?>
            </tbody>
        </table>
    </div>

    <div id="footer">
            <span style="font-weight:bold;">NC State University Housing</span> Copyright &copy; 2015  <br/>
        1112 Pullen Hall, Raleigh, NC 27695 | Phone: (919) 515-2440 | Fax: (919) 831-3542 |

    </div>
</div>
</html>
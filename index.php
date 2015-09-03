<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 8/31/2015
 * Time: 10:10 AM
 */

//Retrieve the buildingOccupancy Class.
include('classes/buildingOccupancy.php');

//Create new buildingOccupancy object.
$myBuildingOccupancy = new buildingOccupancy();

//Create an array of buildingObjects....
$totalHousingPicture = array();


//What is in buildingOccupancy by default.

//var_dump($myBuildingOccupancy);

//create a new object.


//Create an Array that will be my collection of buildingOccupancy objects.

$universityHousingBuildings = array("AFC_A" => "", "AFC_B" => "", "AFC_E" => "", "AFC_F" => "");


//Avent Ferry
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
$universityHousingBuildings['Bowen'] = new buildingOccupancy("Bowen", "Central", 295, 304, "", "8", 312);
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


//var_dump ($universityHousingBuildings);

?>
<!DOCTYPE html>
<html>
<head>
    <title>IN DEVELOPMENT</title>
    <!--Internal Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--Using new PURE CSS for this project-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <!--Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Javascript Imports-->
    <script src="scripts/autoHide.js"></script>
    <script src="scripts/jQueryRotate.js"></script>
    <!--End Javascript Imports-->
</head>

<!--Main Container-->
<div id="container">


    <!--Left-->
    <div id="left">
        &nbsp;

    </div>

    <!--Middle-->
    <div id="middle">
        &nbsp;
    </div>

    <!--Right-->
    <div id="right">
        <table class="pure-table pure-table-horizontal">
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


                /**
                 * TOTALS       (USED ON BOTTOM ROW)
                 */
                //Function getBuildingStudentsAssigned() provides the total number of everything.

                $totalStudentsAssigned = $listRead->totalStudentsAssigned($universityHousingBuildings);
                $totalPossibleResidents = $listRead->totalStudentsPossibleResidents($universityHousingBuildings);
                $totalResidencyPossiblePercentage = $listRead->createPercentage($totalStudentsAssigned, $totalPossibleResidents, 2);

               $totalBuildingCapacity= $listRead->totalBuildingCapacity($universityHousingBuildings);

                /*
                 * END TOTALS       (USED ON BOTTOM ROW)
                 */


                if ($campus != " ") {
                    //New Row
                    echo "<tr>\n";
                    //Campus
                    echo "<td>";
                    echo $campus;               //East
                    echo "&nbsp;";            //If I don't specify the campus area, at the very least leave a blank space.
                    //close datacell
                    echo "</td>\n";

                    //create 9 new table blanks for a new row.
                    for ($x = 0; $x <= 8; $x++) {
                        echo "<td>";
                        echo "&nbsp;";
                        echo "</td>\n";
                    }
                    //drop down the row...
                    echo "</tr>\n";

                    //Create new row
                    echo "<tr> \n";

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
                    echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-southeast_Group'/>";
                    //End Add Arrow

                    //Check Area
                    echo $area;

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
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByBuilding($universityHousingBuildings, $area);
                    echo $totalPossibleResidentOccupancyByBuilding;
                    //new
                    echo "</td> \n";
                    //End Total Possible Resident Occupancy

                    //Total Resident Occupancy %
                    echo "<td class='subHeadersPerArea'> \n";
                    echo $listRead->createPercentage($studentsAssigned, $totalPossibleResidentOccupancyByBuilding, 2);
                    echo "</td> \n";
                    //End Total Resident Occupancy %

                    //Staff Capacity
                    echo "<td class='subHeadersPerArea'> \n";
                    echo "Staff Capacity Totals";
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
                    echo "test";
                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>\n";

                    //Add new row
                    //This shows the complex area of campus.
                    echo "<tr> \n";

                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "Southeast, etc"

//Northeast
                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "Bagwell") {
                    //Check area...
                    echo "<td> \n";


                    //Add Arrow
                    echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-northeast_Group'/>";
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
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByBuilding($universityHousingBuildings, $area);
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
                    echo "Staff Capacity Totals";
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
                    echo "test";
                    echo "</td>";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>";
                }//end printing of the area "Northeast, etc"

//TriTowers & TOTA Grouped Together
                if ($area != " " && $area_NotAlreadyPrinted && $pulledBuilding == "Bowen") {
                    //Check campus
                    echo "<td>";
                    echo "Central";
                    echo "</td>";

                    //Check area...
                    echo "<td> \n";

                    //Check Area
                    //echo $area;           //Don't need to repeat

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
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByBuilding($universityHousingBuildings, $area);
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
                    echo "Staff Capacity Totals";
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
                    echo "test";
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
                    //Check campus
                    echo "<td>";
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
                    $totalPossibleResidentOccupancyByBuilding = $listRead->getTotalPossibleResidentOccupancyByBuilding($universityHousingBuildings, $area);
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
                    echo "Staff Capacity Totals";
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
                    echo "test";
                    echo "</td> \n";
                    //End total Bldg Capacity Percentage


                    //drop down the row...
                    echo "</tr>\n";

                    //Add new row
                    //This shows the complex area of campus.
                    echo "<tr> \n";

                    $area_NotAlreadyPrinted = true;


                }//end printing of the area "Southeast, etc"

                //Check complexes
                $listRead->setComplexBasedonBuilding($pulledBuilding);      //Get correct value based on the building.

                //Provide the "complex" information....
                $complexArea = $listRead->getComplexBasedonBuilding();

                //This also provides the collapsible arrow to hide and expand information for the particular sections.
                $buildingListed = $listRead->getComplexBasedonBuilding();


                if ($buildingListed == "Avent Ferry Complex" || $buildingListed == "Wood" || $buildingListed == "Quad" || $buildingListed == "Tri Towers" || $buildingListed == "TOTA" || $buildingListed == "West") {

                    //Create new row element
                    //Displays the COMPLEX
                    //Important ROW...

                    //Check Areas....

                    //Check Southeast Area
                    if ($area == "Southeast") {
                        echo "<tr class='auto-hide building-elements-SoutheastGroup'>";
                    } //Check Northeast Area
                    else if ($area == "Northeast") {
                        echo "<tr class='auto-hide building-elements-NortheastGroup'>";
                    } else {

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
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-afc'/>";
                    } else if ($complexArea == "Wood") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-wood'/>";
                    } else if ($complexArea == "Quad") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-quad'/>";
                    } else if ($complexArea == "Tri Towers") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-tritowers'/>";
                    } else if ($complexArea == "TOTA") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-tota'/>";
                    } else if ($complexArea == "West") {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst-west'/>";
                    } else {
                        echo "<img src='images/arrow.png' class='initialArrow' id='arrowFirst'/>";

                    }
                    //


                    echo $complexArea;     //Retrieve the correct complex
                    //End Complexes
                    echo "\n</td>\n";

                    //Add 7 more blanks.
                    for ($x = 0; $x <= 6; $x++) {
                        echo "<td>";
                        echo "&nbsp;";
                        echo "</td>";
                    }
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
                    } else {
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
                    echo $pulledBuilding;
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


            //New foreach


                //Get totals
                //New Row
                echo "<tr>";

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
                echo "Staff Capacity Total";
                echo "</td>";
                //End Staff Capacity Total

                //Total of Total Building Capacity
                echo "<td>";
                echo $totalBuildingCapacity;
                echo "</td>";
                //End Total of Total Building Capacity

                //Total BUILDING CAPACITY UTILIZED (%)
                echo "<td>";
                echo "TOTAL OF TOTAL BUILDING CAPACITY %%%";
                echo "</td>";
                //End Total BUILDING CAPACITY UTILIZED (%)






            echo "</tr>";//End New Row
            //End Get Totals

            ?>
            </tbody>
        </table>
    </div>

</div>
</html>
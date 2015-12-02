<?php
/**
 * DATE: NOVEMBER 10 2015....
 * THIS HAS BEEN REPLACED WITH SCRIPTS/configure_pop_up_for_specified_building_area.js!!!!
 * THIS IS NOT USED IN THE INDEX.PHP PAGE.
 */






/**
 * User: jjwill10
 * Date: 10/20/2015
 * Time: 10:15 AM
 * Description: The below file generates the necessary Javascript to create a new pop-up that provides the end-user with the specified building criteria:
 *  Campus = East, West
 *  Area = Southeast, Northeast
 *  Complex (i.e. Avent Ferry Complex)
 *  Building = AFC - A, AFC - B, Bagwell, etc.
 *  UPDATED 11/06/2015 -- Removed writing to the console for output.
 */

//Write Javascript via PHP
echo "<script style='text/javascript'>";
//New Line
echo "\n";
//Set JS variables.
echo "var pulledCampustemp;";
//New Line
echo "\n";
echo "var pulledBuildingtemp;";

//New Line
echo "\n";
echo "var pulledCampus;";



//New Line
echo "\n";

//Assign initial values.
//pulledCampustemp
echo "pulledCampustemp='';";
//New Line
echo "\n";
//pulledBuildingtemp
echo "pulledBuildingtemp='';";
//New Line
echo "\n";

//pulledBuilding
echo "pulledBuilding='';";
//New Line
echo "\n";

echo "var TEMP_TEMP;";

//New Line
echo "\n";
echo "var lengthOFBUILDING_ARRAY=pulledBuildingArray.length;";

//New Line
echo "\n";

//Display the length of the array.
//Commented out on 11/06/2015.
//echo "console.log(lengthOFBUILDING_ARRAY)";

//New Line
echo "\n";

/*
 *
 * SET COMPLEXES BASED ON BUILDING AND SEND TO JS FUNCTION.
 */

//Wolf Ridge
$pattern ='/WR/';

$building_TO_COMPARE=json_encode($pulledBuilding);

echo $building_TO_COMPARE;
//New Line
echo "\n";
//New Line
echo "\n";
if($building_TO_COMPARE=="WR Grove"){

    //Set the complex based on the building
    //and return the value to the JS function embedded within the popUpForDetailedList.js within /scripts/popUpForDetailedList.js
    echo "\n";
    echo "setComplex('Wolf Ridge');";

    echo "\n";
    echo "setCampus('West');";

    //new line
    echo "\n";

}else{

}

///Assign the Javascript variable, pulledCampusTemp to the value that is currently in the PHP variable, $campus.
echo "pulledCampustemp=".json_encode($campus).";";
//New Line
echo "\n";
///Assign the Javascript variable, pulledCampusTemp to the value that is currently in the PHP variable, $campus.
echo "pulledBuildingtemp=".json_encode($pulledBuilding).";";
//New Line
echo "\n";

//Set the Campus Area via Javascript...
echo "setCampus(pulledCampustemp);";
//New Line
echo "\n";

//Set the Building pulled
echo "setBuilding(pulledBuildingtemp);";
//New Line
echo "\n";

echo "</script>";
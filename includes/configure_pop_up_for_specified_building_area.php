<?php
/**
 * User: jjwill10
 * Date: 10/20/2015
 * Time: 10:15 AM
 * Description:
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

//Assign initial values.
//pulledCampustemp
echo "pulledCampustemp='';";
//New Line
echo "\n";
//pulledBuildingtemp
echo "pulledBuildingtemp='';";
//New Line
echo "\n";

echo "var TEMP_TEMP;";

//New Line
echo "\n";
echo "var lengthOFBUILDING_ARRAY=pulledBuildingArray.length;";
//New Line
echo "\n";

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
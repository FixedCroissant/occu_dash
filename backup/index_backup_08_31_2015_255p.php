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
$aventFerryA = new buildingOccupancy("AFC - A","SE",98,108);


//Create an Array that will be my collection of buildingOccupancy objects.

$aventFerryTotalGroup = array ("AFC_A"=>"","AFC_B"=>"","AFC_E"=>"","AFC-F"=>"");


//Assign aventFerry B to the first element in the array.
/*
$aventFerryTotalGroup['AFC_A']= new buildingOccupancy("AFC - A","SE",112,114);
$aventFerryTotalGroup['AFC_B']= new buildingOccupancy("AFC - B","SE",112,114);
$aventFerryTotalGroup['AFC_E']= new buildingOccupancy("AFC - E","SE",198,216);
$aventFerryTotalGroup['AFC_F']= new buildingOccupancy("AFC - F","SE",115,150);




var_dump ($aventFerryTotalGroup);


//Get specific information
echo $aventFerryTotalGroup['AFC_B']->getBuildingStudentsAssigned();





//Lets get the building Assignment Numbers.
$aventFerryA_BuildingNumberAssigned = $aventFerryA->getBuildingStudentsAssigned();
//Get Resident Total Capacity
$aventFerryA_Resident_BuildingTotalPossible = $aventFerryA->getBuildingTotalOccupancy_Resident();
//Lets try using the getPercentage function....
$aventFerryA_Resident_OccupancyPercentage = $aventFerryA->createPercentage($aventFerryA_BuildingNumberAssigned,$aventFerryA_Resident_BuildingTotalPossible,2);

//Set Staff Capacity....(initially set to 0).
$aventFerryA->setStaffCapacity("3");       //Changed to 3

$aventFerryA_StaffCapacity = $aventFerryA->getStaffCapacity();

$aventFerryA->setBuildingTotalCapacity("111");   //Set the total building capacity to 15, originall just blank on the creation of a new buildingOccupancy.

//Get the total building Capacity for Avent Ferry A.
$aventFerryA_TotalBuildingCapacity = $aventFerryA->getBuildingTotalCapacity();

//Get the Total Building % based on the maximum the building can hold.
$aventFerryA_TotalBuidingCapacity = $aventFerryA->createPercentage($aventFerryA_BuildingNumberAssigned,$aventFerryA_TotalBuildingCapacity,2);


?>


<html>
<head>
    <title>IN DEVELOPMENT</title>
    <!--Internal Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--Using new PURE CSS for this project-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>

<!--Main Container-->
<div id ="container">


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
    <tr>
    <td>Southeast</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <!--End blank row-->
    <!--Start first data row-->
    <tr>
    <!--Avent Ferry Subtotal-->
    <td>&nbsp;</td>
    <td>Avent Ferry: <span style="font-weight:bold;">Subtotal to be added</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <!--First Building and Data Elements -->
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp; </td>
        <td>AFC - A</td>
        <td><?php echo $aventFerryA_BuildingNumberAssigned; ?></td>
        <td><?php echo $aventFerryA_Resident_BuildingTotalPossible; ?></td>
        <td><?php echo $aventFerryA_Resident_OccupancyPercentage; ?></td>
        <td><?php echo $aventFerryA_StaffCapacity;?></td>
        <td><?php echo $aventFerryA_TotalBuildingCapacity; ?></td>
        <td><?php echo $aventFerryA_TotalBuidingCapacity; ?></td>
    </tr>


    </tbody>
</table>
</div>

</div>
</html>
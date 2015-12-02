<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/22/2015
 * Time: 8:48 AM
 */

//Use room availability
//Start a new readAssignments data type....
include('classes/studentAssignments.php');

//Start a new class that will preform queries...
include('classes/queryRead.php');





//Production
/*
//Receive information from the following file:
include('log-on/psdb_PROD.php');
*/

//READ 3 DIFFERENT VIEWS.
include('read_data_testing.php');
//Above is pulling from 3 different Oracle views.



//Comment out
//On 10-01-2015
/*
$peopleSoftStatement = oci_parse($databaseConnection_LOCALHOST,$query);

//Define the variables and attach the columns/fields in the database view or table
//with pre-defined variables.

oci_define_by_name($peopleSoftStatement,'BUILDING',$building_NAME);     //Building Name _ Alexander, Owen, Turlington, etc.
oci_define_by_name($peopleSoftStatement,'RESIDENT_CAPACITY',$resident_capacity_Of_Building);      //The Total Capacity of the Building that are set aside for student residents.
oci_define_by_name($peopleSoftStatement,'CAPACITY',$totalCapacityOfBuilding);   //The Total Capacity tha the building can hold. Regardless of whether the beds are available for students.

oci_define_by_name($peopleSoftStatement,'ASSIGNED',$assignedRooms);           //The Total Assigned Rooms in the Building
oci_define_by_name($peopleSoftStatement,'STAFF',$staffAssigned);           //The total staff assigned in the the building.


//Execute the Query...
oci_execute($peopleSoftStatement);

//Get Number of Rows
//$numrows = oci_fetch_all($peopleSoftStatement,$trueResults);
*/


//Create an array of Collection(s)
$studentAssignmentCollection = array();

//Each fetch populates the previously defined variables with the next row's data...

//while (oci_fetch($peopleSoftStatement)) {

//Instead put the data from the database into an array....
foreach ($collectionOfData as $key=>$value) {
    //Building Name.
    $building_NAME = $key;

    //Total Capacity
    $totalCapacityOfBuilding= $collectionOfData[$key][0];

    //Assigned Students
    $assignedRooms=$collectionOfData[$key][1];

    //Staff Members
    $staffAssigned=$collectionOfData[$key][2];

    //Total Possible Resident Occupancy
    $resident_capacity_Of_Building = ($totalCapacityOfBuilding-$staffAssigned);

    //Write message to the user
    //with the information that is provided in the "Room_Availability" table.
    //echo "The building name: " . "<strong>" . $building_NAME . "</strong>" . " has a total capacity of:" . $capacity_Of_Building . "and an assigned number of" . $assignedRooms;
    //echo "<br/>";

        //Create new object
        //Temporary comment out...
        $studentAssignments = new studentAssignments($building_NAME,$totalCapacityOfBuilding ,$resident_capacity_Of_Building, $assignedRooms);


        //Check if its a group.
        $studentAssignments->createGroup($building_NAME);
        //Set Staff Amount
        $studentAssignments->setStaffCapacity($staffAssigned);

        //Set Order number
        $myOrderNumber=$studentAssignments->getBuildingOrder();

        //Assign to the Array
        //Temporarily comment out.
        $studentAssignmentCollection [] = $studentAssignments;

        //$studentAssignmentCollection ['number'] = array($myOrderNumber);
}//Close while

//Re-Arrange Array
//Name of the array is studentAssignmentCollection!!

//Sort the studentsAssignmentCollection by their order ID, which is based of where they need to go
//in the table/grid.

function sortByOrderNumber($a,$b)
{
    return $a->buildingOrder >= $b->buildingOrder;
}

//What's in the array now...
//print_r($studentAssignmentCollection);

//Sort the array of Student Assignment Objects based on their order number.
usort($studentAssignmentCollection,"sortByOrderNumber");





//Iterate through the array
foreach($studentAssignmentCollection as $collection){
    //echo print_r($collection);

    //Retrieve building name...
    $building = $collection->getbuildingName();
    //Retrieve building Group (if any)...
    $buildingGROUP = $collection->getBuildingGroup();
    //Get student residents possible capacity...
    $residentbuildingCapacity = $collection->getTotalPossibleResidentCapacity();
    //Get the total amount possible of capacity regardless of whether or not the rooms are meant for students.
    $completebuildingCapacity = $collection->getBuildingCapacity();
    //Get Assignment Numbers...
    $assignedResidents = $collection->getResidentAssignments();
    //Get Staff
    $assignedStaff = $collection->getStaffAssignments();

    //echo $building . $residentbuildingCapacity . $completebuildingCapacity. $buildingGROUP . $assignedResidents;


    //echo $test;

    //echo "<br/>";



    //Start AFC
    if($building=="AFC - A") {
    $universityHousingBuildings['AFC_A'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);

    }
     else if($building=="AFC - B") {
        $universityHousingBuildings['AFC_B'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
     }
     else  if($building=="AFC - E") {
    $universityHousingBuildings['AFC_E'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
    }
     else if($building=="AFC - F") {
    $universityHousingBuildings['AFC_F'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
    }
    //End Avent Ferry Complex
    //Start Wood
     else  if($building=="Wood - A") {
        $universityHousingBuildings['Wood_A'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, " ", $assignedStaff,$completebuildingCapacity);
    }
     else  if($building=="Wood - B") {
        $universityHousingBuildings['Wood_B'] = new buildingOccupancy($building, "Southeast", $assignedResidents,$residentbuildingCapacity, " ", $assignedStaff,$completebuildingCapacity);
    }
    //End Wood
    //Start QUAD

     else if($building=="Bagwell") {
            $universityHousingBuildings['Bagwell'] = new buildingOccupancy($building, "Northeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
    }


        else if($building=="Becton") {
               $universityHousingBuildings['Becton'] = new buildingOccupancy($building, "Northeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
       }

        else if($building=="Berry") {
          $universityHousingBuildings['Berry'] = new buildingOccupancy($building, "Northeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
       }
       //End QUAD

       //Triad
       //Gold
        else if($building=="Gold"){
               $universityHousingBuildings['Gold'] = new buildingOccupancy($building, "Northeast",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //Welch
       else if($building=="Welch"){
               $universityHousingBuildings['Welch'] = new buildingOccupancy($building, "Northeast",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //Syme
       else    if($building=="Syme"){
               $universityHousingBuildings['Syme'] = new buildingOccupancy($building, "Northeast",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //Nortauga
       else    if($building=="Watauga"){
               $universityHousingBuildings['Watauga'] = new buildingOccupancy($building, "Northeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       else    if($building=="North"){
               $universityHousingBuildings['North'] = new buildingOccupancy($building, "Northeast", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //End of Northeast



       //Start of Central
       //TriTowers
           if($building=="Bowen"){
               $universityHousingBuildings['Bowen'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Carroll"){
               $universityHousingBuildings['Carroll'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Metcalf"){
               $universityHousingBuildings['Metcalf'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //End of TriTowers
       //Start of TOTA
           if($building=="Tucker"){
           $universityHousingBuildings['Tucker'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
               }
           if($building=="Owen"){
               $universityHousingBuildings['Owen'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Turlington"){
               $universityHousingBuildings['Turlington'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Alexander"){
               $universityHousingBuildings['Alexander'] = new buildingOccupancy($building, "Central",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //End of TOTA



       //End of Central
       //Start of West Campus
           if($building=="Lee"){
               $universityHousingBuildings['Lee'] = new buildingOccupancy($building, "West",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Sullivan"){
               $universityHousingBuildings['Sullivan'] = new buildingOccupancy($building, "West",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Bragaw"){
               $universityHousingBuildings['Bragaw'] = new buildingOccupancy($building, "West",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //End West Campus

       //Start Apartments
       //Wolf Ridge Apartments
           if($building=="WR Grove"){
               $universityHousingBuildings['WR_Grove'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="WR Innovat"){
               $universityHousingBuildings['WR_Innovat'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="WR Lakevw"){
               //Set WR Lakevw to WR Lakeview
               //DEVELOPMENT ONLY.
               $building="WR Lakeview";               

               $universityHousingBuildings['WR_Lakevw'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="WR Plaza"){
               $universityHousingBuildings['WR_Plaza'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="WR Tower"){
               $universityHousingBuildings['WR_Tower'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="WR Valley"){
               $universityHousingBuildings['WR_Valley'] = new buildingOccupancy($building, "Wolf Ridge",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
       //End Wolf Ridge Apartments

       //Start Wolf Village Apartments
           if($building=="Wolf Vlg A"){
               $universityHousingBuildings['Wolf Vlg A'] = new buildingOccupancy($building, "Wolf Village", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg B"){
               $universityHousingBuildings['Wolf Vlg B'] = new buildingOccupancy($building, "Wolf Village", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg C"){
               $universityHousingBuildings['Wolf Vlg C'] = new buildingOccupancy($building, "Wolf Village",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg D"){
               $universityHousingBuildings['Wolf Vlg D'] = new buildingOccupancy($building, "Wolf Village",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg E"){
               $universityHousingBuildings['Wolf Vlg E'] = new buildingOccupancy($building, "Wolf Village",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg F"){
               $universityHousingBuildings['Wolf Vlg F'] = new buildingOccupancy($building, "Wolf Village",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg G"){
               $universityHousingBuildings['Wolf Vlg G'] = new buildingOccupancy($building, "Wolf Village", $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           if($building=="Wolf Vlg H"){
               $universityHousingBuildings['Wolf Vlg H'] = new buildingOccupancy($building, "Wolf Village",  $assignedResidents,$residentbuildingCapacity, "", $assignedStaff,$completebuildingCapacity);
           }
           //end test




}//close foreach

//End Connect to Oracle Database

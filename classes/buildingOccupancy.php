<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 8/31/2015
 * Time: 10:11 AM
 * Description:
 */

/**
 * @class Class buildingOccupancy
 */
class buildingOccupancy {


    /**
     * @param string $buildingName
     * @param string $buildingArea
     * @param string $buildingStudentsAssigned
     * @param string $buildingTotalPossibleOccupancy
     * @param string $residentOccupancyPercentage
     * @param string $staffCapacity
     * @param string $totalBuildingCapacity
     * @param string $totalBuildingCapacityPercentage
     * @param string $complex
     * @param string $campus
     */

    //Variables
    var $buildingName;  //building name.
    var $buildingArea;
    var $buildingStudentsAssigned;
    var $buildingTotalPossibleResidentOccupancy;        //Specifically for Residents
    var $buildingTotalPossibleOccupancy;                //The maximum amount the building can hold.
    var $complex;                                        //If a location is grouped, for instance AFC-A & AFC-B is a part of Avent Ferry Complex... the complex will be called Avent Ferry Complex.

    var $providedComplexByBuilding;

    var $campus;

    var $residentOccupancyPercentage;
    var $staffCapacity;
    var $totalBuildingCapacityPercentage;

    var $totalSearched_StudentAssignments_ByCampusArea;     /*Student assignments based on campus area, east/west*/
    var $totalSearched_StudentAssignments_ByComplexArea;    /*Student assignments based on complex area.*/

    //Boolean Flag to stop printing the area
    var $area_AlreadyPrinted;

    //Totals
    var $studentsAssignedtotalsByArea;
    var $totalPossibleResidentOccupancy;
    var $totalPossibleBuildingCapacity;             //This provides everything, regardless of whether it is within Southeast, Northeast, etc.
    var $totalSearchedAreaTotalBuildingCapacity;     //New function is created called totalBuildingCapacityByArea() that will provide a sum of all
                                                    // total building capacity based on the area that is provided. (Areas are: Southeast, Northeast, TriTowers
                                                    //TOTA.
                                                    //This really only applies to Residence Halls.
    var $totalSearchedAreaTotalStaffCapacity;      //Provides the total of staffing per segment area (Avent Ferry Complex, or Southeast, or Wood, or Northeast).



    //Create Construction for Building Occupancy...
    function buildingOccupancy ($buildingName="", $buildingArea="",$buildingStudentsAssigned="",$buildingTotalPossibleOccupancy="",$residentOccupancyPercentage="",$staffCapacity="0",$totalBuildingCapacity="",$totalBuildingCapacityPercentage="",$complex="",$campus=""){
        $this->setBuildingName($buildingName);  //Set the building Name default to AFC-A.
        $this->setBuildingArea($buildingArea);  // Set the area by default to SE.
        $this->setBuildingStudentsAssigned($buildingStudentsAssigned); //Set initially by default, buildingNumber assigned to 0.
        $this->setBuildingResidentTotalOccupancy($buildingTotalPossibleOccupancy);  //Set the buildingTotal (maximum possible occupancy) initially by default to 0.
        $this->setResidencyOccupancyPercentageInitial($residentOccupancyPercentage);
        $this->setStaffCapacity($staffCapacity);
        $this->setBuildingTotalCapacity($totalBuildingCapacity);
        $this->setComplex($buildingName);                   //Use the building name to assign the Complex Area.
        $this->setMainCampusArea($buildingName);
    }



    function setMainCampusArea($buildingLocation){
        //Check Avent Ferry Complex.
        if($buildingLocation=="AFC - A"||$buildingLocation=="AFC - B"||$buildingLocation=="AFC - E"||$buildingLocation=="AFC - F"){
            $this->campus="East";
        }
        //Check Wood Residential Halls
        if ($buildingLocation=="Wood - A" ||$buildingLocation=="Wood - B"){
            $this->campus="East";
        }
        //Check Quad, Bagwell, Becton & Berry
        if ($buildingLocation=="Bagwell" ||$buildingLocation=="Becton"||$buildingLocation=="Berry"){
            $this->campus="East";
        }
        //Triad - Gold, Welch, Syme
        if ($buildingLocation=="Gold" ||$buildingLocation=="Welch"||$buildingLocation=="Syme"){
            $this->campus="East";
        }
        //Nortauga - North Hall & Watauga
        if ($buildingLocation=="North" ||$buildingLocation=="Watauga"){
            $this->campus="East";
        }

        //Check Tri-Towers
        if ($buildingLocation=="Bowen" ||$buildingLocation=="Carroll"||$buildingLocation=="Metcalf"){
            $this->campus="Central";
        }
        //Check TOTA
        if ($buildingLocation=="Tucker" ||$buildingLocation=="Owen"||$buildingLocation=="Turlington"||$buildingLocation=="Alexander"){
            $this->campus="Central";
        }








    }
    //Setter
    function setBuildingName($newBuildingName){
        $this->buildingName=$newBuildingName;
    }
    //Setter
    function setBuildingArea($newBuildingArea){
        $this->buildingArea=$newBuildingArea;
    }
    //Based on the value provided, the function will change
    //the the localized area.
    function setBuildingAreaBasedonBuilding($buildingNameProvided){
        if($buildingNameProvided=="AFC - A"||$buildingNameProvided=="AFC - B"||$buildingNameProvided=="AFC - E"||$buildingNameProvided=="AFC - F"){
            $newAREA = "Southeast";
            $this->buildingArea=$newAREA;
        }
        //Wood Residence Hall
        if($buildingNameProvided=="Wood - A"||$buildingNameProvided=="Wood - B"){
            //Only want the Southeast area to show above Avent Ferry Complex.
            $newAREA = "Southeast";
            $this->buildingArea=$newAREA;
        }
        //Bagwell Residence Hall
        if($buildingNameProvided=="Bagwell"){
            $newAREA = "Northeast";
            $this->buildingArea=$newAREA;
        }
        //Becton Residence Hall
        if($buildingNameProvided=="Becton"){
            $newAREA = "Northeast";
            $this->buildingArea=$newAREA;
        }
        //Berry Residence Hall
        if($buildingNameProvided=="Berry"){
            $newAREA = "Northeast";
            $this->buildingArea=$newAREA;
        }
        //Wolf Ridge Apartments
        if($buildingNameProvided=="WR Grove"){
            $newAREA="Wolf Ridge";
            $this->buildingArea=$newAREA;
        }

        //Wolf Village Apartments
        if($buildingNameProvided=="Wolf Vlg A"){
            $newArea = "Wolf Village";
            $this->buildingArea=$newArea;

        }

        //Fraternity & Sorority Life
        if($buildingNameProvided=="Grk Vlg-01"){
            $newArea = "Greek";
            $this->buildingArea=$newArea;
        }
        if($buildingNameProvided=="Grk Vlg-01"){
            $newArea = "Greek";
            $this->buildingArea=$newArea;
        }





    }
    function getTotalStudentsAssignedByArea($areaGiven){
      if($areaGiven=="Southeast"){
          return $this->buildingStudentsAssigned;
        }
        else if($areaGiven=="Northeast"){
            return $this->buildingStudentsAssigned;
        }
        else if($areaGiven=="Central"){
            return $this->buildingStudentsAssigned;
        }


    }



    function totalPossibleResidents($arrayOfObjects,$area){
        //Temporary Array Value
        $tempArray = array();

        foreach($arrayOfObjects as $group){
            $tempArray[] = ($group->getBuildingTotalOccupancy_Resident());
        }
        $arrayTotal =  array_sum($tempArray);
        //Sum the array values and return the value in the function.
        return $this->totalPossibleResidentOccupancy=$arrayTotal;
    }




    function getStudentsAssignedByBuilding($arrayOfObjects,$areaProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Buildings Areas (Southeast, Northeast, TriTowers, TOTA)
            $area = $arrayOfObjects[$key]->getLocalizedBuildingArea();

            $mykey = $key;

            //echo $mykey;
            if($area==$areaProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalAssignedStudentsByArea= $arrayOfObjects[$mykey]->getBuildingStudentsAssigned();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalAssignedStudentsByArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalBuildingCapacity=$arrayTotal;
    }


    function getStudentsAssignedByCampus($arrayOfObjects,$campusProvided){
        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Campus Area (East,Central, Etc)
            $area = $arrayOfObjects[$key]->getMainCampusArea();

            $mykey = $key;

            //echo $mykey;
            if($area==$campusProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalAssignedStudentsByArea= $arrayOfObjects[$mykey]->getBuildingStudentsAssigned();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalAssignedStudentsByArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearched_StudentAssignments_ByCampusArea=$arrayTotal;
    }


    function getStudentsAssignedByComplexName($arrayOfObjects,$complexName){
        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Complex Name ( AFC, Tri Towers, TOTA, West)
            $area = $arrayOfObjects[$key]->getComplex();
            $mykey = $key;

            //echo $mykey;
            if($area==$complexName) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalAssignedStudentsByArea= $arrayOfObjects[$mykey]->getBuildingStudentsAssigned();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalAssignedStudentsByArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearched_StudentAssignments_ByComplexArea=$arrayTotal;
    }





    function getTotalPossibleResidentsByCampus($arrayOfObjects,$campusProvided){
        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Campus Name (East, Central, West)
            $area = $arrayOfObjects[$key]->getMainCampusArea();
            $mykey = $key;

            //echo $mykey;
            if($area==$campusProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalPossibleResidentOccupancyByCampus= $arrayOfObjects[$mykey]->getBuildingTotalOccupancy_Resident();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalPossibleResidentOccupancyByCampus;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearched_StudentAssignments_ByComplexArea=$arrayTotal;
    }



    function getTotalPossibleResidentOccupancyByArea($arrayOfObjects,$areaProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Buildings Areas (Southeast, Northeast, TriTowers, TOTA)
            //Provides the specific area, but NOT the complex the person is located.
            $area = $arrayOfObjects[$key]->getLocalizedBuildingArea();

            $mykey = $key;

            //echo $mykey;
            if($area==$areaProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalPossibleResidentsWithResidents= $arrayOfObjects[$mykey]->getBuildingTotalOccupancy_Resident();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalPossibleResidentsWithResidents;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalBuildingCapacity=$arrayTotal;
    }

    function getTotalPossibleResidentOccupancyByComplex($arrayOfObjects,$complexProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Complex Area (if any) AFC, Wood, etc.
            //Provides the specific area, but NOT the complex the person is located.
            $area = $arrayOfObjects[$key]->getComplex();

            $mykey = $key;

            //echo $mykey;
            if($area==$complexProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalPossibleResidentsWithResidents= $arrayOfObjects[$mykey]->getBuildingTotalOccupancy_Resident();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalPossibleResidentsWithResidents;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalBuildingCapacity=$arrayTotal;
    }

    function totalBuildingCapacityByArea($arrayOfObjects,$areaProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Buildings Areas (Southeast, Northeast, TriTowers, TOTA)
            $area = $arrayOfObjects[$key]->getLocalizedBuildingArea();

            $mykey = $key;

            //echo $mykey;
            if($area==$areaProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
               $totalBuildingCapacityForSearchedArea= $arrayOfObjects[$mykey]->getBuildingTotalCapacity();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalBuildingCapacityForSearchedArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalBuildingCapacity=$arrayTotal;
    }
    function totalBuildingCapacityByComplex($arrayOfObjects,$complexProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Complex area that the building is in (e.g. Avent Ferry Complex or Wood).
            $area = $arrayOfObjects[$key]->getComplex();

            $mykey = $key;

            //echo $mykey;
            if($area==$complexProvided) {
                //Get the Total Building Capacity fro the area specifically looked into...
                $totalBuildingCapacityForSearchedArea= $arrayOfObjects[$mykey]->getBuildingTotalCapacity();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalBuildingCapacityForSearchedArea;
            }else{
                 //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalBuildingCapacity=$arrayTotal;
    }


    function totalStaffCapacityByArea($arrayOfObjects,$areaProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Buildings Areas (Southeast, Northeast, TriTowers, TOTA)
            $area = $arrayOfObjects[$key]->getLocalizedBuildingArea();

            $mykey = $key;

            //echo $mykey;
            if($area==$areaProvided) {
                //Get the Total Staff Capacity fro the area specifically looked into...
                $totalStaffCapacityForSearchedArea= $arrayOfObjects[$mykey]->getStaffCapacity();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalStaffCapacityForSearchedArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalStaffCapacity=$arrayTotal;
    }

    function totalStaffCapacityByCampus($arrayOfObjects,$campusProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Buildings Areas (Southeast, Northeast, TriTowers, TOTA)
            $area = $arrayOfObjects[$key]->getMainCampusArea();

            $mykey = $key;


            if($area==$campusProvided) {
                //Get the Total Staff Capacity fro the area specifically looked into...
                $totalStaffCapacityForSearchedArea= $arrayOfObjects[$mykey]->getStaffCapacity();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalStaffCapacityForSearchedArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalStaffCapacity=$arrayTotal;
    }

    function totalStaffCapacityByComplex($arrayOfObjects,$complexProvided){

        //Temporary Array Value
        $tempArray = array();

        //Easy way to search for all the keys inside the array.
        //Array Name: $arrayofObjects turned into $key...
        foreach($arrayOfObjects as $key => $value)
        {
            //Get the Complex area, like Avent Ferry Complex or Wood, or TOTA, etc.
            $area = $arrayOfObjects[$key]->getComplex();

            $mykey = $key;

            if($area==$complexProvided) {
                //Get the Total Staff Capacity fro the area specifically looked into...
                $totalStaffCapacityForSearchedArea= $arrayOfObjects[$mykey]->getStaffCapacity();
                //Add the amount in TotalBuildingCapacity Element to the temporary array created.
                $tempArray[]= $totalStaffCapacityForSearchedArea;
            }else{
                //echo "<br/>";
                //echo "Item doesn't exist.";
            }

            $arrayTotal=array_sum($tempArray);
        }
        return $this->totalSearchedAreaTotalStaffCapacity=$arrayTotal;
    }



    /**
     * This method provides the total number of students assigned based on an array of buildings provided.
     * @param array $arrayOfObjects
     * @return number
     */
    function totalStudentsAssigned($arrayOfObjects){
        //Temporary Array Value
        $tempArray = array();

        foreach($arrayOfObjects as $group){
            $tempArray[] = ($group->getBuildingStudentsAssigned());
            //var_dump($group->getBuildingStudentsAssigned());
        }

        $arrayTotal =  array_sum($tempArray);

        //Sum the array values and return the value in the function.
        return $this->studentsAssignedtotalsByArea=$arrayTotal;
    }


    /**
     * This method provides the total number of possible residents based on an array of buildings provided.
     * The pamater ($arrayOfObjects) is the list buildings
     * @param array $arrayOfObjects
     * @return number
     */
    function totalStudentsPossibleResidents($arrayOfObjects ){
        //Temporary Array Value
        $tempArray = array();

        foreach($arrayOfObjects as $group){
            $tempArray[] = ($group->getBuildingTotalOccupancy_Resident());
            //var_dump($group->getBuildingStudentsAssigned());
        }

        $arrayTotal =  array_sum($tempArray);

        //Sum the array values and return the value in the function.
        return $this->studentsAssignedtotalsByArea=$arrayTotal;
    }

    /**
     * This method provides the total building capacity of the maximum amount of residents of the particular building.
     * @param $arrayOfObjects
     * @return number
     */
    function totalBuildingCapacity($arrayOfObjects ){
        //Temporary Array Value
        $tempArray = array();

        foreach($arrayOfObjects as $group){
            $tempArray[] = ($group->getBuildingTotalCapacity());
            //var_dump($group->getBuildingStudentsAssigned());
        }

        $arrayTotal =  array_sum($tempArray);

        //Sum the array values and return the value in the function.
        return $this->totalPossibleBuildingCapacity=$arrayTotal;
    }

    /**
     * This method provides the total staff (RAs, RDs, AD, CDs) assigned on campus.
     * @param $arrayOfObjects
     * @return number
     */

    function totalStaffAssigned($arrayOfObjects){
        //Temporary Array Value
        $tempArray = array();

        foreach($arrayOfObjects as $group){
            $tempArray[] = ($group->getStaffCapacity());
            //var_dump($group->getBuildingStudentsAssigned());
        }

        $arrayTotal =  array_sum($tempArray);

        //Sum the array values and return the value in the function.
        return $this->totalPossibleBuildingCapacity=$arrayTotal;

    }



    //End Complete Total Functions



    function setCampusAreaBasedonBuilding($buildingLocation){
        //Check Avent Ferry Complex.
        if($buildingLocation=="AFC - A"){
            $this->campus="East";                       //East is the only one that is being specified for the campus area. All other rows are hard-coded their campus (Central/West/WR Apartments)in the table.
        }
        //Check Avent Ferry Complex.
        if($buildingLocation=="AFC - B"||$buildingLocation=="AFC - E"||$buildingLocation=="AFC - F"){
            $this->campus=" ";
        }
        //Check Wood Residential Halls
        if ($buildingLocation=="Wood - A"||$buildingLocation=="Wood - B"){
            $this->campus=" ";
        }
        //Check Quad, Bagwell, Becton & Berry
        if ($buildingLocation=="Bagwell"){
            $this->campus=" ";
        }

        if ($buildingLocation=="Becton"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Berry"){
            $this->campus=" ";
        }
        //Triad - Gold, Welch, Syme
        if ($buildingLocation=="Gold"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Welch"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Syme"){
            $this->campus=" ";
        }
        //Nortauga - North Hall & Watauga
        if ($buildingLocation=="North"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Watauga"){
            $this->campus=" ";
        }
        //End check QUAD

        //Central Campus
        //Start Tri Towers
        if ($buildingLocation=="Bowen"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Carroll"){
            $this->campus=" ";      // EACH BUILDING MUST BE SET TO SPACE " " IN ORDER FOR LAYOUT TO WORK CORRECTLY.
        }
        if ($buildingLocation=="Metcalf"){
            $this->campus=" ";
        }
        //End TriTowers
        //End Central Campus

        //Start TOTA
        if ($buildingLocation=="Tucker"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Owen"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Turlington"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Alexander"){
            $this->campus=" ";
        }
        //End TOTA
        //Start West Campus
        if ($buildingLocation=="Lee"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Sullivan"){
            $this->campus=" ";
        }
        if ($buildingLocation=="Bragaw"){
            $this->campus=" ";
        }
        //End West Campus

        //Start Apartments
        //WR Grove
        if ($buildingLocation=="WR Grove"){
            $this->campus=" ";
        }
        //WR Innovation
        if ($buildingLocation=="WR Innovat"){
            $this->campus=" ";
        }
        //WR Lakeview
        if ($buildingLocation=="WR Lakeview"){
            $this->campus=" ";
        }

        //WR Plaza
        if ($buildingLocation=="WR Plaza"){
            $this->campus=" ";
        }
        //WR Tower
        if ($buildingLocation=="WR Tower"){
            $this->campus=" ";
        }
        //WR Valley
        if ($buildingLocation=="WR Valley"){
            $this->campus=" ";
        }
        //End Wolf Ridge Apartments

        //Start Wolf Village Apartments
        // Wolf Village A
        if ($buildingLocation=="Wolf Vlg A"){
            $this->campus=" ";
        }
        // Wolf Village B
        if ($buildingLocation=="Wolf Vlg B"){
            $this->campus=" ";
        }
        // Wolf Village C
        if ($buildingLocation=="Wolf Vlg C"){
            $this->campus=" ";
        }
        // Wolf Village D
        if ($buildingLocation=="Wolf Vlg D"){
            $this->campus=" ";
        }
        // Wolf Village E
        if ($buildingLocation=="Wolf Vlg E"){
            $this->campus=" ";
        }
        // Wolf Village F
        if ($buildingLocation=="Wolf Vlg F"){
            $this->campus=" ";
        }
        // Wolf Village G
        if ($buildingLocation=="Wolf Vlg G"){
            $this->campus=" ";
        }
        // Wolf Village H
        if ($buildingLocation=="Wolf Vlg H"){
            $this->campus=" ";
        }
        //End Wolf Village Apartments

        //Start Fraternity & Sorority Life
        if ($buildingLocation=="Grk Vlg-01"){
            $this->campus="Greek";
        }
        //Everything out side of the First Grk Vlg-01 building will add a new sub-row if we put anything other than a " " [SPACE] IN THE
        //campus area.

        else if ($buildingLocation=="Grk Vlg-02"||$buildingLocation=="Grk Vlg-03"||$buildingLocation=="Grk Vlg-04"||$buildingLocation=="Grk Vlg-05"){
            $this->campus=" ";
        }





    }



    function setBuildingStudentsAssigned($buildingStudentsAssigned){
        $this->buildingStudentsAssigned=$buildingStudentsAssigned;
    }
    function setBuildingResidentTotalOccupancy($buildingTotalResidentOccupancy){
        $this->buildingTotalPossibleResidentOccupancy=$buildingTotalResidentOccupancy;
    }

    //This function will establish a blank percentage under the creation of a new object.
    function setResidencyOccupancyPercentageInitial($temporaryPercentageValue){
        $this->residentOccupancyPercentage=$temporaryPercentageValue;
    }

    function setStaffCapacity($newStaffCapacity){
        $this->staffCapacity=$newStaffCapacity;
    }

    function setBuildingTotalCapacity($newCapacityLevel){
        $this->buildingTotalPossibleOccupancy=$newCapacityLevel;
    }

    function setComplexBasedonBuilding($buildingNameProvided){
        //Set Avent Ferry Complex Residence Hall
        if($buildingNameProvided=="AFC - A"){
            $value = "Avent Ferry Complex";
            $this->providedComplexByBuilding=$value;
        }

        //Set Wood Residence Hall
        else if($buildingNameProvided=="Wood - A"){
            $value = "Wood";
            $this->providedComplexByBuilding=$value;
        }
        //Set Quad Group
        else if($buildingNameProvided=="Bagwell"){
            $value = "Quad";
            $this->providedComplexByBuilding=$value;
        }
        //Set TriTowers Group
        else if($buildingNameProvided=="Bowen"){
            $value = "Tri Towers";
            $this->providedComplexByBuilding=$value;
        }
        //End Tri Towers Group
        //Start TOTA Group
        else if($buildingNameProvided=="Tucker"){
            $value = "TOTA";
            $this->providedComplexByBuilding=$value;
        }
        //End TOTA Group

        //WEST CAMPUS
        //Start TOTA Group
        else if($buildingNameProvided=="Lee"){
            $value = "West";
            $this->providedComplexByBuilding=$value;
        }
        //END WEST CAMPUS

        //APARTMENTS
        //Start Apartments
        else if($buildingNameProvided=="WR Grove"){
            $value = "Wolf Ridge";
            $this->providedComplexByBuilding=$value;
        }

        else if($buildingNameProvided=="Wolf Vlg A"){
            $value = "Wolf Village";
            $this->providedComplexByBuilding=$value;
        }
        //END Apartments



        else{
            $this->providedComplexByBuilding="";    //Important to keep no space here.
        }

    }

    function setComplex($buildingProvided){
        if($buildingProvided=="AFC - A"){
            $this->complex="Avent Ferry Complex";
        }
        if($buildingProvided=="AFC - B"){
            $this->complex="Avent Ferry Complex";
        }
        if($buildingProvided=="AFC - E"){
            $this->complex="Avent Ferry Complex";
        }
        if($buildingProvided=="AFC - F"){
            $this->complex="Avent Ferry Complex";
        }

        //Set Wood
        //Wood - A
        if($buildingProvided=="Wood - A"){
            $this->complex="Wood";
        }
        //Wood - B
        if($buildingProvided=="Wood - B"){
            $this->complex="Wood";
        }

        //Set QUAD
        //Bagwell
        if($buildingProvided=="Bagwell"){
            $this->complex="Quad";
        }

        //Becton
        if($buildingProvided=="Becton"){
            $this->complex="Quad";
        }
        //Berry
        if($buildingProvided=="Berry"){
            $this->complex="Quad";
        }
        //Gold
        if($buildingProvided=="Gold"){
            $this->complex="Quad";
        }
        //Welch
        if($buildingProvided=="Welch"){
            $this->complex="Quad";
        }
        //Syme
        if($buildingProvided=="Syme"){
            $this->complex="Quad";
        }
        //Watauga
        if($buildingProvided=="Watauga"){
            $this->complex="Quad";
        }
        //North
        if($buildingProvided=="North"){
            $this->complex="Quad";
        }


        //Set Tri-Towers
        //Bowen
        if($buildingProvided=="Bowen"){
            $this->complex="Tri Towers";
        }
        //Carroll
        if($buildingProvided=="Carroll"){
            $this->complex="Tri Towers";
        }
        //Metcalf
        if($buildingProvided=="Metcalf"){
            $this->complex="Tri Towers";
        }

        //Set TOTA
        //Tucker
        if($buildingProvided=="Tucker"){
            $this->complex="TOTA";
        }
        //Owen
        if($buildingProvided=="Owen"){
            $this->complex="TOTA";
        }
        //Turlington
        if($buildingProvided=="Turlington"){
            $this->complex="TOTA";
        }
        //Alexander
        if($buildingProvided=="Alexander"){
            $this->complex="TOTA";
        }
        //Set West
        //Lee
        if($buildingProvided=="Lee"){
            $this->complex="West";
        }
        //Sullivan
        if($buildingProvided=="Sullivan"){
            $this->complex="West";
        }
        //Bragaw
        if($buildingProvided=="Bragaw"){
            $this->complex="West";
        }

        //End West Complex

        //Set Wolf Ridge Complex
        //WR Grove
        if($buildingProvided=="WR Grove"){
            $this->complex="Wolf Ridge";
        }
        //WR Innovat
        if($buildingProvided=="WR Innovat"){
            $this->complex="Wolf Ridge";
        }
        //WR Lakeview
        if($buildingProvided=="WR Lakeview"){
            $this->complex="Wolf Ridge";
        }
        //WR Plaza
        if($buildingProvided=="WR Plaza"){
            $this->complex="Wolf Ridge";
        }
        //WR Plaza
        if($buildingProvided=="WR Tower"){
            $this->complex="Wolf Ridge";
        }
        //WR Valley
        if($buildingProvided=="WR Valley"){
            $this->complex="Wolf Ridge";
        }
        //End Wolf Ridge Complex

        //Set Wolf Village Complex
        //Wolf Village A
        if($buildingProvided=="Wolf Vlg A"){
            $this->complex="Wolf Village";
        }
        //Wolf Village B
        if($buildingProvided=="Wolf Vlg B"){
            $this->complex="Wolf Village";
        }
        //Wolf Village C
        if($buildingProvided=="Wolf Vlg C"){
            $this->complex="Wolf Village";
        }
        //Wolf Village D
        if($buildingProvided=="Wolf Vlg D"){
            $this->complex="Wolf Village";
        }
        //Wolf Village E
        if($buildingProvided=="Wolf Vlg E"){
            $this->complex="Wolf Village";
        }
        //Wolf Village F
        if($buildingProvided=="Wolf Vlg F"){
            $this->complex="Wolf Village";
        }
        //Wolf Village G
        if($buildingProvided=="Wolf Vlg G"){
            $this->complex="Wolf Village";
        }
        //Wolf Village H
        if($buildingProvided=="Wolf Vlg H"){
            $this->complex="Wolf Village";
        }
        //End Wolf Village

        //Start Fraternity & Sorority Life
        if($buildingProvided=="Grk Vlg-01"){
            $this->complex="Greek";
        }
        else if ($buildingProvided=="Grk Vlg-02"){
            $this->campus="Greek";
        }
        else if ($buildingProvided=="Grk Vlg-03"){
            $this->campus="Greek";
        }
        else if ($buildingProvided=="Grk Vlg-04"){
            $this->campus="Greek";
        }
    }

    function _toString(){
        return $this->buildingArea;

    }

    function getBuildingStudentsAssigned(){
        return $this->buildingStudentsAssigned;
    }
    function getBuildingTotalOccupancy_Resident(){
        return $this->buildingTotalPossibleResidentOccupancy;
    }
    function getBuildingTotalCapacity(){
        return $this->buildingTotalPossibleOccupancy;
    }

    function getMainCampusArea(){
        return $this->campus;
    }

    function getBuildingName(){
        return $this->buildingName;
    }
    function getLocalizedBuildingArea(){
        return $this->buildingArea;
    }


    function getStaffCapacity(){
        return $this->staffCapacity;
    }

    function getComplex(){
        return $this->complex;
    }

    function getComplexBasedonBuilding(){
        return $this->providedComplexByBuilding;
    }

    /**
     * @param $numberOne
     * @param $numberTwo
     * @param $decimalPlaces
     * @return string
     * Description: Creates a percentage based on the two parameters given
     * and will provide a decimal output given the final parameter, $decimalPlaces,
     * to the given number provided.
     */
    function createPercentage($numberOne,$numberTwo,$decimalPlaces){
        //Create a temporary percentage between two numbers.
        $percentage= ($numberOne/$numberTwo);

        //Use number_format function within PHP.
        return number_format($percentage*100,$decimalPlaces).'%';
    }
}
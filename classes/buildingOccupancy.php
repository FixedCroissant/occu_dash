<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 8/31/2015
 * Time: 10:11 AM
 * Description:
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


    function getTotalPossibleResidentOccupancyByBuilding($arrayOfObjects,$areaProvided){

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







    //Complete Totals
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
            $this->campus="East";
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
            $this->campus="&nbsp;";         //By adding a space for Bagwell, the first sub-category
                                            //of QUAD, it allows me to keep the table data and not have my
                                            //columns messed up.
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

    function getMainCampusArea(){
        return $this->campus;
    }

    function getBuildingName(){
        return $this->buildingName;
    }
    function getLocalizedBuildingArea(){
        return $this->buildingArea;
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







    function getStaffCapacity(){
        return $this->staffCapacity;
    }

    function getComplex(){
        return $this->complex;
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



        else{
            $this->providedComplexByBuilding="";    //Important to keep no space here.
        }

    }
    function getComplexBasedonBuilding(){
        return $this->providedComplexByBuilding;
    }


    function createPercentage($numberOne,$numberTwo,$decimalPlaces){
        //Create a percentage
        $percentage= ($numberOne/$numberTwo);

        //Use number_format function within PHP.
        return number_format($percentage,$decimalPlaces,".",",")."%";
    }
}
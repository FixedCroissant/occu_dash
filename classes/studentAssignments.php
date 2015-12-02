<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/22/2015
 * Time: 8:47 AM
 */

class studentAssignments {

    //Variables
    var $buildingAssignment;
    var $studentAssignment;
    var $buildingName;
    var $buildingGroup;
    var $buildingArea;          //The area we will sort, based on the way that database table is sorted. (A-F, i.e. AFC - Wood last)
    var $buildingStudentResidentCapacity;
    var $buildingCapacity;
    var $staffCapacity;
    var $buildingOrder;



    function studentAssignments($buildingName="",$capacityOfBuilding,$capacityOfBuildingOfResidents,$studentsAssigned){
        //Set building name
        $this->setBuildingName($buildingName);
        //Set the building's student resident total capacity
        $this->setStudentPossibleBuildingCapacity($capacityOfBuildingOfResidents);
        //Set the building's total capacity
        $this->setBuildingCapacity($capacityOfBuilding);
        //Set students assigned
        $this->setAssignedResidents($studentsAssigned);

        //Immediately set the are of Campus based
        //on the building provided.
        //Set area
        $this->setOrderbyBuilding($buildingName);


    }

    function setBuildingAssigned($amountToAssign){
        //Set assignments
        $this->buildingAssignment=$amountToAssign;
    }

    function setBuildingName($buildingName){
        $this->buildingName=$buildingName;
    }

    function setAssignedResidents($numberOfResidentsAssigned){
        $this->studentAssignment=$numberOfResidentsAssigned;
    }


    function setStudentPossibleBuildingCapacity($buildingCapacityWithStudentAllocatedBeds){
        $this->buildingStudentResidentCapacity=$buildingCapacityWithStudentAllocatedBeds;
    }
    function setBuildingCapacity($completeBuildingCapacity){
        $this->buildingCapacity=$completeBuildingCapacity;
    }

    function setOrderbyBuilding($buildingName){
        //Set AFC - A
        if(preg_match("/AFC - A/",$buildingName)){
            $this->buildingOrder="0";
        }
        //Set AFC - B
        if(preg_match("/AFC - B/",$buildingName)){
            $this->buildingOrder="1";
        }
        //Set AFC - E
        if(preg_match("/AFC - E/",$buildingName)){
            $this->buildingOrder="2";
        }
        //Set AFC - F
        if(preg_match("/AFC - F/",$buildingName)){
            $this->buildingOrder="3";
        }

        //Set Wood - A
        if(preg_match("/Wood - A/",$buildingName)){
            $this->buildingOrder="4";
        }
        //Set Wood - B
        if(preg_match("/Wood - B/",$buildingName)){
            $this->buildingOrder="5";
        }


        //Set Northeast
        if(preg_match("/Bag/",$buildingName)){
            $this->buildingOrder="6";
        }
        //Set Northeast
        if(preg_match("/Bec/",$buildingName)){
            $this->buildingOrder="7";
        }
        //Set Northeast
        if(preg_match("/Berr/",$buildingName)){
            $this->buildingOrder="8";
        }
        //Set Northeast
        if(preg_match("/Gol/",$buildingName)){
            $this->buildingOrder="9";
        }
        //Set Northeast
        if(preg_match("/Wel/",$buildingName)){
            $this->buildingOrder="10";
        }
        //Set Northeast
        if(preg_match("/Syme/",$buildingName)){
            $this->buildingOrder="11";
        }
        //Set Northeast
        if(preg_match("/Wat/",$buildingName)){
            $this->buildingOrder="12";
        }
        //Set Northeast
        if(preg_match("/North/",$buildingName)){
            $this->buildingOrder="13";
        }
        //Set Central
        //Set Tri-Towers Area
        //Set Northeast
        if(preg_match("/Bow/",$buildingName)){
            $this->buildingOrder="14";
        }
        //Set Central
        if(preg_match("/Car/",$buildingName)){
            $this->buildingOrder="15";
        }
        //Set Central
        if(preg_match("/Met/",$buildingName)){
            $this->buildingOrder="16";
        }
        //Set TOTA Complex
        //Set Tucker.
        if(preg_match("/Tuc/",$buildingName)){
            $this->buildingOrder="17";
        }
        //Set Owen.
        if(preg_match("/Owe/",$buildingName)){
            $this->buildingOrder="18";
        }
        //Set Turlington.
        if(preg_match("/Turling/",$buildingName)){
            $this->buildingOrder="19";
        }
        //Set Alexander.
        if(preg_match("/Alex/",$buildingName)){
            $this->buildingOrder="20";
        }

        //Set West
        //Set Lee.
        if(preg_match("/Lee/",$buildingName)){
            $this->buildingOrder="21";
        }

        //Set Sullivan.
        if(preg_match("/Sullivan/",$buildingName)){
            $this->buildingOrder="22";
        }

        //Set Bragaw.
        if(preg_match("/Braga/",$buildingName)){
            $this->buildingOrder="23";
        }
        //Set Apartments
        //Set Wolf Ridge.
        //Wolf Ridge Grove
        if(preg_match("/WR Grove/",$buildingName)){
            $this->buildingOrder="24";
        }

        //Wolf Ridge Innovation
        if(preg_match("/WR Innovat/",$buildingName)){
            $this->buildingOrder="25";
        }

        //Wolf Ridge Lakeview.
        if(preg_match("/WR Lakevw/",$buildingName)){
            $this->buildingOrder="26";
        }

        //Wolf Ridge Plaza
        if(preg_match("/WR Plaza/",$buildingName)){
            $this->buildingOrder="27";
        }

        //Wolf Ridge Tower
        if(preg_match("/WR Tower/",$buildingName)){
            $this->buildingOrder="28";
        }

        //Wolf Ridge Valley
        if(preg_match("/WR Valley/",$buildingName)){
            $this->buildingOrder="29";
        }


        //Wolf Village Apartments

        //Wolf Village - A
        if(preg_match("/Wolf Vlg A/",$buildingName)){
            $this->buildingOrder="30";
        }
        //Wolf Village - B
        if(preg_match("/Wolf Vlg B/",$buildingName)){
            $this->buildingOrder="31";
        }
        //Wolf Village - C
        if(preg_match("/Wolf Vlg C/",$buildingName)){
            $this->buildingOrder="32";
        }
        //Wolf Village - D
        if(preg_match("/Wolf Vlg D/",$buildingName)){
            $this->buildingOrder="33";
        }
        //Wolf Village - E
        if(preg_match("/Wolf Vlg E/",$buildingName)){
            $this->buildingOrder="34";
        }

        //Wolf Village - F
        if(preg_match("/Wolf Vlg F/",$buildingName)){
            $this->buildingOrder="35";
        }

        //Wolf Village - G
        if(preg_match("/Wolf Vlg G/",$buildingName)){
            $this->buildingOrder="36";
        }

        //Wolf Village - H
        if(preg_match("/Wolf Vlg H/",$buildingName)){
            $this->buildingOrder="37";
        }

        //End Wolf Village Apartments

        //End Apartments at NC State.



    }



    function setStaffCapacity($staffAtBuilding){
        $this->staffCapacity=$staffAtBuilding;
    }


    function createGroup($buildingName){
        //Set AFC
        if(preg_match("/AFC/",$buildingName)){
            $this->buildingGroup="Avent Ferry Complex";
        }
        //Set TriTowers
        if($buildingName=="Carroll"||$buildingName=="Bragaw"||$buildingName=="Bowen"){
            $this->buildingGroup="TriTowers";
        }
        //Set Apartments
        //Check Wolf Ridge
        if(preg_match("/WR/",$buildingName)){
            $this->buildingGroup="Wolf Ridge";
        }
        //Check Wolf Village
        if(preg_match("/Wolf Vlg /",$buildingName)){
            $this->buildingGroup="Wolf Village";
        }
        //Set Wood.
        if(preg_match("/Wood/",$buildingName)){
            $this->buildingGroup="Wood";
        }

    }


    function getBuildingName(){
        return $this->buildingName;
    }

    function getBuildingOrder(){
        return $this->buildingOrder;
    }

    function getBuildingGroup(){
        return $this->buildingGroup;
    }

    function getTotalPossibleResidentCapacity(){
        return $this ->buildingStudentResidentCapacity;
    }

    function getBuildingCapacity(){
        return $this->buildingCapacity;
    }

    function getBuildingAssignments(){
        return $this->buildingAssignment;
    }

    function getStaffAssignments(){
        return $this->staffCapacity;
    }

    function getResidentAssignments(){
        return $this->studentAssignment;
    }






}
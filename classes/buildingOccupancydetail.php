<?php

/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/14/2015
 * Time: 9:54 AM
 */

//Specify the location of the original class that's being extended.
require_once('buildingOccupancy.php');

class buildingOccupancydetail extends buildingOccupancy
{

    //Variables for buildingOccupancyDetail Extension.

    //New additions for buildingOccupancydetail.php
    //Detailed People
    var $male;
    var $female;

    //Individual Classification of students.
    var $fresh;
    var $newFresh;
    var $sophomore;
    var $junior;
    var $senior;
    var $a1;
    var $a2;
    var $gr;
    var $ngr;
    var $ntr;
    var $p1;
    var $sp;
    var $un;
    var $temp_classification;
    //End classification of students.

    /**
     * This function allows for the creation of detailed occupancy information. Specifically looking for the the classification and the gender of those
     * assigned a room at NC State.
     * @param string $buildingCampus        create a campus Area that can be associated with the building, i.e. East, Center West or Apartments.
     * @param string $buildingArea          create a area that can be associated with the building, i.e. Southeast, Northeast,
     * @param string $buildingName          creates a building with the appropriate building name, i.e. Bagwell/Bragaw, etc.
     * @param string $gender                creates a set gender (either M or F)
     * @param int    $genderAmount          provides the amount of the stated gender.
     * @param string $classification        creates a classification for the particular student, i.e., Sr/Jr/Fr/Nfr, etc.
     * @param int $classificationAmount     provides the amount of those of a particular classification, i.e. Juniors are 10, Seniors are 5, etc.
     * @return void
     */

    function buildingOccupancydetail($buildingArea="",$buildingName="",$gender="",$genderAmount="",$classification="",$classificationAmount=""){
        //Set buildingName
        $this->setBuildingName($buildingName);

        //Set gender (male or female)
        $this->setGender($gender,$genderAmount);

        //setClassification
        //$this->setTempClassification($temp_classification);
        $this->setClassification($classification,$classificationAmount);
    }



    //Parameters (2), gender (m or f)
    //number of that particular Gender.
    function setGender($genderOfStudent,$numberofGender){
        $this->gender=$genderOfStudent;

        //If a male.
        if($genderOfStudent=="M"){
            //Set the males to the variable I currently have set up above.
        $this->male=$numberofGender;
        }
        else{
            //Set the females to the variable I currently have set up above.
            $this->female=$numberofGender;
        }
    }


    //set true classification
    function setClassification($classificationOfStudent,$numberinClassification){
        //make the parameter uppercase.
        $upperCaseClassificationOfStudent=strtoupper($classificationOfStudent);
        //end making the parameter uppercase.

        switch ($upperCaseClassificationOfStudent) {
            case "FR":
                $this->fresh=$numberinClassification;
        break;
        case "NFR":
            $this->newFresh=$numberinClassification;
        break;
        case "SO":
            $this->sophomore=$numberinClassification;
        break;
        case "JR":
            $this->junior=$numberinClassification;
        break;
        case "SR":
            $this->senior=$numberinClassification;
        break;
        case "A1":
            $this->a1=$numberinClassification;
        break;
        case "A2":
            $this->a2=$numberinClassification;
        case "GR":
            $this->gr=$numberinClassification;
        case "NGR":
            $this->ngr=$numberinClassification;
        case "NTR":
            $this->ntr=$numberinClassification;
        case "P1":
            $this->p1=$numberinClassification;
        case "SP":
            $this->sp=$numberinClassification;
        case "UN":
            $this->un=$numberinClassification;
        default:
            $this->temp_classification=$numberinClassification;
        }
    }


    //Set temporaryClassification Variable
    function setTempClassification($classificationOfStudent){

    $this->temp_classification=$classificationOfStudent;


    }

    //Get the Number of Males
    function getMale(){
        return $this->male;
    }

    //Get the Number of Males
    function getFemale(){
        return $this->female;
    }


    function getClassifications($classificationNeeded){
        //make the parameter uppercase.
       $classificationUPPERCASE=strtoupper($classificationNeeded);
        //end making the parameter uppercase.

        switch ($classificationUPPERCASE) {
            case "FR":
                return $this->fresh;
                break;
            case "NFR":
                return $this->newFresh;
                break;
            case "SO":
                return $this->sophomore;
                break;
            case "JR":
                return $this->junior;
                break;
            case "SR":
                return $this->senior;
                break;
            case "A1":
                return $this->a1;
                break;
            case "A2":
                return $this->a2;
            case "GR":
                return $this->gr;
            case "NGR":
                return $this->ngr;
            case "NTR":
                return $this->ntr;
            case "P1":
                return $this->p1;
            case "SP":
                return $this->sp;
            case "UN":
                return $this->un;
            default:
                $this->temp_classification;
        }


        return $this->buildingStudentsAssigned;

    }
}
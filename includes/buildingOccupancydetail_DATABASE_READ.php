<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/9/2015
 * Time: 1:50 PM
 */

//name of array is $collectionOfOccupancyDetail

//Filter array values
//BEGIN TEMPORARY VARIABLES.
global $males;
       $males="0";
global $females;
       $females = "0";
global $fresh;
        $fresh="0";
global $newFresh;
        $newFresh="0";
global $sophomore;
        $newFresh = "0";
global $junior;
        $junior="0";
global $senior;
        $senior = "0";
global $a1;
        $a1="0";
global $a2;
        $a2="0";
global $gr;
        $gr="0";
global $ngr;
        $ngr="0";
global $ntr;
        $ntr="0";
global $p1;
        $p1="0";
global $sp;
        $sp="0";
global $un;
        $un="0";
//END TEMPORARY VARIABLES







/**
 * READING ARRAY OF BUILDINGS, GENDERS & CLASSIFICATIONS
 */
foreach ($collectionOfOccupancyDetail as $listToClense) {
    //BUILDING is located in $listToClense['building']
    //ACADEMIC_LEVEL is located in $listToClense['academic_level']


    //Building
    $building = $listToClense['building'];
    $genders = $listToClense['gender'];
    $academic_level = $listToClense['academic_level'];

    //SEARCHABLE BUILDING
    $buildingTOLOOKFOR = $_GET['building'];
    //END SEARCHABLE BUILDING



    //Check Genders in Bragaw
    //if ($building == "Bragaw") {


    if ($building==$buildingTOLOOKFOR){
        //Check Males in Bragaw Residence Hall
                                if (count(preg_grep('/M/', $listToClense))) {
                                    $males++;
                                }
                                //Check Females in Bragaw Residence Hall
                                else if (count(preg_grep('/F/', $listToClense))){
                                    $females++;
                                }
        //Done checking Females or Males

        //Check classification for Bragaw
        //Freshmen
                                if($academic_level=="FR"){
                                    $fresh++;
                                }

        //Sophomores
                                if($academic_level=="SO"){
                                    $sophomore++;
                                }
        //Juniors
                                if($academic_level=="JR"){
                                    $junior++;
                                }
        //Seniors
                           if($academic_level=="SR"){
                                $senior++;
                            }
        //A1
                            if($academic_level=="A1"){
                                $a1++;
                            }
        //A2
                            if($academic_level=="A2"){
                                $a2++;
                            }
        //GR
                            if($academic_level=="GR"){
                                $a1++;
                            }
        //NGR
                            if($academic_level=="NGR"){
                                    $ngr++;
                            }
        //NTR
                        if($academic_level=="NTR"){
                            $ntr++;
                        }
        //P1
                        if($academic_level=="P1"){
                            $p1++;
                        }
        //SP/Special
                        if($academic_level=="SP"){
                            $sp++;
                        }
        //UN/Undecided
                        if($academic_level=="SP"){
                            $un++;
                        }
        //END SETTING CLASSIFICATIONS FOR THE RESIDENCE HALL.


            /*
            *  SET BUILDING OCCUPANCY DETAILS FOR BUILDINGS
            */


            /**
             * BRAGAW RESIDENCE HALL
             */
                    //Set new constructor of object type buildingOccupancydetail.
                    $bragawResidenceHall = new buildingOccupancydetail("East","$building","M",$males,"fr",$fresh);
                    //Set females
                    $bragawResidenceHall->setGender("female",$females);
                    //Set sophomores
                    $bragawResidenceHall->setClassification("SO",$sophomore);
                    //Set juniors
                    $bragawResidenceHall->setClassification("JR",$junior);
                    //Set seniors
                    $bragawResidenceHall->setClassification("SR",$senior);
                    //Set A1
                    $bragawResidenceHall->setClassification("A1",$a1);
                    //Set A2
                    $bragawResidenceHall->setClassification("A2",$a2);
                    //Set GR
                    $bragawResidenceHall->setClassification("GR",$gr);
                    //Set NGR
                    $bragawResidenceHall->setClassification("NGR",$ngr);
                    //Set NTR
                    $bragawResidenceHall->setClassification("NTR",$ntr);
                    //Set P1
                    $bragawResidenceHall->setClassification("P1",$p1);
                    //Set SP (Special)
                    $bragawResidenceHall->setClassification("SP",$sp);
                    //Set UN (Undecided)
                    $bragawResidenceHall->setClassification("UN",$un);




    }//Close Bragaw

}//close foreach

//Present the genders in a table....
$genders = array("male"=>$males,"female"=>$females);

//Present the classifications in a table.
$classifications = array("fr"=>$fresh,"nfr"=>$newFresh,"so"=>$sophomore,"jr"=>$junior,"sr"=>$senior,"a1"=>$a1,"a2"=>$a2,"gr"=>$gr,"ngr"=>$ngr,"ntr"=>$ntr,"p1"=>$p1,"sp"=>$sp,"un"=>$un);



//var_dump($bragawResidenceHall);

/*
 *  END BUILDING OCCUPANCY DETAILS FOR BUILDINGS
 */




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
       $females="0";
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


    //Campus (i.e. east, west, apartments, etc.)
	$campus = $listToClense['campus'];
	//Building
    $building = $listToClense['building'];
	//Complexes
    $complex = $listToClense['complex'];
	
	//Genders
    $genders = $listToClense['gender'];
	//Academic Level
    $academic_level = $listToClense['academic_level'];

    //SEARCHABLE BUILDING
    $buildingTOLOOKFOR = $_GET['building'];
    //END SEARCHABLE BUILDING
	
	 //SEARCHABLE COMPLEX
    $complexTOLOOKFOR = $_GET['complex'];
    //END SEARCHABLE COMPLEX

    //SEARCHABLE AREA
    $areaTOLOOKFOR = $_GET['area'];
    //END SEARCHABLE AREA
	
	//SEARCHABLE CAMPUS
	$campusTOLOOKFOR = $_GET['campus'];	
	//END SEARCHABLE CAMPUS



    //Check Genders in Bragaw
    //if ($building == "Bragaw") {


	/**
     * LOOKING FOR A SPECIFIC BUILDING
     ***/
    if ($building==$buildingTOLOOKFOR){
	
	//Temporary -- added 02-03-2016.
	//echo $listToClense['gender'];
	//echo "<br/>";
	//End temporary....
	
	
        //Check Males in Bragaw Residence Hall
								//UNALTERED
								/*
                                if (count(preg_grep('/M/', $listToClense))) {
                                    $males++;
                                }
                                //Check Females in Bragaw Residence Hall
								//Took off else if.
                                else if (count(preg_grep('/F/', $listToClense))){
                                    $females++;
                                }*/
								
								if ($listToClense['gender']=="M")
								{
                                    $males++;
                                }
                                //Check Females in Bragaw Residence Hall
								//Took off else if.
                                else if ($listToClense['gender']=="F"){
                                    $females++;
                                }
								
        //Done checking Females or Males

        //Check classification for Bragaw
        //Freshmen		(FR)
                                if($academic_level=="FR"){
                                    $fresh++;
                                }
		//New Freshmen (NFR)
                            if($academic_level=="NFR"){
                                $newFresh++;
                            }

        //Sophomores	(SO)
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
                        if($academic_level=="UN"){
                            $un++;
                        }
        //END SETTING CLASSIFICATIONS FOR THE RESIDENCE HALL.


            /*
            *  SET BUILDING OCCUPANCY DETAILS FOR BUILDINGS
            */


            /**
             * BRAGAW RESIDENCE HALL
             */
			 //COMMENT OUT ON 02-03-2016 @ 241pm
			 /*
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
				*/



    }//Close Bragaw


	/**
     * LOOKING FOR COMPLEXES.
     ***/
	else if ($buildingTOLOOKFOR=="NONE" && $complex==$complexTOLOOKFOR){

                if ($listToClense['gender']=="M")
                {
                    $males++;
                }
                //Check Females in Bragaw Residence Hall
                //Took off else if.
                else if ($listToClense['gender']=="F"){
                    $females++;
                }

                //Done checking Females or Males

                
                //Freshmen		(FR)
                if($academic_level=="FR"){
                    $fresh++;
                }
                //New Freshmen (NFR)
                if($academic_level=="NFR"){
                    $newFresh++;
                }

                //Sophomores	(SO)
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
                    $gr++;
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
                if($academic_level=="UN"){
                    $un++;
                }
                //END SETTING CLASSIFICATIONS FOR THE RESIDENCE HALL.
    }//Close Complex Lookup
	


    /**
    * Looking for a Particular Campus Area.
    * CAMPUS AREAS = EAST, CENTRAL, WEST, and APARTMENTS.
    */
    else if ($buildingTOLOOKFOR=="NONE" && $complexTOLOOKFOR=="NONE" && $areaTOLOOKFOR=="NONE" && $campus==$campusTOLOOKFOR){

                if ($listToClense['gender']=="M")
                {
                    $males++;
                }
                //Check Females in Bragaw Residence Hall
                //Took off else if.
                else if ($listToClense['gender']=="F"){
                    $females++;
                }

                //Done checking Females or Males

                
                //Freshmen      (FR)
                if($academic_level=="FR"){
                    $fresh++;
                }
                //New Freshmen (NFR)
                if($academic_level=="NFR"){
                    $newFresh++;
                }

                //Sophomores    (SO)
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
                    $gr++;
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
                if($academic_level=="UN"){
                    $un++;
                }
                //END SETTING CLASSIFICATIONS FOR THE RESIDENCE HALL.
    }	
}//close array foreach

//Present the genders in a table....
$genders = array("male"=>$males,"female"=>$females);

//Present the classifications in a table.
$classifications = array("fr"=>$fresh,"nfr"=>$newFresh,"so"=>$sophomore,"jr"=>$junior,"sr"=>$senior,"a1"=>$a1,"a2"=>$a2,"gr"=>$gr,"ngr"=>$ngr,"ntr"=>$ntr,"p1"=>$p1,"sp"=>$sp,"un"=>$un);



//var_dump($bragawResidenceHall);

//added 02-03-2016
//var_dump($listToClense);
//var_dump($collectionOfOccupancyDetail);
//End additions 02-03-2016

/*
 *  END BUILDING OCCUPANCY DETAILS FOR BUILDINGS
 */




<?php
/** 
 * User: jjwill10
 * Date: 10/14/2015
 * Time: 12:11 PM
 * Description:
 */
/*
 *   //AFC - A = 0
    //AFC - B = 1
    //AFC - E = 2
    //AFC - F = 3
    //Wood - A = 4
    //Wood - B = 5
    //Bagwell = 6
    //Becton = 7
    //Berry = 8
    //Gold = 9
    //Welch = 10
    //Syme = 11
    //Watauga = 12
    //North = 13
    //Bowen = 14
    //Carroll = 15
    //Metcalf = 16
    //Tucker = 17
    //Owen = 18
    //Turlington = 19
    //Alexander = 20
    //Lee = 21
    //Sullivan = 22
    //Bragaw =23
    //WR Grove = 24
    //WR Innovat = 25
    //WR Lakeview = 26
    //WR Plaza = 27
    //WR Tower = 28
    //WR Valley = 29
    //Wolf Vlg A = 30
    //Wolf Vlg B = 31
    //Wolf Vlg C= 32
    //Wolf Vlg D = 33
    //Wolf Vlg E = 34
    //Wolf Vlg F = 35
    //Wolf Vlg G = 36
    //Wolf Vlg H = 37

 */

/**
 *  FOR DESCRIPTION OF METHODS USED IN THE openforBuildingInformation() METHOD, PLEASE LOOK AT THE FOLLOWING FILE: /scripts/popUpForDetailedList.js
 *
 *  method #001 getCampus(buildingName) takes the building name and returns tha appropriate Campus Area. (E.x. if Avent Ferry, returns East Campus,
 *  if Wolf Ridge or Wolf Village apartments, will return "Apartments" as the campus area.
 */


						//Create a new line for the pop up that is shown in the HTML that is processed
						//by this file.
						echo "\n";
						//End New line...
							
							
                        if($pulledBuilding=="AFC - A") {							
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-37]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-37]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-37]),pulledBuildingArray[lengthOFBUILDING_ARRAY-37]);'>";
                        }
                        else if($pulledBuilding=="AFC - B") {
						
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),pulledBuildingArray[lengthOFBUILDING_ARRAY-36]);'>";
                        }
                        else if($pulledBuilding=="AFC - E") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-35]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-35]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-35]),pulledBuildingArray[lengthOFBUILDING_ARRAY-35]);'>";
                        }
                        else if($pulledBuilding=="AFC - F") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-34]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-34]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-34]),pulledBuildingArray[lengthOFBUILDING_ARRAY-34]);'>";
                        }
                        else if($pulledBuilding=="Wood - A") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),pulledBuildingArray[lengthOFBUILDING_ARRAY-33]);'>";
                        }
                        else if($pulledBuilding=="Wood - B") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-32]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-32]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-32]),pulledBuildingArray[lengthOFBUILDING_ARRAY-32]);'>";
                        }
                        else if($pulledBuilding=="Bagwell") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),pulledBuildingArray[lengthOFBUILDING_ARRAY-31]);'>";
                        }
                        else if($pulledBuilding=="Becton") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-30]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-30]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-30]),pulledBuildingArray[lengthOFBUILDING_ARRAY-30]);'>";
                        }
                        else if($pulledBuilding=="Berry") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-29]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-29]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-29]),pulledBuildingArray[lengthOFBUILDING_ARRAY-29]);'>";
                        }
                        else if($pulledBuilding=="Gold") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-28]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-28]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-28]),pulledBuildingArray[lengthOFBUILDING_ARRAY-28]);'>";
                        }
                        else if($pulledBuilding=="Welch") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-27]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-27]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-27]),pulledBuildingArray[lengthOFBUILDING_ARRAY-27]);'>";
                        }
                        else if($pulledBuilding=="Syme") {
                            echo "<a class='link'  target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-26]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-26]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-26]),pulledBuildingArray[lengthOFBUILDING_ARRAY-26]);'>";
                        }
                        else if($pulledBuilding=="Watauga") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-25]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-25]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-25]),pulledBuildingArray[lengthOFBUILDING_ARRAY-25]);'>";
                        }
                        else if($pulledBuilding=="North") {
                            echo "<a class='link'  target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-24]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-24]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-24]),pulledBuildingArray[lengthOFBUILDING_ARRAY-24]);'>";
                        }
                        else if($pulledBuilding=="Bowen") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),pulledBuildingArray[lengthOFBUILDING_ARRAY-23]);'>";
                        }
                        else if($pulledBuilding=="Carroll") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-22]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-22]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-22]),pulledBuildingArray[lengthOFBUILDING_ARRAY-22]);'>";
                        }
                        else if($pulledBuilding=="Metcalf") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-21]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-21]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-21]),pulledBuildingArray[lengthOFBUILDING_ARRAY-21]);'>";
                        }
                        else if($pulledBuilding=="Tucker") {
                            echo "<a class='link'  target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),pulledBuildingArray[lengthOFBUILDING_ARRAY-20]);'>";
                        }
                        else if($pulledBuilding=="Owen") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-19]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-19]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-19]),pulledBuildingArray[lengthOFBUILDING_ARRAY-19]);'>";
                        }
                        else if($pulledBuilding=="Turlington") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-18]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-18]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-18]),pulledBuildingArray[lengthOFBUILDING_ARRAY-18]);'>";
                        }
                        else if($pulledBuilding=="Alexander") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-17]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-17]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-17]),pulledBuildingArray[lengthOFBUILDING_ARRAY-17]);'>";
                        }
                        else if($pulledBuilding=="Lee") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),pulledBuildingArray[lengthOFBUILDING_ARRAY-16]);'>";
                        }
                        else if($pulledBuilding=="Sullivan") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-15]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-15]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-15]),pulledBuildingArray[lengthOFBUILDING_ARRAY-15]);'>";
                        }
                        else if($pulledBuilding=="Bragaw") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-14]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-14]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-14]),pulledBuildingArray[lengthOFBUILDING_ARRAY-14]);'>";
                        }
                        //Start Apartments
                        //Start Wolf Ridge Apartments
                        //Grove
                        else if($pulledBuilding=="WR Grove") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),pulledBuildingArray[lengthOFBUILDING_ARRAY-13]);'>";
                        }
                        //Innovation
                        else if($pulledBuilding=="WR Innovat") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-12]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-12]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-12]),pulledBuildingArray[lengthOFBUILDING_ARRAY-12]);'>";
                        }
                        //Start Lakeview
                        else if($pulledBuilding=="WR Lakeview") {
                            //TO-DO need to fix that so that WR Lakeview becomes WR lakevw.

                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-11]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-11]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-11]),pulledBuildingArray[lengthOFBUILDING_ARRAY-11]);'>";
                        }
                        //Plaza
                        else if($pulledBuilding=="WR Plaza") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-10]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-10]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-10]),pulledBuildingArray[lengthOFBUILDING_ARRAY-10]);'>";
                        }
                        //Tower
                        else if($pulledBuilding=="WR Tower") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-9]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-9]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-9]),pulledBuildingArray[lengthOFBUILDING_ARRAY-9]);'>";
                        }
                        //Valley
                        else if($pulledBuilding=="WR Valley") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-8]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-8]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-8]),pulledBuildingArray[lengthOFBUILDING_ARRAY-8]);'>";
                        }
                        //Wolf Village Apartments
                        //Wolf Village A
                        else if($pulledBuilding=="Wolf Vlg A") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),pulledBuildingArray[lengthOFBUILDING_ARRAY-7]);'>";
                        }
                        //Wolf Village B
                        else if($pulledBuilding=="Wolf Vlg B") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-6]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-6]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-6]),pulledBuildingArray[lengthOFBUILDING_ARRAY-6]);'>";
                        }
                        //Wolf Village C
                        else if($pulledBuilding=="Wolf Vlg C") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-5]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-5]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-5]),pulledBuildingArray[lengthOFBUILDING_ARRAY-5]);'>";
                        }
                        //Wolf Village D
                        else if($pulledBuilding=="Wolf Vlg D") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-4]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-4]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-4]),pulledBuildingArray[lengthOFBUILDING_ARRAY-4]);'>";
                        }
                        //Wolf Village E
                        else if($pulledBuilding=="Wolf Vlg E") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-3]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-3]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-3]),pulledBuildingArray[lengthOFBUILDING_ARRAY-3]);'>";
                        }
                        //Wolf Village F
                        else if($pulledBuilding=="Wolf Vlg F") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-2]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-2]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-2]),pulledBuildingArray[lengthOFBUILDING_ARRAY-2]);'>";
                        }
                        //Wolf Village G
                        else if($pulledBuilding=="Wolf Vlg G") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-1]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-1]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-1]),pulledBuildingArray[lengthOFBUILDING_ARRAY-1]);'>";
                        }
                        //Wolf Village H
                        else if($pulledBuilding=="Wolf Vlg H") {
                            echo "<a class='link'  target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-0]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-0]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-0]),pulledBuildingArray[lengthOFBUILDING_ARRAY-0]);'>";
                        }

                        else{
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(pulledCampus,pulledArea,pulledComplex,pulledBuildingArray[lengthOFBUILDING_ARRAY]);'>";
                        }

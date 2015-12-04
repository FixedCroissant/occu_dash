<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/13/2015
 * Time: 12:34 PM
 */

//REQUIRED FOR EXPORT
include('simple_html_dom.php');
//See more information online at: (http://simplehtmldom.sourceforge.net/)
//DONE REQUIRED FILES FOR EXPORTING

//LOCATION OF PAGE THAT WE NEED TO SCRAPE INFORMATION FROM.
$myURL = "http://localhost/apps/development/occu_dash/nightly_exports/reports_to_read_data/Fall/nightly_export_2158_term.php";

$myFILE= file_get_html($myURL);


//header('Content-type: application/ms-excel');
//header('Content-Disposition: attachment; filename=sample.csv');


/**
 * BEGIN FILE STRUCTURE OF CSV FILES
 */
//Put contents to a file...
$currentDirectory = getcwd();


//Create a Date
$createdDATE = date_create("2015-11-17");
//CREATE A MONTH BASED ON THE CREATED DATE ABOVE....
$formattedDATE_MONTH = date_format($createdDATE,"F");
$formattedDATE_YEAR  = date_format($createdDATE,"Y");


//String representing "YEAR/MONTH"
//BELOW DOES THE CURRENT YEAR
//TEMPORARILY COMMENTING OUT FOR TESTING PURPOSES....
//$year=date("Y");
$year=$formattedDATE_YEAR;



//BELOW DOES THE CURRENT MONTH
//$fullMonth=date("F");

//FOR TESTING PURPOSES ....
$fullMonth = $formattedDATE_MONTH;

//The directory is above
//$directory = (".."."/"."exports"."/".$year."/".$fullMonth);


$mainDirectory = "C:/xampp/htdocs/local/apps/development/occu_dash/nightly_exports";

$directory = ($mainDirectory."/"."exports"."/".$year."/".$fullMonth);



echo $directory;

if(file_exists($directory)){
    //change to that directory....
    chdir($directory);

}
//Create a year folder
else{

                //Create Directoy
                //Year
                //mkdir(date("Y"));


                //Check if File Exists
                if(file_exists(date("F"))){

                    //Change to the new directory to write the correct file...
                    chdir($directory);
                }else{
                    echo $directory;

                    //Create Directory...
                    mkdir($directory,0700,true);


                    //Change to the new directory...
                    chdir($directory);
                }
}


/*
 * FILE STRUCTURE OF EXPORTS
 */

//Function used to cleanout the non-breaking spaces...
//Found on http://stackoverflow.com/posts/17817392/
function cleanCell(&$contents,$key) {
    //Contents of Array....
    $contents = trim($contents);

    //get rid of pesky &nbsp's (aka: non-breaking spaces)
    $contents = trim($contents,chr(0xC2).chr(0xA0));
    $contents = str_replace("&nbsp;", "", $contents);
}

//Timetamp to put on the date
$timestampNow = date('Y-m-d_Hi');





//File name
$fp = fopen("occu_dash_export_".$timestampNow.".csv", "w");

//Table Header
foreach($myFILE->find('thead') as $element){
    $td = array();
    foreach( $element->find('th') as $row)
    {
        $headerTEXT = $row->plaintext;
        //Trim the above text....
        $trimmedHEADERTEXT = trim($headerTEXT);
        $td [] = $trimmedHEADERTEXT;
    }
    //Put the information in a csv format...
    fputcsv($fp, $td);
}

//Table Body Contents.
foreach($myFILE->find('tr') as $element)
{
    $td = array();
    foreach( $element->find('th') as $row)
    {
        $td [] = $row->plaintext;
    }
    fputcsv($fp, $td);

    $td = array();
    foreach( $element->find('td') as $row)
    {
        //Clean the contents of the Cell and Remove and non-breaking space.
        array_walk($td,"cleanCell");
        $td [] = $row->plaintext;
    }
    //Put the information in a csv format...
    fputcsv($fp, $td);
}

//Close the file.
fclose($fp);


//Add index file to the main directory above year...
$fileIndex = fopen("../../"."index.php","w");

$indexInformationforMainDirectory = '
<?php
//Year Index File
//This is a auto-generated-file....

//Not working within Windows ....
//May work on the host...
$directory = getcwd();

$files = glob($directory.\'\*\',GLOB_ONLYDIR);

//Make it look a little prettier....
echo "<!DOCTYPE html> \n";
echo "<html>";
echo "<head>\n";
echo "<title>\n";
echo "Occupancy Dashboard - Exports\n";
echo "</title>\n";
echo "<link rel=\'stylesheet\' type=\'text/css\' href=\'export_report.css\' >\n";
echo "</head>\n";
echo "<body>";
echo "Please right click and click \'Save Target As (Internet Explorer)\'  or \'Save Link As\' (Mozilla Firefox)\n";
echo "<ul>\n ";
foreach($files as $myFileDisplayed) {
    echo "<li>\n";
    echo "<a href =".basename($myFileDisplayed).">".basename($myFileDisplayed)."</a>\n";
    echo "</li>\n";
}
echo "</ul>\n";

echo "<br/>\n";
echo "<br/>\n";
echo "<br/>\n";
//echo "File last updated on:  <br/>\n";
//echo date(\'Y-M-d H:i:s\');

echo "<a onclick=\'history.go(-1);\'>back</a>\'";

echo "</body>";
echo "</html>";
?>';


//Put a list of links in the main directory above year.
fputs($fileIndex,$indexInformationforMainDirectory);

//Close the index file.
fclose($fileIndex);

//Put the same file within the


/**
 * MONTH INDEX FILE
 */
//Add index file to the main directory above month...
$fileIndex = fopen("../index.php","w");

$indexInformationforYearDirectory = '<?php
//Year Index File
//This is a auto-generated-file....

//Not working within Windows ....
//May work on the host...
$directory = getcwd();
//Given that NO CSV files will be within the year folder, this file will be similar to the
//index provided in the main directory.

//Go through the file structure and only provide me with a directory listing.
$files = glob($directory.\'\*\',GLOB_ONLYDIR);




//Make it look a little prettier....
echo "<!DOCTYPE html>\n";
echo "<html>";
echo "<head>\n";
echo "<title>\n";
echo "Occupancy Dashboard - Exports\n";
echo "</title>\n";
echo "<link rel=\'stylesheet\' type=\'text/css\' href=\'../../export_report.css\' >\n";
echo "</head>\n";
echo "<body>";
echo "Please right click and click \'Save Target As (Internet Explorer)\'  or \'Save Link As\' (Mozilla Firefox)\n";
echo "<ul>\n ";
foreach($files as $myFileDisplayed) {
    echo "<li>\n";
    echo "<a href =".basename($myFileDisplayed).">".basename($myFileDisplayed)."</a>\n";
    echo "</li>\n";
}
echo "</ul>\n";

echo "<br/>\n";
echo "<br/>\n";
echo "<br/>\n";

echo "<a onclick=\'history.go(-1);\'>back</a>\'";

//echo "File last updated on:  <br/>\n";
//echo date(\'Y-M-d H:i:s\');

echo "</body>";
echo "</html>";
?>';


//Put a list of links in the directory.
fputs($fileIndex,$indexInformationforYearDirectory);

//Close the index file.
fclose($fileIndex);

echo "Success!";

/*
 * END MONTH INDEX FILE
 */



















/**
 * MONTH INDEX FILE
 */
//Add index file to the main directory above month...
$fileIndex = fopen("index.php","w");

$indexInformationforMonthDirectory = '<?php
//Year Index File
//This is a auto-generated-file....

//Not working within Windows ....
//May work on the host...
$directory = getcwd();

$files = glob($directory.\'\*csv\');




//Make it look a little prettier....
echo "<!DOCTYPE html>\n";
echo "<html>";
echo "<head>\n";
echo "<title>\n";
echo "Occupancy Dashboard - Exports\n";
echo "</title>\n";
echo "<link rel=\'stylesheet\' type=\'text/css\' href=\'../../export_report.css\' >\n";
echo "</head>\n";
echo "<body>";
echo "Please right click and click \'Save Target As (Internet Explorer)\'  or \'Save Link As\' (Mozilla Firefox)\n";
echo "<ul>\n ";
foreach($files as $myFileDisplayed) {
    echo "<li>\n";
    echo "<a href =".basename($myFileDisplayed).">".basename($myFileDisplayed)."</a>\n";
    echo "</li>\n";
}
echo "</ul>\n";

echo "<br/>\n";
echo "<br/>\n";
echo "<br/>\n";

echo "<a onclick=\'history.go(-1);\'>back</a>\'";

//echo "File last updated on:  <br/>\n";
//echo date(\'Y-M-d H:i:s\');

echo "</body>";
echo "</html>";
?>';


//Put a list of links in the directory.
fputs($fileIndex,$indexInformationforMonthDirectory);

//Close the index file.
fclose($fileIndex);

echo "Success!";

/*
 * END MONTH INDEX FILE
 */






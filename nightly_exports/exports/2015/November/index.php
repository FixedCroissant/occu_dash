<?php
//Year Index File
//This is a auto-generated-file....

//Not working within Windows ....
//May work on the host...
$directory = getcwd();

$files = glob($directory.'\*csv');




//Make it look a little prettier....
echo "<!DOCTYPE html>\n";
echo "<html>";
echo "<head>\n";
echo "<title>\n";
echo "Occupancy Dashboard - Exports\n";
echo "</title>\n";
echo "<link rel='stylesheet' type='text/css' href='../../export_report.css' >\n";
echo "</head>\n";
echo "<body>";
echo "Please right click and click 'Save Target As (Internet Explorer)'  or 'Save Link As' (Mozilla Firefox)\n";
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

echo "<a onclick='history.go(-1);'>back</a>'";

//echo "File last updated on:  <br/>\n";
//echo date('Y-M-d H:i:s');

echo "</body>";
echo "</html>";
?>
<?php

require './core/Controllers/UserAccess.php';

$data = "";
$data2 = "";
$data3 = "";
$page = "homepage.php";
$title = "Homepage";
$msg = "";
$ur = (isset($_GET["url"])) ? $_GET["url"] : "";
$link = explode("/", $ur);
$url = $link[0];
$controller = "";

// Fetch the view of the page to be displayed
createView($url);
if ($page == "homepage.php") {createView("homepage");}




 
 if(isset($_GET["fetch-polling-unit-result"])){
    $controller = new UserAccess;

    echo $controller->fetchPollingUnitResult();
    exit();
}

 
if(isset($_GET["fetch-lga-result"])){
    $controller = new UserAccess;

    echo $controller->fetchLGAResult();
    exit();
}

if(isset($_GET["submit-pu-result"])){
    $controller = new UserAccess;

    echo $controller->submitPUResult();
    exit();
}

function createView($url)
{
    if (file_exists($url . ".php")) {
        global $title, $data, $data2, $data3, $page;
        $title = str_replace("-", " ", $url);
        $title = ucwords($title);
        $page = $url . ".php";
        $data = getDataIfAny($url);
        if (isset($data[2])) {$data3 = $data[2];}
        if (isset($data[1])) {$data2 = $data[1];}
        if (isset($data[0])) {$data = $data[0];}
    }
}

function getDataIfAny($page)
{
    $controller = new UserAccess;
    switch ($page) {
        case "homepage":

            break;
        case "polling-unit-result":
            $data=array();
            $data[0] = $controller->getPollingUnits();
            // $data[0] = $controller->getStates();
            // $data[1]=json_encode($controller->getLGA());
            // $data[2]=json_encode($controller->getWards());
            return $data;
            break;

        case "lga-announced-result": 
            $data=array();
            $data[0] = $controller->getStates();
            $data[1]=json_encode($controller->getLGA());
            return $data;
            break;
        
        case "store-election-result": 
            $data = array();
            $data[0] = $controller->getParties();
            $data[1] = $controller->getPollingUnits();
            return $data;
            break;

        default:
            return "";
    }
}

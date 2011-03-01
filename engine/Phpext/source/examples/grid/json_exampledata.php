<?php
/* @author Matthias Benkwitz
 * @website http://www.bui-hinsche.de
 */ 
// Sample Data
// Sample Data
$myData = array(
        array('3m Co',71.72,0.02,0.03,'9/1 12:00am', 'Manufacturing'),
        array('Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am', 'Manufacturing'),
        array('Altria Group Inc',83.81,0.28,0.34,'9/1 12:00am', 'Manufacturing'),
        array('American Express Company',52.55,0.01,0.02,'9/1 12:00am', 'Finance'),
        array('American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am', 'Services'),
        array('AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am', 'Services'),
        array('Boeing Co.',75.43,0.53,0.71,'9/1 12:00am', 'Manufacturing'),
        array('Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am', 'Services'),
        array('Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am', 'Finance'),
        array('E.I. du Pont de Nemours and Company',40.48,0.51,1.28,'9/1 12:00am', 'Manufacturing'),
        array('Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am', 'Manufacturing'),
        array('General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am', 'Manufacturing'),
        array('General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am', 'Automotive'),
        array('Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am', 'Computer'),
        array('Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am', 'Retail'),
        array('Intel Corporation',19.88,0.31,1.58,'9/1 12:00am', 'Computer'),
        array('International Business Machines',81.41,0.44,0.54,'9/1 12:00am', 'Medical'),
        array('Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am', 'Retail'),
        array('JP Morgan & Chase & Co',45.73,0.07,0.15,'9/5 12:00am', 'Computer'),
        array('McDonald\'s Corporation',36.76,0.86,2.40,'9/4 12:00am', 'Food'),
        array('Merck & Co., Inc.',40.96,0.41,1.01,'9/3 12:00am', 'Food'),
        array('Microsoft Corporation',25.84,0.14,0.54,'9/2 12:00am', 'Computer'),
        array('Pfizer Inc',27.96,0.4,1.45,'9/1 12:00am', 'Food'),
        array('The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am', 'Medical'),
        array('The Home Depot, Inc.',34.64,0.35,1.02,'8/1 12:00am', 'Computer'),
        array('The Procter & Gamble Company',61.91,0.01,0.02,'8/1 12:00am', 'Medical'),
        array('United Technologies Corporation',63.26,0.55,0.88,'9/1 12:00am', 'Medical'),
        array('Verizon Communications',35.57,0.39,1.11,'8/1 12:00am', 'Retail'),
        array('Wal-Mart Stores, Inc.',45.45,0.73,1.63,'8/1 12:00am', 'Computer')
    );
    if ($_POST['start']) {
        $start = $_POST['start'];
    } else {
        $start = 0;
    }

    if ($_POST['limit']) {
        $limit = $_POST['limit'];
    } else {
        $limit = count($myData);
    }

    $count = $counter = 0;
    foreach ($myData as $key => $val) {
        if ($count >= $start  && $count <= ($start + $limit)) {
            $newdata[$counter]['id'] = $key;
            foreach ($val as $vkey => $vval) {
                switch ($vkey) {
                    case 0:
                        $name = 'company';
                        break;
                    case 1:
                        $name = 'price';
                        break;
                    case 2:
                        $name = 'change';
                        break;
                    case 3:
                        $name = 'pctChange';
                        break;
                    case 4:
                        $name = 'lastChange';
                        break;
                    case 5:
                        $name = 'industry';
                        break;
                }

                $newdata[$counter][$name] = $vval;
            }
            $counter++;
        }
        $count++;
    }

    $obj = new stdClass;
    $obj->totalCount = "".count($myData)."";
    $obj->topics = $newdata;
    header('Content-Type: text/html; charset=iso-8859-1');
    echo json_encode($obj);


?>
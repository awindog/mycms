<head>
<meta charset="utf-8">
<title>API</title>
</head>

<?php
header("Content-Type: text/html; charset=utf-8");

$html='';

if(isset($_POST['test']) and $_POST['xmldata'] != null){

    $xml =$_POST['xmldata'];
    $data = @simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOENT);
    if($data){
        $html.="<pre>{$data->name}</pre>";
    }
}
echo $html;

?>


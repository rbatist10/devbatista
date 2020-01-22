<?php 
function array_to_xml($data, &$xml_data) {
	foreach($data as $key => $value) {
		if(is_array($value)) {
			if(is_numeric($key)) {
				$key = 'item'.$key;
			}
			$subnode = $xml_data->addChild($key);
			array_to_xml($value, $subnode);
		} else {
			$xml_data->addChild($key, htmlspecialchars($value));
		}
	}
}

$array = array(
	'nome' => 'Rafael', 
	'sobrenome' => 'Batista', 
	'idade' => 25 
);

$xml_data = new SimpleXMLElement('<data>');

array_to_xml($data,$xml_data);

$result = $xml_data->asXML();

echo $result;
?>
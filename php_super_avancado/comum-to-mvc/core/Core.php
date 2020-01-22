<?php
// Não faz parte da estrutura MVC, porém é o ponto de partida.
class Core {

	public function run() {

		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		$params = array();

		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url); // remove o primeiro registro do array

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0){
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		$c = new $currentController(); // $c de controller

		call_user_func_array(array($c, $currentAction), $params);

		// echo "Controller: ".$currentController."<br>";
		// echo "Action: ".$currentAction."<br>";
		// echo "Params: <pre>".print_r($params, true).'</pre><br>';

	}

}

?>
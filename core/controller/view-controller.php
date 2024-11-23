<?php
	class ViewController {
		public static function add_view($view){
			require_once("core/view/".$view."/widget-default.php");	
		}
	}
?>
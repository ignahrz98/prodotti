<?php
	class ActionController {
		public static function add_action($action){
			require_once("core/controller/action/".$action."/action-default.php");	
		}
	}
?>
<?php
class View {

	private static $VIEWS_DIR_PATH = "/views/";

	public static function make($view, $variables = array())
	{
		extract($variables);

		include sprintf("%s%s%s.php", get_template_directory(), self::$VIEWS_DIR_PATH, $view);
	}

}


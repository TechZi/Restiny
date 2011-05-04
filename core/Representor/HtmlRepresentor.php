<?php

class HtmlRepresentor extends Representor implements RepresentorInterface {
	public function getContentType() {
		return 'text/html';
	}

	public function generateRepresentor(array $data, $templatePath) {
		$smarty = new RestinySmarty();

		foreach ($data as $key => $value) {
			$smarty->assign($key, $value);
		}

		return $smarty->fetch($templatePath);
	}
}
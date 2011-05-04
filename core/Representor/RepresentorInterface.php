<?php

interface RepresentorInterface {
	public function getContentType();
	public function generateRepresentor(array $data);
}

?>

<?php

class JsonRepresentor extends Representor implements RepresentorInterface {
	public function getContentType() {
		return 'application/json';
	}

	public function generateRepresentor(array $data) {
		return json_encode($data);
	}

}
<?php

abstract class Representor {
	abstract function getContentType();
	abstract function generateRepresentor(array $data);
}
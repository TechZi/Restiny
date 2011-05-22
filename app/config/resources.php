<?php

$resourcesConfig = array(
	'^/record$' => 'Record',
	'/record/(?<recordId>[0-9]+)' => 'Record',
	'/records' => 'Records',
	'/recordFrom' => 'RecordForm'
);

return $resourcesConfig;
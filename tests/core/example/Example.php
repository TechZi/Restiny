<?php
/**
 * Example class.
 *
 * @package     stubbles_vfs
 * @subpackage  examples
 */
/**
 * Example class.
 *
 * @package     stubbles_vfs
 * @subpackage  examples
 */
class Example
{
    /**
     * id of the example
     *
     * @var  string
     */
    protected $id;
    /**
     * a directory where we do something..
     *
     * @var  string
     */
    protected $directory;

    /**
     * constructor
     *
     * @param  string  $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * sets the directory
     *
     * @param  string  $directory
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory . DIRECTORY_SEPARATOR . $this->id;
		var_dump($this->directory);
        if (file_exists($this->directory) === false) {
            mkdir($this->directory, 0700, true);
			var_dump(file_exists($this->directory));
        }
    }

    // more source code here...
}
?>
<?php
/**
 * Test case for class Example.
 *
 * @package     stubbles_vfs
 * @subpackage  examples
 */

require_once 'vfsStream/vfsStream.php';
require_once 'Example.php';
/**
 * Test case for class Example.
 *
 * @package     stubbles_vfs
 * @subpackage  examples
 */
class ExampleTestCaseWithVfsStream extends PHPUnit_Framework_TestCase
{
    /**
     * set up test environmemt
     */
    public function setUp()
    {
        vfsStream::setup('exampleDir');
    }

    /**
     * test that the directory is created
     */
    public function testDirectoryIsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));
        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}
?>
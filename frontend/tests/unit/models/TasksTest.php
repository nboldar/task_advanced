<?php namespace frontend\tests\models;

use common\models\Task;

class TasksTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before ()
    {
    }

    protected function _after ()
    {
    }

    // tests
    public function testValidation ()
    {
        $task = new Task();
        $task->setAttribute('title', null);
        $this->assertFalse($task->validate(['title']));

        $task->setAttribute('title', 5555);
        $this->assertFalse($task->validate(['title']));

        $task->setAttribute('title', 'New_task');
        $this->assertTrue($task->validate(['title']));
    }
}
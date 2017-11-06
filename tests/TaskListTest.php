<?php
use PHPUnit\Framework\TestCase;
/**
 * The TaskListTest is used to test whether the number of incomplete tasks is 
 * greater the number of completed tasks
 */
class TaskListTest extends TestCase {
    private $CI;
    protected function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('tasks');
    }
    
    /**
     * Get the number of tasks that matches the status inputted.
     * 
     * @param type $tasks the array of tasks
     * @param type $status the status to be matched
     * @return int the number to tasks that matches the status
     */
    public function getStatusCount($tasks,$status)
    {
        $count = 0;
        
        foreach($tasks as $task){
            if ($task->status == $status) {
                $count++;
            }
                
        }
        
        return $count;
    }
    
    /**
     * Tests whether incomplete tasks is greater that completed tasks.
     */
    public function testStatuses() {
        $tasks = $this->CI->tasks->all();
        $complete = $this->getStatusCount($tasks, 2);
        $incomplete = $this->getStatusCount($tasks, 1);
        
        $this->assertGreaterThan($complete, $incomplete);
        
    }
}
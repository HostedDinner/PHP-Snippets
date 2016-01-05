<?php
/**
 * Calculates the time between calling start and stop.
 * For example call start as first in a script and stop near the bottom (e.g. footer)
 *
 * @author Fabian Neffgen
 */
class SpeedMeasure {
    
    private $starttime;
    private $started;
    
    public function __construct() {
        $this->started = false;
    }
    
    /**
     * Starts the counter.
     * (saves the starttime)
     */
    public function start(){
        $arr = explode(" ", microtime());
        $this->starttime = $arr[0] + $arr[1];
        $this->started = true;
    }
    
    /**
     * Returns the time between start and stop
     * 
     * @return string The overall time between calling start and stop
     */
    public function stop(){
        if($this->started){
            $arr = explode(" ", microtime());
            $end = $arr[0] + $arr[1];
            $this->started = false;
            return round($end - $this->starttime,4);
        }else{
            $this->started = false;
            return "--";
        }
    }
}

?>
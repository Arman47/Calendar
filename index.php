<?php 

class Calendar { 
    public $calendar;
    function __construct() {
        $this->createCalendar();
    }//end constructor
  
    function createCalendar(){
        $start_years = 1990;
        $month = ["1" => "", "2" => "", "3" => "",  "4" => "", "5" => "", "6" => "", "7" => "", "8" => "", "9" => "", "10" => "", "11" => "", "12" => "", "13" => ""];
        $day = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        $years = [];

        while($start_years != 2015 ){
            $years[$start_years] = "";
            $start_years++;
        } 
        
        foreach($month as $key=>$value){
            $num_key = array_search($key,array_keys($month))+1;
            if($num_key % 2 == 0){
                $month[$key] = 22;
            }
            else{
                $month[$key] = 21;
            } 
        }
        
        foreach($years as $key=>$value){
            $value = $month;
            if($key % 5 == 0){
                $value["Happy"]=20;
            }
            $f = [];
            foreach($value as $x=>$val) {
                for($k = 1; $k <= $val; $k++){
                    $g = intval($k/7);
                    if ($k < 7) {
                        $f[$k] = $day[$k-1];
                    } elseif ($k%7 == 0) {
                        $f[$k] = $day[6];
                    } elseif($g > 0){
                        $f[$k] = $day[$k-($g*7)-1];
                    }
                }
                $value[$x] = $f;
            }
            $years[$key] = $value;
        }
        $this->calendar = $years;
    }

    function findData($day, $month, $years){
        $week_day;
        foreach($this->calendar as $key=>$value){
            if($key == $years){
                foreach($value as $k=>$val){
                    if($k == $month){
                        foreach($val as $i=>$d){
                            if($i == $day){
                                $week_day = $d;
                            }
                        }
                    }
                }
            }
        }  
        echo "<h1>".$week_day."</h1>";
    }

} //end class


$obj = new Calendar();
$obj->findData(17, 11, 2013);
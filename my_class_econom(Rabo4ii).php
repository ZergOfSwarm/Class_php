<?php
class XrenClass
{
    // объявление свойства
    public $arrXren = array();
    public $url = '';

   function __construct($arr, $url) {
       $this->arrXren = $arr;
       $this->url = $url;
   }

    // объявление метода
    public function arrActiveXren() {
      foreach ($this->arrXren as $key => $val) {
        $str=getUrl($this->url.$val);
        $num = explode(";", $str);      
        if(!empty($num[0])){
          #setGlobal($key,'1');
          echo "1";
        } else {
          #setGlobal($key,'0');
          echo "0";
        } 
      }           
    }
  // 
   public function arrNullXren() {
    #echo "<pre>"; # Выводит сведения из массива arrXren
    #var_dump($this->arrXren); # в котором список всех объектов 
    #echo "</pre>"; # которые указанны в скрипте "All_lights_on_second_floor_OFF_ECONOM"
      foreach ($this->arrXren as $key => $val) {    
        $num = explode(".", $key);
    #echo "<pre>";
    #var_dump($num);
    #echo "</pre>";
        $test_auto = trim(getGlobal($num[0].'.on_off_auto'));
    #echo "Test". $test_auto . "<br />\n";
    //$test_auto = (getGlobal($key.'.on_off_auto'));
    #say($test_auto);
    //echo "Объект - ". $key . " свойство -" . $test_auto. "<br />\n";
    #echo "Объект - ". $num[0] . " свойство -" . $test_auto. "<br />\n";
        if($test_auto != 'Авто'){
      $handle = fopen("http://192.168.18.110/state?c=set&n=".$val."&o=0", "r");
      setGlobal($num[0].'.value', 0);
      setGlobal($num[0].'.status', 0);
      setGlobal($num[0].'.on_off_auto', 'Откл.');
    }
        }           
   }  
  //
    public function arrOneXren() {
      foreach ($this->arrXren as $key => $val) {
        $num = explode(".", $key);     
    $handle = fopen("http://192.168.18.110/state?c=set&n=".$val."&o=1", "r");   
    setGlobal($num[0].'.value', 1);
    setGlobal($num[0].'.status', 1);
    setGlobal($num[0].'.on_off_auto', 'Вкл.');
      }           
    } 
}


// здесь прописываем IP меги
$url1 = 'http://192.168.18.110/state?c=get&n=';

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
      foreach ($this->arrXren as $key => $val) {
        $num = explode(".", $key);      
		$handle = fopen("http://192.168.18.110/state?c=set&n=".$val."&o=0", "r");
		setGlobal($num[0].'.value', 0);
		setGlobal($num[0].'.status', 0);
		setGlobal($num[0].'.on_off_auto', 'Откл.');
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

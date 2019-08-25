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
		setGlobal($num[0].'.value', 0);
		setGlobal($num[0].'.status', 0);
		setGlobal($num[0].'.on_off_auto', 'Откл.');
      }           
    }	
	//
    public function arrOneXren() {
      foreach ($this->arrXren as $key => $val) {
        $num = explode(".", $key);      
		setGlobal($num[0].'.value', 1);
		setGlobal($num[0].'.status', 1);
		setGlobal($num[0].'.on_off_auto', 'Вкл.');
      }           
    }	
}

// здесь прописываем все меги
$url1 = 'http://192.168.18.110/state?c=get&n=';
$url2 = 'http://192.168.18.111/state?c=get&n=';

//Здесь прописываем объекты первого масива
$arr1 = array(
  '2E_Hall_r51.ID'  => 51,
  'k.Denisa_r52.ID' => 52,
  'k.Edika_r53.ID'  => 53
);

//Здесь прописываем объекты второго масива
$arr2 = array(
  'roz_denisa1_r1.ID'  => 1,
  'roz_denisa2_r2.ID' => 2,
  'roz_dush_1_r3.ID'  => 3
);

$a = new XrenClass($arr1, $url1);
$a->arrActiveXren();

$b = new XrenClass($arr2, $url2);
$b->arrActiveXren();




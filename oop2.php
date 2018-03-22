<?php
//Практика


//15. Создайте класс Form - оболочку для создания форм. Он должен иметь методы input, submit, password, textarea, open, close. Каждый метод принимает массив атрибутов.
class Form {
	public function open($arr) {
		echo "<form action='".$arr[action]. "' method='".$arr[method]."'>";
	}
	public function input($arr) {
		echo "<input type='".$arr[type]. "' value='".$arr[value]."'><br>";
	}
	
	//Передаваемые атрибуты могут быть любыми:
 
//echo $form->inputAll(['type'=>'text', 'value'=>'!!!', 'class'=>'ggg']);
//Код выше выведет <input type="text" value="!!!" class="ggg">

//Для решения задачи сделайте private метод, который параметром будет принимать массив, например, ['type'=>'text', 'value'=>'!!!'] и делать из него строку с атрибутами, в нашем случае type="text" value="!!!".
	public function inputAll($arr) {
		$str = $this->arrToStr($arr);
		echo "<input ".$str."><br>";
	}
	protected function arrToStr($arr) {
		$str = '';
		foreach ($arr as $k=>$v) {
			$str .= " $k = '$v',";
		}
		$str = substr($str, 0, -1);
		return $str;
	}
	
	public function password($arr) {
		echo "<input type='password' value='".$arr[value]."'><br>";
	}
	public function textarea($arr) {
		echo "<p><textarea placeholder='".$arr[placeholder]. "'>".$arr[value] ."</textarea></p>";
	}
	public function submit($arr) {
		echo "<input type='submit' value='".$arr[value]."'><br>";
	}
	public function close() {
		echo "</form>";
	}
}
 
//Примеры использования:
$form = new Form;

$form->open(['action'=>'oop2.php', 'method'=>'POST']);
//Код выше выведет <form action="index.php" method="POST">

$form->input(['type'=>'text',  'value'=>'!!!']);
//Код выше выведет <input type="text" value="!!!">

$form->inputAll(['type'=>'text', 'value'=>'???', 'class'=>'ggg']);
//Код выше выведет <input type="text" value="???" class="ggg">

$form->password(['value'=>'!!!']);
//Код выше выведет <input type="password" value="!!!">

 $form->textarea(['placeholder'=>'123', 'value'=>'!!!']);
//Код выше выведет <textarea placeholder="123">!!!</textarea>

 $form->submit(['value'=>'go']);
//Код выше выведет <input type="submit" value="go">

$form->close();
//Код выше выведет </form>



//Пример создания формы с помощью нашего класса:

$form->open(['action'=>'oop2.php', 'method'=>'POST']);
$form->inputAll(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']);
$form->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']);
$form->submit(['value'=>'Отправить']);
$form->close();

 

//16. Создайте класс SmartForm, который будет наследовать от Form из предыдущей задачи и сохранять значения инпутов и textarea после отправки.
//То есть если мы сделали форму, нажали на кнопку отправки - то значения из инпутов не должны пропасть. Мало ли что-то пойдет не так, например, форма некорректно заполнена, а введенные данные из нее пропали и их следует вводить заново. Этого следует избегать.
class SmartForm extends Form {
	public function textarea($arr) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$arr[value] = $_POST['content'];
		}
		echo "<p><textarea name='content' placeholder='".$arr[placeholder]. "'>".$arr[value] ."</textarea></p><br>";
	}
	public function inputAll($arr) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$arr[value] = $_POST['input'];
			//$arr[name] = $_POST['name']; 
		}
		$str = $this->arrToStr($arr);
		echo "<input ".$str."placeholder='".$arr[value]."'name = '".$arr[name]."'><br>";
		//print_r ($_POST['name']);
	}
}
$smart = new SmartForm;
$smart->open(['action'=>'oop2.php', 'method'=>'POST']);
$smart->inputAll(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'input']);
$smart->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']);
$smart->textarea(['placeholder'=>'123', 'value'=>'!!!']);
$smart->submit(['value'=>'Отправить']);
$smart->close();

 


?>

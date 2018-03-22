<?php
//1. Сделайте класс Worker, в котором будут следующие public поля - name (имя), age (возраст), salary (зарплата).
class Worker {
	public $name;
	public $age;
	public $salary;
}

//2. Создайте объект этого класса, затем установите поля в следующие значения (не в __construct, а для созданного объекта) - имя 'Иван', возраст 25, зарплата 1000. Создайте второй объект этого класса, установите поля в следующие значения - имя 'Вася', возраст 26, зарплата 2000.
$Ivan = new Worker();
$Ivan->name = 'Иван';
$Ivan->age = 25;
$Ivan->salary = 1000; 

$Vasia = new Worker();
$Vasia->name = 'Вася';
$Vasia->age = 26;
$Vasia->salary = 2000;

//3. Выведите на экран сумму зарплат Ивана и Васи. Выведите на экран сумму возрастов Ивана и Васи.
$sum = $Ivan->salary + $Vasia->salary;
echo 'суммa зарплат Ивана и Васи: '.$sum.'<br>';
echo  $Ivan->age + $Vasia->age."<br>";

//4. Сделайте класс Worker1, в котором будут следующие private поля - name (имя), age (возраст), salary (зарплата) и следующие public методы setName, getName, setAge, getAge, setSalary, getSalary.
class Worker1 {
	private $name;
	private $age;
	private $salary;
	
	function setName($word){
		$this->name = $word;
	}
	function getName(){
		return $this->name;
	}
	function setAge($word){
		$this->age = $word;
	}
	function getAge(){
		return $this->age;
	}
	function setSalary($word){
		$this->salary = $word;
	}
	function getSalary(){
		return $this->salary;
	}
}
 

//5. Создайте 2 объекта этого класса: 'Иван', возраст 25, зарплата 1000 и 'Вася', возраст 26, зарплата 2000.
$Ivan1 = new Worker1();
$Ivan1->setName('Иван');
$Ivan1->setAge(25);
$Ivan1->setSalary(1000);

$Vasia1 = new Worker1();
$Vasia1->setName('Вася');
$Vasia1->setAge(26);
$Vasia1->setSalary(2000);
 

//6. Выведите на экран сумму зарплат Ивана и Васи. Выведите на экран сумму возрастов Ивана и Васи.
$sum = $Ivan1->getSalary() + $Vasia1->getSalary();
echo 'суммa зарплат Ивана и Васи: '.$sum.'<br>';
echo  $Ivan1->getAge() + $Vasia1->getAge()."<br>";
 

//7. Дополните класс Worker из предыдущей задачи private методом checkAge, который будет проверять возраст на корректность (от 1 до 100 лет). Этот метод должен использовать метод setAge перед установкой нового возраста (если возраст не корректный - он не должен меняться).
class Worker2 {
	private $name;
	private $age;
	private $salary;
	
	function setName($word){
		$this->name = $word;
	}
	function getName(){
		return $this->name;
	}
	
	function setAge($age){
		if (!$this->checkAge($age)) {
			throw new AgeException('Invalid age');
		}
		$this->age = $age;
	}
	function getAge(){
		return $this->age;
	}
	private function checkAge($age){
		return $age >=1 && $age <= 100;
	}
	function setSalary($word){
		$this->salary = $word;
	}
	function getSalary(){
		return $this->salary;
	}
}
$Ivan2 = new Worker1();
try {
	$Ivan2->setAge(200);
} catch (Exception $e) {
	echo $e->getMessage();
}
$Ivan2->setName('Иван');
//$Ivan2->setAge(132);
$Ivan2->setSalary(1000);

echo $Ivan2->getAge(); 

 

//На __construct


//8. Сделайте класс Worker, в котором будут следующие private поля - name (имя), salary (зарплата). Сделайте так, чтобы эти свойства заполнялись в методе __construct при создании объекта (вот так: new Worker(имя, возраст) ). Сделайте также public методы getName, getSalary.
class Worker3 {
	private $name;
	private $age;
	private $salary;
	
	function __construct($name, $age, $salary){
		$this->name = $name;
		$this->age = $age;
		$this->salary= $salary;
	}
	
	function getName(){
		return $this->name;
	}
	function getAge(){
		return $this->age;
	}
	function getSalary(){
		return $this->salary;
	}
}
 

//9. Создайте объект этого класса 'Дима', возраст 25, зарплата 1000. Выведите на экран произведение его возраста и зарплаты.

 $Dima = new Worker3('Дима', 25, 1000);
 $res = $Dima->getAge() * $Dima->getSalary();
 echo $res;

 
//Наследование

 

//10. Сделайте класс User, в котором будут следующие protected поля - name (имя), age (возраст), public методы setName, getName, setAge, getAge.
class User {
	protected $name;
	protected $age;
		
	function setName($word){
		$this->name = $word;
	}
	function getName(){
		return $this->name;
	}
	function setAge($word){
		$this->age = $word;
	}
	function getAge(){
		return $this->age;
	}
}
 
 

//11. Сделайте класс Worker, который наследует от класса User и вносит дополнительное private поле salary (зарплата), а также методы public getSalary и setSalary.
class Worker5 extends User {
	private $salary;
	
	function setSalary($word){
		$this->salary = $word;
	}
	function getSalary(){
		return $this->salary;
} 

//12. Создайте объект этого класса 'Иван', возраст 25, зарплата 1000. Создайте второй объект этого класса 'Вася', возраст 26, зарплата 2000. Найдите сумму зарплата Ивана и Васи.

$Ivan3 = new Worker5();
$Ivan3->setName('Иван');
$Ivan3->setAge(25);
$Ivan3->setSalary(1000);

$Vasia3 = new Worker5();
$Vasia3->setName('Вася');
$Vasia3->setAge(26);
$Vasia3->setSalary(2000);
 
//13. Сделайте класс Student, который наследует от класса User и вносит дополнительные private поля стипендия, курс, а также геттеры и сеттеры для них.
class Student extends User {
	private $grants;
	private $course;
	
	function setGrants($word){
		$this->grants = $word;
	}
	function getGrants(){
		return $this->grants;
	}	
	function setCourse($word){
		$this->course = $word;
	}
	function getCourse(){
		return $this->course;
	}
}
 

//14. Сделайте класс Driver (Водитель), который будет наследоваться от класса Worker из предыдущей задачи. Этот метод должен вносить следующие private поля: водительский стаж, категория вождения (A, B, C).
class Driver extends Worker5 {
	private $experience;
	private $category;
	
	function setExperience($word){
		$this->experience = $word;
	}
	function getExperience(){
		return $this->experience;
	}	
	function setcategory($word = A){
		$this->category = $word;
	}
	function getcategory(){
		return $this->category;
	}
}
 
 
?>
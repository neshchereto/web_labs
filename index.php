<?php

/*-- VARIABLES --*/
    $name = 'Olya'; // string
    $age = 19; // int
    $has_kids = false; // bool
    $cash = 20.75; // float

/*-- WORKING WITH VARIABLES, STRING, CONCATENATION, ETC --*/
//    echo $name;
//    echo '$name is $age years old.'; // error (not parsing a variable)
//    echo $name . ' is ' . $age . ' years old.'; // . - concatenation operator
//    echo "$name is $age years old.";
//    echo "${name} is ${age} years old.";
//
//    $x = '5' + '5'; // gives us an int 10
//    var_dump($x);
//    echo 10 - 5;
//    echo 5 * 6;
//    echo 10 / 2;
//    echo 10 % 3;
//
//    define('HOST', 'localhost'); // constants
//    const HOST2 = 'a';

/*-- EXPLODE, IMPLODE --*/
    $sports_string = "football,volleyball,tennis";
    $sports_array = explode(",", $sports_string);
    print_r($sports_array);

    $items_array = array("table", "door", "chair");
    $items_string = implode(",", $items_array);
    echo $items_string;

/*-- розіменування змінних --*/
    $num = 5;
    $ref =& $num; // reference
    $ref = 10;
    echo $num;

/*-- порівняння --*/
    $a = 5;
    $b = '5';
    $c = 7;
    if($a == $b) {
        echo 'same values';
    } else{
        echo 'different values';
    }
    if($a === $b) {
        echo 'same values and type';
    } else{
        echo 'different values or type';
    }
    if($a != $b) {
        echo 'different values';
    } else{
        echo 'same values';
    }

/*-- приведення до цілого числа --*/
    $x = "123.45";
    $y = (int)$x;
    var_dump($y);

/*-- приведення до рядка --*/
    $x = 123;
    $y = (string)$x;
    var_dump($y);

/*-- приведення до логічного значення --*/
    $x = "some value";
    $y = (bool)$x;
    var_dump($y);

    $z = 0;
    $w = (bool)$z;
    var_dump($w);

/*-- oop --*/
    class Fruit{
        public $name;
        public $color;

        public function __construct($name, $color){
            $this->name = $name;
            $this->color = $color;
        }

        function get_name(){
            return $this->name;
        }

        function get_color(){
            return $this->color;
        }
    }

    class Pear extends Fruit{
        public function __construct($name)
        {
            parent::__construct($name, "green");
        }
    }

    $apple = new Fruit("Apple", "red");
    $pear = new Pear("Pear name");
    echo $apple->get_name();
    echo $apple->get_color();
    echo $pear->get_color();

/*-- singleton pattern --*/
    class Singleton{
        private static $instance = null;
        private function __construct(){
            echo "Connect";
        }
        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new static();
            } else{
                echo "Already connected";
            }
            return self::$instance;
        }
    }
    $obj1 = Singleton::getInstance();
    $obj2 = Singleton::getInstance();

/*-- magic methods --*/
    class Person {
        private $name;
        private $age;

        public function __construct($name, $age) { // цей метод викликається при створенні нового об'єкта
            $this->name = $name;
            $this->age = $age;
        }

        public function __toString() { // цей метод викликається при використанні об'єкта як рядка
            return "{$this->name}, {$this->age}";
        }

        public function __get($name) { // цей метод викликається при спробі отримати значення недоступного властивості об'єкта
            return "{$name} does not exist";
        }

        public function __set($name, $value) { // цей метод викликається при спробі присвоїти значення недоступній властивості об'єкта
            $this->$name = $value;
        }

        public function __call($name, $arguments) { // цей метод викликається при спробі викликати недоступний метод об'єкта
            return "Method {$name} does not exist with arguments (" . implode(',', $arguments) . ")";
        }
    }

    $person1 = new Person("John", 30);
    echo $person1;

    echo $person1->address;

    $person1->address = "New York";
    echo $person1->address;

    echo $person1->say_hello("world");

/*-- arrays --*/
        $numbers = [1, 44, 55, 22];
        $fruits = array('apple', 'orange', 'pear');

        //var_dump($numbers);
        echo $fruits[1];

/*-- associative array --*/
        $colors = [
            1 => 'red',
            4 => 'blue',
            6 => 'green'
        ];
        echo $colors[4];

        $hex = [
            'red' => '#f00',
            'blue' => '#0f0',
            'green' => '#00f'
        ];
        echo $hex['blue'];

        $person = [
            'first_name' => 'olya',
            'last_name' => 'neshcheret',
            'email' => '123@gmail.com'
        ];
        echo $person['first_name'];

        $people = [
            [
                'first_name' => 'olya',
                'last_name' => 'neshcheret',
                'email' => '123@gmail.com'
            ],
            [
                'first_name' => 'john',
                'last_name' => 'surname1',
                'email' => '123@gmail.com'
            ],
            [
                'first_name' => 'jane',
                'last_name' => 'surname2',
                'email' => '123@gmail.com'
            ]
        ];
        echo $people[1]['email'];

        var_dump(json_encode($people)); // same with json_decode

/*-- conditionals --*/
        $age = 20;
        if($age >= 18){
            echo 'You are old enough to vote';
        } else {
            echo 'Sorry, you are not old enough';
        }

        $date = date('H');
        if($date < 12){
            echo 'Good morning';
        } elseif($date < 17){
            echo 'Good afternoon';
        } else {
            echo 'Good evening';
        }

        if(true){
            echo 123;
        }

        $posts = ['First post'];
        if(!empty($posts)){
            echo $posts[0];
        } else {
            echo 'No posts';
        }

        echo !empty($posts) ? $posts[0] : 'No posts';

        $firstPost = !empty($posts) ? $posts[0] : 'No posts';
        $firstPost = !empty($posts) ? $posts[0] : null;
        $firstPost = $posts[0] ?? null;
        echo $firstPost;

        $favColor = 'red';

        switch ($favColor){
            case 'red':
                echo 'Your favorite color is red';
                break;
            case 'blue':
                echo 'Your favorite color is blue';
                break;
            case 'green':
                echo 'Your favorite color is green';
                break;
            default:
                echo 'Your favorite color is unknown';
        }

/*-- loops --*/
        for($i = 0; $i <= 10; $i++){
            echo $i;
        }

        $i = 1;
        while($i <=15){
            echo 'Number' . $i . '<br>';
            $i++;
        }

        $i = 1;
        do{
            echo 'Number' . $i . '<br>';
            $i++;
        } while($i <= 5);

        $posts = ['First post', 'Seconds post', 'Third post'];
        for($i = 0; $i < count($posts); $i++){
            echo $posts[$i];
        }
        foreach($posts as $post){
            echo $post;
        }
        foreach($posts as $index => $post){
            echo $index . ' - ' . $post . '<br>';
        }

        $person = [
            'first_name' => 'Olya',
            'last_name' => 'Neshcheret',
            'email' => '123@gmail.com'
        ];
        foreach($person as $key => $value){
            echo "$key - $value<br>";
        }

/*-- functions --*/
        function registerUser($name){ //argument
            echo $name . ' registered';
        }
        registerUser('Olya'); //parameter

        function sum($n1 = 4, $n2 = 5){
            return $n1 + $n2;
        }
        $number = sum(5, 5);
        echo $number;
        $number = sum();
        echo $number;

        $subtract = function ($n1, $n2){ // anonymous function
            return $n1 - $n2;
        }; // ! need a semicolon here
        echo $subtract(10, 5);

        $multiply = fn($n1, $n2) => $n1 * $n2; // arrow function
        echo $multiply(9, 9);

/*-- array functions --*/
        $fruits = ['apple', 'orange', 'pear'];

        echo count($fruits);

        var_dump(in_array('apple', $fruits));

        $fruits[] = 'grape';
        array_push($fruits, 'blueberry', 'strawberry');
        array_unshift($fruits, 'mango');

        array_pop($fruits);
        array_shift($fruits);
        unset($fruits[2]);

        $chunked_array = array_chunk($fruits, 2);

        print_r($chunked_array);

        print_r($fruits);

        $arr1 = [1, 2, 3];
        $arr2 = [4, 5, 6];
        $arr3 = array_merge($arr1, $arr2);
        $arr4 = [...$arr1, ...$arr2];

        print_r($arr3, $arr4);

        $a = ['green', 'red', 'yellow'];
        $b = ['avocado', 'apple', 'banana'];

        $c = array_combine($a ,$b);

        print_r($c);

        $keys = array_keys($c);
        print_r($keys);

        $flipped = array_flip($c);
        print_r($flipped);

        $numbers = range(1, 20);
        print_r($numbers);

        $newNumbers = array_map(function($number){
            return "Number ${number}";
        }, $numbers);
        print_r($newNumbers);

        $lessThan10 = array_filter($numbers, fn($number) => $number <= 10);
        print_r($lessThan10);

        $sum = array_reduce($numbers, fn($carry, $num) => $carry + $num);
        var_dump($sum);

/*-- string functions --*/
        $string = 'Hello World';
        echo strlen($string);
        echo strpos($string, 'o');
        echo strrpos($string, 'o');
        echo strrev($string);
        echo strtolower($string);
        echo strtoupper($string);
        echo ucwords($string);
        echo str_replace('World', 'Everyone', $string);
        echo substr($string, 0, 5);
        echo substr($string, 5);
        if(str_starts_with($string, 'Hello')){
            echo 'Yes';
        }
        if(str_ends_with($string, 'ld')){
            echo 'Yes';
        }

        $string2 = '<h1>Hello</h1>';
        echo $string2; // parsed by browser

        $string3 = '<script>alert(1)</script>';
        echo htmlspecialchars($string3); //outputs actual

        printf('%s likes to %s', 'Brad', 'code');
        printf('1+1=%f', 1+1);

/*-- superglobals --*/
    var_dump($_SERVER);

/*-- get and post --*/
    if(isset($_POST['submit'])){
        // echo $_POST['name'];
        //$name = htmlspecialchars($_POST['name']);
        //$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        // echo $_POST['age'];
        $age = htmlspecialchars($_POST['age']);
        echo $name;
    }

/*-- cookies --*/
    setcookie('name', 'Olya', time() + 86400);

    if(isset($_COOKIE['name'])){
        echo $_COOKIE['name'];
    }

    setcookie('name', '', time() - 86400);

/*-- sessions --*/
    session_start();
    if(isset($_POST['submit'])){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['password'];

        if($username == 'john' && $password == 'password'){
            $_SESSION['username'] = $username;
            header('Location: /myproject1/extras/dashboard.php');
        } else{
            echo 'Incorrect login';
        }
    }

?>

<!--<a href="--><?php //echo $_SERVER['PHP_SELF']; ?><!--?name=Brad&-->
<!--age=30">Click</a>-->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
        <label for="username">
            Username:
        </label>
        <input type="text" name="username"/>
    </div>
    <div>
        <label for="password">
            Password:
        </label>
        <input type="text" name="password"/>
    </div>
    <input type="submit" value="Submit" name="submit"/>
</form>
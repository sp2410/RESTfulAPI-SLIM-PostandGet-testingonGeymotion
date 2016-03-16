<?php
require 'vendor/autoload.php';
require 'getmovie.php';
require 'getmovieid.php';
require 'getrating.php';
require 'delete.php';
require 'adding.php';


$app = new \Slim\App();


$app->get('/',function ($request, $response, $args){
	

});

$app->get('/movies/id/{mid}',function ($request, $response, $args){
	$a= getmovieid($args['mid']);
	
	if ($a!=null){
		
	print json_encode($a);
	
	}
	else {
		echo 'Sorry! no such movie exists. Please select from: alice, avator, avengers, darkknight, darkknightrises, despicable2, et, forrestgump, frozen, harry2, hungergames1, hungergames2, ironman3, jurassicpark, lion, nemo, pirates, rings1, rings2, shrek2, spiderman1, spiderman2, spiderman3, starwars1, starwars3, starwars4, titanic, toy3, transformers1, transformers2';
	}
}
);

$app->get('/movies/',function ($request, $response, $args){
	$a= getmovie();
	print json_encode($a);
	
}
);


$app->get('/delete', function ($request, $response, $args){
	//echo "Hi";
//$data = $request->getParsedBody()['text'];
echo "<h1>Use the form to enter the id of movie to delete</h1>";
echo "<form action =\"http://www.example.com/post\" method =\"post\">";
echo "Please enter the id of the movie: <input type =\"text\" name=\"id\"><br>";
echo "<input type =\"submit\" value=\"Submit\">";
echo "</form>";

});

$app->get('/add', function ($request, $response, $args){
	//echo "Hi";
//$data = $request->getParsedBody()['text'];
echo "<h1>Please use the form to add the movie</h1>";
echo "<form action =\"http://www.example.com/post2\" method =\"post\">";
echo "Please enter the id of the movie: <input type =\"text\" name=\"id\"><br>";
echo "Please enter the name of the movie: <input type =\"text\" name=\"name\"><br>";
echo "Please enter the description of the movie: <input type =\"text\" name=\"description\"><br>";
echo "Please enter the url of the movie: <input type =\"text\" name=\"url\"><br>";
echo "<input type =\"submit\" value=\"Submit\">";
echo "</form>";

//`primaryID`, `id`, `name`, `description`, `stars`, `length`, `image`, `year`, `rating`, `director`, `url`




});


$app->post('/post', function ($request, $response, $args){
	$data = $request->getParsedBody();
	$x=$data['id'];
	$a= fundelete($x);
	if($a=true){
		echo $x . " has been deleted";
	}
	else{
		echo "No such movie!";
	}
	
});

$app->post('/post2', function ($request, $response, $args){
	$data = $request->getParsedBody();
	
	//`id`, `name`, `description`, `stars`, `length`, `image`, `year`, `rating`, `director`,
	//	`url`

	$x=$data['id'];
	$y=$data['name'];
	$z=$data['description'];
	$i=$data['url'];
	$a=fundadd($x,$y,$z,$i);
	
	if($a==true){echo "done";
	}
	else{
		echo "Sorry! Not done";
	}
	
});



$app->get('/movies/rating/{nnn}',function ($request, $response, $args){
	$b= getrating($args['nnn']);
	
	
	
	if ($b!=null){
		
	print json_encode($b);
	
	}
	else {
		echo 'Sorry! no such movie exists. Please select lower ratings';
	}
	
}
);

$app->run();
?>

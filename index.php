<!DOCTYPE html>

<?php 

	$nounDefault = array("Bobcat" ,"Boy", "Library", "Mailman" ,"Market", "Palm","Puffin", "Siamese", "Slope", "Wool");
	$adjectiveDefault = array("rainy","squalid","longing","domineering","selfish","obsequious","fretful","amusing","versed","miniature" );
	$adverbDefault = array("heavily" ,"finally","ever","sadly","bashfully","loudly","overconfidently","freely","suddenly","judgementally");
	$verbDefault = array("shrug","stroke","reduce","slow","flap","offer","pour","scribble","lighten","disagree");
	$nounUser = $_POST["Nouns"];
	$nounUserArray = explode(",", $nounUser);
	$adjectiveUser = $_POST["Adjectives"];
	$adjectiveUserArray = explode(",", $adjectiveUser);
	$adverbUser = $_POST["Adverbs"];
	$adverbUserArray = explode(",", $adverbUser);
	$verbUser = $_POST["Verbs"];
	$verbUserArray = explode(",", $verbUser);
	shuffle($nounDefault);
	shuffle($adjectiveDefault);
	shuffle($adverbDefault);
	shuffle($verbDefault);
	$nounFinalArray = array();
	$adjectiveFinalArray = array();
	$adverbFinalArray = array();
	$verbFinalArray = array();
	
	function populateFinalArray($UserArray, $FinalArray, $DefaultArray){
		
		if ($UserArray[0]=="") {
			unset($UserArray[0]);
		}	
		for ($i=0; $i < count($UserArray) ; $i++) { 
			array_push($FinalArray, $UserArray[$i]);
		}
		

		if (count($UserArray)==0) {
			unset($UserArray[0]);
			for ($i=0; $i < 4 ; $i++) { 
				
			array_push($FinalArray, $DefaultArray[$i]);	
			}
		}
		else if (count($UserArray)==1) {
			
			for ($i=0; $i < 3 ; $i++) { 
				
			array_push($FinalArray, $DefaultArray[$i]);	
			}
		}
		else if (count($UserArray)==2) {
			
			for ($i=0; $i < 2 ; $i++) { 
				
			array_push($FinalArray, $DefaultArray[$i]);	
			}
		}
		else if (count($UserArray)==3) {
			
			for ($i=0; $i < 1 ; $i++) { 
				
			array_push($FinalArray, $DefaultArray[$i]);	
			}

		}
		
		shuffle($FinalArray);

		return $FinalArray;
	}

	
	
 ?>
<html>
<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<header>
		<h1>Welcome to MadLibs!</h1>
	</header>
	<section>
		<form action="index.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label" >Nouns:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="noun, noun, noun, noun" name="Nouns">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" >Adjectives:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="adjective, adjective, adjective, adjective" name="Adjectives">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Adverbs: </label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="adverb, adverb, adverb, adverb" name="Adverbs">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Verb:</label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="verb, verb, verb, verb" name="Verbs">
				</div>
			</div>
		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-2">
			<div class="checkbox ">
			  <label>
			    <input type="checkbox" name="Shopping" value="">
			    Going Shopping
			  </label>
			</div>
			<div class="checkbox ">
			  <label>
			    <input type="checkbox" name="BrainStorming" value="">
			    Brain Storming
			  </label>
			</div>
			<div class="checkbox ">
			  <label>
			    <input type="checkbox" name="ChristmasTree" value="">
			    Christmas Tree
			  </label>
			</div>

			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
		</div>  
		  
		  
		</form>

	</section>
	

	
	<div id="story">
	<?php 
	$nounFinalArray= populateFinalArray($nounUserArray, $nounFinalArray, $nounDefault);
	$adjectiveFinalArray= populateFinalArray($adjectiveUserArray, $adjectiveFinalArray, $adjectiveDefault);
	$adverbFinalArray= populateFinalArray($adverbUserArray, $adverbFinalArray, $adverbDefault);
	$verbFinalArray= populateFinalArray($verbUserArray, $verbFinalArray, $verbDefault);	

	if (isset($_POST['Shopping'])) {
		
		echo "<h2>Going Shopping</h2>";
	
	echo "<p>Today I went shopping. When I arrived at the store I saw a $adjectiveFinalArray[0] $nounFinalArray[0], who upon noticing me $adverbFinalArray[0] said \"I need to $verbFinalArray[0]\". \"Well,
	that was $adjectiveFinalArray[1]\" I thought to myself and walked in the store. The store had rearranged it's inventory, so I felt $adverbFinalArray[1] lost. I
	walked up to store clerk and said $adverbFinalArray[2] \"I am looking for a $adjectiveFinalArray[2] $nounFinalArray[1] that doesn't $verbFinalArray[1] as often as the last one I had.\" The store clerk
	looked at me with a $adjectiveFinalArray[3] look in his eye and said, \"What you are looking for can be found by the $nounFinalArray[2], if you see a $nounFinalArray[3] that 
	$adverbFinalArray[3] can $verbFinalArray[2], then you've gone too far.\" As I tried to understand his directions, I thought to myself, \"I should have just ordered it
	on amazon.com, Their products seem to $verbFinalArray[3] the perfect amount\"</p>";
	
	}
	else if (isset($_POST['BrainStorming'])) {
		echo "<h2>Brain Storming</h2>";
	
	echo "<p>
		Many say that brain storming is $adjectiveFinalArray[0] and does not $verbFinalArray[0].
		However, with the combination of the right computer and $nounFinalArray[1] anyone
		can lead a good $verbFinalArray[1]. When you have $adverbFinalArray[0] pulled together a $adjectiveFinalArray[1]
		group of $nounFinalArray[0] in a big room with lots of TV's then 
		magical things will happen. In the past we have $adverbFinalArray[1] suggested 
		participants work together to find the most $adjectiveFinalArray[2] solution. The
		most difficult part is many $adjectiveFinalArray[3] $nounFinalArray[2] like to 
		$verbFinalArray[2]. This has proved to be $adverbFinalArray[2] problimatic. 
		But in the end the most important $nounFinalArray[3] usually is brought to light.
		Typically we try to encourage ideas to $verbFinalArray[3], and never shut ideas 
		down. This concludes our instructions. Thanks for $adverbFinalArray[3] listening!  
	  
	 </p>";
	}
	else if (isset($_POST['ChristmasTree'])) {
		echo "<h2>Christmas Tree</h2>";
	
	echo "<p>
		Every Christmas we $verbFinalArray[0] to a $adjectiveFinalArray[0] tree farm far away.
		This is not just any $adjectiveFinalArray[1] tree farm. My dad and I $verbFinalArray[1]
		onto the $nounFinalArray[0] to $verbFinalArray[2] for the perfect $nounFinalArray[1]. 
		Some people like them $adjectiveFinalArray[2], but I prefer them $adjectiveFinalArray[3]. After 
		searching for hours I usually $adverbFinalArray[0] exclaim \"Dad! The perfect tree is over 
		there!\" Off we $verbFinalArray[3] to get the tree. The problem is we always forget the
		$nounFinalArray[2] and the $nounFinalArray[3]. But at the end of the day we $adverbFinalArray[1]
		get the tree and head home $adverbFinalArray[2]. \"I wish it was Christmas all year round\" 
		I $adverbFinalArray[3] think to myself. 

		
	 </p>";
	}

	 ?>	 
	</div>
</body>
</html>

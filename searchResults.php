<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>All The News</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="./assets/styles/bulma.css">
    	<script defer src="./assets/scripts/all.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<h1 id="title">All the News</h1>
			<form id="search-form" action="">
				<input type="text" name="search-input">
				<input type="submit" name="search-submit" value="Search">
			</form>
			
		</div>
		<div class="container">
				<!-- for each of the results in the cursor -->
				<div class="result-link">
					<a href="">News Title</a>
				</div>

				<?php
					require 'classes/DB.class.php';
					try{
						$db = new DB();
						$searchWord = $_GET["searchWord"];
						$this->coll = $this->db->{'articles'};
						$query = array('title' => array('$regex' => new MongoRegex("/\b$searchWord%/i")));
						$cursor = $this->coll->find($query,['limit' => 1000, 'projection' => ['_id' => 0, 'title' => 1, 'publication' => 1]]);
						foreach ($cursor as $row) {
			                echo "<div class=\"box\">";
			                foreach ($row as $key=>$col) {
			                    switch ($key) {
			                        case 'publication':
			                            echo "<div class=\"tag is-black\">$col</div>\n\t\t\t";
			                            break;
			                        case 'title':
			                            echo "<h5 class=\"title is-5\">$col</h5>\n\t\t\t";
			                            break;
			                        default:
			                            break;
			                    }
			                }
			                echo "</div>";
					} catch(Exception $e) {
						die ("Error searching for articles");
					}
				?>
			</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		searchWord = window.location.search.split("=")[1];

		document.getElementsByName("search-input")[0].value = searchWord;
	</script>
</html>

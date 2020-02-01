<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head></head><body>
<html>
<head>
<link rel="stylesheet" href="movies.css"></link>
</head>
<body>
<?php
$file = "tmnt";
$file = $_GET["movie"];
$folder = scandir("./" . $file . "/");
$infoText = file($file . "/info.txt");
//echo file_get_contents($file . "/info.txt")[3];
?>
<div>
<img src="images/rancidbanner.png" alt="Rancid Tomatoes" class="header"/>
</div>

<h1 class="yearHead"><?php echo $infoText[0] . "(" . $infoText[1] . ")"?></h1>

<div class="main">
<div class="header">
<?php if ($infoText[2] < 60) {
    echo '<img src="images/rottenlarge.png" alt="Rotten"/> <span class="percent">';
} else {
    echo '<img src="images/freshlarge.png" alt="Fresh" height="83px"/> <span class="percent">';
    }
   echo $infoText[2]?>%</span>
</div>
<div class="image">
<img src="<?php echo $file . '/overview.png'; ?>" alt="general overview"/>
</div>
	<div class="reviews">
	<?php 
	$j = 0;
	for ($i = 0; $i < sizeof($folder); $i++) {
	    if ( startsWith ($folder [$i], "review") ) {
	        if ($j == 5) {
	            echo '</div><div class="reviews">';
	        }
	        $j++;
	        $str = file( "./" . $file . "/" . $folder [$i] );
	        $review = $str[0];
	        $rotten = strtolower($str[1]);
	        $author = $str[2];
	        $authorFrom = $str[3];
	        echo '<p class="white">
	        <img src="images/' . $rotten . '.gif" alt="' . $rotten . '" class="float-left"/> <q>' . $review . '</q>
	        </p>
	        <p class="author">
	        <img src="images/critic.gif" alt="Critic" class="float-left"/>' . $author .'<br/>
	        ' . $authorFrom . '
	        </p>';
	    }
	}
	function startsWith ($string, $startString) {
	    $len = strLen($string);
	    $lenSub = strlen($startString);
	    return (substr($string, 0, $lenSub) === $startString);
	}?>
	</div>
	<div class="overview">
	//<dl>
	<?php 
	$overviewText = file($file . "/overview.txt");
	for ($i = 0; $i < sizeof($overviewText); $i++) {
	    $colon = strpos($overviewText[$i], ":");
	    $firstStr = substr($overviewText[$i], 0, $colon + 1);
	    $secondStr = substr($overviewText[$i], $colon + 1, strlen($overviewText[$i]) - strlen($firstStr));
	    echo "<dt>" . $firstStr . "</dt><dd>" . $secondStr . "</dd>";
	}
	?>
	<!--
		<dt>STARRING</dt>
		<dd>
			Patrick Stewart <br/> Mako <br/> Sarah Michelle Gellar <br/>
			Kevin Smith
		</dd>

		<dt>DIRECTOR</dt>
		<dd>Kevin Munroe</dd>

		<dt>RATING</dt>
		<dd>PG</dd>

		<dt>THEATRICAL RELEASE</dt>
		<dd>Mar 23, 2007</dd>

		<dt>MOVIE SYNOPSIS</dt>
		<dd>After the defeat of their old arch nemesis, The Shredder, the
			Turtles have grown apart as a family.</dd>

		<dt>MPAA RATING</dt>
		<dd>PG, for animated action violence, some scary cartoon images
			and mild language</dd>

		<dt>BOX OFFICE</dt>
		<dd>$54,132,596</dd>

		<dt>LINKS</dt>
		<dd>
			<ul>
				<li><a rel="noopener" href="http://www.ninjaturtles.com/">The Official
						TMNT Site</a></li>
				<li><a rel="noopener" href="http://www.rottentomatoes.com/m/teenage_mutant_ninja_turtles/">RT
						Review</a></li>
				<li><a rel="noopener" href="http://www.rottentomatoes.com/">RT Home</a></li>
			</ul>
		</dd>
		-->
	</dl>
	</div>
	</div>
</body>
</html>
<script type="text/javascript" src="/d2l/common/math/MathML.js?v=20.19.9.18089-203 "></script><script type="text/javascript">document.addEventListener('DOMContentLoaded', function() { D2LMathML.DesktopInit('https://s.brightspace.com/lib/mathjax/2.6.1/MathJax.js?config=MML_HTMLorMML','https://s.brightspace.com/lib/mathjax/2.6.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML'); });</script></body></html>
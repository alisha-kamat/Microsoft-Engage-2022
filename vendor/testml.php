<?php
// Import library
use Phpml\Regression\LeastSquares;
//use Phpml\SupportVectorMachine\Kernel;

//$linearRegression = new \MachineLearning\Regression\LeastSquares();

// Training data
$samples = [[60], [61], [62], [63], [65]];
$targets = [3.1, 3.6, 3.8, 4, 4.1];

// Initialize regression engine
$regression = new LeastSquares();
// Train engine
$regression->train($samples, $targets);
// Predict using trained engine
$regression->predict([64]); // return 4.06

?>
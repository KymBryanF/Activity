<?php
require_once 'vendor/autoload.php';

use Rubix\ML\ModelSerializers\Persistable;
use Rubix\ML\Storage\JSON;

$serializer = new Persistable(new JSON(), 'models.json');
$models = $serializer->load();

$newSamples = [
[6.0, 2.9, 4.5, 1.5], // Iris-versicolor
[5.5, 2.5, 4.0, 1.3], // Iris-versicolor
[6.7, 3.0, 5.2, 2.3], // Iris-virginica
];

echo "New Samples:\n";
print_r($newSamples);

// Predictions from each model
echo "\nSVC Predictions:\n";
print_r($models['svc']->predict($newSamples));

echo "\nKNN Predictions:\n";
print_r($models['knn']->predict($newSamples));

echo "\nNaive Bayes Predictions:\n";
print_r($models['naiveBayes']->predict($newSamples));
?>
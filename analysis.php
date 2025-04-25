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

// Get predictions
$svc_predictions = $models['svc']->predict($newSamples);
$knn_predictions = $models['knn']->predict($newSamples);
$nb_predictions = $models['naiveBayes']->predict($newSamples);

echo "\nModel Comparison:\n";
echo "----------------------------------------------------\n";
echo "Sample | SVC | KNN | NB |\n";
echo "----------------------------------------------------\n";

foreach ($newSamples as $index => $sample) {
echo sprin
(
" %d | %-15s | %-15s | %-15s |\n",
$index + 1,
$svc_predictions[$index],
$knn_predictions[$index],
$nb_predictions[$index]
);

}
echo "----------------------------------------------------\n";

?>
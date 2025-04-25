<?php
require_once 'vendor/autoload.php';

use Rubix\ML\Classify\SVC;
use Rubix\ML\Classify\KNearestNeighbors;
use Rubix\ML\Classify\NaiveBayes;
use Rubix\ML\Core\Kernel;
use Rubix\ML\ModelSerializers\Persistable;
use Rubix\ML\Storage\JSON;

$data = include 'data.php';
$samples = $data[0];
$labels = $data[1];

// Support Vector Classifier
$svc = new SVC(Kernel::rbf(10.0), 1.0);
$svc->train($samples, $labels);

// K-Nearest Neighbors
$knn = new KNearestNeighbors(3);
$knn->train($samples, $labels);

// Naive Bayes Classifier
$naiveBayes = new NaiveBayes();
$naiveBayes->train($samples, $labels);

// Save Models
$serializer = new Persistable(new JSON(), 'models.json');
$serializer->save([
'svc' => $svc,
'knn' => $knn,
'naiveBayes' => $naiveBayes,
]);

echo "Models trained and saved to models.json\n";
<?php
 
// Concrete Class
class Vehicle 
{
    public $model;
 
    public $enginesCount;
 
    public $type;
 
    const CAR = "Car";
 
    const BUS = "Bus";
 
    const TRAILER = "Trailer";
 
    public function __construct()
    {
 
    }
} 
// --------------------------------
// Builder interface
interface VehicleBuilderInterface{
    public function setModel();
    public function setEnginesCount();
    public function setType(); 
    public function getVehicle();
}
 
// -----------------------------------
// Builder implementations
class KiaCarBuilder implements VehicleBuilderInterface
{
    private $vehicle;
    public function __construct(Vehicle $vehicle) {
        $this->vehicle = $vehicle;
    }
 
    public function setModel(){
        $this->vehicle->model = "Kia";
    }
 
    public function setEnginesCount() {
        $this->vehicle->enginesCount = 1;
    }
 
    public function setType(){
        $this->vehicle->type = Vehicle::CAR;
    }
 
    public function getVehicle(){
        return $this->vehicle;
    }
}
 
class BmwBusBuilder implements VehicleBuilderInterface {
 private $vehicle; 
 public function __construct(Vehicle $vechile){
    $this->vehicle = $vechile;
 }
 
 public function setModel() {
    $this->vehicle->model = "Bmw";
 }
 public function setEnginesCount() {
    $this->vehicle->enginesCount = 2;
 }
 public function setType() {
    $this->vehicle->type = Vehicle::BUS;
 }
 
 public function getVehicle() {
    return $this->vehicle;
 }
}
 
 class ShevroletTrailerBuilder implements VehicleBuilderInterface {
 private $vehicle;
 public function __construct(Vehicle $vechile)
 {
 $this->vehicle = $vechile;
 }
 
 public function setModel()
 {
 $this->vehicle->model = "Shevrolet";
 }
 
 public function setEnginesCount()
 {
 $this->vehicle->enginesCount = 2;
 }
 
 public function setType()
 {
 $this->vehicle->type = Vehicle::TRAILER;
 }
 
 public function getVehicle()
 {
 return $this->vehicle;
 }
}

// ----------------------------
function getVehicle() {
     return $this->vehicle;
}

// ---------------------------
class VehicleDirector
{
 public function build(VehicleBuilderInterface $builder)
 {
 $builder->setModel();
 $builder->setEnginesCount();
 $builder->setType();
 
 return $builder->getVehicle();
 }
} 

// -----------------------------
$kiaCar = (new VehicleDirector())->build(new KiaCarBuilder(new Vehicle()));
 
$bmwBus = (new VehicleDirector())->build(new BmwBusBuilder(new Vehicle()));
 
$shevroletTrailer = (new VehicleDirector())->build(new ShevroletTrailerBuilder(new Vehicle()));

// --------------------------
echo "<pre>";
// var_dump($kiaCar);
echo "\n";
echo "Vechile Model: " . $kiaCar->model . "\n";
echo "Vechile Engines: " . $kiaCar->enginesCount . "\n";
echo "Vechile Type: " . $kiaCar->type . "\n";
echo "<hr/>";
// var_dump($bmwBus);
echo "\n";
echo "Vechile Model: " . $bmwBus->model . "\n";
echo "Vechile Engines: " . $bmwBus->enginesCount . "\n";
echo "Vechile Type: " . $bmwBus->type . "\n";
echo "<hr/>";
// var_dump($shevroletTrailer);
echo "\n";
echo "Vechile Model: " . $shevroletTrailer->model . "\n";
echo "Vechile Engines: " . $shevroletTrailer->enginesCount . "\n";
echo "Vechile Type: " . $shevroletTrailer->type . "\n";
echo "<pre>"; 
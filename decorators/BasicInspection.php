<?php

/**
 * Created by PhpStorm.
 * User: emodatt08
 * Date: 27/07/2018
 * Time: 8:41 AM
 */

//Great Structure which is open to extension and less code rework
interface CarService{
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService
{

    public function getCost(){
        return  19;
    }
    public function getDescription()
    {
        // TODO: Implement getDescription() method.
        return "Convertible blue mustang";
    }

}

class OilChange implements CarService{

    protected $carservice;

    public function  __construct(CarService $carService)
    {
        $this->carservice = $carService;
    }

    public function getCost()
    {
        // TODO: Implement getCost() method.
        return $this->carservice->getCost() + 29;
    }
    public function getDescription()
    {
        // TODO: Implement getDescription() method.
        return $this->carservice->getDescription() ." with a one door design";
    }
}

class TireRotation implements CarService{

    protected $carservice;

    public function  __construct(CarService $carService)
    {
        $this->carservice = $carService;
    }

    public function getCost()
    {
        // TODO: Implement getCost() method.
        return $this->carservice->getCost() + 129;
    }
    public function getDescription()
    {
        // TODO: Implement getDescription() method.
        return $this->carservice->getDescription() ." needs an oil change";
    }
}



//echo (new OilChange(new TireRotation(new BasicInspection())))->getCost();
$getBasicdesc =  (new BasicInspection())->getDescription();
$getBasicOildesc =  (new OilChange(new BasicInspection()))->getDescription();
$getBasicOilTiredesc =  (new TireRotation(new OilChange(new BasicInspection())))->getDescription();
echo $getBasicOildesc;


//Bug Prone Code Structure

class SecondCarService
{
    protected $cost = 23;

    public function getCost(){
        return  $this->cost;
    }

    public function setCost($cost){
        $this->cost = $cost;
    }

    public function getDescription()
    {
        // TODO: Implement getDescription() method.
        return "Convertible blue mustang";
    }

    public function withOilChange(){
        return $this->cost += 29;
    }

    public function withTireRotation(){
        return $this->cost += 38;
    }

}


class SecondOilChange
{

    protected $carservice;

    public function __construct(SecondCarService $carService)
    {
        $this->carservice = $carService;
    }

}
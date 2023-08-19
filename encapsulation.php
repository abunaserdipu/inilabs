<?php
class Employee
{
    private $name;
    private $position;
    private $salary;

    public function __construct($name, $position, $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

// Create a object
$car = new Employee("Naser", "Backend Developer", 17000);

// Access and display the name, position, and salary
echo "Name: " . $car->getName() . "\n";
echo "Position: " . $car->getPosition() . "\n";
echo "Salary: " . $car->getSalary() . "\n";

// Update the salary
$car->setSalary(20000);

// Display the updated salary
echo "Updated Salary: " . $car->getSalary() . "\n";

<?php
 
namespace App\Livewire;
 
use Livewire\Component;
 
class Computer extends Component
{
    public $count = 1;
    
    public function render()
    {
        return view('livewire.counter2', array("gagi" => "gagi nga"));
    }
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
}
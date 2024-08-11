<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $step=1;

    public $name;
    public $email;
    public $password;
    public $country;
    public $tradingExperience;
    public $firmChallaenge;

    public $termsAccepted=false;

    public function nextStep()
    {
        if($this->step==1){
            $this->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                'country'=>'required'
            ]);
        }

        if($this->step==2){
            $this->validate([
                'tradingExperience'=>'required'
            ]);
        }

        // dd($this->step);
        if($this->step==3){
            if(!$this->termsAccepted){
                $this->addError('termsAccepted', 'You must accept the terms and conditions');
            }
        }
        $this->step++;
    }

    public function backStep()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.register');
    }
}

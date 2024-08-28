<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $step=1;

    public $name;
    public $email;
    public $password;
    public $country;
    public $tradingExperience;
    public $firmChallenge;

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

            if(!$this->firmChallenge){
               $this->validate([
                   'firmChallenge'=>'required'
               ]);
            }

            if(!$this->termsAccepted){
                // remove firmChallenge error
                $this->resetErrorBag('firmChallenge');

                $this->addError('termsAccepted', 'You must accept the terms and conditions');
                return;
            }

            $this->submitForm();
        }
        $this->step++;
    }

    public function backStep()
    {
        $this->step--;
    }

    public function submitForm()
    {
        $user=User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'country'=>$this->country,
            'trading_experience'=>$this->tradingExperience,
            'firm_challenge'=>$this->firmChallenge
        ]);

        $user->assignRole('user');

        session()->flash('message', 'User created successfully');

        // login user
        auth()->login($user);

        return redirect()->to('/profile');
    }

    public function render()
    {
        return view('livewire.register');
    }
}

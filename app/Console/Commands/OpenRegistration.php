<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class OpenRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Registration:Open';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Opens the registration of the active camp if the registration open date time has past';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $camp = \App\registration_state::where('active', 1)->first();
        $places = \App\place::all();
        $currentTime = Carbon::now();

        // If no active camp is found, do nothing
        if($camp == null){
            return;
        }

        // Check if some criterias are met. If they are, keep the registration closed
        if($this->keepClosed($camp, $currentTime)){
            $logMsg = "\n[OPEN] :: Registration kept: " . $currentTime;
            file_put_contents(storage_path('logs/registrationLog.log'), $logMsg, FILE_APPEND);
            return;
        }

        // Check if time is after registration is open and 
        if($camp->registrationOpen <= $currentTime){
            $camp->late_open = 0;
            $camp->open = 1;
            $camp->save();
            $logMsg = "\n[OPEN] :: Registration opened at: " . $currentTime;
            file_put_contents(storage_path('logs/registrationLog.log'), $logMsg, FILE_APPEND);
        }
        else{
            $logMsg = "\n[OPEN] :: Registration kept close: " . $currentTime;
            file_put_contents(storage_path('logs/registrationLog.log'), $logMsg, FILE_APPEND);
        }
    }

    private function keepClosed($camp, $currentTime){
        //$registeredParticipants = \App\registration::count();
        //$registeredLeaders = \App\registrations_leader::count();

        // Check if limit is reached
        if(!$this->isSpotsAvailable($camp)){
            return true;
        }
        
        // If we are after the time of registration closes, keep the registration closed
        if($currentTime >= $camp->registrationCloses){
            return true;
        }

        // If late registration is open, keep the normal registration closed
        if($camp->late_open == 1){
            return true;
        }

        if($camp->open == 1){
            return true;
        }

        return false;
    }

    public function isSpotsAvailable($camp){
        $places = \App\place::all();
        foreach($places as $place){
            if($this->isSpotsAvailableInPlace($camp, $place, true) || $this->isSpotsAvailableInPlace($camp, $place, false)){
                return true;
            }
        }
        return false;
    }

    public function isSpotsAvailableInPlace($camp, $place, $leader){
        $leadersCount = \App\registrations_leader::all()
                ->where('place', $place->placeID)
                ->where('camp_id', $camp->id)
                ->count();
        $participantsCount = \App\registration::all()
                ->where('place', $place->placeID)
                ->where('camp_id', $camp->id)
                ->count();
        
        if($leader){
            return $leadersCount < $place->leaderSpots && $leadersCount + $participantsCount < $place->spots;
        } else {            
            return $participantsCount < $place->participateSpots && $leadersCount + $participantsCount < $place->spots;
        }
    }
}

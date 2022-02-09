<?php

class Team  {


    private string $TeamName;
    protected $players = [];

   
    function __construct( )
    {   
        $this->TeamName = "NO NAME"; 
    }
    
   
    public function getplayers()
    {
        return $this->players;
    } 

    public function getTeamName()
    {
        return $this->TeamName;
    } 

    public function addPlayers(Player $nPlayers) {
        
        $this->players = $nPlayers;

    }


}


?>
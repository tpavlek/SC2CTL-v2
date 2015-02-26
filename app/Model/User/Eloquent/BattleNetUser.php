<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User\Eloquent;

use Depotwarehouse\SC2CTL\Web\Model\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BattleNetUser extends BaseModel
{

    use SoftDeletes;

    protected $guarded = [ 'id' ];

    public $table = "bnet_users";

    public function getQualifiedNameAttribute()
    {
        return $this->name;
    }

    public function getLeagueImgAttribute()
    {
        $league = strtolower($this->league);
        return "/img/icon/leagues/{$league}.png";
    }

    public function getRaceAttribute($race)
    {
        return ucfirst(strtolower($race));
    }

    public function getSeasonWinsAttribute()
    {
        switch ($this->getRaceAttribute($this->race)) {
            case "Terran":
                return $this->terran_wins;
                break;
            case "Zerg":
                return $this->zerg_wins;
                break;
            case "Protoss":
                return $this->protoss_wins;
                break;
            default:
            case "Random":
                return $this->getAllRaceSeasonWinsAttribute();
                break;
        }
    }

    public function getAllRaceSeasonWinsAttribute()
    {
        return $this->terran_wins + $this->protoss_wins + $this->zerg_wins;
    }

    public function getSeasonLossesAttribute()
    {
        return $this->season_total_games - $this->getAllRaceSeasonWinsAttribute();
    }

    public function getSeasonWinrateAttribute()
    {
        if ($this->season_total_games == 0) {
            return 0;
        }
        return $this-> getAllRaceSeasonWinsAttribute() / $this->season_total_games;
    }

}

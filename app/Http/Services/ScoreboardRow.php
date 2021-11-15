<?php

namespace App\Http\Services;

class ScoreboardRow
{
    public function get($team, $teamScore, $oponentScore, $row)
    {
        if ($teamScore < $oponentScore) {
            $points = 0;
            $losses = isset($row['l']) ? $row['l'] + 1 : 1;
        } elseif ($teamScore == $oponentScore) {
            $points = 1;
            $draws = isset($row['d']) ? $row['d'] + 1 : 1;
        } else {
            $points = 3;
            $wins = isset($row['w']) ? $row['w'] + 1 : 1;
        }

        return [
            'team' => $team,
            'gf' => isset($row['gf']) ? $row['gf'] + $teamScore : $teamScore,
            'ga' => isset($row['ga']) ? $row['ga'] + $oponentScore : $oponentScore,
            'gd' => isset($row['gd']) ? $row['gd'] + $teamScore - $oponentScore : $teamScore - $oponentScore,
            'pts' => isset($row['pts']) ? $row['pts'] + $points : $points,
            'gp' => isset($row['gp']) ? $row['gp'] + 1 : 1,
            'w' => $wins ?? 0,
            'd' => $draws ?? 0,
            'l' => $losses ?? 0,
            'points' => $points,
        ];
    }
}

            // $scoreboard[$game->away->id] = [
            //     'team' => $game->away,
            //     'points' => $awayPoints,
            //     'gf' => isset($scoreboard[$game->away->id]['gf']) ? $scoreboard[$game->away->id]['gf'] + $game->away_score : $game->away_score,
            //     'ga' => isset($scoreboard[$game->away->id]['ga']) ? $scoreboard[$game->away->id]['ga'] + $game->local_score : $game->local_score,
            //     'gd' => isset($scoreboard[$game->away->id]['gd']) ? $game->away_score - $game->local_score : $scoreboard[$game->away->id]['gf'] - $scoreboard[$game->away->id]['ga'],
            //     'w' => isset($scoreboard[$game->away->id]['w']) ? $scoreboard[$game->away->id]['w'] + 1 : 1,
            //     'd' => 0,
            //     'l' => 0,
            // ];

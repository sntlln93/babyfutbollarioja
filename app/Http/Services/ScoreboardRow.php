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
            'w' => $wins ?? ($row['w'] ?? 0),
            'd' => $draws ?? ($row['d'] ?? 0),
            'l' => $losses ?? ($row['l'] ?? 0),
        ];
    }
}
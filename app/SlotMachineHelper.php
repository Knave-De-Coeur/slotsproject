<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 14/09/2018
 * Time: 16:52
 */

namespace App;

use phpDocumentor\Reflection\Types\Self_;

class SlotMachineHelper
{
    public static function IsUserOutOfMoney($balance, $betValue)
    {
        if($balance < $betValue ) {
            return false;
        } else {
            return true;
        }
    }
    // will search through the table to find at least three of a kind

    public static function FindAndReturnPaylines($slotMachineFaces)
    {
        $tests = [
            [0,3,6,9,12],
            [1,4,7,10,13],
            [2,5,8,11,14],
            [0,4,8,10,12],
            [2,4,6,10,14]
        ];

        $paylines = [];

        foreach ($tests as $test)
        {
            $paylineMatches = self::RecursivelyCheckThroughSlotByPayline($slotMachineFaces, $test, 1, '');

            if($paylineMatches >= 3)
            {
                $paylines[$paylineMatches] = $test;
            }
        }

        return $paylines;
    }

    public static function SearchByKey($slots, $position)
    {
        foreach ($slots as $key => $row)
        {
            if (array_key_exists($position, $row))
            {
                return $row[$position];
            }
        }
        return false;
    }

    public static function RecursivelyCheckThroughSlotByPayline($slotMachineFace, $payline, $matchesFound, $prevSymbol)
    {

        // (do the required processing...)
        $currentSymbol = self::SearchByKey($slotMachineFace, $payline[0]);

        if($prevSymbol !== '')
        {
            if (strcasecmp($prevSymbol, $currentSymbol) == 0)
            {
                $matchesFound += 1;
            }
        }

        // get rid of the position we just searched for
        array_shift($payline);

        if ( next($payline ) )
        {
            // continue the recursion

            $matchesFound = self::RecursivelyCheckThroughSlotByPayline($slotMachineFace, $payline, $matchesFound, $currentSymbol);
        }

        // end recursion and return the amount of successful matches found in this payline.
        return $matchesFound;
    }

    public static function GenerateAndReturnReelFace($faces)
    {
        $wheel = array();
        foreach ($faces as $face){
            $wheel1[] = $face;
        }

        // at this point the wheel will hold all the the faces specified
        $result = $wheel1[rand(count($wheel1), 10*count($wheel1)) % count($wheel1)];

        return $result;
    }

    public static function GenerateAmountWon($betAmount, $paylinesFound)
    {
        $totalWin = 0;

        foreach ($paylinesFound as $matchSize)
        {
            switch (count($matchSize))
            {
                case PayoutStatus::ThreeSybols:
                    $totalWin += $betAmount*0.2;
                    break;
                case PayoutStatus::FourSybols:
                    $totalWin += $betAmount*2;
                    break;
                case PayoutStatus::FiveSybols:
                    $totalWin += $betAmount*10;
                    break;
            }
        }

        return $totalWin;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 14/09/2018
 * Time: 16:52
 */

namespace App;

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

    public static function FindPaylines($slotMachineFaces)
    {
        $paylines = array();



        $paylines = [
            ["Dog", "Dog", "Dog", "Dog"]
        ];

        return $paylines;
    }

    public static function RecursivelyCheckThroughSlotRowByRow()
    {
        // (do the required processing...)
        $paylineArray = array();

        if ( baseCaseReached ) {

            // end the recursion
            return;

        } else {

            // continue the recursion
            myRecursiveFunction();
        }
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

        foreach ($paylinesFound as $payline)
        {
            switch (count($payline))
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
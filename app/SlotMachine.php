<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 14/09/2018
 * Time: 16:40
 */

namespace App;


class SlotMachine
{
    // columns
    protected $Reels = 5;
    protected $Rows = 3;
    // chose common faces found on slot machines and custom ones to amount to 10
    protected $Faces = ["Cheery", "Bar", "Double Bar", "Triple Bar", "Diamond", "Seven", "Monkey", "Dog", "Cat", "Bird"];
    // this will eventually hold the common
    protected $Paylines = array();
    protected $BetAmount;
    protected $TotPayout;

    /**
     * @return mixed
     */
    public function getTotPayout()
    {
        return $this->TotPayout;
    }

    /**
     * @param mixed $TotPayout
     */
    public function setTotPayout($TotPayout): void
    {
        $this->TotPayout = $TotPayout;
    }

    /**
     * @return float
     */
    public function getBetAmount(): float
    {
        return $this->BetAmount;
    }

    /**
     * @param mixed $TotPayout
     */
    public function setBetAmount($BetAmount): void
    {
        $this->BetAmount = $BetAmount;
    }

    /**
     * @return array
     */
    public function getPaylines(): array
    {
        return $this->Paylines;
    }

    /**
     * @param array $Paylines
     */
    public function setPaylines(array $Paylines): void
    {
        $this->Paylines = $Paylines;
    }

    // this will randomly generate the table of 'reels with the faces specified'
    public function GenerateReels()
    {
        $slotReels = array(
            array(),
            array(),
            array()
        );

        $indexOrder = 0;

        // first we loop through the columns since we're assigning ascending values from top-bottom and then left-right
        // column
        for ($y = 0; $y < 3; $y++)
        {
            // row
            // 5 results are pushed to a an array of columns that column is then pushed to
            for ($x = 0; $x < 5; $x++)
            {
                $result = SlotMachineHelper::GenerateAndReturnReelFace($this->Faces);

                $newSlotReel =  $result;

                $slotReels[$y][$x] = $newSlotReel;

                $indexOrder ++;
            }
        }

        // tests
        $slotReels2 = array
        (
            array(0 => "Cherry",3 => "Cherry", 6 => "Cherry", 9 => "Cherry", 12 => "Bird"),
            array(1 => "Dog", 4 => "Cherry",7 => "Bar", 10 => "DoubleBar", 13 => "Cat"),
            array(2 => "Double Bar", 5 => "Cherry", 8 => "Cherry", 11 => "Double Bar", 14 => "Bird"),
        );
        return $slotReels2;

    }

}
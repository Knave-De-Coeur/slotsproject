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
    protected $Faces = ["Cherry", "Bar", "Double Bar", "Triple Bar", "Diamond", "Seven", "Monkey", "Dog", "Cat", "Bird"];
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


        // x because we're goig right
        for ($x = 0; $x < 5; $x++)
        {
            switch ($x) {
                case 0 : $indexOrder = 0;
                    break;
                case 1 : $indexOrder = 3;
                    break;
                case 2 : $indexOrder = 6;
                    break;
                case 3 : $indexOrder = 9;
                    break;
                case 4 : $indexOrder = 12;
                    break;
            }
            // y because we're going down
            for ($y = 0; $y < 3; $y++)
            {
                $result = SlotMachineHelper::GenerateAndReturnReelFace($this->Faces);

                $slotReels[$y][$indexOrder] = $result;

                $indexOrder ++;
            }
        }

        // tests
        $slotReels2 = array
        (
            array(0 => "Cherry",3 => "Cherry", 6 => "Double Bar", 9 => "Cherry", 12 => "Bird"),
            array(1 => "Dog", 4 => "Double Bar",7 => "Bar", 10 => "Double Bar", 13 => "Cat"),
            array(2 => "Double Bar", 5 => "Cherry", 8 => "Cherry", 11 => "Double Bar", 14 => "Bird"),
        );
        return $slotReels;

    }

}
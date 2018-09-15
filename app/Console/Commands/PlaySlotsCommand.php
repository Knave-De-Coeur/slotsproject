<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 15/09/2018
 * Time: 09:23
 */

namespace App\Console\Commands;


use App\SlotMachine;
use Illuminate\Console\Command;
use App\SlotMachineHelper;

class PlaySlotsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'play:slots';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Bet 1 Euro (100cents) to play a game of slots!";
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $slotMachine = new SlotMachine();

        $slotMachine->setBetAmount(100.00);

        // Generate slot
        $this->info('Board:');

        $reels = $slotMachine->GenerateReels();

        $this->table('', $reels);

        // get paylines (if any)
        $this->info('paylines: ');

        $slotMachine->setPaylines(SlotMachineHelper::FindAndReturnPaylines($reels));

        if(sizeof($slotMachine->getPaylines()) < 1)
        {
            $this->info('Nothing found');
            $slotMachine->setTotPayout(-100.00);
        }
        else
        {
            $this->table(' ', $slotMachine->getPaylines());
            $slotMachine->setTotPayout(SlotMachineHelper::GenerateAmountWon($slotMachine->getBetAmount(), $slotMachine->getPaylines()));
        }

        // output bet amount
        $this->info('Bet amount: ' . $slotMachine->getBetAmount() . ' cents');

        // output total win
        $this->info('Total win: ' . $slotMachine->getTotPayout());
        // players total after game
        $this->info('Current Amount: ' . ($slotMachine->getTotPayout() + $slotMachine->getBetAmount()));
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
//            array('host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', 'localhost'),
//            array('port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 8000),
        );
    }
}
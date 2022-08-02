<?php
declare(strict_types=1);

namespace App\Application\Actions\Dice;

use App\Application\Actions\Action;
use App\Domain\Dice\Dice;
use Psr\Log\LoggerInterface;

abstract class DiceAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->dice = new Dice();
    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\Dice;

use Psr\Http\Message\ResponseInterface as Response;

class RollDiceAction extends DiceAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $param = $this->request->getQueryParams();

        $this->dice->quantity = (isset($param['quantity'])) ? (int) $param['quantity'] : $this->dice::QUANTITY_DEFAULT;
        if (! $this->dice->isValidQuantity()) {
            $this->dice->quantity = $this->dice::QUANTITY_DEFAULT;
        }

        $this->dice->face = (isset($param['face'])) ? (int) $param['face'] : $this->dice::FACE_DEFAULT;
        if (! $this->dice->isValidFace()) {
            $this->dice->face = $this->dice::FACE_DEFAULT;
        }

        $this->logger->info("Play de Game: face={$this->dice->face}, quantity={$this->dice->quantity}");
        $data = $this->play();
        return $this->respondWithData($data);
    }

    protected function play(): array
    {
        $data = ['dice' => []];
        if (! $this->dice->isValidQuantity() || ! $this->dice->isValidFace()) {
            return $data;
        }

        $data['dice'] = $this->roll();
        return $data;
    }

    private function roll(): array
    {
        $i = 0;
        $data = [];
        while ($i++ < $this->dice->quantity) {
            $data[] = rand(1, $this->dice->face);
        }

        return $data;
    }
}

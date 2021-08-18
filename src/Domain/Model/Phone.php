<?php

namespace Alura\Pdo\Domain\Model;

class Phone
{
    private ?int $id;
    private string $areaCode;
    private string $number;

    public function __construct(?int $id, string $areaCode, string $number)
    {
        $this->id = $id;
        $this->areaCode = $areaCode;
        $this->number = $number;
    }

    public function formattedPhone(): string
    {
        $isCellphone = strlen($this->number) === 9;

        if ($isCellphone) {
            return "($this->areaCode) " . substr($this->number, 0, 5) . "-" . substr($this->number, 5);
        }

        return "($this->areaCode) " . substr($this->number, 0, 4) . "-" . substr($this->number, 4);
    }
}

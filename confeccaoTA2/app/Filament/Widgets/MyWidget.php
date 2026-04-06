<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class MyWidget extends ChartWidget
{
    protected ?string $heading = 'Meu dashboard';

    protected int | string | array  $columnSpan = 'full';

    public function getColumns(): int | array
    {
        return [
            'md' => 4,
            'xl' => 5,
        ];
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Valores',
                    'data' => [10, 15, 20, 25, 30, 35, 30, 40, 50, 25, 50, 30],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#36A2EB',
                ],
            ],
            'labels' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
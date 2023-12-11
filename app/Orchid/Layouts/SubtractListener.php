<?php

namespace App\Orchid\Layouts;


use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Listener;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Layout;

class SubtractListener extends Listener
{
    /**
     * Список имен полей, значения которых будут отслеживаться.
     *
     * @var string[]
     */
    protected $targets = [
        'minuend',
        'subtrahend',
    ];

    /**
     * @return Layout[]
     */
    protected function layouts(): iterable
    {
        return [
            Layout::rows([
                Input::make('minuend')
                    ->title('Первый аргумент')
                    ->type('number'),

                Input::make('subtrahend')
                    ->title('Второй аргумент')
                    ->type('number'),

                Input::make('result')
                    ->readonly()
                    ->canSee($this->query->has('result')),
            ]),
        ];
    }

    /**
     * @param \Orchid\Screen\Repository $repository
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Orchid\Screen\Repository
     */
    public function handle(Repository $repository, Request $request): Repository
    {
        [$minuend, $subtrahend] = $request->all();

        return $repository
            ->set('minuend', $minuend)
            ->set('subtrahend', $subtrahend)
            ->set('result', $minuend - $subtrahend);
    }
}

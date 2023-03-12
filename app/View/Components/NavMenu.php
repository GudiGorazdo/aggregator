<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMenu extends Component
{
    public array $items = [
        // [
        //     'title' => 'Главная',
        //     'href' => '/'
        // ],
        [
            'title' => 'Добавить компанию',
            'href' => '#'
        ],
        [
            'title' => 'Оставить отзыв',
            'href' => '#'
        ],
        [
            'title' => 'Задать вопрос',
            'href' => '#'
        ],
        [
            'title' => 'О сервисе',
            'href' => '#'
        ],
        [
            'title' => 'Условия использования',
            'href' => '#'
        ],
        [
            'title' => 'Контакты',
            'href' => '#'
        ],
        // [
        //     'title' => 'Связаться',
        //     'href' => '#'
        // ],
    ];

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): \Illuminate\Contracts\View\View|\Closure|string
    {
        return view('components.nav-menu');
    }
}

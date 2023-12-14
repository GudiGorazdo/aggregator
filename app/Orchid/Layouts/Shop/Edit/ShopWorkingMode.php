<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Illuminate\Database\Eloquent\Collection;
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\Button;
use App\Orchid\Fields\Title;
use Carbon\Carbon;

class ShopWorkingMode extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    private function openTime(Collection|null $workingMode, int $day)
    {
        return $workingMode ? Carbon::parse($workingMode[$day]->open_time ?? '00:00')->format('H:i') : null;
    }

    private function closeTime(Collection|null $workingMode, int $day)
    {
        return $workingMode ? Carbon::parse($workingMode[$day]->close_time ?? '23:59')->format('H:i') : null;
    }

    private function isOpen(Collection|null $workingMode, int $day)
    {
        return $workingMode ? !$workingMode[$day]->is_open : false;
    }

    private function setGroups($shop)
    {
        $workingMode = null;
        if ($shop->id) {
            $workingMode = \App\Models\ShopWorkingMode::getByShopID($shop->id)->get();
        }

        $group = [Title::make('Режим работы')->class('pt-4')];
        for($i = 0; $i < 7; $i++) {
            $group = array_merge($group, [
                Group::make([
                    Label::make('')->title('Пн'),
                    DateTimer::make('working_mode[' . $i + 1 . '][open]')
                        ->value($this->openTime($workingMode, $i))
                        ->title('с')
                        ->noCalendar()
                        ->format('h:i K')
                        ->format24hr(),
                    DateTimer::make('working_mode[' . $i + 1 . '][close]')
                        ->value($this->closeTime($workingMode, $i))
                        ->title('до')
                        ->noCalendar()
                        ->format('h:i K')
                        ->format24hr(),
                    CheckBox::make('working_mode[' . $i + 1 . '][is_open]')
                        ->checked($this->isOpen($workingMode, $i))
                        ->title('Выходной'),
                ])->autoWidth(),
            ]);
        }

        if ($shop->id) {
            $group[] = Button::make('Сохранить')->method('save-workingmode')->class('btn btn-success m-auto')->right();
        }

        return $group;
    }

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $shop = $this->query->get('shop');

        return $this->setGroups($shop);
    }
}

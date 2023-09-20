<table class="item-info__working-hours-table">
    <thead>
        <tr>
            <th>ПН</th>
            <th>ВТ</th>
            <th>СР</th>
            <th>ЧТ</th>
            <th>ПТ</th>
            <th class="item-info__working-hours-table--mobile--weekend">СБ</th>
            <th class="item-info__working-hours-table--mobile--weekend">ВС</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($workingMode as $day)
                <td>
                    {{-- <div class="item-info__working-hours-dot item-info__working-hours-dot--active">&nbsp;</div> --}}
                    @if($day->is_open)
                        <div class="item-info__working-hours-dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>
        <tr>
            @foreach($workingMode as $day)
                <td>{{ $day->is_open ? ($day->open_time ?? '00:00'): 'Выходной' }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>
                    @if($day->is_open)
                        <div class="item-info__working-hours-dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>{{ $day->is_open ? ($day->close_time ?? '23:59') : '' }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>
                    @if($day->is_open)
                        <div class="item-info__working-hours-dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>
    </tbody>
</table>

<table class="item-info__working-hours-table--mobile">
    <tbody>
        <tr>
            <th>ПН</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr>
            <th>ВТ</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr>
            <th>СР</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr>
            <th>ЧТ</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr>
            <th>ПТ</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr class="item-info__working-hours-table--mobile--weekend">
            <th>СБ</th>
            <td style="color: #25313a !important">09:00 - 21:00</td>
        </tr>
        <tr class="item-info__working-hours-table--mobile--weekend">
            <th>ВС</th>
            <td>Выходной</td>
        </tr>
    </tbody>
</table>



<table class="hours">
    <thead>
        <tr>
            <th>ПН</th>
            <th>ВТ</th>
            <th>СР</th>
            <th>ЧТ</th>
            <th>ПТ</th>
            <th class="hours__weekend">СБ</th>
            <th class="hours__weekend">ВС</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($workingMode as $day)
                <td>
                    {{-- <div class="hours__dot hours__dot--active">&nbsp;</div> --}}
                    @if($day->is_open)
                        <div class="hours__dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>
        <tr>
            @foreach($workingMode as $day)
                <td>{{ $day->is_open ? ($day->open_time ? \Carbon\Carbon::parse($day->open_time)->format('H:i') : '00:00'): 'Выходной' }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>
                    @if($day->is_open)
                        <div class="hours__dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>{{ $day->is_open ? ($day->close_time ? \Carbon\Carbon::parse($day->close_time)->format('H:i') : '23:59') : '' }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach($workingMode as $day)
                <td>
                    @if($day->is_open)
                        <div class="hours__dot">&nbsp;</div>
                    @endif
                </td>
            @endforeach
        </tr>
    </tbody>
</table>

<table class="hours hours--mobile">
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
        <tr class="hours__weekend">
            <th>СБ</th>
            <td>09:00 - 21:00</td>
        </tr>
        <tr class="hours__weekend">
            <th>ВС</th>
            <td>Выходной</td>
        </tr>
    </tbody>
</table>



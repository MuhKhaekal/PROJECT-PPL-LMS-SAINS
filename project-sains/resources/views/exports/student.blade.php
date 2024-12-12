<table>
    <!-- Heading Utama -->
    <thead>
        <tr>
            <th rowspan="2" style="text-align: center;">NIM</th>
            <th rowspan="2" style="text-align: center;">Nama</th>
            <th colspan="3" style="text-align: center; background-color: #228B22; color: #ffffff;">Pre-Test</th>
            <th colspan="4" style="text-align: center; background-color: #4682B4; color: #ffffff;">4 Pekanan 1</th>
            <th colspan="4" style="text-align: center; background-color: #FFD700; color: #000000;">4 Pekanan 2</th>
            <th rowspan="2" style="text-align: center; background-color: #FFD700; color: #000000;">IX</th>
            <th rowspan="2" style="text-align: center; background-color: #FFD700; color: #000000;">X</th>
            <th colspan="3" style="text-align: center; background-color: #708090; color: #ffffff;">Post-Test</th>
        </tr>
        <!-- Subheading -->
        <tr>
            <th style="text-align: center; background-color: #32CD32;">K</th>
            <th style="text-align: center; background-color: #32CD32;">Hukum Bacaan</th>
            <th style="text-align: center; background-color: #32CD32;">Makharijul Huruf</th>
            <th style="text-align: center; background-color: #4682B4;">I</th>
            <th style="text-align: center; background-color: #4682B4;">II</th>
            <th style="text-align: center; background-color: #4682B4;">III</th>
            <th style="text-align: center; background-color: #4682B4;">IV</th>
            <th style="text-align: center; background-color: #FFD700;">V</th>
            <th style="text-align: center; background-color: #FFD700;">VI</th>
            <th style="text-align: center; background-color: #FFD700;">VII</th>
            <th style="text-align: center; background-color: #FFD700;">VIII</th>
            <th style="text-align: center; background-color: #708090;">K</th>
            <th style="text-align: center; background-color: #708090;">Hukum Bacaan</th>
            <th style="text-align: center; background-color: #708090;">Makharijul Huruf</th>
        </tr>
    </thead>
    <!-- Data -->
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td style="text-align: center;">{{ $student->nim }}</td>
                <td style="text-align: center;">{{ $student->name }}</td>
                <td style="text-align: center;">{{ $student->prekelancaran }}</td>
                <td style="text-align: center;">{{ $student->prehukum_bacaan }}</td>
                <td style="text-align: center;">{{ $student->premakharijul_huruf }}</td>
                <td style="text-align: center;">{{ $student->p1 }}</td>
                <td style="text-align: center;">{{ $student->p2 }}</td>
                <td style="text-align: center;">{{ $student->p3 }}</td>
                <td style="text-align: center;">{{ $student->p4 }}</td>
                <td style="text-align: center;">{{ $student->p5 }}</td>
                <td style="text-align: center;">{{ $student->p6 }}</td>
                <td style="text-align: center;">{{ $student->p7 }}</td>
                <td style="text-align: center;">{{ $student->p8 }}</td>
                <td style="text-align: center;">{{ $student->p9 }}</td>
                <td style="text-align: center;">{{ $student->p10 }}</td>
                <td style="text-align: center;">{{ $student->postkelancaran }}</td>
                <td style="text-align: center;">{{ $student->posthukum_bacaan }}</td>
                <td style="text-align: center;">{{ $student->postmakharijul_huruf }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

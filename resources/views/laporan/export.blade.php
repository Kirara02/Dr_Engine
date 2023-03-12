<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-nowrap" width="1%">No</th>
                <th class="text-nowrap" width="20%">Tanggal</th>
                <th class="text-nowrap" width="15%">Costumer</th>
                <th class="text-nowrap" width="20%">Bengkel</th>
                <th class="text-nowrap" width="10%">Jenis Kendaraan</th>
                <th class="text-nowrap" width="20%">Tipe Kendaraan</th>
                <th class="text-nowrap" width="10%">Nominal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($perbaikan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kerusakan->member->nama }}</td>
                <td>{{ $item->mekanik->name }}</td>
                <td>{{ $item->kerusakan->jenisKendaraan }}</td>
                <td>{{ $item->kerusakan->tipeKendaraan }}</td>
                <td>Rp{{ number_format($item->detail()->sum('nominal'), 0,'','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
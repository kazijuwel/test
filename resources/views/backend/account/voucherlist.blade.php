<div class="table-responsive">
    <table class="table" class="table aiz-table mb-0">
        <thead>
            <tr>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Date</th>
                <th scope="col">Narration</th>
                <th scope="col">Debit</th>
                <th scope="col">Credit</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="show">
            @foreach ($vouchars as $vs)
                <tr>
                    <td><a href="{{ route('vourcherview', $vs->id) }}"
                            class="btn btn-light btn-sm">View</a></td>
                    <td><a href="{{ route('vourcheredit', $vs->id) }}"
                            class="btn btn-light btn-sm">Edit</a></td>
                    <td>{{ $vs->date }}</td>
                    <td>{{ $vs->name }}</td>
                    <td>{{ $vs->total_debit }}</td>
                    <td>{{ $vs->total_credit }}</td>
                    <td>
                        @if ($vs->total_debit == $vs->total_credit)
                            <span class="text-success">Balaced</span>
                        @else
                            <span class="text-danger">unbalanced</span>
                        @endif
                    </td>
                </tr>
                @endforeach



        </tbody>
    </table>
    <div class="aiz-pagination">
        {{ $vouchars->appends(['q' => $q])->links() }}
    </div>
</div>

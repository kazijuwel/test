@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">
            Details of: {{ $coa->name}}
        </h4>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('managechartofaccouts') }}">Back</a>
        </div>
    </div>
  <div class="card-body">
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>{{ translate('SL') }}</th>
                  <th>{{ translate('Date') }}</th>
                  <th data-breakpoints="md">{{ translate('Product Name') }}</th>
                  <th data-breakpoints="md">Debit</th>
                  <th data-breakpoints="md">credit</th>


              </tr>
          </thead>
          <tbody>
            <div class="card">
                @foreach ($v_items as  $item)
                <tr>
                    <td>
                        {{ $loop->index+1 }}
                    </td>
                    <td>
                       {{ date('d/m/Y',strtotime($item->created_at)) }}

                    </td>
                    <td>{{ productName($item->orderitem_id) }}</td>
                    <td>{{ $item->debit }}</td>
                    <td>
                      {{ $item->credit }}
                     </td>

                </tr>
            @endforeach
            </div>
          </tbody>
      </table>

  </div>

  {{ $v_items->links() }}
</div>
</div>
@endsection


@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Product List
                      </div>
                    <div class="card-body">
                        <p class="text-center">Belaobela.com.bd</p>
                        <p class="text-primary">Order Name:bob{{ $orederId }}</p>
                        <label for="">Selected store:</label>

                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="table-responsive">
                               <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">date</th>
                                    <th scope="col" style="width: 200px">stock</th>
                                    <th scope="col">serial</th>
                                    <th scope="col">In</th>
                                    <th scope="col">out</th>
                                    <th scope="col">Stock Balance</th>
                              </tr>
                            </thead>
                            <tbody id="addtoproductitem">
                                @foreach ($inventorys as $pro)
                                    <td>{{ $loop->index+1 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endforeach
                            </tbody>

                          </table>
                        </div>
                        </div>
                          {{-- <div class="aiz-pagination">
                            {{ $stores->appends(request()->input())->links() }}
                        </div> --}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection


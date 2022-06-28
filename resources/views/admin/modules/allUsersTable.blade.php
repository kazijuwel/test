
<div class="table-responsive">


    <table class="table table-hover table-sm">


      <thead>
        <tr>
          <th>SL</th>
          <th>Action</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Mobile</th>
            <th>Balance</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>

        <?php $i = 1; ?>

        <?php $i = (($usersAll->currentPage() - 1) * $usersAll->perPage() + 1); ?>

      @foreach($usersAll as $user)


      <tr>

          <td>{{ $i }}</td>
          <td>

              <div class="dropdown mb-1">
                  <div class="btn-group ">
                      <button type="button"
                              class="btn btn-primary  btn-xs dropdown-toggle"
                              data-toggle="dropdown">
                          Option
                      </button>
                      <div class="dropdown-menu">
                          <a href="{{ route('admin.userEdit', $user) }}">
                              <button type="button"
                                      class="dropdown-item btn btn-primary btn-xs">Edit
                              </button>
                          </a>
                          <a href="{{ route('admin.allTransactionHistory',['type'=>'customer','user'=>$user->id]) }}">
                              <button type="button"
                                      class="dropdown-item btn btn-primary btn-xs">
                                  Transaction History
                              </button>
                          </a>

                      </div>
                  </div>
              </div>



          </td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->username ? : '-'}}</td>

          <td>{{ $user->email }}</td>
          <td>{{ $user->mobile }}</td>
          <td>{{$user->credit}}</td>
          <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>


      </tr>

      <?php $i++; ?>

      @endforeach
      </tbody>

    </table>

    {{ $usersAll->render() }}

  </div>

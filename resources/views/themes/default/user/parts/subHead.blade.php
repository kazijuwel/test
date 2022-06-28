<section class="mb-2">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">

                <div class="text-center">
                    <a class="btn {{ session('lsbsm') == 'home' ? ' vip-active ' : '' }}" href="{{ url('/') }}">
                        Home</a>

                    <a class="btn {{ session('lsbsm') == 'profile' ? ' vip-active ' : '' }}"
                        href="{{ route('user.profile') }}"> Profile</a>
                    <a class="btn {{ session('lsbsm') == 'connection' ? ' vip-active ' : '' }}"
                        href="{{ route('user.myAssetaccepted') }}">My Conections
                        ({{ $me->acceptedProposalToMeCount() }}) </a>
                    <a class="btn {{ session('lsbsm') == 'pending' ? ' vip-active ' : '' }}"
                        href="{{ route('user.myAsset') }}">Pending Proposals
                        ({{ $me->pendingProposalToMeCount() }})</a>
                    <a class="btn {{ session('lsbsm') == 'sentProposal' ? ' vip-active ' : '' }}"
                        href="{{ route('user.mySentProposal') }}">Proposals Sent by Me
                        ({{ $me->proposalFromMeCount() }})</a>
                    <a class="btn {{ session('lsbsm') == 'pertnerSearch' ? ' vip-active ' : '' }}"
                        href="{{ route('user.pertnerSearch') }}">Pertner Search</a>
                    <a class="btn {{ session('lsbsm') == 'allsearch' ? ' vip-active ' : '' }}"
                        href="{{ route('allsearch') }}">All Search</a>

                    {{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div> --}}


                    <button class="btn  dropdown-toggle {{ session('lsbm') == 'others' ? ' vip-active ' : '' }}"
                        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Others
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="btn {{ session('lsbsm') == 'favourite' ? ' vip-active ' : '' }}"
                            href="{{ route('user.favourites') }}">Favourite User ({{ $me->favs()->count() }})</a>
                        <a class="btn {{ session('lsbsm') == 'visitor' ? ' vip-active ' : '' }}"
                            href="{{ route('user.visitors') }}">My Visitors ({{ $me->visitors()->count() }})</a>
                        <a class="btn {{ session('lsbsm') == 'update_preference' ? ' vip-active ' : '' }}"
                            href="{{ route('updatePreference') }}">Update Preferences</a>
                        <a class="btn {{ session('lsbsm') == 'update_profile' ? ' vip-active ' : '' }}"
                            href="{{ route('user.updateprofile') }}">Update Profile</a>
                        <a class="btn {{ session('lsbsm') == 'gallery' ? ' vip-active ' : '' }}"
                            href="{{ route('user.gallery') }}">Gallery</a>
                        <a class="btn {{ session('lsbsm') == 'contact' ? ' vip-active ' : '' }}"
                            href="{{ route('user.myContacts') }}">My Contacts ({{ $me->cont()->count() }}) - <span
                                style="color: red">({{ $me->contactLimit() }} remaining)</span></a>
                        <a class="btn {{ session('lsbsm') == 'connection' ? ' vip-active ' : '' }}"
                            href="{{ route('user.myAssetaccepted') }}">My Conections
                            ({{ $me->acceptedProposalToMeCount() }}) </a>
                        <a class="btn {{ session('lsbsm') == 'block' ? ' vip-active ' : '' }}"
                            href="{{ route('my.Block') }}">My block users ({{ $me->blockss()->count() }})</a>
                    </div>




                </div>

            </div>
        </div>
    </div>
</section>

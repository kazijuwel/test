    <section>
        <form action="{{ route('search') }}" method="GET">
        <div class="input-group" style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
            <input type="text" class="form-control" placeholder="Search Your Product" style="height:37px; border-radius: 0px" name="q" id="search">
            <div class="input-group-append">
                <button class="btn bg-primary" type="submit" style="color:white;"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
       </form>
    </section>
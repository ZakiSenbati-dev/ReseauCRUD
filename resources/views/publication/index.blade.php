

<!--Tous les profiles-->

<x-master title="Publications"><h3>Publications</h3>
    <div class="container w-75 mx-auto">
        <div class="row my-5">
            @foreach ($publications as $publication)
                <x-publication :canUpdate="auth()->user()->id === $publication->profile_id" :publication="$publication"/>
            @endforeach
        </div>
    </div>

    <!-- OLD Pagination-->
    <div class="d-flex justify-content-center">
        {{ $publications->links() }}
    </div>



</x-master>




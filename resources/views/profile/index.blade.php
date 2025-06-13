

<!--Tous les profiles-->

<x-master title="Profiles"><h3>Profiles</h3>
    <div class="row my-5">
        @foreach ($profiles as $profile )
            <x-profile-card :profile="$profile"/>
        @endforeach
    </div>

    <!-- OLD Pagination-->
    <div class="d-flex justify-content-center">
        {{ $profiles->links() }}
    </div>



</x-master>




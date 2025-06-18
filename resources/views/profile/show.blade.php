
<x-master title="Mon Profil"><h3>Profiles</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="card my-4 py-4">
                <img class="card-img-top w-25 mx-auto" src="{{ asset('storage/'.$profile->image) }}"
                    alt="{{ $profile->name }}" alt="Title" />
                <div class="card-body text-center">
                    <h4 class="card-title">#{{$profile ->id}} {{$profile ->name}}</h4>
                    <p class="card-text">{{$profile ->created_at->format('d-m-y')}}</p>
                    <p class="card-text">Email: <a href="mailto: {{$profile ->email}}">
                        {{$profile ->email}}</a>
                    </p>
                    <p class="card-text">{{$profile ->bio}}</p>
                </div>
            </div>
        </div>

        <h3>Publications</h3>
        <div class="container w-75 mx-auto">
            <div class="row my-5">
                @foreach ($profile->publications as $publication)
                    <x-publication :publication="$publication" />
                @endforeach
            </div>
        </div>

    </div>


</x-master>


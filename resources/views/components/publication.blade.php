

<div class="card my-2 bg-light">
    <div class="card-body">
        <!--Authentification pour ajouter ou supprimer seulement votre publication-->

        @auth
        @if ($canUpdate === true)
            <a class="float-end btn btn-primary btn-sm " href="{{ route('publications.edit',$publication->id) }}">Modifier</a>
            <form action="{{ route('publications.destroy',$publication->id) }}" method="post">
                @csrf
                @method("DELETE")
            <button onclick ="return confirm('Voulez vous vraiment supprimer cette publication? ')" class="float-end btn btn-danger btn-sm mx-2 " input="submit">
                Supprimer</button>
            </form>
        @endauth
        @endif

        <blockquote class="blockquote mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img class="rounded-circle" src="{{ asset('storage/'.$publication->profile->image) }}" width="100px">
                    </div>
                    <div class="col">
                        {{$publication->profile->name}}
                    </div>
                </div>

            </div>
            <p>{{$publication->titre}}</p>
            <p>{{$publication->body}}</p>
            @if(!is_null($publication->image) && file_exists(public_path("storage/{$publication->image}")))
                <footer class="blockquote-footer">
                    <img class="img-fluid" src="{{ asset("storage/{$publication->image}") }}" alt="$publication->titre">
                </footer>
            @endif

        </blockquote>
    </div>
</div>

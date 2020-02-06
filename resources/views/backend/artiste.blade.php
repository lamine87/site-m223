@extends('backend')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12 text-center ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h1 class="h2">INSERER VOS MUSIQUES</h1>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Page d'Accueil</h4>

                    <div class="btn-toolbar mb-2 mb-md-0 pull-right">
                        <span data-feather="calendar"></span>
                        <a href="{{route('ajoutMusic')}}" class="btn btn-sm btn-outline-secondary">
                            Nouveau
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Numero</th>
                            <th>Nom</th>
                            <th>Lien Facebook</th>
                            <th>Lien Instagram</th>
                            <th>Image</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>

                        </tr>
                        </thead>
                        @foreach($mouves as $mouve)
                            <tbody>
                            <tr class="table-info">
                                <td>{{$mouve->id}}</td>

                          @foreach($users as $user)
                                    @if($user->id == $mouve->user_id)
                                          <td>{{$user->name}}</td>
                                    @endif
                                @endforeach

                                @foreach($users as $user)
                                    @if($user->id == $mouve->user_id)
                                       <td>{{$user->lien_facebook}}</td>
                                       <td>{{$user->lien_instagram}}</td>
                                    @endif
                                @endforeach

                                <td>
                                    <img style="border: 4px solid #5b64f1" src="{{asset('storage/uploads/'.$mouve->photo_principale)}}" width="50" class="img-thumbnail" alt="">
                                </td>

                                <td>
                                    <a  href="{{route('backend_edit',['id'=>$mouve->id])}}" class="btn btn-sm btn-primary">Modifier</a>
                                </td>
                                <td>
                                <a onclick="return(confirm('sans regret ?'))" href="{{route('backend_delete',['id'=>$mouve->id])}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                        </td>
                       </tr>
                    </tbody>
                @endforeach
                </table>
             </div>
          </div>
    </div>
</div>

<div class=" container">
    <div class="row">
    <div class="col-12 text-center ">
     <div class="table-responsive">
        <table class="table table-sm">
            <thead class="table-dark">
            <tr>
                <th>Numero</th>
                <th>Description</th>
                <th>Url Vidéo</th>

            </tr>
            </thead>


            @foreach($mouves as $mouve)
                <tbody>
                <tr class="table-info">
                    <td>{{$mouve->id}}</td>
                    <td>{{$mouve->description}}</td>
                    <td>{{$mouve->url_video}}</td>
                </tr>
                </tbody>
            @endforeach
           </table>
           </div>
        </div>
        <div class="col-12 text-center">
            {{$mouves->links()}}
        </div>
    </div>
  </div>
@endsection

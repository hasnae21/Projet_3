@extends('main')
@section('title')
New Tâche
@endsection
@section('content')

<h2> Ajouter Tâche </h2>
<br>

<!-- message de validation -->
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
    @endif
    <!--  -->
    
    <form action="{{url('tache')}}" method="post">
        @csrf
        
        <!-- <label> Select Brief :</label>
        <select name="brief_id" required multiple>
            @if(!@empty($brief))
                @foreach ($brief as $value)
        
                <option value="{{$value->id}}">
                    {{$value->nom_brief}}
                </option>
                
                @endforeach
            @endif
        </select> -->
    
        <input type="text" name="brief_id" value="{{$value->id}}">
        <br>
        
        <label for="1"> Nom de la Tâche :</label>
        <input type="text" id="1" name="nom_tache" required>
        <br>
        <label for="2"> Début de la Tâche:</label>
        <input type="datetime-local" id="2" name="date_debut" required >
        <br>
        <label for="3"> Fin de la Tâche:</label>
        <input type="datetime-local"  id="3" name="date_fin" required>
        <br>
        <label for="3"> Description :</label>
        <input type="text"  id="3" name="description" required>
        <br>


        <button type="submit" class="btn btn-primary">Ajouter</button>

</form>


<br>
    <a href="{{url('tache')}}">Retour</a>

@endsection

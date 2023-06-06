@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/locataire.css') }}" rel="stylesheet">
@endpush


@section('content')

    <div class="content">
        <div class="table">
            <div class="search">
                <form id="formSearch" class="searchForm" method="GET" data-action="{{route('signaletiqueLocataire')}}">
                    <p>Recherche</p>
                    <input id="nomSearch" type="text" name="nom" placeholder="Nom">
                    <label for="locataire-type">Type de locataire</label>

                    <select name="loc" id="locataire-type">
                        <option value="Tous">Tous</option>
                        <option value="Parti">Parti</option>
                    </select>

                    <fieldset>

                        <div>
                            <input type="radio" id="commencePar" value="commencePar" name="typeRecherche"
                                   checked>
                            <label for="CommencePar">Commence par</label>
                        </div>

                        <div>
                            <input type="radio" id="Contient" name="typeRecherche" value="Contient">
                            <label for="Contient">Contient</label>
                        </div>

                    </fieldset>

                    <button type="submit">Rechercher</button>
                </form>

            </div>
            <div class="list">
                <table id="listLocataire">
                    <tr>
                        <th>N° Locataire</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Date d'entrée</th>
                        <th>Date de sortie</th>
                        <th>Adresse</th>
                        <th>Référence logiciel précedent</th>
                    </tr>
                    @Foreach ($locataires as $locataire)
                        <tr id="ligneLoc">
                            <td>{{$locataire->id}}</td>
                            <td>{{$locataire->nom}}</td>
                            <td>{{$locataire->age}}</td>
                            <td>{{$locataire->date_e}}</td>
                            <td>{{$locataire->date_s}}</td>

                            <td>{{$locataire->logement?->adresse?->adresseComplete()}}</td>
                            <td>{{$locataire->reference_prec}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="containerInfo">
            <div class="containerInfoTop">
                <h2>Informations locataire</h2>
            </div>
            <div class="containerInfoMiddle">
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    ID:
                    <input id="id_loc" type="text" name="id" value="{{$locataires[0]->id }}" readonly>
                    Nom:
                    <input id="nom_loc" type="text" name="nom" value="{{$locataires[0]->nom}}" readonly>
                    Age:
                    <input id="age_loc" type="number" name="age" value="{{$locataires[0]->age}}" readonly>
                    Date d'entrée:
                    <input id="date_e_loc" type="date" name="date_e" value="{{$locataires[0]->date_e}}" readonly>
                    Adresse
                    <input id="adresse_loc" type="text" name="adresse"
                           value="{{$locataires[0]->logement->adresse->adresseComplete()}}"
                           readonly>
                    <div class="containerInfoBot">

                        <button id="valider" type="submit" name="action" value="save" style="display:none;">
                            Enregistrer
                        </button>
                        <button id="annuler" type="submit" style="display:none;">Annuler</button>
                        <button id="nouveau" type="button">Nouveau</button>
                        <button id="modifier" type="button">Modifier</button>
                        <button id="supprimer" type="submit" name="action" value="delete">Supprimer</button>
                    </div>
                </form>
            </div>

        </div>

@endsection

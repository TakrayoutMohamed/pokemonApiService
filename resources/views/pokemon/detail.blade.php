@extends('layout.app')

@section('content')
    <div class="px-4">
        <div class="px-0 " >
            <div class="col-12 row p-0 m-0 bg-dark" style="color:white; border-radius:6px 6px 0px 0px;">
                <div class="col-4 p-0 m-0">
                    <fieldset>
                        <legend> height  </legend>
                        {{ $detailPokemon->height }}
                    </fieldset>
                </div>
                <div class="col-4 p-0 m-0">
                    <fieldset>
                        <legend> weight  </legend>
                        {{ $detailPokemon->weight }}
                    </fieldset>
                </div>
                <div class="col-4 p-0 m-0">
                    <fieldset>
                        <legend> base_experience  </legend>
                        {{ $detailPokemon->base_experience }}
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-6  p-0 m-0">
                {{-- div for abilities card  --}}
                <div class="p-1">
                    <div class="card-deck col-12 pb-4 " >
                        <div class="card col-12 box-shadow">
                            <div id="">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">abilities</h4>
                                </div>
                                <div class="card-body">
                                    @foreach ($detailPokemon->abilities as $ability)
                                        <fieldset class="" style="">
                                            <legend class="" style="border: 2px black solid">{{ $ability->ability->name }}</legend>
                                            <ul class="list-group">
                                                <li class="list-group-item p-1 d-flex justify-content-between align-items-center" style="border: 0px">
                                                    - is_hidden 
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $ability->is_hidden ?'hidden':'visible' }}
                                                    </span>
                                                </li>
                                                <li class="list-group-item p-1 d-flex justify-content-between " style="border: 0px">
                                                    - slot 
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $ability->slot }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 p-0 m-0">
                {{-- div for stats card  --}}
                <div class="p-1">
                    <div class="card-deck col-12 pb-4 " >
                        <div class="card col-12 box-shadow">
                            <div id="">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Stats</h4>
                                </div>
                                <div class="card-body row">
                                    @foreach ($detailPokemon->stats as $stat)
                                        <fieldset class="col-6 pb-2 " style="">
                                            <legend class="mt-1 m-0" style="border: 2px black solid">{{ $stat->stat->name }}</legend>
                                            <ul class="list-group">
                                                <li class="list-group-item p-1 d-flex justify-content-between align-items-center" style="border: 0px">
                                                    - effort 
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $stat->effort}}
                                                    </span>
                                                </li>
                                                <li class="list-group-item p-1 d-flex justify-content-between " style="border: 0px">
                                                    - base_stat 
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $stat->base_stat }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            {{-- div for moves card  --}}
            <div class="p-1">
                <div class="card-deck col-12 pb-4 " >
                    <div class="card col-12 box-shadow">
                        <div id="">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Moves</h4>
                            </div>
                            <div class="card-body row">
                                @foreach ($detailPokemon->moves as $move)
                                    <a href="#" class="col-3 px-1 " style="">
                                        <legend class="mt-1 m-0" style="border: 2px black solid">{{ $move->move->name }}</legend>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of uw website binnenkort wordt gemigreerd
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->

                    <!-- New domain Form -->
                    <form action="" method="POST" class="form-horizontal">

                        <!-- domain Name -->

                

                        <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default" disabled="">
                                <span id="search_concept">www.</span> <span class="caret" style="margin-left: 5px;"></span>
                            </button>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control" name="q" placeholder="Zoek domeinnaam...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>

                    
                    </form>
                    <div class="">
                    @if(isset($details))
                    <p> De zoekresultaten: <b> {{ $query }} </b> zijn :</p>
                    <h2>Overzicht migratie</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>vpsID</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>Notitie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $result)
                            <tr>
                                <td>{{$result->domain}}</td>
                                <td>{{$result->vps}}</td>
                                <td>{{$result->datum}}</td>
                                <td>{{$result->currentstatus}}</td>
                                <td>{{$result->klant_opmerking}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    @elseif(isset($message))
                    <p>{{ $message }}</p>
                    @endif
                </div>


                </div>
            </div>


           


@endsection

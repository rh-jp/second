@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of uw domeinnaam binnenkort wordt verhuist
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->

                    <!-- New domain Form -->
                    <form action="" method="POST" class="form-horizontal">

                        <!-- domain Name -->
                        <div class="form-group">
                            <label for="domain-name" class="col-sm-3 control-label">Domein:</label>

                            <div class="col-sm-6">
                                <input type="text" name="q" id="domain-name" class="form-control" value="">
                            </div>
                        </div>

                       

                        <!-- Add domain Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-search"></i>Domeinnaam zoeken
                                </button>
                            </div>
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

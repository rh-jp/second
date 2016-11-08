@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-heading" style="background: rgba(146, 88, 162, 0.78); color: white;">
            <strong>Opmerking:</strong>
            
            <div class="text" style="padding-top : 10px; font-weight: 200;">
            <p>
            Vul hieronder je domeinnaam in om te bekijken of jouw website binnenkort wordt omgezet naar onze nieuwste hosting. Voor meer informatie bezoek je <a style="color:white;" target="_blank" href="https://realhosting.nl/2016/10/verbeteringen-aan-onze-hosting/">https://realhosting.nl/2016/10/verbeteringen-aan-onze-hosting/</a></p>
            <p>
            Let op:

            <ul>
            <li>
            Als je een eigen server (private cloud) hebt, komt je website niet in het overzicht. We nemen dan contact met je op als dat nodig is. Nemen we geen contact op, dan wordt jouw server niet omgezet op kort termijn.
            </li>
            <li> Komt jouw website niet voor, dan wordt jouw website niet omgezet op kort termijn</li>
            </ul>
                
            </p>
            <p>Bij vragen neem je contact op met <a style="color:white;" href="mailto:servicedesk@realhosting.nl">servicedesk@realhosting.nl</a></p>
            
            </div>
        </div>
        </div>

        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Controleer of je website binnenkort wordt gemigreerd
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
</div>
</div>

           


@endsection

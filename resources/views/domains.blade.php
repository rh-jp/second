@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Nieuwe domeinnaam voor migratie
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New domain Form -->
                    <form action="{{ url('domain')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- domain Name -->
                        <div class="form-group">
                            <label for="domain-name" class="col-sm-3 control-label">Domein:</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="domain-name" class="form-control" value="{{ old('domain') }}">
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Notitie</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="note" name="note" rows="3" value="{{ old('domain')}}"></textarea>
                            </div>
                         </div>

                         <div class="form-group">
                             <label for="date" class="col-sm-3 control label">Datum:</label>
                             <div class="col-sm-6">
                                 <input type="date" name="date" value="{{old('date')}}">
                             </div>
                         </div>

                        <!-- Add domain Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Domeinnaam toevoegen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Current domains -->
            @if (count($domains) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Op de lijst voor de migratie
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped domain-table">
                            <thead>
                                <th>Domein</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                                <th>Huidge VPS</th>
                                <th>Opmerkingen</th>

                            </thead>
                            <tbody>
                                @foreach ($domains as $domain)
                                    <tr class="item{{$domain->id}}">
                                        <td class="table-text"><div>{{ $domain->name }}</div></td>
                                        <td>{{ $domain->date}}</td>
                                     
                                        <td class="{{$domain->id}}">
                                          <button type="button" class="btn btn-primary edit-modal" data-toggle="modal" data-id="{{$domain->id}}" data-name="{{$domain->id}}" data-target="#myModal">Ingepland</button>
                                            @include('button.button')

                                        </td>
                                        <td>
                                            <form action="{{ url('domain/'.$domain->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Verwijderen
                                                </button>
                                            </form>
                                        </td>
                                        <td> <strong style="text-transform: uppercase;">{{ $domain->vpsid}}</strong></td>
                                        <td>{{ $domain->note}}</td>

                                           <!-- domain Delete Button -->
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            @endif
        </div>
    </div>

   <script>
     $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        // $('#footer_action_button').addClass('glyphicon-check');
        // $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
    });

    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
   </script>

@endsection

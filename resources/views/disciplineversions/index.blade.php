@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Disciplineversions</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('disciplineversions.disciplineversion.create') }}" class="btn btn-success" title="Create New Disciplineversion">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($disciplineversions) == 0)
            <div class="panel-body text-center">
                <h4>No Disciplineversions Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Discipline</th>
                            <th>Version</th>
                            <th>Ispublished</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($disciplineversions as $disciplineversion)
                        <tr>
                            <td>{{ optional($disciplineversion->discipline)->discipline_name }}</td>
                            <td>{{ $disciplineversion->version }}</td>
                            <td>{{ $disciplineversion->ispublished }}</td>

                            <td>

                                <form method="POST" action="{!! route('disciplineversions.disciplineversion.destroy', $disciplineversion->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('disciplineversions.disciplineversion.show', $disciplineversion->id ) }}" class="btn btn-info" title="Show Disciplineversion">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('disciplineversions.disciplineversion.edit', $disciplineversion->id ) }}" class="btn btn-primary" title="Edit Disciplineversion">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Disciplineversion" onclick="return confirm(&quot;Delete Disciplineversion?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $disciplineversions->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@extends('layouts.admin')

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
                <h4 class="mt-5 mb-5">Skillcategories</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('skillcategories.skillcategory.create') }}" class="btn btn-success" title="Create New Skillcategory">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($skillcategories) == 0)
            <div class="panel-body text-center">
                <h4>No Skillcategories Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Discipline</th>
                            <th>Skill Category Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($skillcategories as $skillcategory)
                        <tr>
                            <td>{{ optional($skillcategory->discipline)->discipline_name }}</td>
                            <td>{{ $skillcategory->skill_category_name }}</td>

                            <td>

                                <form method="POST" action="{!! route('skillcategories.skillcategory.destroy', $skillcategory->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('skillcategories.skillcategory.show', $skillcategory->id ) }}" class="btn btn-info" title="Show Skillcategory">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('skillcategories.skillcategory.edit', $skillcategory->id ) }}" class="btn btn-primary" title="Edit Skillcategory">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Skillcategory" onclick="return confirm(&quot;Delete Skillcategory?&quot;)">
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
            {!! $skillcategories->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
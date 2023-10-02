@extends('admin.layouts.master')

@section('title')
    Checklists
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($checklists) < 1)
            <h4 class="text-danger">No checklist found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Checklists</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>user_id</th>
                                    <th>complain</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checklists as $checklist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $checklist->user_id }}</td>
                                        <td>{{ $checklist->complain }}</td>
                                        <td>
                                            <a href="{{ route('checklist.edit', $checklist->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <a href="{{ route('checklist.delete', $checklist->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>






@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tools Management</h1>

        <!-- Button to create a new tool -->
        <a href="{{ route('tools.create') }}" class="btn btn-primary mb-3">Create New Tool</a>

        <!-- Check if there are any tools to display -->
        @if ($tools->isEmpty())
            <p>No tools found. Create one!</p>
        @else
            <!-- Table to display tools -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tools as $tool)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tool->title }}</td>
                            <td>{{ $tool->slug }}</td>
                            <td>{{ $tool->created_at->format('Y-m-d') }}</td>
                            <td>
                                <!-- Button to edit the tool -->
                                <a href="{{ route('tools.edit', $tool->id) }}" class="btn btn-warning">Edit</a>

                                <a href="{{ route('tools.show', $tool->id) }}" class="btn btn-info">View</a>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#toolModal{{ $tool->id }}">
                                    View Modal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="toolModal{{ $tool->id }}" tabindex="-1" role="dialog" aria-labelledby="toolModalLabel{{ $tool->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="toolModalLabel{{ $tool->id }}">{{ $tool->title }}</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Slug:</strong> {{ $tool->slug }}</p>
                                                <p><strong>Created At:</strong> {{ $tool->created_at->format('Y-m-d') }}</p>
                                                <p><strong>Meta Description:</strong> {{ $tool->meta_description }}</p>
                                                <p><strong>Meta Keywords:</strong> {{ $tool->meta_keywords }}</p>
                                                <p><strong>Meta Author:</strong> {{ $tool->meta_author }}</p>
                                                <p><strong>Content Header:</strong> {{ $tool->content_header }}</p>
                                                <p><strong>Content Subheader:</strong> {{ $tool->content_subheader }}</p>

                                                <!-- Sections -->
                                                @for ($i = 1; $i <= 4; $i++)
                                                    <h5>Section {{ $i }}</h5>
                                                    <p><strong>Header {{ $i }}:</strong> {{ $tool['header_'.$i] }}</p>
                                                    <p><strong>Paragraph {{ $i }}:</strong> {{ $tool['paragraph_'.$i] }}</p>
                                                    @if ($tool['image_'.$i])
                                                        <p><strong>Image {{ $i }}:</strong></p>
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3">
                                                                <a href="{{ asset('storage/'.$tool['image_'.$i]) }}" target="_blank">
                                                                    <img src="{{ asset('storage/'.$tool['image_'.$i]) }}" class="mt-3 img-fluid img-thumbnail" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted">Current Image: {{ $tool['image_'.$i] }}</small>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Optionally, you can add a delete button as well -->
                                <form action="{{ route('tools.destroy', $tool->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

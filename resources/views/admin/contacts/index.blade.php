@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Messages</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $contact->subject_label }}</span>
                                </td>
                                <td>{{ $contact->formatted_date }}</td>
                                <td>
                                    @if(!$contact->is_read)
                                        <span class="badge bg-warning">Unread</span>
                                    @elseif(!$contact->is_replied)
                                        <span class="badge bg-primary">Read</span>
                                    @else
                                        <span class="badge bg-success">Replied</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                        class="btn btn-sm btn-warning me-1">
                                       <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" 
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No messages found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
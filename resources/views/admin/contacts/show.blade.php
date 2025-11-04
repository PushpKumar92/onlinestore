@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Contact Message Details</h3>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Name:</th>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>
                                        @if($contact->phone)
                                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                        @else
                                            <span class="text-muted">Not provided</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subject:</th>
                                    <td>
                                        <span class="badge bg-info">{{ $contact->subject_label }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td>{{ $contact->formatted_date }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if(!$contact->is_read)
                                            <span class="badge bg-warning">Unread</span>
                                        @elseif(!$contact->is_replied)
                                            <span class="badge bg-primary">Read</span>
                                        @else
                                            <span class="badge bg-success">Replied</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>

                      

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
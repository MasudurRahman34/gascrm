@extends('layouts.admin')

@section('content')
    @if (isset($show))
        <lead-details :data="{{ $data }}" :user="{{ Auth::user() }}" :permissions="{{ $permissions }}" :urls="{ 
            options : '{{ route('api-options') }}',
            lead : '{{ route('lead.index') }}',
            printable : '{{ route('lead.printable', $data->id) }}',
            store : '{{ route('lead.store') }}',
            update : '{{ route('lead.update', $data->id) }}',
            destroy : '{{ route('lead.destroy', $data->id) }}',
            follow : '{{ route('lead.follow', $data->id) }}',
            owner : '{{ route('lead.owner-change', $data->id) }}',
            convert : '{{ route('lead.convert', $data->id) }}',
            statusChange : '{{ route('lead.status-change') }}',
            task : '{{ route('task.store') }}',
            email : '{{ route('email.store') }}',
            event : '{{ route('event.store') }}',
            note : '{{ route('note.store') }}',
            noteAll : '{{ route('note.all') }}',
            file : '{{ route('file.store') }}',
            fileAll : '{{ route('file.all') }}',
        }"></lead-details>
    @else
        <div class="page-breadcrumb border-bottom">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-12 align-self-center">
                    <h5 class="font-medium text-uppercase mb-0">{{ __('lang.Leads') }}</h5>
                </div>
            </div>
        </div>
        <div class='page-content container-fluid'>
            <div class='card'>
                <div class='card-header'>

                </div>
                <div class='body'>
                    <form action="{{ route('upload.import') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Exel file Here</label>
                            <input type="file" name='import' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Store/Update Modal -->
        @if(auth()->user()->can('add lead') || auth()->user()->can('edit lead'))
        <lead-form ref="childref" page="{{ Request::routeIs('lead.create') ? 'create' : 'index' }}" :user="{{ Auth::user() }}" :urls="{ 
            options : '{{ route('api-options') }}', 
            lead : '{{ route('lead.index') }}', 
            store : '{{ route('lead.store') }}'
        }"></lead-form>
        @endif
    @endif
@endsection
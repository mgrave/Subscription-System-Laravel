@extends('layouts.backend')
@section('Title', 'all-package-list')
@section('contetn_header', 'ALL PACKAGE LIST')

@section('buttons')
    <a href="{{ route('packageList.create') }}" class="btn btn-sm btn-primary">+ Add New</a>
@endsection

@section('content')
    <div class="row  d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Package Name</th>
                                <th>Start Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->user->name ?? 'N/A' }}</td>
                                    <td>{{ $list->package->package_name ?? 'N/A' }}</td>
                                    <td>{{ date('m-d-Y', strtotime($list->start_date)) }}</td>

                                    <td>
                                        <a class="{{ $list->list_status == 1 ? 'badge badge-info' : 'badge badge-dark' }}">
                                            {{ $list->list_status == 1 ? 'Active' : 'Deactive' }}
                                        </a>
                                    </td>

                                    <td class="d-flex">
                                        <a href="{{ route('packageList.edit', $list->id) }}"
                                            class="btn btn-sm btn-primary ml-2">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if ($list->list_status == 1)
                                            <a href="{{ route('packageList.deActive', $list->id) }}"
                                                class="btn btn-sm btn-warning ml-2">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('packageList.active', $list->id) }}"
                                                class="btn btn-sm btn-success ml-2">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                        @endif


                                        <form method="POST" action="{{ route('packageList.delete', $list->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-danger pckgListDlt ml-2">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.pckgListDlt', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.pckgListDlt').parent('form:first').submit();
                }
            });
        });
    </script>

    @include('inc.tostr')
@endsection

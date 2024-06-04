@extends('layouts.backend')
@section('Title', 'notification-page')
@section('contetn_header', 'NOTIFICATION')

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>{{ $report->package->package_name }}</td>

                                    <td>
                                        @php
                                            $notified_date = $report->start_date->addDay(
                                                $report->package->package_duartion - 2,
                                            );

                                        @endphp

                                        @if ($notified_date < now())
                                            <a href="" class="btn btn-sm btn-primary">
                                                RENEW
                                            </a>
                                        @endif
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

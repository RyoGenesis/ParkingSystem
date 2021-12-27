@extends('layouts.layout')
@section('title-header','ParkSys - Report')

@section('content')
    <div class="text-center">
        <h1 class="fw-bold">Report</h1>
    </div>
    <div id="report" >
        <p class="mb-0 fw-bold">Export Options:</p>
        <table class="table table-hover table-bordered table-light table-striped" id="report-data">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Vehicle Number</th>
                    <th>Code</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody id="List">
            @forelse ($parkingdata as $data)
                <tr>
                    <td class="align-middle text-center">
                        {{$data->id}}
                    </td>
                    <td class="align-middle text-center">
                        {{$data->vehicle->license_plate}}
                    </td>
                    <td class="align-middle text-center">
                        {{$data->unique_code}}
                    </td>
                    <td class="align-middle text-center">
                        {{$data->time_in}}
                    </td>
                    <td class="align-middle text-center">
                        {{$data->time_out}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#report-data').DataTable( {
                dom: 'Bfrltip',
                buttons: ['excel', 'pdf']
            } );
        
            // table.buttons().container()
            //     .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        });
    </script>
@endsection
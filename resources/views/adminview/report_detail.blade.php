@extends('layouts.layout')
@section('title-header',"ParkSys - Report \n(" . (!empty($date) ? $date['date_start'] . ' to '. $date['date_end'] : "All") . ')')

@section('content')
    <div>
        <a class="btn btn-success" href="{{ route('admin.report')}}"><i class="fas fa-chevron-left"></i> Report Options</a>
        <h1 class="fw-bold text-center">Report</h1>
        <p class="text-center">({{!empty($date) ? $date['date_start'] . ' to '. $date['date_end'] : "All"}})</p>
    </div>
    <div id="report" class="table-responsive">
        <p class="mb-0 fw-bold">Export Options:</p>
        <table class="table table-hover table-bordered table-light table-striped" id="report-data">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Vehicle Number</th>
                    <th>Code</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Fee (Rp.)</th>
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
                    <td class="align-middle text-center">
                        {{$data->fee}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No Data</td>
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
                "lengthMenu": [5, 10, 25, 50 ],
                buttons: ['excel', 'pdf']
            } );
        }); 
    </script>
@endsection
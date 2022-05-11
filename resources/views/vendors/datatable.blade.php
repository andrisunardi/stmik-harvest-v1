@push("css")
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset("https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.0/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css") }}" /> --}}

    {{-- <style>
        @media (min-width: 767px) {
            #DataTables_Table_0_filter {
                /* margin-top: -35px; */
                /* display: none; */
            }
        }

        #DataTables_Table_0_filter label {
            color: #000000;
        }
    </style> --}}

    {{-- <style>
        @media (max-width: 767px) {
            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                margin-top: 20px;
                white-space: nowrap;
                text-align: right;
                justify-content: center;
            }
        }
    </style> --}}
@endpush

@push("script")
    <script>
        $(document).ready(function() {
            $("table").DataTable();
        });
    </script>
@endpush

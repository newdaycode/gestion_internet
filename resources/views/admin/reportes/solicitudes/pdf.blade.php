<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Prosait') }}</title>
        <!-- Styles -->
        <style type="text/css">
            
            #datatable{
                font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"
                border-collapse: collapse;
                width: 100%;
                margin-top: 6px ;
                margin-bottom: 6px ;
                max-width: none ;
                border-spacing: 0;

            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .table td, .table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                text-align: left;
            }

            .bg-warning{
                background-color: #ffc107;
            }
            .bg-warning, .bg-warning>a {
                color: #1f2d3d;
            }
            .bg-green, .bg-green>a{
                color: #fff;
            }

            .bg-green {
                background-color: #28a745;
            }

            .bg-red, .bg-red>a {
                color: #fff;
            }

            .bg-red {
                background-color: #dc3545;
            }

            .badge {
                display: inline-block;
                padding: .25em .4em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25rem;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .title{
                text-align: center;
                font-size: 1.5rem;
                font-weight: bold;
            }

            img{
                width: 250px;
                height: auto;
            }



        </style>

    </head>
    <body>
        <div align="center">
            <img src="{{ asset('img') }}/logo.png" alt="Logo" />
        </div>
        
        <br>
        <p class="title">Reportes de Solicitudes</p>
        <div class="tabla-listado table-responsive">
            @include('admin.reportes.solicitudes.listado')
        </div>



        <script type="text/php">
            if ( isset($pdf) ) {
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $pdf->text(500, 815, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
                ');
            }
        </script>

        
    </body>
</html>

@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
<style>
       .ct-chart {
           position: relative;
       }
       .ct-legend {
           position: relative;
           z-index: 10;
           list-style: none;
           text-align: center;
       }
       .ct-legend li {
           position: relative;
           padding-left: 23px;
           margin-right: 10px;
           margin-bottom: 3px;
           cursor: pointer;
           display: inline-block;
       }
       .ct-legend li:before {
           width: 12px;
           height: 12px;
           position: absolute;
           left: 0;
           content: '';
           border: 3px solid transparent;
           border-radius: 2px;
       }
       .ct-legend li.inactive:before {
           background: transparent;
       }
       .ct-legend.ct-legend-inside {
           position: absolute;
           top: 0;
           right: 0;
       }
       .ct-legend.ct-legend-inside li{
           display: block;
           margin: 0;
       }
       .ct-legend .ct-series-0:before {
           background-color:#1889c2;
           border-color: #1889c2;
       }
       .ct-legend .ct-series-1:before {
           background-color: #d70206;
           border-color:#d70206;
       }

       .table-cebra {
          border: solid 1px #ccc;
          border-spacing: 0;
       }
       .table-cebra thead th {
          background: white;
          color:#1889c2;
       }
       .table-cebra th,
       .table-cebra td {
          border-right: 1px ;
          min-width: 100%;
          padding: 0.5rem;
          text-align: left;
       }
        .table-cebra th:last-child,
        .table-cebra td:last-child {
          border-rigth: 0;
        }
        .table-cebra td {
            border-bottom: 1px solid #ccc;
        }        
        .table-cebra tbody tr  {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n)  {
          background: #f2f2f2;
       }


       .table-cebra .sticky {
          position: sticky ;
          left: 0;
       }
       .table-cebra tbody tr .sticky {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky {
          background: #f2f2f2;
       }

       .table-cebra .sticky2 {
          position: sticky ;
          left:100px;
       }
       .table-cebra tbody tr .sticky2 {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky2 {
          background: #f2f2f2;
       }
       .table-cebra .sticky3 {
          position: sticky ;
          left:200px;
       }
       .table-cebra tbody tr .sticky3 {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky3 {
          background: #f2f2f2;
       }
       .table-cebra .sticky4 {
          position: sticky ;
          left:300px;
       }
       .table-cebra tbody tr .sticky4 {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky4 {
          background: #f2f2f2;
       }
       .table-cebra .sticky5 {
          position: sticky ;
          left:400px;
       }
       .table-cebra tbody tr .sticky5 {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky5 {
          background: #f2f2f2;
       }
       .table-cebra .sticky6 {
          position: sticky ;
          left:500px;
       }
       .table-cebra tbody tr .sticky6 {
          background: white;
       }
       .table-cebra tbody tr:nth-child(2n) .sticky6 {
          background: #f2f2f2;
       }
      
       
     
    </style>
  <div class="content">
  
    <div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
               
                <i class="card-tittle"></i>
                <font size=4+><p>{{ __('Avance Diario')  }}</p></font>
              </div>
              <p class="card-category"></br>
              @php
                $hoy =date('d/m');
                $hora = date("G").":00"; 
                $dia_semana = date("N");
              @endphp
              <h3 class="card-title"><b><font size=6+>{{ $hoy }}</br>{{$hora }}</font></b>
                <small></small>
              </h3>
            </div>
            <div class="card-footer" style="align:center">        
                <p class="stats"><span class="text-info"> Eficiencia Meta : </span><b>  {{ ' '.number_format($eficiencia_dia,2).' %' }}</b></p> 
                <p class="stats"><span class="text-info"> Eficiencia Real : </span><b>  {{ ' '.number_format($efic_total,0).' %' }}</b></p> 

            </div>
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-info"> Piezas Meta : </span><b>  {{ ' '.number_format( $cantidad_dia,2) }}</b></p>    
                <p class="stats"><span class="text-info"> Piezas Reales :</span><b>  {{ ' '.number_format( $cantidad_diaria,0) }}</b></p>
                <p class="stats"><span class="text-info"> Diferencia :</span><b> <font color=red>  {{ ' '.number_format(($cantidad_dia-$cantidad_diaria),0) }}</font></b></p>
            </div>   
               
          <!--
           <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i> 
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
               
                <i class="card-tittle"></i>

                <font size=4+><p>{{ __('Avance Acumulado') }}</p></font>
              </div>
              <p class="card-category"></br>
              <h3 class="card-title"><b><font size=6+>{{ $hoy.'  ' }}</br>{{'  '.$hora }}</font></b>
                <small></small>
              </h3>
            </div>
            
            <div class="card-footer" style="align:center">    
              <p class="stats"><span class="text-info"> Eficiencia Meta :</span><b>  {{  ' '.$eficiencia_total.' %' }}</b></p> 
              <p class="stats"><span class="text-info"> Eficiencia Real :</span><b>  {{ ' '.number_format($eficiencia_semanal,0).' %'  }}</b></p> 
            </div>   
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-info"> Piezas Meta : </span><b>  {{ ' '.number_format( $cantidad_total,2) }}</b></p>    
                <p class="stats"><span class="text-info"> Piezas Reales :</span><b>  {{ ' '.number_format($cantidad_semanal,0) }}</b></p>
                <p class="stats"><span class="text-info"> Diferencia :</span><b> <font color=red> {{ ' '.number_format($cantidad_total-$cantidad_semanal,0) }}</font></b></p>

            </div>   
          <!--
           <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
               
                <i class="card-tittle"></i>
                <font size=3+><p>{{ __('Planta I ') }}</p><p>{{ __('Avance Diario ') }}</p></font>
              </div>
              <p class="card-category"></br>
              <h3 class="card-title"><b><font size=6+>{{ $hoy.'  ' }}</br>{{'  '.$hora }}</font></b>
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{ ' '.number_format($cantidad_plantaI,0) }}</b></p>    
                <p class="stats"><span class="text-success"> Piezas Reales :</span><b>  {{ ' '.number_format($real_x_plantaI,0) }}</b></p> 
                <p class="stats"><span class="text-success"> Diferencia :</span><b> <font color=red> {{ number_format($cantidad_plantaI-$real_x_plantaI,0) }} </font></b></p>
            </div>   
            <div class="card-footer" style="align:center">      
              <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{ ' '.number_format($eficiencia_plantaI,0).' %' }}</b></p> 
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ ' '.number_format(0,0)}}</b></p>             </div>    
          <!--
           <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
 
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
               
                <i class="card-tittle"></i>
                <font size=3+><p>{{ __('Planta II ') }}</p><p>{{ __('Avance Diario ') }}</p></font>
              </div>
              <p class="card-category"></br>
              <h3 class="card-title"><b><font size=6+>{{ $hoy.'  ' }}</br>{{'  '.$hora }}</font></b>
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-warning"> Piezas Meta : </span><b>  {{ ' '.number_format($cantidad_plantaII,0) }}</b></p>    
                <p class="stats"><span class="text-warning"> Piezas Reales :</span><b>  {{ ' '.number_format(0,0) }}</b></p>
                <p class="stats"><span class="text-warning"> Diferencia :</span><b> <font color=red> {{ ' '.number_format($cantidad_plantaII-0,0) }} </font></b></p>
            </div>   
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-warning"> Eficiencia Meta :</span><b>  {{ ' '.number_format($eficiencia_plantaII,0).' %' }}</b></p> 
              <p class="stats"><span class="text-warning"> Eficiencia Real :</span><b>  {{ ' '.number_format(0,0) }}</b></p>             </div>   
          <!--
           <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>        
      </div>
       
  
    <!--  <div class="row">
        <div class="col-lg-6 col-md-6">
          <label for="join"
            class="col-md-4 col-form-label text-md-end">{{ __('Fecha Inicial') }}</label>
            <div class="col-md-6" >
              <input type="date" class="form-control" name="fecha_inicial" id="fecha_inicial" max ="2023-08-08" min ="2023-08-08" value={{ $inicio }} >
            </div>
          </div>
          <div class="col-lg-6 col-md-6" >
          <label for="join"
            class="col-md-4 col-form-label text-md-end">{{ __('Fecha Final') }}</label>
            <div class="col-md-6" style="display: block" id='id_fecha_final'>
              <input type="date" class="form-control" name="fecha_final" id="fecha_final" value={{ $fin }}>
            </div>
          </div>
      </div>-->
    
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('V.S.') }}</b>     <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_VS,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b>  {{number_format($real_VS,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b>  <font color=red>{{ number_format($cantidad_VS-$real_VS,0) }}</font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_VS,0).' %'  }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
                    
        <!--   <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('CHICO´S') }}</b>                
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_CHICOS,0)  }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b>  {{ number_format($real_CHICOS,0) }}</b></p>
            </div>  
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b><font color=red> {{  number_format($cantidad_CHICOS-$real_CHICOS,0)  }}</font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_CHICOS,0).' %'  }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
           
          
         <!--  <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('BN3TH') }}</b>
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{  number_format($cantidad_BN3,0)  }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b>  {{ number_format($real_BN3,0) }}</b></p>
            </div> 
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b> <font color=red> {{ number_format($cantidad_BN3-$real_BN3,0) }}</font></b></p>
            </div>   
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{number_format($eficiencia_BN3,0).' %' }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
         
          
        <!--   <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('NUUDS') }}</b>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_NU,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Reales :</span><b>  {{ number_format($real_NU,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b> <font color=red> {{ number_format($cantidad_NU-$real_NU,0) }} </font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_NU,0).' %' }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
          
        <!--   <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('MARENA') }}</b>     <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats"><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_MARENA,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b>  {{ number_format($real_MARENA,0) }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b>  <font color=red>{{ number_format($cantidad_MARENA-$real_MARENA,0) }}</font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_MARENA,0).' %'  }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
                    
        <!--   <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('LECOQ') }}</b>                
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats" ><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_PACIFIC,0)  }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b> {{ number_format($real_LECOQ,0) }}</b></p>
            </div>  
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b><font color=red>  {{  number_format($cantidad_PACIFIC-$real_LECOQ,0)  }}</font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_PACIFIC,0).' %'  }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
           
          
         <!--  <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <!-- <div class="card-icon">
               
                <i class="card-tittle"></i>
                <p>{{ __('V.S.') }}</p>
              </div>-->
              <p class="card-category"></br>
              <h3 class="card-title"><b>{{ __('BELLEFIT') }}</b>                
                <small></small>
              </h3>
            </div>
      
            <div class="card-footer" style="align:center">
                <p class="stats" ><span class="text-success"> Piezas Meta : </span><b>  {{ number_format($cantidad_BELL,0)  }}</b></p>
            </div>   
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Piezas Real :</span><b>  {{ number_format($real_BELL,0) }}</b></p>
            </div>  
            <div class="card-footer" style="align:center">    
                <p class="stats"><span class="text-success"> Diferencia :</span><b><font color=red>  {{  number_format($cantidad_BELL-$real_BELL,0)  }}</font></b></p>
            </div>  
            <div class="card-footer" style="align:center">   
            <p class="stats"><span class="text-success"> Eficiencia Meta :</span><b>  {{  number_format($eficiencia_PACIFIC,0).' %'  }}</b></p> 
            </div>  
            <div class="card-footer" style="align:center">   
              <p class="stats"><span class="text-success"> Eficiencia Real :</span><b>  {{ 0 }}</b></p> 
            </div>
           
          
         <!--  <div class="card-footer">
              <div class="stats">
                <i class="material-icons ">date_range</i>
                <a href="{{ route('excepciones') }}">Detalle...</a>
              </div>
            </div>-->
          </div>
        </div>
       
        
       
        
      </div>
     
     <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-info">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Reportes:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="#profile" data-toggle="tab">
                        <i class="material-icons">cloud</i> Team Leader
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Modulos
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#settings" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Avance
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
           
            <div class="card-body  table-responsive">
              <div class="tab-content">
              <div class="tab-pane" id="profile">
                  <table class="table">
                  <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-primary">
                          <th>Team Leader</th>
                        <!-- <th>Modulo</th>     -->
                            <th style="text-align: center">Piezas </th>
                          <!--  <th style="text-align: center">Eficiencia</th>
                            <th style="text-align: center">Min Presencia</th>
                            <th style="text-align: center">Min x Producir</th>
                            <th style="text-align: center">Min Presencia Netos</th>-->
                           <!-- <th style="text-align: center">Total</th>-->
                        </thead>
                    <tbody>
                    @foreach($team_leader as $team)   
                      <tr>
                       <!-- <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>-->
                        <td class="text-info">{{ $team->team_leader }} </td>                   
                      <!--  <td style="text-align: center">{{ $team->modulo }} </td> -->                   
                        <td  style="text-align: center">{{ $team->piezas }}</td>
                        <td  style="text-align: center">{{ $team->eficiencia.' %' }}</td>
                       
                      <!--  <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>-->
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane active" id="settings">
                  <table class="table-cebra">

                      <thead>
                        <th style="text-align: center" class="sticky">Team Leader</th>
                        <th style="text-align: center" class="sticky2">Area</th>
                        <th style="text-align: center" class="sticky3">Modulo</th>
                       <!-- <th style="text-align: center" class="sticky4">Estilo</th>-->
                        <th style="text-align: center" class="sticky4">Piezas Meta</th>
                        <th style="text-align: center" class="sticky5">Eficiencia</th>
                        <th style="text-align: center" class="text-success">Meta 10:00</th>
                        <th style="text-align: center" class="text-success">Piezas</th>
                        <th style="text-align: center" class="text-success">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-success">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-success">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-info">Meta 11:00</th>
                        <th style="text-align: center" class="text-info">Piezas</th>
                        <th style="text-align: center" class="text-info">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-info">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-info">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 12:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 13:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 14:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 15:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 16:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 17:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                        <th style="text-align: center" class="text-warning">Meta 18:00</th>
                        <th style="text-align: center" class="text-warning">Piezas</th>
                        <th style="text-align: center" class="text-warning">Efic</br>(%)</th>
                        <th style="text-align: center" class="text-warning">Minutos </br>(Producidos)</th>
                        <th style="text-align: center" class="text-warning">Proyeccion</br>(Minutos)</th>
                      </thead>
                      

                        <tbody>
                       @foreach($planeacion as $plan)
                          <tr>
                            <td style="text-align: left" class="sticky">{{ $plan->team_leader}}</td>
                            <td style="text-align: center" class="sticky2">{{ $plan->cliente}}</td>
                            <td style="text-align: center" class="sticky3">{{ $plan->Modulo}}</td>
                            @foreach($planeacion_meta as $meta)
                              @if($plan->Modulo == $meta->modulo)
                                <td style="text-align: center" class="sticky4">{{ $meta->cantidad_d2}}</td>
                                <td style="text-align: center" class="sticky5">{{ ($meta->eficiencia_d2).' %'}}</td>
                              @endif
                            @endforeach  
                          </tr>  
                       @endforeach
                            
                        </tbody>
                    </table>
                  </div>
               
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-primary">
                          <th>Modulos</th>
                          <th>Team Leader</th>
                            <th style="text-align: center; width:200px">Piezas Meta Diaria</th>
                            <th style="text-align: center; width:200px">Piezas  Reales</th>
                            <th style="text-align: center; width:200px">Eficiencia</th>
                            <th style="text-align: center; width:200px">Minutos  Producidos</th>
                            <th style="text-align: center; width:200px">Proyeccion Minutos</th>
                          
                        </thead>
                    <tbody>
                    @foreach($modulos as $mod)   
                      <tr>
                     
                        <td class="text-info">{{ $mod->modulo }} </td>       
                        <td class="text-info">{{ $mod->team_leader }} </td> 
                       <!-- <td style="text-align: center">{{ $mod->piezas_meta }} </td>         -->
                        <td  style="text-align: center">{{ number_format(($mod->piezas_meta/$horas_laboradas)*$valor_hora,0) }}</td>
                        <td  style="text-align: center">{{ number_format($mod->piezas,0) }}</td>
                        <td  style="text-align: center">{{ number_format($mod->efic,0).' %' }}</td>
                        <td  style="text-align: center">{{ number_format($mod->min_producidos,0) }}</td>
                        <td  style="text-align: center">{{ number_format($mod->proyeccion_minutos,0) }}</td>
                     
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      
@endsection



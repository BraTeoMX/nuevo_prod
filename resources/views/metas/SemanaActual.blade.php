@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('Produccion Metas')])



@section('content')
    <div class="card" style="height: auto; width: auto;">
        <div class="card-header">
          <!--  <h1>CAPTURA SEMANA ACTUAL: {{ $current_week }}</h1>
            <h1> {{ $current_month }} {{$currentYear}}</h1>-->
            <h3 class="card-title"><b><font size=6+> Registro Semana {{ $current_week }} <br>{{ $current_month.'  ' }}{{$currentYear }}</font></b>
                <small></small>
              </h3>
        </div>

        <br>
        <!-- Acordeón -->
    <div id="accordion">

        <!-- Tarjeta para Planta 1 -->
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Planta 1 - Ixtlahuaca
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <!-- Contenido para Planta 1 -->
              <form method="POST" action="{{ route('metas.actualizarTabla') }}"> 
                @csrf
                <div class="form-container form-filter">
                    {{-- Botón de enviar --}}
                    {{--
                    <div>
                        <button type="submit" ><strong>Enviar </strong> </button>
                    </div> --}}
                    <!-- Botón para abrir el modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal">
                        Mostrar Información
                    </button>
                    {{-- Campo de búsqueda --}}
                    <div>
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar nombre o módulo...">
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Inicio Seccion de la primera tabla -->
                                    <table BORDER>
                                            <th>&nbsp;#</th>
                                            <th>Información de Colores</th>
                                        </tr>
                                        @for ($i = 1; $i <= 8; $i++)
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <th id="dato{{ $i }}" style="background-color: {{ $colores[$i-1] }}; text-align: left;" >&nbsp;{{ $titulos[$i-1] }}&nbsp;</th>
                                            </tr>
                                        @endfor
                                    </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inicio de tabla de prueba -->
                <table id="myTable">
                    <thead style="text-align: center; width:100%">
                        <tr>
                            <th rowspan="2" style="text-align: center; width:400px" >Team Leaders</th>
                            <th rowspan="2" style="text-align: center; width:400px">Modulo</th> 
                            <th colspan="7" style="text-align: center;">SEMANA {{ $current_week }}</th>
                        </tr>
                        <tr id="header-row">
                            <th class="green">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="light-green">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="yellow">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="orange">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="red">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="peach">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="grey">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datosProduccionIntimark1 as $produccion)
                            <tr>
                                <td style="text-align: left">{{ $produccion->nombre }}</td>
                                <td>{{ $produccion->modulo }}</td>
                                @for($i = 1; $i <= 7; $i++)
                                @php
                                    $isChecked = $produccion->{'semana' . $current_week} == $i;
                                    $colorClass = $isChecked ? 'class-name-for-color-' . $i : '';
                                @endphp
                                <td class="centered-content {{ $colorClass }}">
                                    <input type="checkbox" 
                                        id="checkbox-{{ $produccion->id }}-{{ $i }}"
                                        data-type="original"
                                        name="semanas[{{ $produccion->id }}][semana{{ $current_week }}]"
                                        value="{{ $i }}"
                                        onclick="uncheckOthers(this, 'original', {{ $produccion->id }})"
                                        {{ $isChecked ? 'checked' : '' }}>
                                    @if($i <= 3)
                                        <input type="checkbox" 
                                            id="checkbox-extra-{{ $produccion->id }}-{{ $i }}"
                                            data-type="extra"
                                            name="semanas[{{ $produccion->id }}][extra{{ $current_week }}]"
                                            value="{{ $i }}"
                                            onclick="uncheckOthers(this, 'extra', {{ $produccion->id }})">
                                    @endif
                                </td>
                            @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{-- Botón de enviar --}}
                <div class="form-container form-filter">
                    <button type="submit" ><strong>Enviar </strong> </button>
                </div>
            </form>
            </div>
          </div>
        </div>

        <!-- Tarjeta para Planta 2 -->
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Planta 2 - San Bartolo
              </button>
            </h5>
          </div>

          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <!-- Contenido para Planta 2 -->
              <form method="POST" action="{{ route('metas.actualizarTabla') }}">
                @csrf
                <div class="form-container form-filter">
                    {{-- Botón de enviar --}}
                    {{--
                    <div>
                        <button type="submit" ><strong>Enviar </strong> </button>
                    </div>
                    --}}
                    </button>
                    {{-- Campo de búsqueda --}}
                    <div>
                        <input type="text" id="searchInput2" onkeyup="filterTable2()" placeholder="Buscar por nombre o módulo...">
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Inicio Seccion de la primera tabla -->
                                    <table BORDER>
                                            <th>&nbsp;#</th>
                                            <th>Información de Colores</th>
                                        </tr>
                                        @for ($i = 1; $i <= 7; $i++)
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <th id="dato{{ $i }}" style="background-color: {{ $colores[$i-1] }}; text-align: left;" >&nbsp;{{ $titulos[$i-1] }}&nbsp;</th>
                                            </tr>
                                        @endfor
                                    </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inicio de tabla de prueba -->
                <table id="myTable2">
                    <thead>
                        <tr>
                            <th rowspan="2"  style="text-align: center; width:400px">Team Leaders</th>
                            <th rowspan="2"  style="text-align: center; width:400px">Modulo</th>
                            <th colspan="7" style="text-align: center;">SEMANA {{ $current_week }}</th>
                        </tr>
                        <tr id="header-row">
                            <th class="green">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="light-green">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="yellow">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="orange">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="red">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="peach">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                            <th class="grey">&nbsp; &nbsp; &nbsp; &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datosProduccionIntimark2 as $produccion)
                            <tr>
                                <td style="text-align: left">{{ $produccion->nombre }}</td>
                                <td>{{ $produccion->modulo }}</td>
                                @for($i = 1; $i <= 7; $i++)
                                    {{-- Determinar si el checkbox debe estar marcado y con color --}}
                                    @php
                                    $isChecked = $produccion->{'semana' . $current_week} == $i;
                                    $colorClass = $isChecked ? 'class-name-for-color-' . $i : ''; // Reemplaza 'class-name-for-color-X' con las clases reales que correspondan
                                @endphp
                                <td class="centered-content {{ $colorClass }}">
                                    <input type="checkbox" id="checkbox-{{ $produccion->id }}-{{ $i }}"
                                        name="semanas[{{ $produccion->id }}][semana{{ $current_week }}]"
                                        value="{{ $i }}"
                                        onclick="uncheckOthers(this, {{ $i }})"
                                        {{ $isChecked ? 'checked' : '' }}>
                                </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{-- Botón de enviar --}}
                <div class="form-container form-filter">
                    <button type="submit" ><strong>Enviar </strong> </button>
                </div>
            </form>
            </div>
          </div>
        </div>

      </div>
      <!-- Fin Acordeón -->
        <br>
    </div>
    <style>
        /* Estilos generales para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border-radius: 8px;
            overflow: hidden; /* Asegura que los bordes redondeados se apliquen en los bordes de la tabla */
        }

        th, td {
            padding: 12px 15px; /* Ajusta el padding para más espacio */
            text-align: center;
            border-bottom: solid 1px #ddd; /* Línea sutil entre filas */
        }

        th {
            background-color: #bbcdce; /* Color de fondo para los encabezados */
            color: #333; /* Color del texto para los encabezados */
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5; /* Color al pasar el ratón por encima de las filas */
        }

        /* Colores de las cabeceras de colores */
        .green { background-color: #00B0F0; }
        .light-green { background-color: #00B050; }
        .yellow { background-color: #FFFF00; }
        .orange { background-color: #C65911; }
        .red { background-color: #FF0000; }
        .peach { background-color: #A6A6A6; }
        .grey { background-color: #F9F9EB; }

        /* Clases adicionales */
        .centered-content {
            text-align: center;
            vertical-align: middle;
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 16px;
            border-bottom: solid 1px #ddd;
        }

        /*Apartado para los diselos del input */
        #searchInput, #searchInput2 {
        width: 100%; /* O un ancho específico, según tu diseño */
        padding: 10px 50px 10px;
        margin: 10px 0;
        border: 1px solid #ddd; /* Color de borde suave */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave */
        border-radius: 4px; /* Bordes redondeados */
        outline: none; /* Remueve el contorno al enfocar */
        transition: all 0.3s ease-in-out; /* Transición suave */
    }

    #searchInput:focus, #searchInput2:focus {
        border-color: #0056b3; /* Cambia el color del borde al enfocar */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada al enfocar */
    }

    #searchInput::placeholder, #searchInput2::placeholder {
        color: #999; /* Color del texto del placeholder */
    }


    .form-filter {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    gap: 20px;
    align-items: center;
    }

    .form-filter select,
    .form-filter button {
        padding: 15px 35px;
        border-radius: 10px;
        border: 1px solid #ddd;
        background-color: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .form-filter button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    .form-filter button:hover {
        background-color: #0056b3;
    }

    /* Estilo del texto de las etiquetas */
    .form-filter label {
        font-weight: bold;
    }

    /* Estilo del contenedor del formulario */
    .form-container {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    input[type="checkbox"] {
        /* Ajusta la escala al tamaño que desees */
        transform: scale(1.5);
        /* Asegúrate de centrar el checkbox después de escalarlo */
        margin: 0;
        /* Puedes necesitar ajustar la alineación vertical si se desplaza */
        vertical-align: middle;
    }

    </style>

<script>
function uncheckOthers(checkbox, checkboxType, rowId) {
        var row = checkbox.closest('tr');
        var checkboxes = row.querySelectorAll(`input[type="checkbox"][data-type="${checkboxType}"]`);
        checkboxes.forEach(function(cb) {
            if (cb !== checkbox && cb.dataset.type === checkboxType) {
                cb.checked = false;
                cb.parentElement.classList.remove('green', 'light-green', 'yellow', 'orange', 'red', 'peach', 'grey');
            }
        });

    // Selecciona el checkbox y aplica la clase de color correspondiente
    // Actualiza el color de la celda actual
    if (checkbox.checked) {
            var cellIndex = checkbox.parentElement.cellIndex - 2; // Ajusta según la estructura de tu tabla
            var headerCells = document.querySelectorAll('#header-row th');
            var headerClass = headerCells[cellIndex].classList[0];
            checkbox.parentElement.classList.add(headerClass);
        } else {
            checkbox.parentElement.classList.remove('green', 'light-green', 'yellow', 'orange', 'red', 'peach', 'grey');
        }
    }

</script>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable"); // Asegúrate de poner el id correcto de tu tabla
        tr = table.getElementsByTagName("tr");

        // Recorre todas las filas de la tabla y oculta las que no coinciden con la búsqueda
        for (i = 1; i < tr.length; i++) { // Comienza en 1 para saltar el encabezado de la tabla
            // Obtén las celdas de "Team Leaders" y "Modulo"
            var tdLeader = tr[i].getElementsByTagName("td")[0];
            var tdModule = tr[i].getElementsByTagName("td")[1];
            if (tdLeader || tdModule) {
                if (tdLeader.textContent.toUpperCase().indexOf(filter) > -1 || tdModule.textContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>

<script>
    function filterTable2() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable2"); // Asegúrate de poner el id correcto de tu tabla
        tr = table.getElementsByTagName("tr");

        // Recorre todas las filas de la tabla y oculta las que no coinciden con la búsqueda
        for (i = 1; i < tr.length; i++) { // Comienza en 1 para saltar el encabezado de la tabla
            // Obtén las celdas de "Team Leaders" y "Modulo"
            var tdLeader = tr[i].getElementsByTagName("td")[0];
            var tdModule = tr[i].getElementsByTagName("td")[1];
            if (tdLeader || tdModule) {
                if (tdLeader.textContent.toUpperCase().indexOf(filter) > -1 || tdModule.textContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
@endsection

// Leer el excel ene l modal por lotes
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('actividad');
    var modal = document.getElementById('excelModal');
    var tableContainer = document.getElementById('excelTableContainer');
    var loadMoreButton = document.getElementById('loadMore');
    var excelData = [];
    var currentIndex = 0;
    var batchSize = 10;

    function loadExcelData() {
        var url = 'http://localhost/prueba/Documents/servicios.xls';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'arraybuffer';

        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = new Uint8Array(xhr.response);
                var workbook = XLSX.read(data, { type: 'array' });
                var sheet = workbook.Sheets[workbook.SheetNames[0]];
                excelData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
                renderRows();
            } else alert('Error al cargar el archivo Excel');
        };

        xhr.send();
    }

    function renderRows() {
        var endIndex = currentIndex + batchSize;
        if (endIndex > excelData.length) {
            endIndex = excelData.length;
        }

        var html = '<table class="table table-bordered">';

        for (var i = currentIndex; i < endIndex; i++) {
            var rowData = excelData[i];
            html += '<tr>';
            for (var j = 0; j < rowData.length; j++) {
                html += '<td>' + rowData[j] + '</td>';
            }
            html += '</tr>';
        }

        html += '</table>';
        tableContainer.innerHTML += html;
        currentIndex = endIndex;
    }

    input.addEventListener('click', function () {
        loadExcelData();
        modal.style.display = 'block';
    });


    loadMoreButton.addEventListener('click', function (e) {
        e.stopPropagation();
        renderRows();
    });

    tableContainer.addEventListener('click', function (e) {
        var target = e.target;
        if (target.tagName === 'TD') {
            var row = target.parentNode;
            var rowData = Array.from(row.children).map(function (cell) {
                return cell.textContent;
            });

            // Mostrarr la información en el input"
            // input.value = 
            document.getElementById('codigoActividad').value = rowData[6];
            input.placeholder = rowData[7];

            // Mostrar toda la información
            // input.value = rowData.join();
            modal.style.display = 'none';
        }
    });
});
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print - Mahasiswa</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
    <style>
        table{
            width: 100%;
            border-collapse: collapse !important;
        }
        tr,td{
            border: 1px solid black;
        }
        .text-center{
            text-align: center;
        }
    </style>
    <div class="text-center">
        <h3>Laporan Data Mahasiswa</h3>
    </div>
    <table class="table"> 
        <thead> 
            <tr> 
                <td>No</td> 
                <td>Jurusan</td> 
                <td>NPM</td> 
                <td>Nama</td> 
                <td>Tanggal Lahir</td> 
                <td>Foto</td>  
            </tr> 
        </thead>
        <tbody>
            @foreach($mahasiswa as $data)
            <tr>
                <td>{{$loop->iteration}}</td> 
                <td>{{$data->jurusan}}</td> 
                <td>{{$data->npm}}</td> 
                <td>{{$data->nama}}</td> 
                <td>{{Carbon\carbon::parse($data->tanggal_lahir)->format('d-m-Y')}}</td> 
                <td>
                    <img src ="{{asset('storage/foto/'.$data->foto)}}" alt="" width="50">
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table> 

    <button onclick="generatePDF()">Generate PDF</button>

    <script>
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'pt', 'a4');
            const source = document.body;
            
            html2canvas(source, {
                onrendered: function(canvas) {
                    const imgData = canvas.toDataURL('image/png');
                    const imgWidth = 210; 
                    const pageHeight = 295;  
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    let heightLeft = imgHeight;
                    let position = 0;

                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        pdf.addPage();
                        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }
                    
                    pdf.save('mahasiswa.pdf');
                }
            });
        }
    </script>
</body>
</html>
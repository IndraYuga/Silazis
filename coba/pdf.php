<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML to PDF</title>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
</head>
<body>
    <div id="content">
        <h1>Hello, this will be converted to PDF</h1>
        <!-- Your HTML content goes here -->
    </div>

    <button onclick="downloadPDF()">Download PDF</button>

    <script>
        function downloadPDF() {
            var element = document.getElementById('content');

            html2canvas(element).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(imgData, 'PNG', 0, 0, 210, 297);
                pdf.save('converted.pdf');
            });
        }
    </script>
</body>
</html>

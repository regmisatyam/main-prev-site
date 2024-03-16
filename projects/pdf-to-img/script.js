let pdfDoc = null;
let pageNum = 1;
let pageRendering = false;
const canvas = document.getElementById('pdfCanvas');
const ctx = canvas.getContext('2d');
const fileInput = document.getElementById('fileInput');
const downloadBtn = document.getElementById('downloadBtn');
const loader = document.getElementById('loader');

function showLoader() {
    loader.style.display = 'block';
}

function hideLoader() {
    loader.style.display = 'none';
}

function renderPage(num, zip) {
    pageRendering = true;
    pdfDoc.getPage(num).then(function(page) {
        const viewport = page.getViewport({ scale: 1.5 });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };

        const renderTask = page.render(renderContext);
        renderTask.promise.then(function() {
            const imgData = canvas.toDataURL('image/png');

            // Add image to the zip file
            zip.file(`page_${num}.png`, imgData.split('base64,')[1], { base64: true });

            if (pdfDoc.numPages > pageNum) {
                pageNum++;
                renderPage(pageNum, zip);
            } else {
                pageRendering = false;
                hideLoader();
                downloadBtn.disabled = false;

                // Generate a download link for the zip file
                zip.generateAsync({ type: 'blob' }).then(function(content) {
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(content);
                    link.download = 'pdf-to-image.zip';
                    link.click();
                });
            }
        });
    });
}

fileInput.addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file && file.type === 'application/pdf') {
        const reader = new FileReader();

        reader.onload = function(e) {
            const pdfData = new Uint8Array(e.target.result);

            pdfjsLib.getDocument(pdfData).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                pageNum = 1;
                showLoader();
                downloadBtn.disabled = true;

                // Initialize JSZip
                const zip = new JSZip();
                renderPage(pageNum, zip);
            });
        };

        reader.readAsArrayBuffer(file);
    } else {
        alert('Please select a valid PDF file.');
    }
});

downloadBtn.addEventListener('click', function() {
 
});

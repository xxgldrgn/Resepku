<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Resepku</title>
    
</head>
<body>
    @include('partials.navbar')
    <h5 class="container ps-5 mt-3" style="color: #547794;font-size: 24px;font-family: Ubuntu">Tulis resepmu...</h5>
    <div class="container ps-5 pt-4">
        <form action="/tulis" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="slug"></label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="form-group">
                <label for="inputDeskripsi">Deskripsi</label>
                <textarea class="form-control" id="inputDeskripsi" rows="5"></textarea>
                <br>
              </div>
            <div class="form-group" id="inputBahan">
                <label for="inputBahan" style="font-family: Ubuntu;font-size: 20px;color:#547794">Bahan - bahan</label>
                <input type="bahan" class="form-control" id="inputBahan">
                <br>
            </div>
                <button id="addRow" type="button" class="btn mb-3">+ Item Bahan</button>
                <script type="text/javascript">
                    // add row
                    $("#addRow").click(function () {
                        var html = '';
                        html += '<div id="inputFormRow">';
                        html += '<div class="input-group mb-3">';
                        html += '<input type="text" name="bahan" class="form-control" autocomplete="off">';
                        html += '<div class="input-group-append">';
                        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                        html += '</div>';
                        html += '</div>';
                
                        $('#inputBahan').append(html);
                    });
                
                    // remove row
                    $(document).on('click', '#removeRow', function () {
                        $(this).closest('#inputFormRow').remove();
                    });
                </script>

            <div class="form-group" id="inputLangkah">
                <label for="inputLangkah" style="font-family: Ubuntu;font-size: 20px;color:#547794">Langkah Pembuatan</label>
                <input type="langkah" class="form-control" id="inputLangkah">
                <br>
            </div>
                <button id="addRow2" type="button" class="btn mb-3">+ Item Langkah</button>
                <script type="text/javascript">
                    // add row
                    $("#addRow2").click(function () {
                        var html = '';
                        html += '<div id="inputFormRow">';
                        html += '<div class="input-group mb-3">';
                        html += '<input type="text" name="bahan" class="form-control" autocomplete="off">';
                        html += '<div class="input-group-append">';
                        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                        html += '</div>';
                        html += '</div>';
                
                        $('#inputLangkah').append(html);
                    });
                
                    // remove row
                    $(document).on('click', '#removeRow', function () {
                        $(this).closest('#inputFormRow').remove();
                    });
                </script>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Foto Masakan</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button type="button" class="btn btn-dark input-block-level form-control mb-5" style="background-color:#547794;height:50px;">Terbitkan Resep</button>
        </form>
    </div>
    @include('partials.footer')

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/home/checkSlug?title=' +title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
    </script>
</body>
</html>
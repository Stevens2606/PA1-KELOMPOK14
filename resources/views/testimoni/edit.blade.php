<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimoni</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1>Edit Testimoni</h1>
        <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $testimoni->nama }}"
                    required>
            </div>

            <div class="form-group">
                <label for="isi">Testimoni:</label>
                <textarea class="form-control" id="isi" name="isi" rows="4"
                    required>{{ $testimoni->isi }}</textarea>
            </div>

            <div class="form-group">
                <label>Rating:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating1" value="1"
                        {{ $testimoni->rating == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating1">1 Bintang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating2" value="2"
                        {{ $testimoni->rating == 2 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating2">2 Bintang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating3" value="3"
                        {{ $testimoni->rating == 3 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating3">3 Bintang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating4" value="4"
                        {{ $testimoni->rating == 4 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating4">4 Bintang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating5" value="5"
                        {{ $testimoni->rating == 5 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating5">5 Bintang</label>
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="pria" {{ $testimoni->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria</option>
                    <option value="wanita" {{ $testimoni->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Wanita
                    </option>
                    <option value="lainnya" {{ $testimoni->jenis_kelamin == 'lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Testimoni</button>
            <a href="{{ route('testimoni.public') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1 align="center">Product List</h1>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>CATEGORY</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item => $product)
                <tr>
                    <td align="center">{{ $item + 1 }}</td>
                    <td align="left">
                        <span>{{ $product->nama_product }}</span>
                    </td>
                    <td align="center">
                        Rp. {{ $product->harga_product }}
                    </td>
                    <td align="center">
                        <span>{{ $product->categorie->nama_kategori }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

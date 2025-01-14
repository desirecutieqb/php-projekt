<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .pagination {
            font-size: 0.8rem;
        }

        .pagination .page-item .page-link {
            padding: 0.25rem 0.5rem;
            /* Dostosowanie paddingu */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item .page-link:hover {
            background-color: #0056b3;
            /* Kolor tła przy najechaniu */
            color: white;
            /* Kolor tekstu przy najechaniu */
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Biblioteka</h1>

        <h2>Książki</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Rok wydania</th>
                    <th>Gatunek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>{{ $book->genre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }} <!-- Linki do paginacji -->

        <h2>Członkowie</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Imię</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Data członkostwa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->membership_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $members->links() }} <!-- Linki do paginacji -->

        <h2>Wypożyczenia</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Członek</th>
                    <th>Data wypożyczenia</th>
                    <th>Data zwrotu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->member->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $borrows->links() }} <!-- Linki do paginacji -->

        <h2>Wypożyczenia książek</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Książka</th>
                    <th>Członek</th>
                    <th>Data wypożyczenia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookBorrows as $bookBorrow)
                    <tr>
                        <td>{{ $bookBorrow->book->title }}</td>
                        <td>{{ $bookBorrow->borrow->member->name }}</td>
                        <td>{{ $bookBorrow->borrow->borrow_date }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $bookBorrows->links() }} <!-- Linki do paginacji -->
    </div>
</body>

</html>
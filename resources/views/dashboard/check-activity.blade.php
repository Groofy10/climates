<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .full-height {
            min-height: 75vh;
        }

        .email-column {
            max-width: 10rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <x-layout>
        <div class="backgroundnavbar"></div>

        <div class="container mt-5 full-height">
            <h3>List Participants ({{ $title }})</h3>
            <div class="all-container">

                <div class="table-responsive w-100">
                    <table class="table table-bordered table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->username }}</td>
                                <td class="text-center email-column">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->verifStatus }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                </main>
            </div>
        </div>
        </div>

    </x-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
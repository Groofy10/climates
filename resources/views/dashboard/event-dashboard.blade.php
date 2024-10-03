<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .full-height {
            min-height:75vh;
        }

        .date-column {
         max-width: 3.5rem;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
        }

        .title-column {
         max-width: 12rem;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
        }

        .action-column {
         max-width: 5.5rem;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
        }

        .this-container {
        width: 100%;
        margin-inline: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
    </style>
</head>
<body>
    <x-layout>
        <div class="backgroundnavbar"></div>
        
        <div class="container mt-5 full-height">
            <h3>Article Dashboard</h3>
            <a href="{{ route('dashboard.event.create') }}" class="btn btn-primary">Create Activity</a>
            @if(session('success'))
            <div class="alert alert-success  alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                  @endif
            <div class="this-container mt-3">
                
                <div class="table-responsive w-100">
                    <table class="table table-bordered table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Title</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Date</th>
                                <th class="text-center" scope="col">Time</th>
                                <th class="text-center" scope="col">Capacity</th>
                                {{-- <th class="text-center" scope="col">Start Reg</th>
                                <th class="text-center" scope="col">End Reg</th> --}}
                                <th class="text-center max-w-20 text-ellipsis overflow-hidden whitespace-nowrap" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                            <tr>
                                <td class="text-center">{{ $activity->id }}</td>
                                <td class="text-center title-column">{{ $activity->activityTitle }}</td>
                                <td class="text-center ">{{ $activity->activityStatus }}</td>
                                <td class="text-center date-column">{{ $activity->activityDate }}</td>
                                <td class="text-center date-column">{{ $activity->activityTime }}</td>
                                <td class="text-center capacity-column">{{ $activity->activityCapacity }}</td>
                                {{-- <td class="text-center date-column">{{ $activity->activityStartRegistration }}</td>
                                <td class="text-center date-column">{{ $activity->activityEndRegistration }}</td> --}}
                                <td class="text-center action-column ">
                                    <a href="{{ route('dashboard.event.edit',$activity->id) }}" class="btn btn-outline-success btn-sm">Edit Detail</a>
                                    <form action="{{ route('dashboard.event.destroy',$activity->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <a href="{{ route('dashboard.event.check',$activity->id) }}" class="btn btn-outline-primary btn-sm">Participants</a>

                                </td>
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
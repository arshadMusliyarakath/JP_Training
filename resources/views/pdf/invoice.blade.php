<table border="1">
    <thead>
        <tr>
            <th>S No</th>
            <th>Name</th>
            <th>Email</th>
            <th>DOB</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)

        
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->dob }}</td>

        </tr>
        @endforeach
    </tbody>
</table>


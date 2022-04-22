{{ include('/_header.view.php') }}

    <h1>Student Overview</h1>

    <table class="table table-hover my-4" style="max-width: 60rem;">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        {% for student in allStudents %}
            <tr>
                <td>{{ student.firstname }} {{ student.lastname }}</td>
                <td>{{ student.email }}</td>
                <!-- <td><a href="/student/details/{{ student.studentid }}">Details</a></td> -->
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <!-- <a href="/student/new" class="btn btn-primary">New student</a> -->

{{ include('/_footer.view.php') }}
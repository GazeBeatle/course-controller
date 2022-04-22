{{ include('/_header.view.php') }}

    <h1>Student Details</h1>

    <table class="table my-4" style="max-width: 60rem;">
        <thead>
            <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        {% for info in studentById %}
                <tr>
                    <td>{{ info.firstname }}</td>
                    <td>{{ info.lastname }}</td>
                    <td>{{ info.email }}</td>
                </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-between" style="max-width: 15rem;">
        <a href="/students/delete/{{ info.studentid }}" class="btn btn-secondary">Delete</a>
        <br>
        <a href="/students/edit/{{ info.studentid }}" class="btn btn-primary">Edit</a>
        {% endfor %}
    </div>

{{ include('/_footer.view.php') }}
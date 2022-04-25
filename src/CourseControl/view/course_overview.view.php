{{ include('/_header.view.php') }}

    <h1>Course Overview</h1>

    <table class="table table-hover my-4" style="max-width: 60rem;">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Duration</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        {% for course in allCourses %}
            <tr>
                <td>{{ course.course_code }}</td>
                <td>{{ course.course_name }}</td>
                <td>{{ course.start_date }} - {{ course.end_date }}</td>
                <td><a href="/courses/details/{{ course.id }}">Details</a></td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href="/courses/new" class="btn btn-primary">New Course</a>

{{ include('/_footer.view.php') }}
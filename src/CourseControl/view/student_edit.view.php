{{ include('/_header.view.php') }}

    <h1>Edit Student</h1>

    <form class="form needs-validation my-4" method="post" action="" enctype="multipart/form-data" novalidate>
        {% for info in studentById %}
            <input name="csrf" type="hidden" value="{{ csrf }}">
            <input type="hidden" name="id" value="{{ info.studentid }}">
            <label class="form-label" for="firstname">Firstname:*</label>
            <input class="form-control" type="text" name="firstname" id="firstname" value="{{ info.firstname }}" required>
            <br>
            <label class="form-label" for="lastname">Lastname:*</label>
            <input class="form-control" type="text" name="lastname" id="lastname" value="{{ info.lastname }}" required>
            <br>
            <label class="form-label" for="email">Email:*</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ info.email }}" required>
            <br>
            <div class="d-flex justify-content-between" style="max-width: 15rem;">
                <a href="/students/details/{{ info.studentid }}" class="btn btn-secondary">Cancel</a>
                <br>
                <input class="btn btn-primary" type="submit" value="Save">
            </div>
        {% endfor %}
    </form>

    {% if errors %}
    <div class="error-msg">
        {% for error in errors %}
        <p>{{ error }}</p>
        {% endfor %}
    </div>
    {% endif %}

{{ include('/_footer.view.php') }}
{{ include('/_header.view.php') }}

    <h1>Add Student</h1>

    <form class="form needs-validation my-4" method="post" action="" enctype="multipart/form-data" novalidate>
        <input name="csrf" type="hidden" value="{{ csrf }}">
        <label class="form-label" for="firstname">Firstname: *</label>
        <input class="form-control" type="text" name="firstname" id="firstname" required>
        <br>
        <label class="form-label" for="lastname">Lastname: *</label>
        <input class="form-control" type="text" name="lastname" id="lastname" required>
        <br>
        <label class="form-label" for="email">Email: *</label>
        <input class="form-control" type="text" name="email" id="email" required>
        <br>
        <div class="d-flex justify-content-between" style="max-width: 15rem;">
            <a href="/students" class="btn btn-secondary">Cancel</a>
            <br>
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>

    {% if errors %}
    <div class="error-msg">
        {% for error in errors %}
        <p>{{ error }}</p>
        {% endfor %}
    </div>
    {% endif %}

{{ include('/_footer.view.php') }}
function showView() {
    document.getElementById('content').innerHTML = '<h2>View Page Content</h2>';
}

function showStudents() {
    document.getElementById('content').innerHTML = '<h2>Students Page Content</h2>';
}

function showCourses() {
    document.getElementById('content').innerHTML = '<h2>Courses Page Content</h2><button onclick="updateCourse()">Update</button><button onclick="deleteCourse()">Delete</button>';
}

function updateCourse() {
    alert('Update course functionality');
}

function deleteCourse() {
    alert('Delete course functionality');
}



// Get the buttons
var studentsButton = $("#students-button");
var teachersButton = $("#teachers-button");
var workersButton = $("#workers-button");
var addStudentButton = $("#add-student-button");

// Handle click event for students button
studentsButton.click(function () {
  // Set the dashboard title and content
  $("#dashboard-title").text("Students Information");
  $("#dashboard-content").text(
    "Here is a list of all the students in the database."
  );

  // Remove active class from other buttons
  teachersButton.removeClass("active");
  workersButton.removeClass("active");
  addStudentButton.removeClass("active");

  // Add active class to students button
  studentsButton.addClass("active");
});

// Handle click event for teachers button
teachersButton.click(function () {
  // Set the dashboard title and content
  $("#dashboard-title").text("Teachers Information");
  $("#dashboard-content").text(
    "Here is a list of all the teachers in the database."
  );

  // Remove active class from other buttons
  studentsButton.removeClass("active");
  workersButton.removeClass("active");
  addStudentButton.removeClass("active");

  // Add active class to teachers button
  teachersButton.addClass("active");
});

// Handle click event for workers button
workersButton.click(function () {
  // Set the dashboard title and content
  $("#dashboard-title").text("Workers Information");
  $("#dashboard-content").text(
    "Here is a list of all the workers in the database."
  );

  // Remove active class from other buttons
  studentsButton.removeClass("active");
  teachersButton.removeClass("active");
  addStudentButton.removeClass("active");

  // Add active class to workers button
  workersButton.addClass("active");
});

// Handle click event for add student button
addStudentButton.click(function () {
  // Set the dashboard title and content
  $("#dashboard-title").text("Add Student");
  $("#dashboard-content").text(
    "Please enter the student information in the modal window."
  );

  // Remove active class from other buttons
  studentsButton.removeClass("active");
  teachersButton.removeClass("active");
  workersButton.removeClass("active");

  // Add active class to add student button
  addStudentButton.addClass("active");

  // Show the modal window
  $("#add-student-modal").modal();
});

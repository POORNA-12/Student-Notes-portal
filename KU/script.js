function showDetails(year) {
    const detailsDiv = document.getElementById('details');
    const semesterContainer = document.getElementById('semester-selection');
    let detailsContent = '';
    let semesterButtons = '';

    switch (year) {
        case '1st':
            detailsContent = '<h2>1st Year Details</h2><p>Here Select the Sem for 1st Year.</p>';
            semesterButtons = '<button onclick="showSemesterDetails(\'1st\', \'1\')">Sem 1</button><button onclick="showSemesterDetails(\'1st\', \'2\')">Sem 2</button>';
            break;
        case '2nd':
            detailsContent = '<h2>2nd Year Details</h2><p>Here Select the Sem for 2nd Year.</p>';
            semesterButtons = '<button onclick="showSemesterDetails(\'2nd\', \'1\')">Sem 1</button><button onclick="showSemesterDetails(\'2nd\', \'2\')">Sem 2</button>';
            break;
        case '3rd':
            detailsContent = '<h2>3rd Year Details</h2><p>Here Select the Sem for 3rd Year.</p>';
            semesterButtons = '<button onclick="showSemesterDetails(\'3rd\', \'1\')">Sem 1</button><button onclick="showSemesterDetails(\'3rd\', \'2\')">Sem 2</button>';
            break;
        case '4th':
            detailsContent = '<h2>4th Year Details</h2><p>Here Select the Sem for 4th Year.</p>';
            semesterButtons = '<button onclick="showSemesterDetails(\'4th\', \'1\')">Sem 1</button><button onclick="showSemesterDetails(\'4th\', \'2\')">Sem 2</button>';
            break;
        default:
            detailsContent = '<p>Select a valid year.</p>';
            semesterButtons = '';
    }

    detailsDiv.innerHTML = detailsContent;
    semesterContainer.innerHTML = semesterButtons;

    // Hide all syllabus containers initially
    document.querySelectorAll('.syllabus-container').forEach(container => container.classList.remove('active'));
}

function showSemesterDetails(year, semester) {
    // Hide all syllabus containers
    document.querySelectorAll('.syllabus-container').forEach(container => container.classList.remove('active'));
    
    // Show the relevant syllabus container
    document.getElementById(`syllabus-${year}-${semester}`).classList.add('active');
}
// Chart instances
let gradeDistributionChart = null;
let studentProgressChart = null;
let classPerformanceChart = null;

// Chart colors
const chartColors = {
    primary: '#4e73df',
    secondary: '#858796',
    success: '#1cc88a',
    info: '#36b9cc',
    warning: '#f6c23e',
    danger: '#e74a3b',
    light: '#f8f9fc',
    dark: '#5a5c69'
};

// Initialize charts
function initializeCharts() {
    // Grade Distribution Chart
    const gradeDistributionCtx = document.getElementById('gradeDistributionChart').getContext('2d');
    gradeDistributionChart = new Chart(gradeDistributionCtx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Number of Students',
                data: [],
                backgroundColor: chartColors.primary,
                borderColor: chartColors.primary,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Student Progress Chart
    const studentProgressCtx = document.getElementById('studentProgressChart').getContext('2d');
    studentProgressChart = new Chart(studentProgressCtx, {
        type: 'line',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                },
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Class Performance Chart
    const classPerformanceCtx = document.getElementById('classPerformanceChart').getContext('2d');
    classPerformanceChart = new Chart(classPerformanceCtx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Average Score',
                    data: [],
                    backgroundColor: chartColors.primary,
                    borderColor: chartColors.primary,
                    borderWidth: 1
                },
                {
                    label: 'Highest Score',
                    data: [],
                    backgroundColor: chartColors.success,
                    borderColor: chartColors.success,
                    borderWidth: 1
                },
                {
                    label: 'Lowest Score',
                    data: [],
                    backgroundColor: chartColors.danger,
                    borderColor: chartColors.danger,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
}

// Update charts with new data
function updateCharts() {
    const courseID = document.getElementById('courseID').value;
    const formGroupID = document.getElementById('formGroupID').value;
    const teacherID = document.getElementById('teacherID').value;

    // Update Grade Distribution Chart
    fetchChartData('gradeDistribution', courseID, formGroupID, teacherID)
        .then(data => {
            if (data.success) {
                gradeDistributionChart.data.labels = data.data.labels;
                gradeDistributionChart.data.datasets[0].data = data.data.values;
                gradeDistributionChart.update();
            }
        });

    // Update Student Progress Chart
    fetchChartData('studentProgress', courseID, formGroupID, teacherID)
        .then(data => {
            if (data.success) {
                studentProgressChart.data.datasets = data.data.map((dataset, index) => ({
                    label: dataset.label,
                    data: dataset.data,
                    borderColor: Object.values(chartColors)[index % Object.keys(chartColors).length],
                    fill: false
                }));
                studentProgressChart.update();
            }
        });

    // Update Class Performance Chart
    fetchChartData('classPerformance', courseID, formGroupID, teacherID)
        .then(data => {
            if (data.success) {
                classPerformanceChart.data.labels = data.data.labels;
                classPerformanceChart.data.datasets = data.data.datasets.map((dataset, index) => ({
                    ...dataset,
                    backgroundColor: Object.values(chartColors)[index % Object.keys(chartColors).length],
                    borderColor: Object.values(chartColors)[index % Object.keys(chartColors).length]
                }));
                classPerformanceChart.update();
            }
        });
}

// Fetch chart data from server
async function fetchChartData(chartType, courseID, formGroupID, teacherID) {
    const url = new URL('ajax/fetchChartData.php', window.location.href);
    url.searchParams.append('chartType', chartType);
    if (courseID) url.searchParams.append('courseID', courseID);
    if (formGroupID) url.searchParams.append('formGroupID', formGroupID);
    if (teacherID) url.searchParams.append('teacherID', teacherID);

    try {
        const response = await fetch(url);
        return await response.json();
    } catch (error) {
        console.error('Error fetching chart data:', error);
        return { success: false, message: error.message };
    }
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
    updateCharts();

    // Add change event listeners to filters
    document.getElementById('filterForm').addEventListener('change', function() {
        updateCharts();
    });
}); 
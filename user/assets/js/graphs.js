$(document).ready( function() {

// Graph for total score
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function (data) {
            console.log(data);

            var player = [];
            var score = [];

            for (var i in data) {
                player.push("Test  " + data[i].test_date);
                score.push(data[i].final_score);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: player,
                datasets: [{
                    label: 'Total Score',
                    data: score,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],

            }

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });

// Graph for Correct and Incorrect score
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function (data) {
            console.log(data);

            var testDate = [];
            var correct = [];
            var incorrect = [];

            for (var i in data) {
                testDate.push("Test  " + data[i].test_date);
                correct.push(data[i].correct_res);
                incorrect.push(data[i].incorrect_res);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: testDate,
                datasets: [
                    {
                        label: 'Correct',
                        data: correct,
                        backgroundColor: [
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80)'
                        ],
                        borderColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Incorrect',
                        data: incorrect,
                        backgroundColor: [
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)'
                        ],
                        borderColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderWidth: 1
                    }

                ],

            }

            var ctx = $("#correct-in");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });

// Graph for Attempted and Unattempted
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function (data) {
            console.log(data);

            var testDate = [];
            var correct = [];
            var incorrect = [];

            for (var i in data) {
                testDate.push("Test  " + data[i].test_date);
                correct.push(data[i].attem_ques);
                incorrect.push(data[i].unattem_ques);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: testDate,
                datasets: [
                    {
                        label: 'Attempted',
                        data: correct,
                        backgroundColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)'
                        ],
                        borderColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Unattempted',
                        data: incorrect,
                        backgroundColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderWidth: 1
                    }

                ],

            }

            var ctx = $("#attempt-un");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });

})
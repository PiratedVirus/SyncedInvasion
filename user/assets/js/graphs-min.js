$.ajax({url:"../user/templates/total_score",method:"GET",success:function(r){console.log(r);var b=[],g=[];for(var e in r)b.push("Test  "+r[e].test_date),g.push(r[e].final_score);var o={labels:b,datasets:[{label:"Total Score",data:g,backgroundColor:["rgba(255, 99, 132, 0.2)","rgba(54, 162, 235, 0.2)","rgba(255, 206, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(153, 102, 255, 0.2)","rgba(255, 159, 64, 0.2)"],borderColor:["rgba(255,99,132,1)","rgba(54, 162, 235, 1)","rgba(255, 206, 86, 1)","rgba(75, 192, 192, 1)","rgba(153, 102, 255, 1)","rgba(255, 159, 64, 1)"],borderWidth:1}]},a=$("#mycanvas"),t=new Chart(a,{type:"bar",data:o,options:{scales:{yAxes:[{ticks:{beginAtZero:!0}}]}}})},error:function(r){console.log(r)}}),$.ajax({url:"../user/templates/total_score",method:"GET",success:function(r){console.log(r);var b=[],g=[],e=[];for(var o in r)b.push("Test  "+r[o].test_date),g.push(r[o].correct_res),e.push(r[o].incorrect_res);var a={labels:b,datasets:[{label:"Correct",data:g,backgroundColor:["rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80,0.6)","rgb(76, 175, 80)"],borderColor:["rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)"],borderWidth:1},{label:"Incorrect",data:e,backgroundColor:["rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)","rgb(244, 67, 54, 0.6)"],borderColor:["rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)"],borderWidth:1}]},t=$("#correct-in"),s=new Chart(t,{type:"bar",data:a,options:{scales:{yAxes:[{ticks:{beginAtZero:!0}}]}}})},error:function(r){console.log(r)}}),$.ajax({url:"../user/templates/total_score",method:"GET",success:function(r){console.log(r);var b=[],g=[],e=[];for(var o in r)b.push("Test  "+r[o].test_date),g.push(r[o].attem_ques),e.push(r[o].unattem_ques);var a={labels:b,datasets:[{label:"Attempted",data:g,backgroundColor:["rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)"],borderColor:["rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)","rgb(76, 175, 80)"],borderWidth:1},{label:"Unattempted",data:e,backgroundColor:["rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)"],borderColor:["rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)","rgb(244, 67, 54)"],borderWidth:1}]},t=$("#attempt-un"),s=new Chart(t,{type:"bar",data:a,options:{scales:{yAxes:[{ticks:{beginAtZero:!0}}]}}})},error:function(r){console.log(r)}});
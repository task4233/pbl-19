(function() {
    'use strict';
    var type = 'line';
    var data = {
        labels: ['2018-01', '2018-02', '2018-03', '2018-04', '2018-04'],
        datasets: [{
            label: 'type A',
            data: [111, 222, 333, 444, 555]
        }, {
            label: 'type B',
            data: [555, 444, 333, 222, 111]
        }]
    };

    var options;
    var ctx = $('#chart')[0].getContext('2d');
    var myChart = new Chart(ctx, {
        type: type,
        data: data,
        options: options
    });
})();

$(document).ready(function () {
    // chartPenjualan();
    // function chartPenjualan() {
    let labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    let datas = [
        '80000000',
        '60000000',
        '23000000',
        '58000000',
        '23700000',
        '12000000',
        '12005010',
    ];

    let ctx = document.getElementById('chartPenjualan').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: datas,
                backgroundColor: [
                    'rgba(255,99,132,0.2)',
                    'rgba(54,162,235,0.2)',
                    'rgba(50, 212, 0, 0.2)',
                    'rgba(255, 187, 0, 0.2)',
                    'rgba(111, 0, 255, 0.2)',
                    'rgba(0, 255, 34, 0.2)',
                    'rgba(255, 0, 0, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54,162,235,1)',
                    'rgba(54,206,86,1)',
                    'rgba(255,192,192,1)',
                    'rgba(75,99,255,1)',
                    'rgba(255,255,64,1)',
                    'rgba(75,64,86,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    })
    // };
});

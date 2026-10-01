import Chart from 'chart.js/auto';

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    const ActivityCanvas = document.getElementById('activityChart');
    const activityLabels = window.activityData.map(activity => activity.activity_date);
    const activityValues = window.activityData.map(activity => activity.duration);
    const activityTypes = window.activityData.map(activity => activity.activity_type);

    if (ActivityCanvas) {
        new Chart(ActivityCanvas, {
            type: 'line',

            data: {
                labels: activityLabels,

                datasets: [{
                    label: 'Activité physique',
                    data: activityValues,
                    borderColor: 'rgb(211, 156, 36)',
                    backgroundColor: 'rgb(211, 156, 36)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                            maxRotation: 0,
                            maxTicksLimit: 7,
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'white', callback: function(value)
                            {
                                return value + 'mn';
                            }
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return activityTypes[context.dataIndex] + ': ' + context.raw + 'min';
                            }
                        }
                    }
                }
            }
        });
    }

    const SleepCanvas = document.getElementById('sleepChart');
    const sleepLabels = window.sleepData.map(sleep => sleep.sleep_date);
    const sleepValues = window.sleepData.map(sleep => sleep.hours);

    if (SleepCanvas) {
        new Chart(SleepCanvas, {
            type: 'line',

            data: {
                labels: sleepLabels,

                datasets: [{
                    label: 'Sommeil',
                    data: sleepValues,
                    borderColor: 'rgb(36, 211, 182)',
                    backgroundColor: 'rgb(36, 211, 182)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                            maxRotation: 0,
                            maxTicksLimit: 7,
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'white', callback: function(value)
                            {
                                return value + 'h';
                            }
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Sommeil: ' + context.raw + 'h';
                            }
                        }
                    }
                }
            }
        });
    }

    const WaterCanvas = document.getElementById('waterChart');
    const waterLabels = window.waterData.map(water => water.water_date);
    const waterValues = window.waterData.map(water => water.litre);

    if (WaterCanvas) {
        new Chart(WaterCanvas, {
            type: 'line',

            data: {
                labels: waterLabels,

                datasets: [{
                    label: 'Hydratation',
                    data: waterValues,
                    borderColor: 'rgb(36, 91, 211)',
                    backgroundColor: 'rgb(36, 91, 211)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                            maxRotation: 0,
                            maxTicksLimit: 7,
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'white', callback: function(value)
                            {
                                return value + 'L';
                            }
                        },
                        grid: {
                            color: 'gray'
                        }
                    },
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Hydratation: ' + context.raw + 'L';
                            }
                        }
                    }
                }
            }
        });
    }

});


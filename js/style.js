
// $(function () {
//     $("#map-container").japanMap({
//         onSelect: function (data) {
//             alert(data.name);
//         }
//     });
// });

// mapを表示
$(function () {


    var map_name = {
        1: "Hokkaido",
        2: "Aomori",
        3: "Iwate",
        4: "Miyagi",
        5: "Akita",
        6: "Yamagata",
        7: "Fukushima",
        8: "Ibaraki",
        9: "Tochigi",
        10: "Gunma",
        11: "Saitama",
        12: "Chiba",
        13: "Tokyo",
        14: "Kanagawa",
        15: "Niigata",
        16: "Toyama",
        17: "Ishikawa",
        18: "Fukui",
        19: "Yamanashi",
        20: "Nagano",
        21: "Gifu",
        22: "Shizuoka",
        23: "Aichi",
        24: "Mie",
        25: "Shiga",
        26: "Kyoto",
        27: "Osaka",
        28: "Hyogo",
        29: "Nara",
        30: "Wakayama",
        31: "Tottori",
        32: "Shimane",
        33: "Okayama",
        34: "Hiroshima",
        35: "Yamaguchi",
        36: "Tokushima",
        37: "Kagawa",
        38: "Ehime",
        39: "Kochi",
        40: "Fukuoka",
        41: "Saga",
        42: "Nagasaki",
        43: "Kumamoto",
        44: "Oita",
        45: "Miyazaki",
        46: "Kagoshima",
        47: "Okinawa"
    };

    // for(let i=1; i<=47; i++){
    //   area[i]
    // };

    var areas = [{
        code: 1,
        // name: "北海道",
        // name: map_name[1],
        name: map_name[1],
        color: "#7f7eda",
        hoverColor: "#b3b2ee",
        prefectures: [1]
    },
    {
        code: 2,
        name: "青森",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [2]
    },
    {
        code: 3,
        name: "岩手",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [3]
    },
    {
        code: 4,
        name: "宮城",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [4]
    },
    {
        code: 5,
        name: "秋田",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [5]
    },
    {
        code: 6,
        name: "山形",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [6]
    },
    {
        code: 7,
        name: "福島",
        color: "#759ef4",
        hoverColor: "#98b9ff",
        prefectures: [7]
    },
    {
        code: 8,
        name: "茨城",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [8]
    },
    {
        code: 9,
        name: "栃木",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [9]
    },
    {
        code: 10,
        name: "群馬",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [10]
    },
    {
        code: 11,
        name: "埼玉",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [11]
    },
    {
        code: 12,
        name: "千葉",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [12]
    },
    {
        code: 13,
        name: "東京",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [13]
    },
    {
        code: 14,
        name: "神奈川",
        color: "#7ecfea",
        hoverColor: "#b7e5f4",
        prefectures: [14]
    },
    {
        code: 15,
        name: "新潟",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [15]
    },
    {
        code: 16,
        name: "富山",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [16]
    },
    {
        code: 17,
        name: "石川",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [17]
    },
    {
        code: 18,
        name: "福井",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [18]
    },
    {
        code: 19,
        name: "山梨",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [19]
    },
    {
        code: 20,
        name: "長野",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [20]
    },
    {
        code: 21,
        name: "岐阜",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [21]
    },
    {
        code: 22,
        name: "静岡",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [22]
    },
    {
        code: 23,
        name: "愛知",
        color: "#7cdc92",
        hoverColor: "#aceebb",
        prefectures: [23]
    },
    {
        code: 24,
        name: "三重",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [24]
    },
    {
        code: 25,
        name: "滋賀",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [25]
    },
    {
        code: 26,
        name: "京都",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [26]
    },
    {
        code: 27,
        name: "大阪",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [27]
    },
    {
        code: 28,
        name: "兵庫",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [28]
    },
    {
        code: 29,
        name: "奈良",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [29]
    },
    {
        code: 30,
        name: "和歌山",
        color: "#ffe966",
        hoverColor: "#fff19c",
        prefectures: [30]
    },
    {
        code: 31,
        name: "鳥取",
        color: "#ffcc66",
        hoverColor: "#ffe0a3",
        prefectures: [31]
    },
    {
        code: 32,
        name: "島根",
        color: "#ffcc66",
        hoverColor: "#ffe0a3",
        prefectures: [32]
    },
    {
        code: 33,
        name: "岡山",
        color: "#ffcc66",
        hoverColor: "#ffe0a3",
        prefectures: [33]
    },
    {
        code: 34,
        name: "広島",
        color: "#ffcc66",
        hoverColor: "#ffe0a3",
        prefectures: [34]
    },
    {
        code: 35,
        name: "山口",
        color: "#ffcc66",
        hoverColor: "#ffe0a3",
        prefectures: [35]
    },
    {
        code: 36,
        name: "徳島",
        color: "#fb9466",
        hoverColor: "#ffbb9c",
        prefectures: [36]
    },
    {
        code: 37,
        name: "香川",
        color: "#fb9466",
        hoverColor: "#ffbb9c",
        prefectures: [37]
    },
    {
        code: 38,
        name: "愛媛",
        color: "#fb9466",
        hoverColor: "#ffbb9c",
        prefectures: [38]
    },
    {
        code: 39,
        name: "高知",
        color: "#fb9466",
        hoverColor: "#ffbb9c",
        prefectures: [39]
    },
    {
        code: 40,
        name: "福岡",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [40]
    },
    {
        code: 41,
        name: "佐賀",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [41]
    },
    {
        code: 42,
        name: "長崎",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [42]
    },
    {
        code: 43,
        name: "熊本",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [43]
    },
    {
        code: 44,
        name: "大分",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [44]
    },
    {
        code: 45,
        name: "宮崎",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [45]
    },
    {
        code: 46,
        name: "鹿児島",
        color: "#ff9999",
        hoverColor: "#ffbdbd",
        prefectures: [46]
    },
    {
        code: 47,
        name: "沖縄",
        color: "#eb98ff",
        hoverColor: "#f5c9ff",
        prefectures: [47]
    },
    ];


    console.log(areas);

    $("#map-container").japanMap({
        width: 800,
        selection: "area",
        areas: areas,
        // backgroundColor : "#f2fcff",
        // hoverColor: "red",
        borderLineColor: "#f2fcff",
        borderLineWidth: 0.25,
        lineColor: "#a0a0a0",
        lineWidth: 1,
        drawsBoxLine: true,
        showsPrefectureName: true,
        prefectureNameType: "short",
        movesIslands: true,
        fontSize: 11,
        onSelect: function (data) {
            alert(data.name);
        }
    });

    // chart.jsについて記述
    var ctx = document.getElementById("myLineChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['8月1日', '8月2日', '8月3日', '8月4日', '8月5日', '8月6日', '8月7日'],
            datasets: [{
                label: '最高気温(度）',
                data: [35, 34, 37, 35, 34, 35, 34, 25],
                borderColor: "rgba(255,0,0,1)",
                backgroundColor: "rgba(0,0,0,0)"
            },
            {
                label: '最低気温(度）',
                data: [25, 27, 27, 25, 26, 27, 25, 21],
                borderColor: "rgba(0,0,255,1)",
                backgroundColor: "rgba(0,0,0,0)"
            }
            ],
        },
        options: {
            title: {
                display: true,
                text: '気温（8月1日~8月7日）'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMax: 40,
                        suggestedMin: 0,
                        stepSize: 10,
                        callback: function (value, index, values) {
                            return value + '度'
                        }
                    }
                }]
            },
        }
    });

    // 棒グラフ

    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["A型", "O型", "B型", "AB型"],
            datasets: [{
                backgroundColor: [
                    "#BB5179",
                    "#FAFF67",
                    "#58A27C",
                    "#3C00FF"
                ],
                data: [38, 31, 21, 10]
            }]
        },
        options: {
            title: {
                display: true,
                text: '血液型 割合'
            }
        }
    });

    // 棒グラフ

    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['8月1日', '8月2日', '8月3日', '8月4日', '8月5日', '8月6日', '8月7日'],
            datasets: [{
                label: 'A店 来客数',
                data: [62, 65, 93, 85, 51, 66, 47],
                backgroundColor: "rgba(219,39,91,0.5)"
            }, {
                label: 'B店 来客数',
                data: [55, 45, 73, 75, 41, 45, 58],
                backgroundColor: "rgba(130,201,169,0.5)"
            }, {
                label: 'C店 来客数',
                data: [33, 45, 62, 55, 31, 45, 38],
                backgroundColor: "rgba(255,183,76,0.5)"
            }]
        },
        options: {
            title: {
                display: true,
                text: '支店別 来客数'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 10,
                        callback: function (value, index, values) {
                            return value + '人'
                        }
                    }
                }]
            },
        }
    });

    // レーダーチャート

    var ctx = document.getElementById("myRaderChart");
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ["英語", "数学", "国語", "理科", "社会"],
            datasets: [{
                label: 'Aさん',
                data: [92, 72, 86, 74, 86],
                backgroundColor: 'RGBA(225,95,150, 0.5)',
                borderColor: 'RGBA(225,95,150, 1)',
                borderWidth: 1,
                pointBackgroundColor: 'RGB(46,106,177)'
            }, {
                label: 'Bさん',
                data: [73, 95, 80, 87, 79],
                backgroundColor: 'RGBA(115,255,25, 0.5)',
                borderColor: 'RGBA(115,255,25, 1)',
                borderWidth: 1,
                pointBackgroundColor: 'RGB(46,106,177)'
            }]
        },
        options: {
            title: {
                display: true,
                text: '試験成績'
            },
            scale: {
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                    stepSize: 10,
                    callback: function (value, index, values) {
                        return value + '点'
                    }
                }
            }
        }
    });

    // 散布図

    var ctx = document.getElementById("myScatterChart");

    var myScatterChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            datasets: [{
                label: '1組',
                data: [{
                    x: 90,
                    y: 82
                }, {
                    x: 39,
                    y: 45
                }, {
                    x: 63,
                    y: 65
                }, {
                    x: 83,
                    y: 75
                }, {
                    x: 83,
                    y: 95
                }],
                backgroundColor: 'RGBA(225,95,150, 1)',
            },
            {
                label: '2組',
                data: [{
                    x: 97,
                    y: 92
                }, {
                    x: 63,
                    y: 70
                }, {
                    x: 48,
                    y: 52
                }, {
                    x: 83,
                    y: 79
                }, {
                    x: 66,
                    y: 74
                }],
                backgroundColor: 'RGBA(115,255,25, 1)',
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: '試験成績'
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: '英語'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 100,
                        stepSize: 10,
                        callback: function (value, index, values) {
                            return value + '点'
                        }
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: '数学'
                    },
                    ticks: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 10,
                        callback: function (value, index, values) {
                            return value + '点'
                        }
                    }
                }]
            }
        }
    });



});
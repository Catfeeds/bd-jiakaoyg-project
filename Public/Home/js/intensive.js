/**
 * 请求题目列表
 */
var yesTi = 0; //正确题数目
var errorTi = 0; //错误题数目
var SumCount = 0; //请求所有题目数量
var g_QuestionInfo = null; //题的信息
var arrindex = 0;
var error = new Array(); //存放错题ID
var tmpArr = new Array();
var getUrl = window.location.href;
getUrl = getUrl.split("?");
for (var i = 0; i < getUrl.length; i++) {
    if (i = 1) {
        getUrls = getUrl[i];
    }
}
getUrls = getUrls.split("&");
var tmp = "";
for (var i = 0; i < getUrls.length; i++) {
    tmp = getUrls[i].split("=");
    tmpArr[i] = tmp[1];
}
$.ajax({
    type: 'POST',
    url: 'ajaxsequential',
    data: {
        questions: tmpArr[0], //题库
        class: tmpArr[1], //科目
        classification: tmpArr[3], //类别
        sort: tmpArr[2], //排序
        test: urlTest,
    },
    async: false,
    timeout: 30000,
    success: function(data) {
        if (data.success == true) {
            SumCount = data.SumCount;
            $("#zong").html(SumCount + "道");
            $("#no").html(SumCount + "道");
            $("#zong1").html(SumCount + "道");
            $("#no1").html(SumCount + "道");
            if (data.Questions != null) {
                var arr = data.Questions;
                var str = "<tr>";
                for (var i = 0; i < arr.length; i++) {
                    if (i % 20 == 0) {
                        str += "</tr><tr>";
                    }
                    if (i == 0) {
                        arrindex = arr[i];
                        str += "<td class='" + (i + 1) + " current' name='" + arr[i] + "'><em>" + (i + 1) + "</em><s></s></td>";
                    } else {
                        str += "<td class='" + (i + 1) + "' name='" + arr[i] + "'><em>" + (i + 1) + "</em><s></s></td>";
                    }
                }
                str += "</tr>";
                $("#tiku").append(str);
                //默认获取第一道题
                geQuestion(arrindex);
            } else {
                alert("获取题目失败！");
            }
        }
    }
});
$("#tiku tr td").click(function() {
    clickss(this);
});

function clickss(obj) {
    $('.current').removeClass('current');
    $(obj).addClass('current');
    geQuestion($(obj).attr("name"), 0);
}
/******通过ID获取题目*****/
function geQuestion(id, indexs) {
    removeAll();
    $.ajax({
        type: 'POST',
        url: 'getQuestionById',
        data: {
            QuestionId: id,
            test: urlTest,
        },
        async: false,
        timeout: 30000,
        success: function(data) {
            if (data.success == true) {
                g_QuestionInfo = data;
                $("#questionTitle").html($(".current em").html() + '.&emsp;' + data.quecont);
                //显示图片
                if (data.images != "") {
                    $("#photo").attr("src", data.images);
                    $('.big_img').attr('src', data.images);
                    $('#clickbig').show();
                    $("#clickbig").show();
                    $(".imgpicbtn").show();
                    $("#photo").show();
                } else {
                    $("#photo").attr("src", "");
                    $("#photo").hide();
                    $(".imgpicbtn").hide();
                    $("#clickbig").hide();
                }
                //根据当前题的类型展示选项框
                if (data.quetype == "1") {
                    $(".radio_select").show();
                    $(".multi_select").hide();
                    $(".judge_select").hide();
                    $(".radio_select_btn").show();
                    $(".multi_select_btn").hide();
                    $(".judgebtn").hide();
                    $("#selectA").html("A、" + data.options.A);
                    $("#selectB").html("B、" + data.options.B);
                    $("#selectC").html("C、" + data.options.C);
                    $("#selectD").html("D、" + data.options.D);
                } else if (data.quetype == "2") {
                    $(".radio_select").hide();
                    $(".multi_select").show();
                    $(".judge_select").hide();
                    $(".radio_select_btn").hide();
                    $(".multi_select_btn").show();
                    $(".judgebtn").hide();
                    $("#multi_select_A").html("A、" + data.options.A);
                    $("#multi_select_B").html("B、" + data.options.B);
                    $("#multi_select_C").html("C、" + data.options.C);
                    $("#multi_select_D").html("D、" + data.options.D);
                    $(".ensurebtn").show();
                } else if (data.quetype == "3") {
                    $(".radio_select").hide();
                    $(".multi_select").hide();
                    $(".judge_select").show();
                    $(".radio_select_btn").hide();
                    $(".multi_select_btn").hide();
                    $(".judgebtn").show();
                }
                $("#Anlay").html(data.note); //解析
                $("#correctAnswer").html(data.answer); //正确答案
                $("#qiangdiao").html(data.red);
                /**
                 * 如果已经做过该题
                 */
                var names = $('td[name="' + data.id + '"] s').html();
                if (names != null && names != undefined && names != '') {
                    if (data.quetype == "1") {
                        var li = $(".radio_select_btn  button");
                        for (var i = 0; i < li.length; i++) {
                            if ($(li[i]).text() == names) {
                                $(li[i]).addClass("selectbtn");
                                $(li[i]).addClass("answerror");
                                break;
                            }
                        }
                        $(".radio_select_btn button[name=" + data.answer + "]").addClass("correct").removeClass("answerror");
                        $(".current s").html(names);
                    } else if (data.quetype == "2") {
                        var li = $(".multi_select_btn button:not(.ensurebtn)");
                        var split = names.split(",");
                        var str = "";
                        for (var i = 0; i < split.length; i++) {
                            str += split[i];
                        }
                        for (var j = 0; j < split.length; j++) {
                            $(".multi_select_btn button[name=" + split[j] + "]").addClass("answerror");
                            for (var i = 0; i < li.length; i++) {
                                var name = $(li[i]).text();
                                if (name == split[j]) {
                                    $(li[i]).addClass("selectbtn");
                                    $(li[i]).addClass("false");
                                }
                            }
                        }
                        var split = data.answer.split(",");
                        for (var i = 0; i < split.length; i++) {
                            $(".multi_select_btn button[name=" + split[i] + "]").removeClass("answerror").addClass("correct");
                        }
                        $(".ensurebtn").hide();
                    } else if (data.quetype == "3") {
                        var li = $(".judgebtn button"); //获取选项
                        if ($('.current s').html() == '×') {
                            if (data.answer == 'B') {
                                $(li).addClass("selectbtn");
                            } else {
                                $(li).addClass("selectbtn");
                                $(li).addClass("answerror");
                            }
                        } else {
                            if (data.answer == 'A') {
                                $(li).addClass("selectbtn");
                            } else {
                                $(li).addClass("selectbtn");
                                $(li).addClass("answerror");
                            }
                        }
                        $(".judgebtn button[name=" + data.answer + "]").addClass("correct").removeClass("answerror");
                        $(".judgebtn button").attr("disabled", true);
                    }
                }
            }
        }
    });
}
/******删除所有内容*****/
function removeAll() {
    //$("#correctAnswer").removeClass('tdanswerror');
    $(".radio_select_btn  button").removeClass("correct").removeClass("answerror").removeClass("selectbtn").removeClass("false");
    $(".multi_select_btn  button").removeClass("correct").removeClass("answerror").removeClass("selectbtn").removeClass("false");
    $(".judgebtn  button").removeClass("correct").removeClass("answerror").removeClass("selectbtn").removeClass("false");
    $(".judgebtn  button").attr("disabled", false);
    $(".tujiexianshi").attr("disabled", false);
    $("#correctAnswer").removeAttr("style");
}
/**
 * 显示解析
 */
$(".jiexixs").click(function() {
    if (!$("#jieshi button").hasClass("xuanzhong")) {
        $("#jieshi button").addClass("xuanzhong");
        $(".btjx").show(200);
        $("#jieshi button").css("background", "#f21919");
    } else {
        $("#jieshi button").removeClass("xuanzhong");
        $(".btjx").hide(200);
        $("#jieshi button").css("background", "#fff");
    }
});
$("#jieshi").click(function() {
    if (!$("#jieshi button").hasClass("xuanzhong")) {
        $("#jieshi button").css("background", "#f21919");
        $("#jieshi button").addClass("xuanzhong");
        $(".btjx").show(200);
    } else {
        $("#jieshi button").css("background", "#fff");
        $("#jieshi button").removeClass("xuanzhong");
        $(".btjx").hide(200);
    }
});
/**
 * 单项选中
 */
$(".radio_select_btn  button").click(function() {
    if (!$(".radio_select_btn  button").hasClass("selectbtn")) {
        var $answer = $("#correctAnswer").text(); //获取正确答案
        //把当前按钮添加class，其它删除
        $(this).addClass("selectbtn").siblings().removeClass("selectbtn");
        var $select = $(this).text(); //当前选中答案
        $(".current s").html($select);
        //判断选中答案是否正确
        if ($select == $answer) {
            $(this).addClass("correct");
            YesNoTi(1); //正确题目+1
            isFanYe(true); //翻页
        } else {
            addkey(); //替换红字
            error.push($(".current").attr('name'));
            $(".radio_select_btn  button[name=" + $answer + "]").addClass("correct");
            $("#correctAnswer").addClass('tdanswerror');
            $(this).addClass("answerror");
            $(".current s").addClass("tdanswerror");
            YesNoTi(-1); //错误题目+1
            isFanYe(false);
        };
    }
});
/************************多选选中************************/
$(".multi_select_btn  button:not(.ensurebtn)").click(function() {
    if (!$(".multi_select_btn button").hasClass("false")) {
        if ($(this).hasClass("correct")) {
            $(this).removeClass("correct");
            $(this).removeClass("selectbtn");
        } else {
            $(this).addClass("correct");
            $(this).addClass("selectbtn");
        }
    }
});
/************************多选确定************************/
$(".ensurebtn").click(function() {
    var answer = $("#correctAnswer").text();
    var multi = $(".selectbtn"); //选中的选项
    var str = "";
    for (var m = 0; m < multi.length; m++) {
        str += $(multi[m]).attr("name");
        str += ","; //对每个选中的选项添加name
    }
    var str = str.substring(0, str.length - 1);
    $(".current s").html(str);
    var falg = true;
    var len = answer.split(",");
    if (multi.length == len.length) { //判断选项和答案数量是否一样
        var f = false;
        //和答案进行比对
        for (var i = 0; i < len.length; i++) {
            f = false;
            for (var j = 0; j < multi.length; j++) {
                if (len[i] == $(multi[j]).text()) {
                    f = true;
                    break;
                }
            }
            if (!f) {
                falg = false;
                break;
            }
        }
    } else {
        falg = false;
    }
    $(".multi_select_btn button:not(.ensurebtn)").addClass("false");
    if (falg) {
        $("#correctAnswer").css("color", "#000");
        $(".selectbtn").addClass("false");
        YesNoTi(1);
        IsFanYe(true);
    } else {
        addkey();
        error.push($(".current").attr('name'));
        $(".current s").addClass("tdanswerror");
        YesNoTi(-1);
        $("#correctAnswer").css("color", "#f30018");
        var split = answer.split(",");
        //对错的选项进行突出显示
        for (var i = 0; i < multi.length; i++) {
            $(".multi_select_btn button[name=" + ($(multi[i]).text()) + "]").removeClass("correct").addClass("answerror");
        }
        //对答案进行突出显示
        for (var i = 0; i < split.length; i++) {
            $(".multi_select_btn button[name=" + split[i] + "]").removeClass("answerror").addClass("correct");
        }
        isFanYe(false);
    };
});
/******************判断题选中*********************************/
$(".judgebtn  button").click(function() {
    if (!$(".judgebtn  button").hasClass("selectbtn")) {
        var answer = $("#correctAnswer").text();
        $(this).addClass("selectbtn").siblings().removeClass("selectbtn");
        var select = $(this).attr("name");
        if (select == "A") {
            $(".current s").html("√")
        } else {
            $(".current s").html("×")
        }
        if (select == answer) {
            $(this).addClass("correct");
            $("#correctAnswer").css("color", "#000");
            isFanYe(true);
            YesNoTi(1);
        } else {
            addkey();
            error.push($(".current").attr('name'));
            $(".judgebtn  button[name=" + answer + "]").addClass("correct");
            $("#correctAnswer").css("color", "#f30018");
            $(this).addClass("answerror");
            $(".current s").addClass("tdanswerror");
            isFanYe(false);
            YesNoTi(-1);
        }
    }
})
//判断正错题数目
function YesNoTi(i) {
    if (i > 0) {
        yesTi++;
    } else {
        errorTi++;
    }
    $("#yes").html(yesTi + "道");
    $("#error").html(errorTi + "道");
    $("#no").html((Number(SumCount) - (yesTi + errorTi)) + "道");
    $("#lu").html(((errorTi / (yesTi + errorTi)).toFixed(4) * 100) + "%");
    $("#yes1").html(yesTi + "道");
    $("#error1").html(errorTi + "道");
    $("#no1").html((Number(SumCount) - (yesTi + errorTi)) + "道");
    $("#lu1").html(((errorTi / (yesTi + errorTi)).toFixed(4) * 100) + "%");
}
/******点击上一页下一页*****/
$(".before").click(function() {
    NextAndBefo(-1);
});
$(".later").click(function() {
    NextAndBefo(1);
});
/**************************判断是否翻页**************************/
function isFanYe(falg) {
    if (falg) {
        if ($(".dadui button").hasClass("xuanzhong") || $(".zidong button").hasClass("xuanzhong")) {
            NextAndBefo(1);
        }
        return;
    }
}
/**************************答对时翻页**************************/
$('.dadui button').click(function() {
    if (!$(".dadui button").hasClass("xuanzhong")) {
        $(".dadui button").addClass("xuanzhong");
        $(".dadui button").css("background", "#f21919");
    } else {
        $(".dadui button").removeClass("xuanzhong");
        $(".dadui button").css("background", "#fff")
    }
});
/**************************自动翻页**************************/
$('.zidong button').click(function() {
    if (!$(".zidong button").hasClass("xuanzhong")) {
        $(".zidong button").addClass("xuanzhong");
        $(".zidong button").css("background", "#f21919");
    } else {
        $(".zidong button").removeClass("xuanzhong");
        $(".zidong button").css("background", "#fff")
    }
});
/******翻页*****/
function NextAndBefo(indexs) {
    var index = $(".current em").text();
    if (indexs == -1 && index == "1") {
        alert("当前已是第一题，没有上一题了！");
        return;
    }
    if (indexs == 1 && index == SumCount) {
        alert("当前已是最后一题，没有下一题了！");
        return;
    }
    $('.current').removeClass('current');
    var next = Number(index) + indexs;
    $("." + next).addClass("current");
    geQuestion($("." + next).attr("name"), indexs);
}
/**
 * 设置按钮
 */
$('#set').click(function() {
    var obj = $('#sec');
    if (obj.css('left') == '783px') {
        obj.animate({
            left: '980px'
        }, 300);
    } else if (obj.css('left') == '980px') {
        obj.animate({
            left: '783px'
        }, 300);
    }
});
/**
 * 点击关闭
 */
$(".close").click(function() {
    if (confirm("确定要离开？")) {
        window.close();
    }
});
/*********替换红字***********/
function addkey() {
    var tagstringtxt = $("#qiangdiao").text();
    if (tagstringtxt != "" && tagstringtxt != null && tagstringtxt != undefined) {
        addKeyHandle(tagstringtxt, "#questionTitle");
        var selectA, selectB, selectC, selectD = "";
        if (g_QuestionInfo.quetype == "1") {
            selectA = "#selectA";
            selectB = "#selectB";
            selectC = "#selectC";
            selectD = "#selectD";
        } else if (g_QuestionInfo.quetype == "2") {
            selectA = "#multi_select_A";
            selectB = "#multi_select_B";
            selectC = "#multi_select_C";
            selectD = "#multi_select_D";
        } else if (g_QuestionInfo.quetype == "3") {
            selectA = "#multi_select_A";
            selectB = "#multi_select_B";
            selectC = "#multi_select_C";
            selectD = "#multi_select_D";
        }
        addKeyHandle(tagstringtxt, selectA);
        addKeyHandle(tagstringtxt, selectB);
        addKeyHandle(tagstringtxt, selectC);
        addKeyHandle(tagstringtxt, selectD);
    }
}

function addKeyHandle(data, id) {
    if (data != "" && data != null && data != undefined) {
        var tmp = $(id).html();
        var strsplit = data.split(",");
        for (var i = 0; i < strsplit.length; i++) {
            if (tmp.indexOf(strsplit[i]) >= 0) { //判断是否存在
                var str = $(id).html();
                str = str.replace(new RegExp(strsplit[i], "gm"), "<strong id='qiangdiao' style='font-size:24px!important;'> " + strsplit[i] + " </strong> ");
                $(id).html(str);
            }
        }
    }
}
/******提交按钮*******/
$('.sure').click(function() {
    $('.warm').css("display", "none");
    $("#tiku").html("");
    $.ajax({
        type: 'POST',
        url: 'getErrorList',
        data: {
            id: error,
        },
        async: false,
        timeout: 30000,
        success: function(data) {
            if (data.success == true) {
                SumCount = data.SumCount;
                $("#zong").html(SumCount + "道");
                $("#no").html(SumCount + "道");
                if (data.Questions != null) {
                    var arr = data.Questions;
                    var str = "<tr>";
                    for (var i = 0; i < arr.length; i++) {
                        if (i % 20 == 0) {
                            str += "</tr><tr>";
                        }
                        if (i == 0) {
                            arrindex = arr[i];
                            str += "<td class='" + (i + 1) + " current' name='" + arr[i] + "'><em>" + (i + 1) + "</em><s></s></td>";
                        } else {
                            str += "<td class='" + (i + 1) + "' name='" + arr[i] + "'><em>" + (i + 1) + "</em><s></s></td>";
                        }
                    }
                    str += "</tr>";
                    $("#tiku").append(str);
                    //默认获取第一道题
                    geQuestion(arrindex);
                } else {
                    alert("获取题目失败！");
                }
            }
        }
    });
});
$('.cancelsure').click(function() {
    window.close();
});
$('.tijiao').click(function() {
    $('.warm').css("display", "block");
});
$('#close').click(function() {
    $('.zzsc').hide(50);
    $('.content_mark').hide(100);
});
$('#clickbig').click(function() {
    $('.content_mark').css("display", "block");
    $('.zzsc').css("display", "block");
});